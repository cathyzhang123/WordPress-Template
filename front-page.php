<?php get_header(); ?> 
<section id="hero" class="carousel slide carousel-fade" data-ride="carousel" data-interval="6000">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="shadow d-block w-100" src="<?php echo get_theme_mod('image1', get_bloginfo('template_url').'/images/default.jpg'); ?>" alt="First slide">
      <div class="carousel-caption float-right d-none d-md-block text-white">
				<p><?php echo get_theme_mod('header1'); ?></p>
				<p class="pl-5"> -- <?php echo get_theme_mod('header1_2'); ?></p>
				<p><?php echo get_theme_mod('subtext1'); ?></p>
			</div>
    </div>
    <div class="carousel-item shadow">
      <img class="shadow d-block w-100" src="<?php echo get_theme_mod('image2', get_bloginfo('template_url').'/images/default.jpg'); ?>" alt="Second slide">
      <div class="carousel-caption float-right d-none d-md-block text-white">
      	<p><?php echo get_theme_mod('header2'); ?></p>
				<p class="pl-5"> -- <?php echo get_theme_mod('header2_2'); ?></p>
				<p><?php echo get_theme_mod('subtext2'); ?></p>
			</div>
    </div>
    <div class="carousel-item shadow">
      <img class="shadow d-block w-100" src="<?php echo get_theme_mod('image3', get_bloginfo('template_url').'/images/default.jpg'); ?>" alt="Third slide">
      <div class="carousel-caption float-right d-none d-md-block text-white">
      	<p><?php echo get_theme_mod('header3'); ?></p>
				<p class="pl-5"> -- <?php echo get_theme_mod('header3_2'); ?></p>
				<p><?php echo get_theme_mod('subtext3'); ?></p>
			</div>
    </div>
  </div>  
</section>

<section class="container category front-category text-center">
	<div class="row mt-5 front-categroy">
		<div class="col-lg-4">	   
			 <div class="h-100 d-flex align-items-center justify-content-center shadow" data-aos="fade-up"
     		data-aos-easing="ease-in-sine" data-aos-duration="1000" data-aos-delay="100"           
       style="
        background-image: url('<?php echo get_theme_mod('food_image', get_bloginfo('template_url').'/images/food_image.jpg'); ?>'); 
                          background-position: center; 
                          background-size: cover; 
                          background-repeat: no-repeat; 
                          background-color: #fff;
                          border-radius: 30px; 
                          min-height: 320px; ">        
          <a href="http://food.cathyzhang.org/food" class="rounded-pill w-75 btn btn-light py-2 btn-block trans-500">Food</a>      
        </div> 									
		</div>
		<div class="col-lg-4">	   
			 <div class="h-100 d-flex align-items-center justify-content-center shadow" data-aos="fade-up"
     		data-aos-easing="ease-in-sine" data-aos-duration="1000" data-aos-delay="600"
     		style="
        background-image: url('<?php echo get_theme_mod('cooking_image', get_bloginfo('template_url').'/images/cooking_image.jpg'); ?>'); 
                          background-position: center; 
                          background-size: cover; 
                          background-repeat: no-repeat; 
                          background-color: #fff;
                          border-radius: 30px;
                          min-height: 320px; ">        
          <a href="http://food.cathyzhang.org/cooking" class="rounded-pill w-75 btn btn-light py-2 btn-block trans-500">Cooking</a>      
        </div> 									
		</div>
		<div class="col-lg-4">	   
			 <div class="h-100 d-flex align-items-center justify-content-center shadow" data-aos="fade-up"
     		data-aos-easing="ease-in-sine" data-aos-duration="1000" data-aos-delay="1100"
     		style="
        background-image: url('<?php echo get_theme_mod('lifestyle_image', get_bloginfo('template_url').'/images/lifestyle_image.jpg'); ?>'); 
                          background-position: center; 
                          background-size: cover; 
                          background-repeat: no-repeat; 
                          background-color: #fff; 
                          border-radius: 30px; 
                          min-height: 320px;">        
          <a href="http://food.cathyzhang.org/lifestyle" class="rounded-pill w-75 btn btn-light py-2 btn-block trans-500">Lifestyle</a>      
        </div> 									
		</div>	
	</div>
</section>

<section class="container main-blog mt-5">
		<div class="row">
			<div class="col-lg-8">	
				<div class="row">	
					<div class="col-12">
						<div class="row">																
								<?php 
								$currentPage = (get_query_var('paged')) ? get_query_var('paged') : 1;
								$args = array('posts_per_page' => 8, 'category__not_in' => 5, 'paged' => $currentPage);
								query_posts($args);
								if(have_posts()):  $i = 0;	
									while(have_posts()): the_post(); ?>
										<?php 
										if($i==0): $column = 12; $class=" first-batch";
										elseif($i>0 && $i<= 4): $column = 6; $class=" second-batch";
										elseif($i > 4): $column = 4; $class=" third-batch";
										endif; ?>
										<div class="px-1 mt-3 wow fadeInUp col-<?php echo $column;?><?php echo $class; ?>" data-wow-delay =".2s">
											<div class="card border-0 h-100">
											<?php if(has_post_thumbnail()): 
													$urlImg = wp_get_attachment_url ( get_post_thumbnail_id( get_the_ID()));
													endif;
												?>									
												<?php the_post_thumbnail('full', array('class' => 'card-img-top img-fluid shadow trans-200' )); ?>	
												<div class="card-body mt-2 pb-0">
													<div class="card-text d-flex flex-row justify-content-start">
														<small><?php echo get_the_date(); ?> &nbsp;| &nbsp;</small>
														<small> By <?php the_author_posts_link() ?></small>
													</div>
													<?php the_title( sprintf('<h5 class="card-title mt-4"><a href="%s">', esc_url(get_permalink()) ),'</a></h5>'); ?>
													<div class="card-text d-none d-lg-block"><?php the_excerpt(); ?></div>
												</div>							
											</div>	
										</div><!-- column -->
									<?php $i++; endwhile; ?>  
									<?php endif;	
										wp_reset_postdata(); 
									?>
						</div><!-- row --> 
					</div><!-- col 12 -->		
				</div><!-- row -->		
				<section class="secondary-blog container mt-5">
					 <?php $args = array(
											'post_type' => 'post',            
											'paged' => get_query_var('paged'),
											'post_status'=>'publish',
											'orderby' => 'date' ,
											'order' => 'DESC' , 
											'category__not_in' => 5, 
											'hide_empty'     => 1,
											'depth'          => 1,
											'posts_per_page' => 6,
											'offset' => 8,
									 );  
									$wpb_all_query = new WP_Query($args); ?>
									<?php if ( $wpb_all_query->have_posts() ) : ?> 
										<?php while ( $wpb_all_query->have_posts() ) : $wpb_all_query->the_post(); ?> 
									<div class="card mt-5 border-0 rounded wow fadeInUpBig" data-wow-delay=".2s">
										<div class="row no-gutters">
												<div class="col-md-5">
														<?php the_post_thumbnail('square-thumb', array('class' => 'card-img-top shadow trans-200' )); ?>
												</div>
												<div class="col-md-7">
														<div class="card-body">
																<h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
																<p class="card-text"><?php echo excerpt(38); ?></p>
																<p class="mt-3">
																	<small><?php echo get_the_date(); ?> &nbsp;| &nbsp; By <?php the_author_posts_link() ?></small>
																</p>
																<a href="<?php the_permalink(); ?>" class="mt-5 rounded-pill btn btn-outline-secondary">Continue Reading</a>
														</div>														
												</div>
										</div>
									</div>
									<?php endwhile;  ?>
									</section>	
									<?php endif;  wp_reset_postdata(); ?>					
			</div><!-- col lg 8 -->
			<div class="col-lg-4 pl-5">
				<?php dynamic_sidebar('sidebar-1'); ?>
			</div><!-- side bar -->		
		</div><!-- row -->
</section>
<?php get_footer(); ?>
