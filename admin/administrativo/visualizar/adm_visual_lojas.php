<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_lojas = "SELECT * FROM lojas";
	$resultado_lojas = mysqli_query($conn, $result_lojas);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar os Membros</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=33" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_lojas = mysqli_fetch_assoc($resultado_lojas)){?>

	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_lojas.php?id=<?php echo $row_lojas["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_lojas['id']; ?></dd>
		<dt>Nome Lojas: </dt>
		<dd class="alert alert-info" role="alert"><?php echo $row_lojas['nome_loja']; ?></dd>
		<dt>texto do banner: </dt>
		<dd class="alert alert-warning" role="alert">
			<a href="<?php echo $row_lojas['whatsapp_loja']; ?>" class="btn btn-success" target="_blank">
			WhatsApp
			</a>
		</dd>
		<dd class="alert alert-warning" role="alert">
			<a href="<?php echo $row_lojas['mapa_loja']; ?>" class="btn btn-success" target="_blank">
			Facebook
			</a>
		</dd>
		<dt>Foto do Banner: </dt>
		<dd class="alert alert-warning" role="alert">
		<img src="<?php echo '../imagem_geral/lojas/'.$row_lojas['foto_loja']; ?>" width="200">
		</dd>
	</dl>

<?php }?>
</div>