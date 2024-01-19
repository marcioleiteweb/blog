<?php
	$id = $_GET['id'];
	//Buscar os dados referente ao usuario situado neste id
	$result_produtos = "SELECT * FROM classificados WHERE id = '$id' LIMIT 1";
	$resultado_produtos = mysqli_query($conn, $result_produtos);
	$row_produtos = mysqli_fetch_assoc($resultado_produtos);
	
	
		//Buscar os dados referente ao usuario situado neste id
	$result_album = "SELECT * FROM fotos_classificados  WHERE id_classificados = '$id'";
	$resultado_album = mysqli_query($conn, $result_album);	
?>

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2><?php echo $row_produtos['titulo']; ?></h2>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
      <div class="container" data-aos="fade-up">

        <div class="row">

          <div class="col-lg-12 entries">

            <article class="entry entry-single">

              <div class="entry-img">
                <img src="<?php echo 'imgs-sistema/img-classificados/'.$row_produtos['foto_principal']; ?>" alt="<?php echo $row_produtos['titulo']; ?>" class="img-fluid">
              </div>

              <h2 class="entry-title">
                <a href="blog-single.html"><?php echo $row_produtos['titulo']; ?></a>
              </h2>



              <div class="entry-content">
				<?php echo $row_produtos['texto']; ?>
              </div>



            </article><!-- End blog entry -->
			
					
				<section class="photo-gallery">
				  <div class="container">
					<div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4 gallery-grid">
					
					<?php while($row_album = mysqli_fetch_assoc($resultado_album)){?>
					  <div class="col">
						<a class="gallery-item" href="<?php echo 'imgs-sistema/img-classificados/'.$row_produtos['classificado_album'];?>/<?php echo $row_album['foto'];?>">
						  <img src="<?php echo 'imgs-sistema/img-classificados/'.$row_produtos['classificado_album'];?>/<?php echo $row_album['foto'];?>" class="img-fluid" alt="<?php echo $row_album['nome'];?>">
						</a>
					  </div>
					<?php }?>  
					  
					</div>
				  </div>
				</section>


				<div class="modal fade lightbox-modal" id="lightbox-modal" tabindex="-1">
				  <div class="modal-dialog modal-dialog-centered modal-fullscreen">
					<div class="modal-content">
					  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
					  <div class="modal-body">
						<div class="lightbox-content">
						  <!-- JS content here -->
						</div>
					  </div>
					</div>
				  </div>
				</div>
			

          </div><!-- End blog entries list -->


        </div>

      </div>
    </section><!-- End Blog Single Section -->

  </main><!-- End #main -->
