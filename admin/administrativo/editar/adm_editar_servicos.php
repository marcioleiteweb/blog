<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM servicos WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Serviços</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=14"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/edita/adm_proc_edita_servicos.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">titulo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo" class="form-control" id="inputEmail3" placeholder="Nome do Produto" value="<?php echo $row_produtos['titulo']; ?>">
			</div>
		</div>
		


		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Descrição</label>
			<div class="col-sm-10">
				<textarea name="texto" class="form-control" rows="5" maxlength="800" id="mytextarea2" placeholder="Descrição do prato" required> <?php echo $row_produtos['texto']; ?></textarea>
			</div>
		</div>
		

		
		<input type="hidden" name="id" value="<?php echo $row_produtos['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning" onclick="return tinyMCE.triggerSave();">Alterar</button>
			</div>
		</div>
	</form>
</div>