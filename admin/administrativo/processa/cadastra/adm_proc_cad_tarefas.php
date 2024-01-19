<?php
	include_once("../../../conexao/conexao.php");
	$nome_tarefa = mysqli_real_escape_string($conn, $_POST['nome_tarefa']);
	$descricao_tarefa = mysqli_real_escape_string($conn, $_POST['descricao_tarefa']);
	$valor = mysqli_real_escape_string($conn, $_POST['valor']);
	$data_criada = date('d/m/Y');
	$status_tarefa = mysqli_real_escape_string($conn, $_POST['status_tarefa']);
	$select_cliente = mysqli_real_escape_string($conn, $_POST['select_cliente']);
	$select_vendedor = mysqli_real_escape_string($conn, $_POST['select_vendedor']);
	

	$result_usuario = "INSERT INTO tarefas (nome_tarefa, descricao_tarefa, data_criada, status_tarefa, id_cliente, id_advogado, valor) VALUES ('$nome_tarefa', '$descricao_tarefa', '$data_criada', '$status_tarefa', '$select_cliente', '$select_vendedor', '$valor')";
	$resultado_usuario = mysqli_query($conn, $result_usuario);	
	
	if(mysqli_affected_rows($conn) != 0){
	echo "
		<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=72'>
		<script type=\"text/javascript\">
			alert(\"foi cadastrado com sucesso!.\");
		</script>
	"; 
	}else{
		//echo"nao foi";
		echo "
			<META HTTP-EQUIV=REFRESH CONTENT = '0;URL=../../../administrativo.php?link=72'>
			<script type=\"text/javascript\">
				alert(\"não foi cadastrado!.\");
			</script>
		";
	}
?>
<?php $conn->close(); ?>