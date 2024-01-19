<?php
	include_once("../../../conexao/conexao.php");
	$id = $_GET['id'];
	
	$result_clientes = "SELECT * FROM tarefas WHERE id_cliente = '$id'";
	$resultado_clientes = mysqli_query($conn , $result_clientes);
	$resultado_cli = mysqli_fetch_assoc($resultado_clientes);
	
	
		
	if(isset($_GET['apaga'])){
		$apaga = $_GET['apaga'];
	}else{
		$apaga = 0;	
	}

?>

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
		
<?php if($apaga == 0){?>
<!-- Modal -->
	<div class='modal fade' id='myModalApaga' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
	  <div class='modal-dialog'>
		<div class='modal-content'>
		  <div class='modal-header'>
			<h1 class='modal-title fs-5' id='exampleModalLabel'>Tem certeza?</h1>
		  </div>
		  <div class='modal-body'>
			Tem certeza que deseja apagar o registro?
		  </div>
		  <div class='modal-footer'>
			<a href='adm_apagar_clientes.php?id=<?php echo "$id";?>&apaga=1' class='btn btn-sm btn-danger' data-bs-dismiss='modal'>sim</a>
			<a href='../../../administrativo.php?link=72' class='btn btn-sm btn-success' data-bs-dismiss='modal'>não</a>
		  </div>
		</div>
	  </div>
	</div>
<?php }else{}?>
<?php

	
if($apaga == 1){	
	if(isset($resultado_cli)){
		echo "
			<!-- Modal -->
					<div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h1 class='modal-title fs-5' id='exampleModalLabel'></h1>
			
						  </div>
						  <div class='modal-body'>
							Não pode ser apagado, devido ter tarefas associadas!
						  </div>
						  <div class='modal-footer'>
							<a href='../../../administrativo.php?link=72' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
						  </div>
						</div>
					  </div>
					</div>				
		";
		//exit();
	}else{
		$result_categorias_produtos = "DELETE FROM clientes WHERE id = '$id'";
		$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
		
		echo "
				
				<!-- Modal -->
					<div class='modal fade' id='myModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
					  <div class='modal-dialog'>
						<div class='modal-content'>
						  <div class='modal-header'>
							<h1 class='modal-title fs-5' id='exampleModalLabel'></h1>
		
						  </div>
						  <div class='modal-body'>
							Apagado com sucesso!
						  </div>
						  <div class='modal-footer'>
							<a href='../../../administrativo.php?link=72' class='btn btn-sm btn-primary' data-bs-dismiss='modal'>ok</a>
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
				$('#myModalApaga').modal('show');
			});
			$(document).ready(function(){
				$('#myModal').modal('show');
			});
		</script>
  </body>
</html>