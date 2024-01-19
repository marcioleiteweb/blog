<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_eventos = "SELECT * FROM eventos";
	$resultado_eventos = mysqli_query($conn, $result_eventos);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Eventos</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=15" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_eventos = mysqli_fetch_assoc($resultado_eventos)){?>

	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_eventos.php?id=<?php echo $row_eventos["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_eventos['id']; ?></dd>
		<dt>Nome do Evento: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_eventos['evento']; ?></dd>
		<dt>Data: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_eventos['data']; ?></dd>
		<dt>Local: </dt>
		<dd class="alert alert-success" role="alert"><?php echo $row_eventos['local']; ?></dd>
		<dt>Link: </dt>
		<dd class="alert alert-success" role="alert">
		<a href="<?php echo $row_eventos['link']; ?>" class="btn btn-sm btn-success" target="_blank">
		mais informações
		</a>
		</dd>
	</dl>
<?php }?>
</div>