
  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="#">
          <i class="bi bi-grid"></i>
          <span>Painel</span>
        </a>
      </li><!-- End Dashboard Nav -->
	  

	 
	  <li class="nav-item">
        <a class="nav-link collapsed" href="administrativo.php">
          <i class="bi bi-briefcase-fill"></i>
          <span>Home</span>
        </a>
      </li><!-- End Profile Page Nav -->
	  

	  <?php if($_SESSION['usuarioNiveisAcessoId'] == "1"){?>
		   <li class="nav-item">
			<a class="nav-link collapsed" href="administrativo.php?link=2">
			  <i class="bi bi-briefcase-fill"></i>
			  <span>Listar Usuário</span>
			</a>
		  </li><!-- End Login Page Nav -->

		  <li class="nav-item">
			<a class="nav-link collapsed" href="administrativo.php?link=6">
			  <i class="bi bi-briefcase-fill"></i>
			  <span>Nivel Acesso</span>
			</a>
		  </li><!-- End Error 404 Page Nav -->
  
	   <?php }?>
	   
	   	  <li class="nav-item">
			<a class="nav-link collapsed" href="administrativo.php?link=27">
			  <i class="bi bi-briefcase-fill"></i>
			  <span>Blog textos</span>
			</a>
		  </li><!-- End Error 404 Page Nav -->
		  
		  
		  <li class="nav-item">
			<a class="nav-link collapsed" href="administrativo.php?link=79">
			  <i class="bi bi-briefcase-fill"></i>
			  <span>Listar F.A.Q</span>
			</a>
		  </li><!-- End Error 404 Page Nav -->
	 
      <li class="nav-item">
        <a class="nav-link collapsed" href="sair.php">
          <button type="submit" class="btn btn-success">Sair</button>
        </a>
      </li><!-- End Blank Page Nav -->
    </ul>

  </aside><!-- End Sidebar-->