<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM equipe WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);	
?>
<div class="container theme-showcase" role="main">

	<div class="page-header">
        <h1>Editar Membro da Equipe</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=17" class="btn btn-sm btn-success">
				Voltar
			</a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_central" method="POST" action="administrativo/processa/edita/adm_proc_editar_equipe.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" required class="form-control" id="inputEmail3" placeholder="Nome" value="<?php echo $row_produtos['nome']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Cargo</label>
			<div class="col-sm-10">
				<input type="text" name="cargo" required class="form-control" id="inputEmail3" placeholder="Cargo" value="<?php echo $row_produtos['cargo']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Link Facebook</label>
			<div class="col-sm-10">
				<input type="text" name="link_face" required class="form-control" id="inputEmail3" placeholder="Link Facebook" value="<?php echo $row_produtos['link_face']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Link Instagram</label>
			<div class="col-sm-10">
				<input type="text" name="link_insta" required class="form-control" id="inputEmail3" placeholder="Link Instagram" value="<?php echo $row_produtos['link_insta']; ?>">
			</div>
		</div>

		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Foto Membro</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>	
		<input type="hidden" name="id" value="<?php echo $row_produtos['id']; ?>">
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" onclick="tinyMCE.triggerSave();" class="btn btn-warning">Alterar</button>
			</div>
		</div>
	</form>
</div>