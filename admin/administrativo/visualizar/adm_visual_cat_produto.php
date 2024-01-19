<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_categorias_produtos = "SELECT * FROM categorias_produtos WHERE id = '$id' LIMIT 1";
	$resultado_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
	$row_categorias_produtos = mysqli_fetch_assoc($resultado_categorias_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Situação</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=52">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=55&id=<?php echo $row_categorias_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/apaga/adm_apagar_cat_produto.php?id=<?php echo $row_categorias_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_categorias_produtos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_categorias_produtos['nome']; ?></dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_categorias_produtos['created'])){
				$inserido = $row_categorias_produtos['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_categorias_produtos['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_categorias_produtos['modified'])); 
			} ?>
		</dd>
	</dl>
</div>