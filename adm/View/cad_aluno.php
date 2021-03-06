<?php

	include('includes/auth.php');

	require('../Controller/controller.php');

	if(isset($_REQUEST['action'])){
		switch ($_REQUEST['action']) {
			case "in":
				$cad = new Control();
				$cad->cadAluno($_POST['nome'], $_POST['cpf'], $_POST['email'], $_POST['senha'], $_POST['tel'], $_POST['cel'], $_POST['endereco'], $_POST['complemento'], $_POST['bairro'], $_POST['cep'], $_POST['cidade'], $_POST['estado'], $_POST['cliente_idcliente']);
			break;
		}
	}	

?>
<?php include('includes/head.php'); ?>
<body>
	<!--[if !IE]>start wrapper<![endif]-->
	<div id="wrapper">
		<!--[if !IE]>start head<![endif]-->
		<div id="head">
			<? include('includes/header.php') ?>
			<div id="menus_wrapper">
				<div id="main_menu">
					<ul>
						<li><a href="index.php"><span><span>Home</span></span></a></li>
						<li><a href="online.php" class="selected"><span><span>Curso-online</span></span></a></li>						
						<li><a href="simulado.php"><span><span>Simulado</span></span></a></li>					
					</ul>
				</div>
				<div id="sec_menu">
					<ul>
						<li><a href="aluno.php?ed=<?=$_GET["ed"]?>" class="sm5">Voltar</a></li>						
					</ul>				
				</div>
			</div>
		</div>
		<div id="content">
			<div id="page">
				<div class="inner">
					<div class="section">
						<!--[if !IE]>start title wrapper<![endif]-->
						<div class="title_wrapper">
							<h2>Alunos</h2>
							<span class="title_wrapper_left"></span>
							<span class="title_wrapper_right"></span>
						</div>
						<!--[if !IE]>end title wrapper<![endif]-->
						<!--[if !IE]>start section content<![endif]-->
						<div class="section_content">
							<!--[if !IE]>start section content top<![endif]-->
							<? include('includes/alerta.php') ?>
							<div class="sct">
								<div class="sct_left">
									<div class="sct_right">
										<div class="sct_left">
											<div class="sct_right">
												<h3>Cadastrar novo aluno</h3>

												<form id="Aluno" action="?action=in" method="POST" class="search_form general_form">
													<fieldset>
														<div class="forms">
															<div class="row">
																<label>Nome:</label>
																<div class="inputs">
																	<span class="input_wrapper">
																		<input class="text" name="nome" id="nome" type="text" title="O nome não pode ficar em branco." />
																		<input name="cliente_idcliente" id="cliente_idcliente" type="hidden" value="<?=$_GET["ed"]?>" />
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Email:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="email" id="email" type="text" title="Não está me parecendo um email válido." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Cpf:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cpf" id="cpf" type="text" /></span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<div class="row">
																<label>Endereço:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="endereco" id="endereco" type="text" title="O endereço não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Complemento:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="complemento" id="complemento" type="text" /></span>
																	<span class="system negative"></span>
																</div>
															</div>															
															<div class="row">
																<label>Bairro:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="bairro" id="bairro" type="text" title="O bairro não pode ficar em branco." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Estado:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<select name="estado" id="estado" title="Escolha um estado!">
																			<?php
																				$c = new Control();
																				$arre = $c->Controle_estados($idi);
																				for ($j = 0; $j < count($arre); $j++){
																			?>
																			<option value="<?php print $arre[$j]->cod_estados['cod_estados']; ?>"><?php print $arre[$j]->sigla['sigla']; ?></option>
																			<?php
																				}
																			?>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Cidade:</label>
																<div class="inputs">
																	<span class="input_wrapper blank">
																		<span class="carregando">Aguarde, carregando...</span>
																		<select name="cidade" id="cidade" title="Escolha uma cidade!">
																			<option value="">-- Escolha um estado --</option>
																		</select>
																	</span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Cep:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cep" id="cep" type="text" title="Verifique o cep" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Senha:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="senha" id="senha" class="password_test" onkeyup="passwordStrength(this.value)" type="password" title="Verifique a senha" /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<p>
																	<label for="passwordStrength">Password strength</label>
																	<div id="passwordDescription">Password not entered</div>
																	<div id="passwordStrength" class="strength0"></div>
																</p>
															</div>
															<div class="row">
																<label>Repita a senha:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="senha2" id="senha2" type="password" title="As senhas tem que ser iguais." /></span>
																	<span class="system negative"></span>
																</div>
															</div>
															<div class="row">
																<label>Tel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="tel" id="tel" type="text" title="Este campo é obrigatório." /></span>
																</div>
															</div>
															<div class="row">
																<label>Cel:</label>
																<div class="inputs">
																	<span class="input_wrapper"><input class="text" name="cel" id="cel" type="text" /></span>
																</div>
															</div>

															<div class="row">
																<div class="buttons">
																	<ul>
																		<li><span class="button send_form_btn"><span><span>Cadastrar</span></span><input name="" type="submit" /></span></li>
																		<li><span class="button cancel_btn"><span><span>Limpar</span></span><input name="" type="reset" /></span></li>
																	</ul>
																</div>
															</div>
														</div>
													</fieldset>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
							<span class="scb"><span class="scb_left"></span><span class="scb_right"></span></span>
						</div>
					</div>
				</div>
			</div>
			<div id="sidebar">
				<div class="inner">
					<?php include('includes/menu.php'); ?>
				</div>
			</div>
		</div>
	</div>
	<?php include('includes/footer.php'); ?>

		<script type="text/javascript">
		$(function(){
			$('#estado').change(function(){
				if( $(this).val() ) {
					$('#cidade').hide();
					$('.carregando').show();
					$.getJSON('cidades.ajax.php?search=',{estado: $(this).val(), ajax: 'true'}, function(j){
						var options = '<option value=""></option>';
						for (var i = 0; i < j.length; i++) {
							options += '<option value="' + j[i].cod_cidades + '">' + j[i].nome + '</option>';
						}
						$('#cidade').html(options).show();
						$('.carregando').hide();
					});
				} else {
					$('#cod_cidades').html('<option value="">– Escolha um estado –</option>');
				}
			});
		});
		</script>
</body>
</html>