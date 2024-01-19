<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_alt_vendas = "SELECT * FROM alteracoes_sitacoes_vendas WHERE id = '$id' LIMIT 1";
	$resultado_alt_vendas = mysqli_query($conn, $result_alt_vendas);
	$row_alt_vendas = mysqli_fetch_assoc($resultado_alt_vendas);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Alteração na Venda</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=34"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/adm_proc_edita_alt_venda.php" enctype="multipart/form-data">
	
		<?php $venda_id = $row_alt_vendas['venda_id']; ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Número da Venda</label>
			<div class="col-sm-10">
				<select class="form-control" name="venda_id">
					<option>Selecione</option>
					<?php
					$result_vendas = "SELECT * FROM vendas";
					$result_vendas = mysqli_query($conn, $result_vendas);
					while($row_vendas = mysqli_fetch_assoc($result_vendas)){ ?> 
						<option value="<?php echo $row_vendas['id']; ?>"<?php
						if($venda_id == $row_vendas['id']){
							echo 'selected';
						}?> >						
						<?php echo $row_vendas['id']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
		
		<?php $situacoes_venda_id = $row_alt_vendas['situacoes_venda_id']; ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação da Venda</label>
			<div class="col-sm-10">
				<select class="form-control" name="situacoes_venda_id">
					<option>Selecione</option>
					<?php
					$result_situacoes_vendas = "SELECT * FROM situacoes_vendas";
					$result_situacoes_vendas = mysqli_query($conn, $result_situacoes_vendas);
					while($row_situacoes_vendas = mysqli_fetch_assoc($result_situacoes_vendas)){ ?> 
						<option value="<?php echo $row_situacoes_vendas['id']; ?>"<?php
						if($situacoes_venda_id == $row_situacoes_vendas['id']){
							echo 'selected';
						}?> >						
						<?php echo $row_situacoes_vendas['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>		
				
		<input type="hidden" name="id" value="<?php echo $row_alt_vendas['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning">Alterar</button>
			</div>
		</div>
	</form>
</div>