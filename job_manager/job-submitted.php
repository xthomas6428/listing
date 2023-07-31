<div class="container">
	<div class="submit-completed text-center">
		<?php
		global $wp_post_types;
		
		switch ( $job->post_status ) :
			case 'publish' :
				$allowed_html_array = array( 'a' => array('href' => array()) );
				printf(wp_kses(__( '%s listed successfully. To view your listing <a href="%s">click here</a>.', 'listdo' ), $allowed_html_array), $wp_post_types['job_listing']->labels->singular_name, get_permalink( $job->ID ) );
			break;
			case 'pending' :
				printf( esc_html__( '%s submitted successfully. Your listing will be visible once approved.', 'listdo' ), $wp_post_types['job_listing']->labels->singular_name, get_permalink( $job->ID ) );
			break;
			default :
				do_action( 'job_manager_job_submitted_content_' . str_replace( '-', '_', sanitize_title( $job->post_status ) ), $job );
			break;
		endswitch;

		do_action( 'job_manager_job_submitted_content_after', sanitize_title( $job->post_status ), $job );
		?>
	</div>
</div>