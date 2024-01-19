<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_artigos = "SELECT * FROM artigos";
	$resultado_artigos = mysqli_query($conn, $result_artigos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Artigos</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=19" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_artigos = mysqli_fetch_assoc($resultado_artigos)){?>


	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_artigos['id']; ?></dd>
		<dt>Titulo: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_artigos['titulo']; ?></dd>
		<dt>Conteudo: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_artigos['conteudo']; ?></dd>
		<dd class="alert alert-success" role="alert">

		<?php
			$caminho = '../albuns/'.$row_artigos['album'];
			//echo "$caminho";
			$files = glob("$caminho/*.*");
				for ($i=0; $i<count($files); $i++) { 
				$num = $files[$i]; 
				echo '
				<div id="gallery">
					<ul>
						<li>	
							<a href="'.$num.'" rel="lightbox" title="'.$row_artigos['album'].'"><img src="'.$num.'" width="160" height="160" alt="" title="Img#1" />
							</a>
						</li>
					</ul>
				</div>	
				'; 
			} 
			?>
		</dd>
	</dl>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_artigos.php?id=<?php echo $row_artigos["id"];?>" class="btn btn-sm btn-danger">
				Editar
			</a>
		</div>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_artigos.php?id=<?php echo $row_artigos["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<!--
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo/processa/redimencionar.php?id=<?php echo $row_artigos["id"];?>" class="btn btn-sm btn-primary">
				Redimencionar Imagens
			</a>		
		</div>
	</div>
	-->
<?php }?>
</div>