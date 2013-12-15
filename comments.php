<?php $options = get_option('tucano_theme_options'); ?>
<div class="add_comment<?php if ($options['social-twitter'] == 1 or $options['social-flattr'] == 1 or $options['social-facebook'] == 1 or $options['social-googleplus'] == 1) : ?> top-border<?php endif; ?>">

	<h3 style="display: none;">Kommentar hinzufügen</h3>
	<form action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
	<?php comment_id_fields(); ?> 
 
<div>
   <div class="left-com">
      <input type="text" name="author" id="author" value="<?php echo $comment_author; ?>" placeholder="Name" size="22" /><br/>
      <input type="text" name="email" id="email" value="<?php echo $comment_author_email; ?>" placeholder="Email" size="22" tabindex="2" /><br/>
      <input type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" placeholder="Webseite" size="22" tabindex="3" />
   </div>
 
   <div class="right-com">
      <textarea class="comment-field" name="comment" id="comment"></textarea>
   </div>
   </div>
 
   <p class="post-comment">
      <input name="submit" type="submit" id="submit" tabindex="5" value="Kommentar abschicken" />
      <input type="hidden" name="comment_post_ID" value="<?php echo $id; ?>" />
   </p>
 
   <?php do_action('comment_form', $post->ID); ?>
 
</form>
 
</div>


<div id="comments">
   <?php foreach ($comments as $comment) : ?>
 
      <div class="comment nr-<?php comment_ID() ?>">
	  
	  <div class="avatar">
	  <?php echo get_avatar( $comment, 60 ); ?>
	  
	  <span class="overlay"><?php echo comment_ID(); ?></span>
	  </div>
	  
	  <div class="comment-content">
 
         <small class="comment-meta"><?php comment_author(); ?> <strong>|</strong> <?php comment_date('j. F Y') ?>, <?php comment_time('H:i') ?> Uhr</small>
 
         <div class="comment-text"><?php comment_text() ?></div>
 
          <?php if ($comment->comment_approved == '0') : ?>
            <strong>Achtung: Dein Kommentar muss erst noch freigegeben werden.</strong><br />
         <?php endif; ?>
		</div>
      </div>
   <?php endforeach; ?>
</div>