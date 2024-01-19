<?php
	$result_produtos = "SELECT * FROM classificados";
	$resultado_produtos = mysqli_query($conn , $result_produtos);
?>
  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Blog</h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->


    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">
		
		 <?php while($row_produtos = mysqli_fetch_assoc($resultado_produtos)){?>		 
			 <?php if($row_produtos['pub'] == 1){?>
				<div class="card m-3" style="width: 20rem;">			
				<div class="foto-blog" style="background-image: url(imgs-sistema/img-classificados/<?php echo $row_produtos['foto_principal']; ?>);  background-size: cover;  width: 100%;  height: 200px; no-repet;">
				</div>
				  <div class="card-body">
					<h5 class="card-title"><?php echo $row_produtos['titulo']; ?></h5>
					<p class="card-text"><?php echo mb_strimwidth($row_produtos['texto'], 0, 94, "...");?></p>
					<a href="artigo&id=<?php echo $row_produtos['id']; ?>" class="btn-get-started">veja</a>
				  </div>
				</div>
			 <?php }?>
		 <?php }?>
		 

        </div>

      </div>
    </section><!-- End Services Section -->


  </main><!-- End #main -->
