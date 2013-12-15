<?php get_header(); ?>
 
   <article class="single">
 
      <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
         <h1><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h1>
<div class="info"><?php the_time(get_option('date_format')); ?><br/>&#8618;&nbsp;<?php the_category(', '); ?></div>
            <?php the_content(); ?>
		</article>
		<?php if ($options['social-twitter'] == 1 or $options['social-flattr'] == 1 or $options['social-facebook'] == 1 or $options['social-googleplus'] == 1) : ?>
		<div class="social">
			<span>Beitrag teilen:</span>
			<?php if ($options['social-twitter'] == 1) : ?><a class="btn-twitter" onclick="window.open('https://twitter.com/intent/tweet?source=webclient&text=<?php the_title(); ?>%20-%20<?php the_permalink() ?>%20via @<?php if (empty($options['twitter-user'])) { echo "lmprht"; } else { echo $options['twitter-user']; } ?>','popUpWindow','height=257,width=500,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">Twittern</a><?php endif; ?>
			<?php if ($options['social-flattr'] == 1) : ?><a class="btn-flattr" onclick="window.open('https://flattr.com/submit/auto?user_id=lamprecht&url=<?php echo get_permalink(); ?>&title=<?php the_title(); ?>&description=<?php echo substr(get_the_excerpt(), 0,300); ?> ...&language=de_DE&category=text','popUpWindow','height=600,width=1000,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">Flattrn</a><?php endif; ?>
			<?php if ($options['social-googleplus'] == 1) : ?><a class="btn-googleplus" onclick="window.open('https://plus.google.com/share?url=<?php $url = get_permalink(); $encoded_url = urlencode($url); echo $encoded_url; ?>','popUpWindow','height=560,width=510,left=100,top=100,resizable=yes,scrollbars=yes,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">Google +</a><?php endif; ?>
			<?php if ($options['social-facebook'] == 1) : ?><a class="btn-facebook" onclick="window.open('http://www.facebook.com/sharer.php?u=<?php $url = get_permalink(); $encoded_url = urlencode($url); echo $encoded_url; ?>&t=<?php the_title(); ?>&description=<?php echo substr(get_the_excerpt(), 0,300); ?> ...&language=de_DE&category=text','popUpWindow','height=700,width=800,left=100,top=100,resizable=yes,scrollbars=no,toolbar=yes,menubar=no,location=no,directories=no, status=yes');">Facebook</a><?php endif; ?>
		</div>
		<?php endif; ?>

      <?php endwhile; endif; ?>
	  
	  <?php if ( comments_open() ) : ?>
	<?php comments_template(); ?><?php endif; ?>
   

<nav><a class="page-numbers prev" href="<?php echo home_url(); ?>">Zurück zur Übersicht</a></nav>

<?php get_footer(); ?>