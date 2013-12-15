<?php $options = get_option('tucano_theme_options'); ?>
</section>
 
<?php wp_footer(); ?>

<footer>
<?php if (empty($options['imprint-link'])) { } else { echo '<a class="imprint-link" href="'. $options['imprint-link'] .'">Impressum</a>'; } ?>
</footer>

</body> 
</html>