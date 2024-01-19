<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_situacoes_vendas = "SELECT * FROM situacoes_vendas WHERE id = '$id' LIMIT 1";
	$resultado_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
	$row_situacoes_vendas = mysqli_fetch_assoc($resultado_situacoes_vendas);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Situação da Venda</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=26"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_situ_venda.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" class="form-control" id="inputEmail3" placeholder="Nome" value="<?php echo $row_situacoes_vendas['nome']; ?>">
			</div>
		</div>
				
		<input type="hidden" name="id" value="<?php echo $row_situacoes_vendas['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning">Alterar</button>
			</div>
		</div>
	</form>
</div>