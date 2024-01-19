<?php
	include_once("../../../conexao/conexao.php");
	$evento = mysqli_real_escape_string($conn, $_POST['evento']);
	$data = mysqli_real_escape_string($conn, $_POST['data']);
	$local = mysqli_real_escape_string($conn, $_POST['local']);
	$link = mysqli_real_escape_string($conn, $_POST['link']);
	
	$result_eventos = "INSERT INTO eventos (evento, data, local, link) VALUES ('$evento', '$data', '$local', '$link')";
	$resultado_eventos = mysqli_query($conn, $result_eventos);	
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
	</head>

	<body> <?php
		if(mysqli_affected_rows($conn) != 0){
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"Evento cadastrada com Sucesso.\");
				</script>
			";	
		}else{
			echo "
				<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=14'>
				<script type=\"text/javascript\">
					alert(\"Evento não foi cadastrada.\");
				</script>
			";	
		}?>
	</body>
</html>
<?php $conn->close(); ?>