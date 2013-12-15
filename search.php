<?php get_header(); ?>
 
   <article>
      <?php if (have_posts()) : ?>
         <p class="info">Suchergebnisse f&uuml;r "<strong><?php echo $s ?></strong>"</p>
 
         <?php while (have_posts()) : the_post(); ?>
            <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
           
               <?php the_content( 'Weiterlesen' ); ?>
       
			<hr/>
         <?php endwhile; ?>
 
         <p align="center"><?php next_posts_link('&laquo; &Auml;ltere Eintr&auml;ge') ?> | <?php previous_posts_link('Neuere Eintr&auml;ge &raquo;') ?></p>
 
      <?php else : ?>
         <h1>Leider nichts gefunden</h1>
 
      <?php endif; ?>
   </article>
   
<?php get_footer(); ?>