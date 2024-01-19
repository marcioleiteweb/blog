<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Membros</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=32"><button type='button' class='btn btn-sm btn-success'>voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" id="adm_cad_banner" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_lojas.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome_loja" class="form-control" id="inputEmail3" placeholder="Nome" required>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">WhatsApp</label>
			<div class="col-sm-10">
				<input type="text" name="whatsapp_loja" class="form-control" id="inputEmail3" placeholder="WhatsApp" required>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Facebook</label>
			<div class="col-sm-10">
				<input type="text" name="mapa_loja" class="form-control" id="inputEmail3" placeholder="Facebook" required>
			</div>
		</div>
	
	
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">foto do membro</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>		
					
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" onclick="tinyMCE.triggerSave();">Cadastrar</button>
			</div>
		</div>
	</form>
</div>