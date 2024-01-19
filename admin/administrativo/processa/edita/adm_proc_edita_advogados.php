<?php session_start();?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Alterar Registro</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container theme-showcase" role="main">
            <div class="page-header">
            </div>
        </div>
		

<?php
	include_once("../../../conexao/conexao.php");
	if(isset($_POST['id'])){
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$_SESSION['id'] = mysqli_real_escape_string($conn, $_POST['id']);
		$_SESSION['nome'] = mysqli_real_escape_string($conn, $_POST['nome']);
		$_SESSION['email'] = mysqli_real_escape_string($conn, $_POST['email']);
		$_SESSION['senha'] = mysqli_real_escape_string($conn, $_POST['senha']);
		$_SESSION['senha_real'] = mysqli_real_escape_string($conn, $_POST['senha']);
		$_SESSION['senha_md5'] = md5($_POST['senha']);
		$_SESSION['whatsapp'] = mysqli_real_escape_string($conn, $_POST['whatsapp']);
		$_SESSION['select_situacao'] = mysqli_real_escape_string($conn, $_POST['select_situacao']);
		$_SESSION['select_nivel_acesso'] = mysqli_real_escape_string($conn, $_POST['select_nivel_acesso']);
		
		$id = $_SESSION['id'];
		$nome = $_SESSION['nome'];
		$email = $_SESSION['email'];
		$senha = $_SESSION['senha'];
		$senha_real = $_SESSION['senha_real'];
		$senha = $_SESSION['senha_md5'];
		$whatsapp = $_SESSION['whatsapp'];
		$select_situacao = $_SESSION['select_situacao']; 
		$select_nivel_acesso = $_SESSION['select_nivel_acesso'];
		
	}else{
		$id = $_SESSION['id'];
		$nome = $_SESSION['nome'];
		$email = $_SESSION['email'];
		$senha = $_SESSION['senha'];
		$senha_real = $_SESSION['senha_real'];
		$senha = $_SESSION['senha_md5'];
		$whatsapp = $_SESSION['whatsapp'];
		$select_situacao = $_SESSION['select_situacao']; 
		$select_nivel_acesso = $_SESSION['select_nivel_acesso'];

	//echo "$nome";		
	}

	if(isset($_GET['id_dados'])){
		$id_ok = $_GET['id_dados'];
	}else{
		$id_ok = 0;	
	}

		
	if(isset($_GET['altera'])){
		$altera = $_GET['altera'];
	}else{
		$altera = 0;	
	}


if($altera == 1){

	$result_usuario = "UPDATE vendedores SET nome ='$nome', email = '$email', senha = '$senha', senha_real = '$senha_real', whatsapp = '$whatsapp', situacoe_id = '$select_situacao', niveis_acesso_id = '$select_nivel_acesso' WHERE id = '$id_ok'";
	$resultado_usuario = mysqli_query($conn, $result_usuario);
	if(mysqli_affected_rows($conn) != 0){
	echo "
		<!-- Modal -->
			<div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
			  <div class='modal-dialog'>
				<div class='modal-content'>
				  <div class='modal-header'>
					<h1 class='modal-title fs-5' id='exampleModalLabel'></h1>
					
				  </div>
				  <div class='modal-body'>
					Alterado com sucesso!
				  </div>
				  <div class='modal-footer'>
					<a href='../../../administrativo.php?link=69&id=".$id_ok."' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
				  </div>
				</div>
			  </div>
			</div>
			";
			unset( $_SESSION['id'] );
			unset( $_SESSION['nome'] );
			unset( $_SESSION['email'] );
			unset( $_SESSION['senha'] );
			unset( $_SESSION['whatsapp'] );
			unset( $_SESSION['select_situacao'] );
			unset( $_SESSION['select_nivel_acesso'] );
			}else{		
			echo "			
				<!-- Modal -->
					<div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h1 class='modal-title fs-5' id='exampleModalLabel'></h1>
							
						  </div>
						  <div class='modal-body'>
							Não pode ser alterado!
						  </div>
						  <div class='modal-footer'>
							<a href='../../../administrativo.php?link=69&id=".$id_ok."' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
						  </div>
						</div>
					  </div>
					</div>
					";
				}
}	

?>

<?php if($altera == 0){?>
<!-- Modal -->
	<div class='modal fade' id='myModalApaga' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	  <div class='modal-dialog'>
		<div class='modal-content'>
		  <div class='modal-header'>
			<h1 class='modal-title fs-5' id='exampleModalLabel'>Tem certeza?</h1>
		  </div>
		  <div class='modal-body'>
			Tem certeza que deseja ALETAR o registro?
			<ul>
			<li>Nome: <?php echo "$nome";?> </li>
			<li>Email: <?php echo "$email";?> </li>
			<li>Senha: <?php echo "$senha_real";?> </li>
			<li>WhatsApp: <?php echo "$whatsapp";?> </li>
			</ul>
		  </div>
		  <div class='modal-footer'>
			<a href="adm_proc_edita_advogados.php?id_dados=<?php echo"$id";?>&altera=1" class='btn btn-sm btn-danger' data-bs-dismiss='modal'>sim</a>
			<a href='../../../administrativo.php?link=69&id=<?php echo "$id";?>' class='btn btn-sm btn-success' data-bs-dismiss='modal'>não</a>
		  </div>
		</div>
	  </div>
	</div>
<?php }else{}?>

<?php $conn->close(); ?>

        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
		<script>
			$(document).ready(function(){
				$('#myModalApaga').modal('show');
			});
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
		</script>
  </body>
</html>