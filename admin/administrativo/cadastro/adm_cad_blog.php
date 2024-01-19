<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Artigo</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=23"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form id="adm_cad_produto" class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_blog.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Titulo do Artigo</label>
			<div class="col-sm-10">
				<input type="text" name="titulo_blog" required class="form-control" id="inputEmail3" placeholder="Titulo do Artigo">
			</div>
		</div>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Texto do Artigo</label>
			<div class="col-sm-10">
				<textarea name="texto_blog" class="form-control"  rows="10" id="mytextarea1" placeholder="Texto do Artigo" required></textarea>
			</div>
		</div>
		

			
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Imagem do Artigo</label>
			<div class="col-sm-10">
				<input name="arquivo" type="file"/>
			</div>
		</div>	

		<div class="form-group">
			<label class="col-sm-2 control-label">Artigo de qual Estado</label>
			<div class="col-sm-10">
				<select class="form-control" name="id_estados">
					<option>Selecione</option>
					<?php
					$result_categorias_produtos = "SELECT * FROM estados";
					$result_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
					while($row_categorias_produtos = mysqli_fetch_assoc($result_categorias_produtos)){ ?> 
						<option value="<?php echo $row_categorias_produtos['id']; ?>"><?php echo $row_categorias_produtos['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
					
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				
				<button type="submit" class="btn btn-success" onclick="return tinyMCE.triggerSave();">Cadastrar</button>
				
			</div>
		</div>
	</form>
</div>