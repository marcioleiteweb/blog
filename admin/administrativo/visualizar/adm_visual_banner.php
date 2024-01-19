<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_banner = "SELECT * FROM banner";
	$resultado_banner = mysqli_query($conn, $result_banner);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Banner do site</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=9" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_banner = mysqli_fetch_assoc($resultado_banner)){?>

	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_banner.php?id=<?php echo $row_banner["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_banner['id']; ?></dd>
		<dt>titulo: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_banner['titulo']; ?></dd>
		<dt>texto do banner: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_banner['textobanner']; ?></dd>
		<dt>Foto do Banner: </dt>
		<dd class="alert alert-warning" role="alert">
		<img src="<?php echo '../imagem_geral/banner/'.$row_banner['fotobanner']; ?>" width="200">
		</dd>
	</dl>

<?php }?>
</div>