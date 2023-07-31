<?php
$sidebar_position = listdo_get_archive_layout();

$layout = listdo_get_listing_archive_version();
$layouts = listdo_get_listing_all_half_map_version();
$class = 'col-md-8 col-xs-12';
if ( $sidebar_position == 'main' ) {
	$class = 'col-xs-12';
}
if ( in_array($layout, $layouts) ) {
	$class = '';
}
$class_result = 8;
if($layout == 'default' && $sidebar_position == 'main') {
	$class_result = 4;
}
?>
<div class="<?php echo esc_attr($class); ?> main-results">
	<div class="main-content-listings">
		<?php
		global $wp_query;
		$term =	$wp_query->queried_object;
		$show_title = listdo_get_config('listing_show_cat_title', 0);
		$show_des = listdo_get_config('listing_show_cat_description', 0);
		
		if ( isset($term->taxonomy) && $term->taxonomy == 'job_listing_category' && ($show_title || $show_des) ) { ?>
			
			<div class="listings-cat-description">
				<?php if ( $show_title ) { ?>
					<h2 class="cat-title"><?php echo trim($term->name); ?></h2>
				<?php } ?>
				<?php if ( $show_des ) { ?>
					<div class="description"><?php echo trim($term->description); ?></div>
				<?php } ?>
			</div>
		<?php } ?>

		<div class="listing-action clearfix">
			<div class="row flex-middle-sm">
				<div class="col-xs-6">
					<div class="listing-search-result"><div class="results"><?php esc_html_e('0 Résultats trouvés', 'listdo'); ?></div></div>
				</div>
			</div>
		</div>
		<div class="job_listings job_listings_cards clearfix row loading">