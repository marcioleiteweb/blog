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
		
	$_SESSION['id'] = mysqli_real_escape_string($conn, $_POST['id']);	
	$_SESSION['nome_tarefa'] = mysqli_real_escape_string($conn, $_POST['nome_tarefa']);	
	$_SESSION['descricao_tarefa'] = mysqli_real_escape_string($conn, $_POST['descricao_tarefa']);	
	$_SESSION['data_criada'] = mysqli_real_escape_string($conn, $_POST['data_criada']);	
	$_SESSION['status_tarefa'] = mysqli_real_escape_string($conn, $_POST['status_tarefa']);	
	$_SESSION['select_cliente'] = mysqli_real_escape_string($conn, $_POST['select_cliente']);	
	$_SESSION['select_vendedor'] = mysqli_real_escape_string($conn, $_POST['select_vendedor']);	
	$_SESSION['valor'] = mysqli_real_escape_string($conn, $_POST['valor']);	
		
	$id = $_SESSION['id'];
	$nome_tarefa = $_SESSION['nome_tarefa'];
	$descricao_tarefa = $_SESSION['descricao_tarefa'];
	$data_criada = $_SESSION['data_criada'];
	$status_tarefa = $_SESSION['status_tarefa'];
	$select_cliente = $_SESSION['select_cliente'];
	$select_vendedor = $_SESSION['select_vendedor'];
	$valor = $_SESSION['valor'];
	
	}else{
		
	$id = $_SESSION['id'];
	$nome_tarefa = $_SESSION['nome_tarefa'];
	$descricao_tarefa = $_SESSION['descricao_tarefa'];
	$data_criada = $_SESSION['data_criada'];
	$status_tarefa = $_SESSION['status_tarefa'];
	$select_cliente = $_SESSION['select_cliente'];
	$select_vendedor = $_SESSION['select_vendedor'];
	$valor = $_SESSION['valor'];	
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
	$result_usuario = "UPDATE tarefas SET nome_tarefa = '$nome_tarefa', descricao_tarefa = '$descricao_tarefa', data_criada = '$data_criada', status_tarefa = '$status_tarefa', id_cliente = '$select_cliente', id_advogado = '$select_vendedor', valor = '$valor' WHERE id = '$id'";
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
					<a href='../../../administrativo.php?link=76&id=".$id_ok."' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
				  </div>
				</div>
			  </div>
			</div>
			";
			
			unset ($_SESSION['nome_tarefa']);
			unset ($_SESSION['descricao_tarefa']);
			unset ($_SESSION['data_criada']);
			unset ($_SESSION['status_tarefa']);
			unset ($_SESSION['select_cliente']);
			unset ($_SESSION['select_vendedor']);
			unset ($_SESSION['valor']);
			
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
							<a href='../../../administrativo.php?link=76&id=".$id_ok."' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
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
			<li>Nome: <?php echo "$nome_tarefa";?> </li>
			<li>Descrição: <?php echo "$descricao_tarefa";?> </li>
			<li>Criado em: <?php echo "$data_criada";?> </li>
			<li>Status: <?php echo "$status_tarefa";?> </li>
			<li>Do Cliente: <?php echo "$select_cliente";?> </li>
			<li>Valor gasto: <?php echo "$valor";?> </li>
			</ul>
		  </div>
		  <div class='modal-footer'>
			<a href="adm_proc_edita_tarefas.php?id_dados=<?php echo"$id";?>&altera=1" class='btn btn-sm btn-danger' data-bs-dismiss='modal'>sim</a>
			<a href='../../../administrativo.php?link=76&id=<?php echo "$id";?>' class='btn btn-sm btn-success' data-bs-dismiss='modal'>não</a>
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