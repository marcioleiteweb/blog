<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_congregacao = "SELECT * FROM congregacoes";
	$resultado_congregacao = mysqli_query($conn, $result_congregacao);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Congregações</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=13" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_congregacao = mysqli_fetch_assoc($resultado_congregacao)){?>

	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_congregacao.php?id=<?php echo $row_congregacao["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_congregacao['id']; ?></dd>
		<dt>igreja: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_congregacao['igreja']; ?></dd>
		<dt>pastor: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_congregacao['pastor']; ?></dd>
		<dt>horarios: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_congregacao['horarios']; ?></dd>
		<dt>endereco: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_congregacao['endereco']; ?></dd>
		<dt>Foto do Pastor da congregação: </dt>
		<dd class="alert alert-warning" role="alert">
		<img src="<?php echo '../imagem_geral/congregacoes/'.$row_congregacao['fotopastor']; ?>" width="200">
		</dd>
	</dl>

<?php }?>
</div>