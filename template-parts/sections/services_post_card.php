<?php 
    $section_top_heading            = get_sub_field('section_top_heading');             // ACF Text Field : Section Top Sub Heading
    $section_top_title              = get_sub_field('section_top_title');               // ACF Text Field : Section Top Heading
    $section_top_description        = get_sub_field('section_top_description');         // ACF Textarea Field : Section Top Description

    $source_type                    = get_sub_field('source_type');                     // ACF Button Group Field : latest/manual 
    $post_perpage                   = get_sub_field('post_perpage');                    // ACF Number Field : Postperpage
    $manual_source                  = get_sub_field('manual_source');                   // ACF Relationship Field : Manunal Service Select

    $icon                           = get_field( 'service_icon' );                      // ACF Image Field : Service Icon
    $show_badge                     = get_field('show_badge');                          // ACF True/False Field : Show Service Badge


    $layout_style                   = get_sub_field('layout_style');
    if ( $layout_style == 'grid'){
        $layout_class = 'card-grid';
        $columns = get_sub_field('columns');
    } else {
        $layout_class = 'servic-card-boxes-carousel';
        
    }


?>

<section class="secvice-section layout-padding">
    <div class="secvice-section-inner pt-lg-100 pt-50 pb-lg-100 pb-50">

        <div class="section-top">
            <?php if ( $section_top_heading ) : ?>
                <p class="section-sub-heading" ><?php echo esc_html($section_top_heading); ?> </p>
            <?php endif; ?>

            <?php if ( $section_top_title ) : ?>
                <h2 class="section-heading" ><?php echo esc_html($section_top_title); ?> </h2>
            <?php endif; ?>

            <?php if ( $section_top_description ) : ?>
                <p class="section-top-description" ><?php echo esc_html($section_top_description); ?> </p>
            <?php endif; ?>
        </div>

        <?php if ( $source_type == 'latest' ) : ?>
        <div class="secvice-section-boxes <?php echo esc_attr($layout_class) ; ?> <?php echo ( $layout_style === 'grid') ? 'columns-' . esc_attr( $columns ) : '' ; ?>">

            <?php 
                $latest_services    = new WP_Query(array(
                    'post_type'      => 'service',
                    'post_perpage'   => $post_perpage,
                ));
            
            ?>

            <?php if ( $latest_services ) : ?>
                <?php if ( $latest_services->have_posts()) : ?>
                <?php while ( $latest_services->have_posts()) : $latest_services->the_post(); ?>

                <?php get_template_part('inc/service' , 'page') ?>

                    <!-- <div class="secvice-section-box">
                        <div class="secvice-top">
                            <div class="secvice-icon">
                                <?php
                                $icon = get_field( 'service_icon' );

                                if ( $icon ) :

                                    $file_path = get_attached_file( $icon['ID'] );
                                    $extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );

                                    if ( $extension === 'svg' && file_exists( $file_path ) ) {

                                        echo file_get_contents( $file_path );

                                    } else {

                                        echo '<img src="' . esc_url( $icon['url'] ) . '" alt="' . esc_attr( get_the_title() ) . '">';

                                    }

                                endif;
                                ?>
                            </div>


                            <?php $show_badge = get_field('show_badge');?>
                            <?php if ( $show_badge == true ) : ?>
                            <div class="service-badge">
                                
                                <div class="category">
                                    
                                    <?php

                                        $terms = get_the_terms( get_the_ID(), 'service' );

                                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :

                                            foreach ( $terms as $term ) :
                                        ?>

                                                <span class="service-category">
                                                    <?php echo esc_html( $term->name ); ?>
                                                </span>

                                        <?php
                                            endforeach;

                                        endif;
                                        ?>
                                </div>

                            </div>
                            <?php endif; ?>
                        </div>
                        <div class="service-bottom">
                            <div class="service-info">
                                <div class="service-title">
                                    <h3><?php the_title(); ?></h3>
                                </div>

                                <div class="service-excerpt">
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>

                            <div class="service-link">
                                <a href="<?php the_permalink();  ?>">Learn more →</a>
                            </div>

                        </div>
                    </div> -->

            <?php endwhile; endif; endif; ?>
            <?php wp_reset_postdata(); ?>


        </div>

        <?php elseif ( $source_type == 'manual' ) : ?>
        <div class="secvice-section-boxes <?php echo esc_attr($layout_class) ; ?> <?php echo ( $layout_style === 'grid') ? 'columns-' . esc_attr( $columns ) : '' ; ?>">

            <?php $manual_source = get_sub_field('manual_source'); 
                        if ( $manual_source ) :
               
                    foreach ( $manual_source as $post ) : 
                        setup_postdata( $post ) ;
                ?>


                    <div class="secvice-section-box">
                        <div class="secvice-top">
                            <div class="secvice-icon">
                                <?php
                                $icon = get_field( 'service_icon' );

                                if ( $icon ) :

                                    $file_path = get_attached_file( $icon['ID'] );
                                    $extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );

                                    if ( $extension === 'svg' && file_exists( $file_path ) ) {

                                        echo file_get_contents( $file_path );

                                    } else {

                                        echo '<img src="' . esc_url( $icon['url'] ) . '" alt="' . esc_attr( get_the_title() ) . '">';

                                    }

                                endif;
                                ?>
                            </div>


                            <?php $show_badge = get_field('show_badge');?>
                            <?php if ( $show_badge == true ) : ?>
                            <div class="service-badge">
                                
                                <div class="category">
                                    
                                    <?php

                                        $terms = get_the_terms( get_the_ID(), 'service' );

                                        if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) :

                                            foreach ( $terms as $term ) :
                                        ?>

                                                <span class="service-category">
                                                    <?php echo esc_html( $term->name ); ?>
                                                </span>

                                        <?php
                                            endforeach;

                                        endif;
                                        ?>
                                </div>

                            </div>
                            <?php endif; ?>
                        </div>

                        <div class="service-bottom">
                            <div class="service-info">
                                <div class="service-title">
                                    <h3><?php the_title(); ?></h3>
                                </div>

                                <div class="service-excerpt">
                                    <p><?php the_excerpt(); ?></p>
                                </div>
                            </div>

                            <div class="service-link">
                                <a href="<?php the_permalink();  ?>">Learn more →</a>
                            </div>

                        </div>
                    </div>

            <?php endforeach; endif; ?>
            <?php wp_reset_postdata(); ?>


        </div>

        <?php endif; ?>

    </div>
</section>