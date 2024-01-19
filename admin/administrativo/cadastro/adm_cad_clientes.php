
<div class="container theme-showcase" role="main">
	<div class="page-header">
        <h1>Cadastrar Clientes</h1>
	</div>
	<div class="row">
		<div class="pull-right" style="padding-bottom: 20px; ">
			<a href="administrativo.php?link=72"><button type='button' class='btn btn-sm btn-success'>Listar</button></a>
		</div>
	</div>
	<form class="form-horizontal" method="POST" action="administrativo/processa/cadastra/adm_proc_cad_clientes.php" enctype="multipart/form-data">
		<div class="form-group">
			<label class="col-sm-2 control-label">Nome</label>
			<div class="col-sm-10">
				<input type="text" name="nome" required class="form-control" id="inputEmail3" placeholder="Nome Completo">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">E-mail</label>
			<div class="col-sm-10">
				<input type="email" name="email" required class="form-control" id="inputEmail3" placeholder="Coloque aqui seu melhor email">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Senha</label>
			<div class="col-sm-10">
				<input type="password" name="senha" required class="form-control" id="inputPassword3" placeholder="Senha">
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">WhatsApp</label>
			<div class="col-sm-10">
				<input type="text" name="whatsapp" class="form-control" id="inputEmail3" placeholder="WhatsApp">
			</div>
		</div>

		
		<div class="form-group">
          <p>
           <label class="radio-inline col-sm-4"><input type="radio" name="optradio" value="juridica" onclick="pessoa(this.value);">Pessoa Juridica</label>
            <label class="radio-inline col-sm-4"><input type="radio" name="optradio" value="fisica" onclick="pessoa(this.value);">Pessoa Fisica</label>
          </p>
          </div>

        <div id="juridica" style="display:none;">
        
           <div class="form-group">
            <label class="control-label col-sm-2" for="txtCnpj">CNPJ: *</label>
            <div class="col-sm-3">
              <input type="numbe" class="form-control cnpj" id="cnpj" name="cnpj" maxlength="18" placeholder="CNPJ">
            </div>
          </div>
          </div>

          <div id="fisica" style="display:none;">
          
           <div class="form-group">
            <label class="control-label col-sm-2" for="txtCPF">CPF: *</label>
            <div class="col-sm-3">
              <input type="numbe" class="form-control cpf" id="cpf" name="cpf" maxlength="14" placeholder="CPF">
            </div>
			
          </div>
          </div>`




		
		<div class="form-group">
			<label for="inputEmail3" class="col-sm-2 control-label">Observações</label>
			<div class="col-sm-10">
				<textarea id="des" name="descricao" class="tinymce-editor" maxlength="900" rows="7" id="inputEmail3" placeholder="Observações"></textarea>
			</div>
		</div>
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Gestor</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_advogado">
					<?php
					$result_advogado = "SELECT * FROM vendedores";
					$result_advogado = mysqli_query($conn, $result_advogado);
					while($row_advogado = mysqli_fetch_assoc($result_advogado)){ ?> 
						<option value="<?php echo $row_advogado['id']; ?>"><?php echo $row_advogado['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>

		<div class="form-group">
			<label class="col-sm-2 control-label">Situação</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_situacao">
					<option>Selecione</option>
					<?php
					$result_situacao = "SELECT * FROM situacoes";
					$result_situacao = mysqli_query($conn, $result_situacao);
					while($row_situacoes = mysqli_fetch_assoc($result_situacao)){ ?> 
						<option value="<?php echo $row_situacoes['id']; ?>"><?php echo $row_situacoes['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>	
		
		<div class="form-group">
			<label class="col-sm-2 control-label">Nivel de Acesso</label>
			<div class="col-sm-10">
				<select class="form-control" name="select_nivel_acesso">
					<option>Selecione</option>
					<?php
					$result_niveis_acessos = "SELECT * FROM niveis_acessos WHERE id = '10'";
					$result_niveis_acessos = mysqli_query($conn, $result_niveis_acessos);
					while($row_niveis_acessos = mysqli_fetch_assoc($result_niveis_acessos)){ ?> 
						<option value="<?php echo $row_niveis_acessos['id']; ?>"><?php echo $row_niveis_acessos['nome']; ?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-success" onclick="tinyMCE.triggerSave();">Cadastrar</button>
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
