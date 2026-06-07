<?php
    $cta_section_title           = get_sub_field('cta_section_title');          // ACF Text Field : CTA Section Title
    $cta_section_description     = get_sub_field('cta_section_description');    // ACF Textarea Field : CTA Section Description
    $cta_button_items            = get_sub_field('cta_button_items');           // ACF Repeater Field : CTA Button 1 Text
?>

<section class="cta-section layout-padding pt-50 pb-50">
    <div class="cta-section-wrapper ">
        <div class="cta-content">
            <?php if ( $cta_section_title ) : ?>
                <h2 class="cta-section-title"><?php echo esc_html($cta_section_title); ?></h2>
            <?php endif; ?>

            <?php if ( $cta_section_description ) : ?>
                <p class="cta-section-description"><?php echo esc_html($cta_section_description); ?></p>
            <?php endif; ?>
        </div>

        <div class="cta-buttons">
            <?php if ( $cta_button_items ) : ?>
            <?php foreach ( $cta_button_items as $button ) : 
                    $cta_button  = $button['cta_button'];  // ACF Link Field : CTA Button
                    $button_style = $button['button_style']; // ACF Select Field : Button Style transparent/background
                ?>
                <a href="<?php echo esc_url($cta_button['url']); ?>" class="btn <?php echo esc_attr($button_style); ?>">
                    <?php echo esc_html($cta_button['title']); ?>
                </a>
            <?php endforeach; ?>
            <?php endif; ?>
        </div>
    
    </div>
</section>