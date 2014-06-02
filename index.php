<?php get_header(); ?>


 <?php if( have_posts() ) : ?>
  <div class="stories-container">
    <?php while( have_posts() ) : the_post(); ?>
   		<article class="container-full<?php if( has_post_thumbnail() ) { echo ' featured-image '; } ?>">
        <?php if( has_post_thumbnail() ) : ?>
          <div class="image-container">
            <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail( 'blog-image' ); ?></a>
          </div>
        <?php endif; ?>
   			<div class="story-post <?php if( has_post_thumbnail() ) { echo ''; } else { echo ' container'; } ?>">
   				<a href="<?php the_permalink(); ?>"><h3><?php the_title(); ?></h3></a>
  				<?php the_excerpt(); ?>
          <div class="clear"></div>
  				<a href="<?php the_permalink(); ?>" class="icon icon-long-arrow-down"></a>
  			</div>
   		</article>
    <?php endwhile; ?>
  </div>
  <?php endif; ?>

  
  <?php next_posts_link('More Posts'); ?>
<?php get_footer(); ?>	