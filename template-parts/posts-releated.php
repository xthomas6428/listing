<?php
    $relate_count = listdo_get_config('number_blog_releated', 2);
    $relate_columns = listdo_get_config('releated_blog_columns', 2);
    $terms = get_the_terms( get_the_ID(), 'category' );
    $termids =array();

    if ($terms) {
        foreach($terms as $term) {
            $termids[] = $term->term_id;
        }
    }

    $args = array(
        'post_type' => 'post',
        'posts_per_page' => $relate_count,
        'post__not_in' => array( get_the_ID() ),
        'tax_query' => array(
            'relation' => 'AND',
            array(
                'taxonomy' => 'category',
                'field' => 'id',
                'terms' => $termids,
                'operator' => 'IN'
            )
        )
    );
    $relates = new WP_Query( $args );
    if( $relates->have_posts() ):
    set_query_var('thumbsize', 'large');
?>
    <div class="widget">
        <h4 class="widget-title">
            <?php esc_html_e( 'Related Posts', 'listdo' ); ?>
        </h4>
        <div class="related-posts-content widget-content">
            <div class="slick-carousel" data-carousel="slick" data-smallmedium="<?php echo esc_attr($relate_columns); ?>" data-extrasmall="1" data-items="<?php echo esc_attr($relate_columns); ?>" data-pagination="false" data-nav="true">
            <?php
                while ( $relates->have_posts() ) : $relates->the_post();
                    ?>
                    <div class="item">
                        <?php get_template_part( 'template-posts/loop/grid_item' ); ?>
                    </div>
                    <?php
                endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>