<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM membro WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Membro</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=60">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			
			<a href="administrativo.php?link=63&id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/apaga/adm_apagar_membro.php?id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
		</div>
	</div>
	<dl class="dl-horizontal">		
		<dt>Id: </dt>
		<dd><?php echo $row_produtos['id']; ?></dd>
		<dt>Nome: </dt>
		<dd><?php echo $row_produtos['nome']; ?></dd>
		<dt>Profissão: </dt>
		<dd class="alert alert-success" role="alert">
		<?php echo $row_produtos['profissao']; ?>
		</dd>
		<dt>Foto: </dt>
		<dd>
		<img src="<?php echo '../imgs-sistema/img-membro/'.$row_produtos['foto']; ?>" width="200">
		</dd>
	</dl>
</div>