<?php 
    $content_section_sub_heading                  = get_sub_field('content_section_sub_heading');           // ACF Text Field : Section Sub Heading
    $content_section_title                        = get_sub_field('content_section_title');                 // ACF Text Field : Section Title
    $content_description                          = get_sub_field('content_description');                   // ACF Textarea Field : Section Description
    $contact_button                               = get_sub_field('contact_button');                        // ACF Link Field : Contact Button

    $faq_items                                    = get_sub_field('faq_items');                             // ACF Repeater Field : FAQ Items
    
?>

<section class="faq-section layout-padding">
    <div class="faq-section-wrapper pt-lg-100 pt-50 pb-lg-100 pb-50">
        <div class="content-wrapper">
            <?php if ( $content_section_sub_heading ) : ?>
                <p class="section-sub-heading"><?php echo esc_html($content_section_sub_heading); ?></p>
            <?php endif; ?>

            <?php if ( $content_section_title ) : ?>
                <h2 class="section-title"><?php echo esc_html($content_section_title); ?></h2>
            <?php endif; ?>

            <?php if ( $content_description ) : ?>
                <p class="section-description"><?php echo esc_html($content_description); ?></p>
            <?php endif; ?>

            <?php if ( $contact_button ) : ?>
                <a href="<?php echo esc_url($contact_button['url']); ?>" class="faq-contact-btn">
                    <?php echo esc_html($contact_button['title']); ?>
                </a>
            <?php endif; ?>
        </div>

        <?php if ( $faq_items ) : ?>
            <div class="faq-items">
                <?php foreach ( $faq_items as $item ) : 
                        $question       = $item['question'];        // ACF Sub Field : FAQ Question
                        $answer         = $item['answer'];          // ACF Sub Field : FAQ Answer
                        $show_answer   = $item['show_answer'];    // ACF True/False Field : Show Answers

                         if ( $show_answer == true ) {
                            $add_class = 'active' ;
                        } else {
                            $add_class = '' ;
                        }
                    ?>
                    <div class="faq-item <?php echo esc_attr($add_class); ?>">
                        <div class="faq-item-left">
                            <?php if ( $question ) : ?>
                                <h5 class="faq-question"><?php echo esc_html($question); ?></h5>
                            <?php endif; ?>

                            <div class="faq-answer">
                                <?php if ( $answer ) : ?>
                                    <p><?php echo wp_kses_post( $answer ); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                        <div class="faq-item-right">
                            <span class="accordion-icon"></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>