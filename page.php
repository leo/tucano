<?php get_header(); ?>

   <article class="single">
 
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
<div class="info">Stand:<br/><?php the_time(get_option('date_format')); ?></div>
            <?php the_content(); ?>
         
      <?php endwhile; endif; ?>
 
    </article>

	<nav><a class="page-numbers prev" href="<?php echo home_url(); ?>">Zurück zur Übersicht</a></nav>
<?php get_footer(); ?>