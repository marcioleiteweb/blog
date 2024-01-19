<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Apagar Registro</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div class="container theme-showcase" role="main">
            <div class="page-header">
            </div>
        </div>
    
<?php
	include_once("../../../conexao/conexao.php");
	$id = $_GET['id'];

		//seleciona linha do banco
	$select_produto = "SELECT * FROM tarefas WHERE id = '$id'";
	$resultado_produto = mysqli_query($conn, $select_produto);
	$exibe_produto = mysqli_fetch_assoc($resultado_produto);
	
    $id_tarefa =  $exibe_produto['id_cliente'];
	
	//seleciona linha do banco
	$select_cliente = "SELECT * FROM clientes WHERE id = '$id_tarefa'";
	$resultado_cliente = mysqli_query($conn, $select_cliente);
	$exibe_cliente = mysqli_fetch_assoc($resultado_cliente);
	
	$id_cliente = $exibe_cliente['id'];
		

	//seleciona linha do banco
	$select_anexo = "SELECT * FROM anexos WHERE id_tarefa = '$id' LIMIT 1";
	$resultado_anexo = mysqli_query($conn, $select_anexo);
	$exibe_anexo = mysqli_fetch_assoc($resultado_anexo);
	
?>

<?php
if(isset($_GET['apaga'])){
$apaga = $_GET['apaga'];
}else{
$apaga = 0;	
}

?>

<?php if($apaga == 0){?>
<!-- Modal -->
	<div class='modal fade' id='myModalApaga' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	  <div class='modal-dialog'>
		<div class='modal-content'>
		  <div class='modal-header'>
			<h1 class='modal-title fs-5' id='exampleModalLabel'>Tem certeza?</h1>
			<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
		  </div>
		  <div class='modal-body'>
			Tem certeza que deseja apagar o registro?
		  </div>
		  <div class='modal-footer'>
			<a href='adm_apagar_tarefas.php?id=<?php echo "$id";?>&apaga=1' class='btn btn-sm btn-danger' data-bs-dismiss='modal'>sim</a>
			<a href='../../../administrativo.php?link=73&id=<?php echo "$id_cliente";?>' class='btn btn-sm btn-success' data-bs-dismiss='modal'>não</a>
		  </div>
		</div>
	  </div>
	</div>
<?php }else{}?>

<?php	
if($apaga == 1){	
	if($exibe_produto != 0){
			if($exibe_anexo == 0){	
				//deleta a linha do banco
				$result_categorias_produtos = "DELETE FROM tarefas WHERE id = '$id'";
				$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);	
				echo "
			
					<!-- Modal -->
					<div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h1 class='modal-title fs-5' id='exampleModalLabel'></h1>
							<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
						  </div>
						  <div class='modal-body'>
							Apagado Com sucesso!
						  </div>
						  <div class='modal-footer'>
							<a href='../../../administrativo.php?link=73&id=".$id_cliente."' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
						  </div>
						</div>
					  </div>
					</div>					
				";	
			}else{
				echo "
				
					<!-- Modal -->
					<div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h1 class='modal-title fs-5' id='exampleModalLabel'></h1>
							<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
						  </div>
						  <div class='modal-body'>
							Ops! Não podemos apagar devido ter Anexos Cadastrados!
						  </div>
						  <div class='modal-footer'>
							<a href='../../../administrativo.php?link=73&id=".$id_cliente."' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
						  </div>
						</div>
					  </div>
					</div>	
					
				";
			}
		}else{
			 echo "
				
					<!-- Modal -->
					<div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h1 class='modal-title fs-5' id='exampleModalLabel'></h1>
							<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
						  </div>
						  <div class='modal-body'>
							Não foi apagado!
						  </div>
						  <div class='modal-footer'>
							<a href='../../../administrativo.php?link=73&id=".$id_cliente."' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
						  </div>
						</div>
					  </div>
					</div>
			";	 
		}
}
?>
<?php $conn->close(); ?>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
					<script>
					$(document).ready(function(){
						$('#myModal').modal('show');
					});
						$(document).ready(function(){
						$('#myModalApaga').modal('show');
					});
		</script>
  </body>
</html>