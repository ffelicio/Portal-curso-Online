<?php

class Configuracao{

	public $id;
  	public $email;
  	public $emailnews;
  	public $smtp;
  	public $bdbackup;
  	public $filebackup;
  	public $smtppass;

  	protected function setid($id){
		$this->id = $id;
	}

  	protected function setemail($email){
		$this->email = $email;
	}

  	protected function setemailnews($emailnews){
		$this->emailnews = $emailnews;
	}

 	protected function setsmtp($smtp){
		$this->smtp = $smtp;
	}

  	protected function setbdbackup($bdbackup){
		$this->bdbackup = $bdbackup;
	}

  	protected function setfilebackup($filebackup){
		$this->filebackup = $filebackup;
	}

  	protected function setsmtppass($smtppass){
		$this->smtppass = $smtppass;
	}

  public function all($id){
     $sql = "SELECT * FROM `configuracao` WHERE `id`= $id;";
     $vai = new MySQLDB();
     $result = $vai->ExecuteQuery($sql);
     
     while($dados = mysql_fetch_array($result)){
        $cliente = new Configuracao();
        $cliente->setid(array("id" => $dados["id"]));
        $cliente->setemail(array("email" => $dados["email"]));
        $cliente->setemailnews(array("emailnews" => $dados["emailnews"]));
        $cliente->setsmtp(array("smtp" => $dados["smtp"]));
        $cliente->setbdbackup(array("bdbackup" => $dados["bdbackup"]));
        $cliente->setfilebackup(array("filebackup" => $dados["filebackup"]));
        $cliente->setsmtppass(array("smtppass" => $dados["smtppass"]));
        $arr[] = $cliente;
     }
     return $arr;
  }

	public function Edit($id, $email, $emailnews, $smtp, $bdbackup, $filebackup, $smtppass){
    	$sql = "UPDATE `configuracao` SET `email`='$email', `emailnews`='$emailnews', `smtp`='$smtp', `bdbackup`='$bdbackup', `filebackup`='$filebackup', `smtppass`='$smtppass' WHERE `id` = $id;";
     	$vai = new MySQLDB();
     	$vai->ExecuteQuery($sql);
     	header("Location: config.php?vi=edit&nu=$id");
    }

}
?>