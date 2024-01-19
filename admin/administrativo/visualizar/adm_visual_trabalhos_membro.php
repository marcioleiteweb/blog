<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM trabalhos_membro WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);
	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Visualizar Trabalho</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=64">
				<button type='button' class='btn btn-sm btn-success'>Listar</button>
			</a>
			<!--
			<a href="administrativo.php?link=59&id=<?php echo $row_produtos["id"]; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			-->	
			<a href="administrativo/processa/apaga/adm_apagar_trabalhos_membro.php?id=<?php echo $row_produtos["id"]; ?>">
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

		<dt>Descrição: </dt>
		<dd class="alert alert-success" role="alert">
		<?php echo $row_produtos['descricao']; ?>
		</dd>
		<dt>Categoria do Produto: </dt>
		<dd><?php 
			$categorias_produto_id = $row_produtos['membro_id'];
			$result_categorias_produtos = "SELECT * FROM membro WHERE id = '$categorias_produto_id'";
			$result_categorias_produtos = mysqli_query($conn, $result_categorias_produtos);
			$row_categorias_produtos = mysqli_fetch_assoc($result_categorias_produtos);
			echo $row_categorias_produtos['nome']; ?>
		</dd>


		<dt>Trabalho: </dt>
		<dd>
		<?php
		 $arquivo = $row_produtos['arquivo'];
         $arr = explode('.', $arquivo) ;
         $extensao = end($arr);  
		 
		//echo "$extensao";
		
		if(($extensao == "jpg") or ($extensao == "jpeg") or ($extensao == "png")){
		?>
			<img src="../imgs-sistema/img-trabalhos/<?php echo $row_produtos['arquivo'];?>" width="200">
		<?php }elseif($extensao == "pdf"){?>
			<a href="../imgs-sistema/img-trabalhos/<?php echo $row_produtos['arquivo'];?>" target="_blank">
				<img src="../images/img_pdf.jpg" width="150">
			</a>
		<?php }elseif($extensao == "mp3"){?>
			<audio controls>
				<source src="../imgs-sistema/img-trabalhos/<?php echo $row_produtos['arquivo'];?>" type="audio/mpeg">
				Seu navegador não suporta a tag áudio
			</audio>
		<?php }?>
		</dd>

		
	</dl>
</div>