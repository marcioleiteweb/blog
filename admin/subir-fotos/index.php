<form method="post" name="form1" enctype="multipart/form-data" action="index.php">
<fieldset>
<legend>Upload de Imagem</legend>
<strong>Fotografia:</strong>
<input type="file" name="img" id="img" />
<input type="submit" value="Enviar" />
<!-- Determinamos via HTML um tamanho máximo para a nossa imagem-->
<input type="hidden" name="MAX_FILE_SIZE" value="1024000" /> 
</fieldset>
</form>
<?php if(!empty($_FILES)){ // Se o array $_FILES não estiver vazio
// Incluímos o arquivo com a classe
include 'classupload.php'; 
// Associamos a classe à variável $upload
$upload = new UploadImagem(); 
// Determinamos nossa largura máxima permitida para a imagem
$upload->width = 250; 
// Determinamos nossa altura máxima permitida para a imagem
$upload->height = 250; 

// Exibimos a mensagem com sucesso ou erro retornada pela função salvar.
//Se for sucesso, a mensagem também é um link para a imagem enviada.
echo $upload->salvar("upload/", $_FILES['img']);
}
?>