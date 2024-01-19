<?php
	//$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_whatsapp = "SELECT * FROM whatsapp LIMIT 1";
	$resultado_whatsapp = mysqli_query($conn, $result_whatsapp);
	$row_whatsapp = mysqli_fetch_assoc($resultado_whatsapp);
//verifica se as linhas do banco tem algo
if(isset($row_whatsapp["id"])){
	$id_whatsapp = $row_whatsapp["id"];	
}else{
	$id_whatsapp = "";
	echo "<h4>WhatsApp ainda não cadastrado!</h4>";
}

if(isset($row_whatsapp["dono_whatsapp"])){
	$dono_whatsapp = $row_whatsapp["dono_whatsapp"];
}else{
	$dono_whatsapp = "";
}

if(isset($row_whatsapp["numero_whatsapp"])){
	$numero_whatsapp = $row_whatsapp["numero_whatsapp"];	
}else{
	$numero_whatsapp = "";
}	
	
		
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>WhatsApp do Site</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<?php if(!isset($row_whatsapp["id"])){?>
			<a href="administrativo.php?link=69">
				<button type='button' class='btn btn-sm btn-success'>Cadastrar</button>
			</a>
			<?php }?>
			<?php if(isset($row_whatsapp["id"])){?>
			<a href="administrativo.php?link=55&id=<?php echo $id_whatsapp; ?>">
				<button type="button" class="btn btn-sm btn-warning">
					Editar
				</button>
			</a>
			
			<a href="administrativo/processa/apaga/adm_apagar_whatsapp.php?id=<?php echo $id_whatsapp; ?>">
				<button type="button" class="btn btn-sm btn-danger">
					Apagar
				</button>
			</a>
			<?php }?>
		</div>
	</div>
	<dl class="dl-horizontal">
		<dt>Id: </dt>
		<dd><?php echo $id_whatsapp; ?></dd>
		<dt>de quem: </dt>
		<dd><?php echo $dono_whatsapp; ?></dd>
		<dt>Numero WhatsApp: </dt>
		<dd><?php echo $numero_whatsapp; ?></dd>
	</dl>
</div>