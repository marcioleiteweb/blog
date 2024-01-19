<?php
	function seguranca_adm(){
		if(isset($_SESSION['usuarioId'])){
			if((empty($_SESSION['usuarioId'])) || (empty($_SESSION['usuarioEmail'])) || (empty($_SESSION['usuarioNiveisAcessoId']))){		
				$_SESSION['loginErro'] = "Área restrita";
				header("Location: index.php");
			}else{
				if($_SESSION['usuarioNiveisAcessoId'] == "0"){
					$_SESSION['loginErro'] = "Área restrita";
					header("Location: index.php");
				}
			}
		}
			
	}
?>