<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_cliente = "SELECT * FROM clientes WHERE id = '$id' LIMIT 1";
	$resultado_cliente = mysqli_query($conn, $result_cliente);
	$row_cliente = mysqli_fetch_assoc($resultado_cliente);	
?>
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Editar Clientes</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=72"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/edita/adm_proc_edita_clientes.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" required class="form-control" id="inputEmail3" placeholder="Nome Completo" value="<?php echo $row_cliente['nome']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="E-mail" value="<?php echo $row_cliente['email']; ?>">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
				<input type="password" name="senha" required class="form-control" id="inputPassword3" placeholder="Senha" value="">
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">WhatsApp</label>
			<div class="col-sm-10">
				<input type="text" name="whatsapp" required class="form-control" id="inputEmail3" placeholder="WhatsApp" value="<?php echo $row_cliente['whatsapp']; ?>">
			</div>
		</div>
		
		
		<div class="form-group">
          <p>
           <label class="radio-inline col-sm-4"><input type="radio" name="optradio" value="juridica" onclick="pessoa(this.value);">Pessoa Juridica</label>
            <label class="radio-inline col-sm-4"><input type="radio" name="optradio" value="fisica" onclick="pessoa(this.value);">Pessoa Fisica</label>
          </p>
          </div>

		
		
		
		<?php
		$doc = $row_cliente['cpf'];
		?>
        <?php 
		if(strlen($doc) == 18){
		?>
		 <div id="juridica">
           <div class="form-group">
            <label class="control-label col-sm-2" for="txtCnpj">CNPJ: *</label>
            <div class="col-sm-3">
              <input type="numbe" class="form-control cnpj" id="cnpj" name="cnpj" maxlength="18" value="<?php echo"$doc";?>" placeholder="CNPJ">
            </div>
          </div>
          </div>
		<?php 
		}elseif(strlen($doc) == 14){
		?>
          <div id="fisica">
           <div class="form-group">
            <label class="control-label col-sm-2" for="txtCPF">CPF: *</label>
            <div class="col-sm-3">
              <input type="numbe" class="form-control cpf" id="cpf" name="cpf" maxlength="14" value="<?php echo"$doc";?>" placeholder="CPF">
            </div>
          </div>
          </div>`
		<?php }?>
		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Observações</label>
			<div class="col-sm-10">
				<textarea id="mytextarea1" name="descricao"  class="tinymce-editor" maxlength="900" rows="7" id="inputEmail3" placeholder="Observações" required><?php echo $row_cliente['descricao']; ?></textarea>
			</div>
		</div>
		
		<?php $situcoe_id_adv = $row_cliente['id_advogado']; ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Parceiro de Job</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_advogado">
					<?php
					$result_situacao_adv = "SELECT * FROM vendedores";
					$result_situacao_adv = mysqli_query($conn, $result_situacao_adv);
					while($row_situacoes_adv = mysqli_fetch_assoc($result_situacao_adv)){ ?> 
						<option value="<?php echo $row_situacoes_adv['id']; ?>"<?php
						if($situcoe_id_adv == $row_situacoes_adv['id']){
							echo 'selected';
						}?> >						
						<?php echo $row_situacoes_adv['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
		
		
		<?php $situcoe_id = $row_cliente['situacoe_id']; ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_situacao">
					<option>Selecione</option>
					<?php
					$result_situacao = "SELECT * FROM situacoes";
					$result_situacao = mysqli_query($conn, $result_situacao);
					while($row_situacoes = mysqli_fetch_assoc($result_situacao)){ ?> 
						<option value="<?php echo $row_situacoes['id']; ?>"<?php
						if($situcoe_id == $row_situacoes['id']){
							echo 'selected';
						}?> >						
						<?php echo $row_situacoes['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
		
		<?php $niveis_acesso_id =  $row_cliente['niveis_acesso_id']; ?>
		<div class="form-group">
			<label class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_nivel_acesso">
					<option>Selecione</option>
					<?php
					$result_niveis_acessos = "SELECT * FROM niveis_acessos WHERE id = '10'";
					$result_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);
					while($row_niveis_acessos = mysqli_fetch_assoc($result_niveis_acessos)){ ?> 
							<option value="<?php echo $row_niveis_acessos['id']; ?>"
							<?php if($niveis_acesso_id == $row_niveis_acessos['id']){
								echo 'selected';
							}?> >						
							<?php echo $row_niveis_acessos['nome']; ?></option>
						<?php } ?>
				</select>
			</div>
		</div>
		
		<input type="hidden" name="id" value="<?php echo $row_cliente['id']; ?>">
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-warning" onclick="tinyMCE.triggerSave();">Alterar</button>
			</div>
		</div>
	</form>
</div>

<script id="rendered-js" >
document.addEventListener('keydown', function(event) { //pega o evento de precionar uma tecla
  if(event.keyCode != 46 && event.keyCode != 8){//verifica se a tecla precionada nao e um backspace e delete
    var i = document.getElementById("cpf").value.length; //aqui pega o tamanho do input
    if (i === 3 || i === 7) //aqui faz a divisoes colocando um ponto no terceiro e setimo indice
      document.getElementById("cpf").value = document.getElementById("cpf").value + ".";
    else if (i === 11) //aqui faz a divisao colocando o tracinho no decimo primeiro indice
      document.getElementById("cpf").value = document.getElementById("cpf").value + "-";
  }
});
document.addEventListener('keydown', function(event) { //pega o evento de precionar uma tecla
  if(event.keyCode != 46 && event.keyCode != 8){//verifica se a tecla precionada nao e um backspace e delete
    var i = document.getElementById("cnpj").value.length; //aqui pega o tamanho do input
    if (i === 2 || i === 6) //aqui faz a divisoes colocando um ponto no terceiro e setimo indice
      document.getElementById("cnpj").value = document.getElementById("cnpj").value + ".";
    else if (i === 10) //aqui faz a divisao colocando o tracinho no decimo primeiro indice
      document.getElementById("cnpj").value = document.getElementById("cnpj").value + "/";
	else if (i === 15) //aqui faz a divisao colocando o tracinho no decimo primeiro indice
      document.getElementById("cnpj").value = document.getElementById("cnpj").value + "-";
  }
});
</script>


<script>
    function pessoa(tipo){
      if(tipo=="fisica"){
      document.getElementById("fisica").style.display = "inline";
      document.getElementById("juridica").style.display = "none";
      }else if(tipo=="juridica"){
      document.getElementById("fisica").style.display = "none";
      document.getElementById("juridica").style.display = "inline";

      }

    }
</script>