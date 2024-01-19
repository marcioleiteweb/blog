<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM ads_interna WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar ADS Home</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=43">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			<a href="administrativo/processa/apaga/adm_apagar_ads_interna.php?id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_produtos['id']; ?></dd>
		<dt>Contato: </dt>
		<dd class="alert alert-success" role="alert">
		<?php echo $row_produtos['link']; ?>
		</dd>
		<dt>Foto: </dt>
		<dd>
		<img src="<?php echo '../imgs-sistema/img-ads/ads-interna/'.$row_produtos['foto']; ?>" width="200">
		</dd>
	</dl>
</div>