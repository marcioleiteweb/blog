<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_lives = "SELECT * FROM lives";
	$resultado_lives = mysqli_query($conn, $result_lives);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Botões com as Lives da Igreja</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=17" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_lives = mysqli_fetch_assoc($resultado_lives)){?>


	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_lives['id']; ?></dd>
		<dt>Nome da Live: </dt>
		<dd class="alert alert-info" role="alert">
		<a href="<?php echo $row_lives['link']; ?>" class="btn btn-sm btn-success" target="_blank">
			<?php echo $row_lives['nome']; ?>
		</a>
		</dd>
	</dl>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_lives.php?id=<?php echo $row_lives["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
<?php }?>
</div>