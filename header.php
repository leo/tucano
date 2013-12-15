<?php $options = get_option('tucano_theme_options'); ?>
<!doctype html>
<html lang="de">

<head>
<title><?php bloginfo('name'); ?><?php if ( is_single() ) { ?><?php } ?><?php wp_title('-'); ?></title>

<meta charset="utf-8">

<link rel="stylesheet" type="text/css" media="screen" href="<?php bloginfo('template_url'); ?>/style.css" />
<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS Feed" href="<?php bloginfo('rss2_url'); ?>" />
<link rel="icon" type="image/png" href="/favicon.png" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<meta name="viewport" content="user-scalable=0, initial-scale=1.0">

<link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/main.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_url'); ?>/js/jquery.autosize.min.js"></script>

<script>
$(document).ready(function(){
    $('.comment-field').autosize();   
});
</script>


<?php wp_head(); ?>
<?php if (empty($options['custom_css'])) { } else { echo "<style> \n". $options['custom_css'] ."\n</style>"; } ?>

<?php echo $options['extended_head']; ?>

</head>
	
<body>
<?php if ($options['progress-bar'] == 1) : ?>
<div id="progressBar"></div>
<?php endif; ?>

<?php if (empty($options['top-msg-con'])) { $options['top-msg-con'] = "Kein Inhalt für diese Nachricht definiert. Bitte nehmen Sie entsprechend Einstellungen in ihrem <b>Dashboard</b> vor."; } ?>

<?php if ($options['top-message'] == 1) : ?>
<div class="msg"><p><?php echo $options['top-msg-con']; ?></p></div>
<?php endif; ?>

<?php if (empty($options['twitter-user'])) : ?><?php else : ?>
<a target="_blank" href="https://twitter.com/<?php if (empty($options['twitter-user'])) { echo "lmprht"; } else { echo $options['twitter-user']; } ?>" class="twitter">Twitter</a>
<?php endif; ?>
<section>
	
<header>
    <a class="animated fadeInDown" href="<?php echo home_url(); ?>"><img alt="Logo" src="<?php $currtheme = strtolower(get_current_theme()); if (empty($options['logo-url'])) { echo "". bloginfo('url') ."/wp-content/themes/". $currtheme ."/images/example-logo.png"; } else { echo $options['logo-url']; } ?>"></a>
</header>

<?php
function pagination() {
    global $wp_query, $wp_rewrite;
    $wp_query->query_vars['paged'] > 1 ? $current = $wp_query->query_vars['paged'] : $current = 1;
    $pagination = array(
        'base' => @add_query_arg('paged','%#%'),
        'format' => '',
        'total' => $wp_query->max_num_pages,
        'current' => $current,
        'prev_text' => '<b class="arr"><<&nbsp;</b>Zur&uuml;ck',
        'next_text' => 'Weiter<b class="arr">&nbsp;>></b>',
        'type' => 'plain'
);
    if( $wp_rewrite->using_permalinks() )
        $pagination['base'] = user_trailingslashit( trailingslashit( remove_query_arg( 's', get_pagenum_link( 1 ) ) ) . 'page/%#%/', 'paged' );

    if( !empty($wp_query->query_vars['s']) )
        $pagination['add_args'] = array( 's' => get_query_var( 's' ) );

    echo paginate_links( $pagination );
};
?>