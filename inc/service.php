
<div class="secvice-section-box ">
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
