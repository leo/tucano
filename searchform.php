<?php 
$querystring = esc_attr(apply_filters('the_search_query', get_search_query()));
$searchstring = "Suchbegriff + Enter-Taste";
if (empty($querystring)) { $querystring = $searchstring; }
?>

<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
<input <?php if($rookster_config['searchtxtcent'] == true) { echo 'style="text-align: center !important;" '; } ?>type="text" autocomplete="off" name="s" id="s" value="<?php echo $querystring; ?>" onblur="if (this.value == '') { this.value = '<?php echo $searchstring; ?>'; }" onfocus="if (this.value == '<?php echo $searchstring; ?>') { this.value = ''; }" />
</form>