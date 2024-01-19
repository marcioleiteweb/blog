<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_quem_somos = "SELECT * FROM quem_somos";
	$resultado_quem_somos = mysqli_query($conn, $result_quem_somos);

	//Buscar os dados referente ao usuario situado neste id
	$result_servicos = "SELECT * FROM servicos";
	$resultado_servicos = mysqli_query($conn, $result_servicos);

	//Buscar os dados referente ao usuario situado neste id
	$result_banner_home = "SELECT * FROM banner_home";
	$resultado_banner_home = mysqli_query($conn, $result_banner_home);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Quem Somos</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=15" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_quem_somos = mysqli_fetch_assoc($resultado_quem_somos)){?>
<div class="container theme-showcase" role="main">

	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_quem_somos['id']; ?></dd>
		<dt>Titulo: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_quem_somos['titulo']; ?>
		
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=16&id=<?php echo $row_quem_somos["id"];?>" class="btn btn-sm btn-warning">
				edita
			</a>
		</div>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_quem_somos.php?id=<?php echo $row_quem_somos["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>		
		
		</dd>
		<dt>Conteudo: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_quem_somos['texto']; ?></dd>
		<dt>Foto quem somos: </dt>
		<dd class="alert alert-success" role="alert">
		<img width="200" src="../imgs-sistema/img-quem-somos/<?php echo $row_quem_somos['foto_principal']; ?>">
		</dd>	
	</dl>
</div>	
</div>
<?php }?>

<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Nossos Serviços</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=18" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_servicos = mysqli_fetch_assoc($resultado_servicos)){?>
<div class="container theme-showcase" role="main">

	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_servicos['id']; ?></dd>
		<dt>Titulo: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_servicos['titulo']; ?>
		
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=19&id=<?php echo $row_servicos["id"];?>" class="btn btn-sm btn-warning">
				edita
			</a>
		</div>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_servicos.php?id=<?php echo $row_servicos["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
		
		</dd>
		<dt>Conteudo: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_servicos['texto']; ?></dd>
	</dl>
</div>	
</div>
<?php }?>




<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Banner Home</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=21" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_banner_home = mysqli_fetch_assoc($resultado_banner_home)){?>
<div class="container theme-showcase" role="main">

	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_banner_home['id']; ?></dd>
		<dt>Titulo: </dt>		
		<dd class="alert alert-info" role="alert"><?php echo $row_banner_home['nome_banner']; ?>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_banner_home.php?id=<?php echo $row_banner_home["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
		</dd>
		<dt>Conteudo: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_banner_home['texto_banner']; ?></dd>
		<dt>Foto do banner: </dt>
		<dd class="alert alert-success" role="alert">
		<img width="200" src="../imgs-sistema/img-banner-home/<?php echo $row_banner_home['link_foto_banner']; ?>">
		</dd>	
	</dl>
</div>	
</div>
<?php }?>

