<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * This template can be overridden by copying it to yourtheme/job_manager/pagination.php.
 *
 * @see         https://wpjobmanager.com/document/template-overrides/
 * @author      Automattic
 * @package     WP Job Manager
 * @category    Template
 * @version     1.20.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

if ( $max_num_pages <= 1 ) {
	return;
}
?>
<nav class="manager-pagination apus-pagination">
	<?php
		echo paginate_links( apply_filters( 'job_manager_pagination_args', array(
			'base'      => esc_url_raw( str_replace( 999999999, '%#%', get_pagenum_link( 999999999, false ) ) ),
			'format'    => '',
			'current'   => max( 1, get_query_var('paged') ),
			'total'     => $max_num_pages,
			'prev_text' => '&larr;',
			'next_text' => '&rarr;',
			'type'      => 'list',
			'end_size'  => 3,
			'mid_size'  => 3
		) ) );
	?>
</nav>