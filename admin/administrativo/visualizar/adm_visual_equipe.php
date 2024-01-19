<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_equipe = "SELECT * FROM equipe";
	$resultado_equipe = mysqli_query($conn, $result_equipe);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Nossa Equipe</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=18" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_equipe = mysqli_fetch_assoc($resultado_equipe)){?>
<div class="container theme-showcase" role="main">
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=19&id=<?php echo $row_equipe["id"];?>" class="btn btn-sm btn-warning">
				edita
			</a>
		</div>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_equipe.php?id=<?php echo $row_equipe["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_equipe['id']; ?></dd>
		<dt>Nome: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_equipe['nome']; ?></dd>
		<dt>Cargo: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_equipe['cargo']; ?></dd>
		<dt>Link facebook:</dt>
		<dd class="alert alert-success" role="alert">
			<a href="<?php echo $row_equipe['link_face']; ?>" class="btn btn-sm btn-success">
			facebook
			</a>
		</dd>
		<dt>Link Instagram: </dt>
		<dd class="alert alert-success" role="alert">
			<a href="<?php echo $row_equipe['link_insta']; ?>" class="btn btn-sm btn-success">
			instagram
			</a>
		</dd>
		<dt>Foto: </dt>
		<dd class="alert alert-success" role="alert">
		<img width="200" src="../imgs-sistema/img-equipe/<?php echo $row_equipe['foto_equipe']; ?>">
		</dd>	
	</dl>
</div>
</div>
<?php }?>