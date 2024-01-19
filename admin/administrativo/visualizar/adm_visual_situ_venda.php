<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_situacoes_vendas = "SELECT * FROM situacoes_vendas WHERE id = '$id' LIMIT 1";
	$resultado_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
	$row_situacoes_vendas = mysqli_fetch_assoc($resultado_situacoes_vendas);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Situação da Venda</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=26">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=28&id=<?php echo $row_situacoes_vendas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/adm_apagar_situ_venda.php?id=<?php echo $row_situacoes_vendas["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $row_situacoes_vendas['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_situacoes_vendas['nome']; ?></dd>
		<dt>Inserido: </dt>
		<dd><?php 
			if(isset($row_situacoes_vendas['created'])){
				$inserido = $row_situacoes_vendas['created'];
				echo date('d/m/Y H:i:s', strtotime($inserido)); 
			}?>
		</dd>
		<dt>Alterado: </dt>
		<dd><?php 
			if(isset($row_situacoes_vendas['modified'])){				
				echo date('d/m/Y H:i:s',strtotime($row_situacoes_vendas['modified'])); 
			} ?>
		</dd>
	</dl>
</div>