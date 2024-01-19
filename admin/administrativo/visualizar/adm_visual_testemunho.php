<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_testemunho = "SELECT * FROM testemunhos";
	$resultado_testemunho = mysqli_query($conn, $result_testemunho);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Testemunhos do site</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=11" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_testemunho = mysqli_fetch_assoc($resultado_testemunho)){?>

	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_testemunho.php?id=<?php echo $row_testemunho["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_testemunho['id']; ?></dd>
		<dt>Nome da testemunha: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_testemunho['nome']; ?></dd>
		<dt>Testemunho: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_testemunho['testemunho']; ?></dd>
	</dl>
<?php }?>
</div>