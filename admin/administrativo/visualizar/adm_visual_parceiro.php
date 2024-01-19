<?php
	//Buscar os dados referente ao usuario situado neste id
	$result_parceiro = "SELECT * FROM parceiros";
	$resultado_parceiro = mysqli_query($conn, $result_parceiro);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Parceiros do site</h1>
	</div>
		<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo.php?link=31" class="btn btn-sm btn-success">
				Cadastrar
			</a>
		</div>
	</div>
	
<?php while($row_parceiro = mysqli_fetch_assoc($resultado_parceiro)){?>

	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">	
			<a href="administrativo/processa/apaga/adm_apagar_parceiro.php?id=<?php echo $row_parceiro["id"];?>" class="btn btn-sm btn-danger">
				Apagar
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_parceiro['id']; ?></dd>
		<dt>Nome Parceiros: </dt>
		<dd class="alert alert-warning" role="alert"><?php echo $row_parceiro['nome_parceiro']; ?></dd>
		<dt>Foto do parceiro: </dt>
		<dd class="alert alert-warning" role="alert">
		<img src="<?php echo '../imagem_geral/parceiro/'.$row_parceiro['foto_parceiro']; ?>" width="200">
		</dd>
	</dl>
<?php }?>
</div>