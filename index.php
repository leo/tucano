<?php include (TEMPLATEPATH . '/config.php'); ?>
<?php get_header(); ?>


<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
<article class="animated fadeInDown" >

	<h1 class="lkk"><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>

	<div class="info"><?php the_time(get_option('date_format')); ?><br/>&#8618;&nbsp;<?php the_category(', '); ?></div>
	<p><?php echo substr(get_the_excerpt(), 0,195); ?> ...</p>
	
</article>

<?php endwhile; ?>

<nav><?php pagination('�', '�'); ?>
</nav>
				
<?php endif; ?>

<?php get_footer(); ?>