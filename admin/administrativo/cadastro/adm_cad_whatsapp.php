<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar WhatsApp do site</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=68"><button type='button' class='btn btn-sm btn-success'>Voltar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_whatsapp.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Dono do Numero</label>
			<div class="col-sm-10">
				<input type="text" name="dono_whatsapp" class="form-control" id="inputEmail3" required="required"  placeholder="Dono do Numero">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label">WhatsApp do Site</label>
			<div class="col-sm-10">
				<input type="number" name="numero_whatsapp"  maxlength="11" size="11" class="form-control" id="inputEmail3" required="required" placeholder="WhatsApp (Somente Numeros)">
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success">Cadastrar</button>
			</div>
		</div>
	</form>
</div>