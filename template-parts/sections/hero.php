<?php
    $hero_sub_heading           = get_sub_field('hero_sub_heading');        // ACF Text Field : Hero Sub Heading
    $hero_title                 = get_sub_field('hero_title');              // ACF Text Field : Hero Title
    $hero_description           = get_sub_field('hero_description');        // ACF Textarea Field : Hero Description

    $show_cta                   = get_sub_field('show_cta');                // ACF True/False Field : Show CTA Button  
    $hero_cta_button            = get_sub_field('hero_cta_button');         // ACF Repeater Field : Hero CTA Button


    $hero_footer                  = get_sub_field('hero_footer');           // ACF Text Field : Hero Footer Text
?>

<section class="hero-section layout-padding">
    <div class="hero-wrapper pt-lg-100 pb-lg-100 pt-50 pb-50">
        <div class="hero-content">

            <?php if ( $hero_sub_heading ) : ?>
            <div class="section-sub-heading">
                <ul> 
                    <li> <?php echo esc_html( $hero_sub_heading ); ?></li>
                </ul>
            </div> 
            <?php endif; ?>

            <?php if ( $hero_title ) : ?>
                <div class="hero-title-wrapper">
                    <h1 class="hero-title"><?php echo esc_html( $hero_title ); ?></h1>
                </div>
            <?php endif; ?>

            <?php if ( $hero_description ) : ?>
                <div class="hero-description-wrapper">
                    <p class="hero-description"><?php echo esc_html( $hero_description ); ?></p>
                </div>
            <?php endif; ?>

            <?php if ( $show_cta ) : ?>
                <div class="hero-cta-wrapper">
                    <?php if ( $hero_cta_button ) : ?>
                        <?php foreach ( $hero_cta_button as $button ) : 
                                $hero_button    = $button['hero_button'];
                                $button_style   = $button['button_style'];
                            ?>
                            <a href="<?php echo esc_url( $hero_button['url'] ); ?>" class="btn <?php echo esc_attr( $button_style ); ?>">
                                <?php echo esc_html( $hero_button['title'] ); ?>
                            </a>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <?php if ( $hero_footer ) : ?>
                <div class="hero-footer-wrapper">
                    <p><?php echo esc_html( $hero_footer ); ?></p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>