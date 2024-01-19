<?php
	$result_blog_home = "SELECT * FROM classificados WHERE destaque = 1";
	$resultado_blog_home = mysqli_query($conn , $result_blog_home);
	
	$result_blog_slide_unico = "SELECT* FROM classificados WHERE destaque = 1 ORDER BY id ASC LIMIT 1";
	$resultado_blog_slide_unico = mysqli_query($conn , $result_blog_slide_unico);
	$row_slide_unico = mysqli_fetch_assoc($resultado_blog_slide_unico);
	
	$id_unico = $row_slide_unico['id'];
	
	$result_blog_slide = "SELECT * FROM classificados WHERE destaque = 1 AND id != '$id_unico'";
	$resultado_blog_slide = mysqli_query($conn , $result_blog_slide);
?>

  <!-- ======= Hero Section ======= -->
  <section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

      <div class="carousel-inner" role="listbox">
<?php if(isset($row_slide_unico['id'])){?>
	<?php if($row_slide_unico['pub'] == 1){?>
        <!-- Slide 1 -->
        <div class="carousel-item active" style="background-image: url(imgs-sistema/img-classificados/<?php echo $row_slide_unico['foto_principal']; ?>);">
          <div class="carousel-container">
            <div class="carousel-content animate__animated animate__fadeInUp">
              <h2><?php echo $row_slide_unico['titulo']; ?></h2>
              <p><?php echo mb_strimwidth($row_slide_unico['texto'], 0, 94, "...");?></p>
              <div class="text-center"><a href="artigo&id=<?php echo $row_slide_unico['id']; ?>" class="btn-get-started">Read More</a></div>
            </div>
          </div>
        </div>
	<?php }?>
<?php }?>
<?php while($row_slide = mysqli_fetch_assoc($resultado_blog_slide)){?>
	<?php if($row_slide['pub'] == 1){?>
			<!-- Slide outros -->
			<div class="carousel-item" style="background-image: url(imgs-sistema/img-classificados/<?php echo $row_slide['foto_principal']; ?>);">
			  <div class="carousel-container">
				<div class="carousel-content animate__animated animate__fadeInUp">
				  <h2><?php echo $row_slide['titulo']; ?></h2>
				  <p><?php echo mb_strimwidth($row_slide['texto'], 0, 94, "...");?></p>
				  <div class="text-center"><a href="artigo&id=<?php echo $row_slide['id']; ?>" class="btn-get-started">Read More</a></div>
				</div>
			  </div>
			</div>
	<?php }?>
<?php }?>
       

      </div>

      <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
      </a>

      <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
        <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
      </a>

      <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= About Us Section ======= -->
    <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">

        <div class="row content">
          <div class="col-lg-6" data-aos="fade-right">
            <h2>Um blog diferente!</h2>
            <h3>Vem com a gente nessa aventura cultural de cores e imagens!</h3>
          </div>
          <div class="col-lg-6 pt-4 pt-lg-0" data-aos="fade-left">
            <p>
              O blog MLBN é voltado aos acontecimentos culturais de São Paulo e grande São Paulo, com diversas opções tanto para curtir quanto para trabalhar
			  em ambientes que agregam valor cultural ao seu dia-a-dia.
            </p>
            <ul>
              <li><i class="ri-check-double-line"></i> Eventos culturais gratuitos e pagos;</li>
              <li><i class="ri-check-double-line"></i> Cafes e lanchonetes temáticas;</li>
              <li><i class="ri-check-double-line"></i> Lugares onde pode-se trabalhar em ambientes diferenciado;</li>
              <li><i class="ri-check-double-line"></i> Passeios incriveis com muita arte e cultura.</li>
            </ul>
            <p class="fst-italic">
              Venha você também embarcar nessa jornada conosco, e com certeza olhar nossa São Paulo por vários aspectos proveitosos.
            </p>
          </div>
        </div>

      </div>
    </section><!-- End About Us Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">
		<?php while($row_produtos = mysqli_fetch_assoc($resultado_blog_home)){?>		
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
