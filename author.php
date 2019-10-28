<?php get_header(); ?>
<div class="minHeight d-flex justify-content-center align-items-center" style="
	background-image: url('<?php echo get_theme_mod('author_image', get_bloginfo('template_url').'/images/customizer/page/author_image.jpg'); ?>'); 
	background-position: center; 
	background-size: cover; 
	background-repeat: no-repeat; 
	background-color: #fff; "> 
	<?php
	$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));
	?>
	<p class="text-header text-white">This is  <?php echo $curauth->nickname; ?>'s page: </p>
</div>
<div class="container mt-5">
	<div class="row">
		<div class="col-lg-9">                  
			<dl class="text-center">
				<dt class="author-name"><?php echo $curauth->nickname; ?>'s Website</dt>
				<dd><a href="<?php echo $curauth->user_url; ?>"><?php echo $curauth->user_url; ?></a></dd>
				<dt class="author-name"><?php echo $curauth->nickname; ?>'s Profile</dt>
				<dd><?php echo $curauth->user_description; ?></dd>
			</dl>
			<h2 class="py-3">Posts by <?php echo $curauth->nickname; ?>:</h2> 
			<?php if($wp_query->post_count > 0): ?>
				<?php echo "<span class='mr-2'>$wp_query->found_posts</span>" ?> 
			<?php endif; ?> 
			<?php global $paged;
					if(empty($paged)) $paged = 1;
					$loop_counter = 1; 
					$results_per_page = get_query_var('posts_per_page'); ?>                  
			<?php if ( have_posts() ) : ?>
				<div class="table-responsive-md">
					<table class="table table-striped border border-light">
						<thead class="thead-dark">
							<tr>
								<th scope="col">#</th>
								<th scope="col">Image</th>
								<th scope="col">Title</th>
								<th scope="col">Category</th>
								<th scope="col">Date</th>
							</tr>
						</thead>
						<tbody>												
						<?php while ( have_posts() ) : the_post(); ?>
						<?php																				 
									if( $paged == 1 ) {
									 $real_count = $loop_counter;
									 } else {
									 $real_count = $loop_counter + ( $paged * $results_per_page - $results_per_page);
									 }  
							?>
							<tr>
								<?php if (has_post_thumbnail()) : ?>
								<th class="pt-5 text-center">
								<?php else: ?>
								<th class="text-center">
								<?php endif; ?>
									<?php /*echo get_post_meta($post->ID,'incr_number',true); */?>
									<?php echo '<li class="list-unstyled"><span class="font-weight-bold">' . $real_count . '.</span></li>';	?>
								</th>
								<td>
									<?php $featured_img_url = wp_get_attachment_url ( get_post_thumbnail_id( get_the_ID()), 'full'); ?>
									<a href="<?php echo $featured_img_url; ?>" data-lightbox="author-post" data-title="<?php the_title(); ?>">
									<?php the_post_thumbnail('sidebar-thumb', array('class' => 'img-fluid rounded shadow-sm animated fadeIn delay-1s trans-200', 'alt' => 'sidebar-image')); ?></a>
								</td>
								<td><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link: <?php the_title(); ?>">
								 <?php the_title(); ?>
								</a></td>
								<td><?php the_category('&');?></td>
								<td><?php the_time('M d Y'); ?></td>
							</tr>						
					<?php $loop_counter++;  endwhile; ?>  
			 	</tbody>
			 </table>
			</div>
			<div class="text-center">
			 <?php wp_pagenavi( array( )); ?>   
			</div>                                     
			<?php else: ?>
					<p><?php _e('There are no posts by this author.'); ?></p> 
			<?php endif;  wp_reset_postdata(); ?>       
		</div>       
		<div class="col-lg-3 sidebar-background p-3">
			<?php dynamic_sidebar('sidebar-3'); ?>             
		</div>
	</div>             
</div>
<?php get_footer(); ?>
