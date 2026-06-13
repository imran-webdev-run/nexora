<?php 
    $show_section_top                      = get_sub_field('show_section_top');                // ACF True/False Field : Show Section Top
    $section_top_content                   = get_sub_field('section_top_content');             // ACF Broup Field : Section Top Content
    $section_top_sub_heading               = $section_top_content['section_top_sub_heading'];         // ACF Text Field : Section Top Sub Heading
    $section_top_heading                   = $section_top_content['section_top_heading'];             // ACF Text Field : Section Top Heading

    $media_type                            = get_sub_field('media_type');                      // ACF Button Group Field : Media Type image/video
    $image                                 = get_sub_field('image');                           // ACF Image Field : Image
    $video                                 = get_sub_field('video');                           // ACF Video Field : Video

    $content_sub_heading                   = get_sub_field('content_sub_heading');             // ACF Text Field : Content Sub Heading
    $section_heading                       = get_sub_field('section_heading');                 // ACF Text Field : Section Heading
    $section_description                   = get_sub_field('section_description');             // ACF Textarea Field : Section Description

    $section_highlight_items               = get_sub_field('section_highlight_items');         // ACF Button Group Field : Section Highlight Items list/highlight
    $highlight_item                        = get_sub_field('highlight_item');                  // ACF Repeater Field : Section Highlight Item  
    $list_item                             = get_sub_field('list_item');                       // ACF Repeater Field : Section List Item


    $media_position                        = get_sub_field('media_position');                  // ACF Button Group Field : Media Position left/right 
    $section_background                    = get_sub_field('section_background');              // ACF Buton Group Field : Section Background transparent/background


?>

<section class="media-content-fifty-fifty layout-padding <?php echo esc_attr($section_background); ?>">
    <div class="media-content-fifty-fifty-wrapper pt-50 pb-50">

        <?php if ( $show_section_top ) : ?>
            <div class="section-top pb-lg-100 pb-50">
                <?php if ( $section_top_sub_heading ) : ?>
                    <p class="section-sub-heading" ><?php echo esc_html($section_top_sub_heading); ?> </p>
                <?php endif; ?>

                <?php if ( $section_top_heading ) : ?>
                    <h2 class="section-heading" ><?php echo esc_html($section_top_heading); ?> </h2>
                <?php endif; ?>
            </div>
        <?php endif; ?>

        <div class="media-content-wrapper <?php echo esc_attr($media_position); ?> ">
            <div class="fifty-fifty-media">
                <?php if ($media_type === 'image' && !empty($image)){ ?>

                    <div class="fifty-fifty-image media">
                        <img src="<?php echo $image['url'] ; ?>" alt="">
                    </div>
                <?php } elseif ($media_type === 'video' && !empty($video)){ ?>

                    <div class="fifty-fifty-video media">
                        <video controls autoplay muted playsinline loop>
                            <source src="<?php echo $video['url'] ; ?>" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                        </video>
                    </div>
                <?php } 
                
                ?>
            </div>

            <div class="fifty-fifty-content content">

                <?php if ( $content_sub_heading ) : ?>
                    <p class="content-sub-heading"><?php echo esc_html($content_sub_heading); ?></p>
                <?php endif; ?>

                <?php if ( $section_heading ) : ?>
                    <h3 class="section-heading"><?php echo esc_html($section_heading); ?></h3>
                <?php endif; ?>

                <?php if ( $section_description ) : ?>
                    <p class="section-description"><?php echo esc_html($section_description); ?></p>
                <?php endif; ?>

                <div class="section-footer">
                    <?php if ( $section_highlight_items == 'highlight') : ?>
                        <div class="highlight-items">
                            <?php foreach ( $highlight_item as $item ) :  
                                $highlight_text         = $item['highlight_text'];  // ACF Text Field : Highlight Text
                                $highlight_description  = $item['highlight_description'];  // ACF Text Field : Highlight Description
                                ?>
                                <div class="highlight-item">

                                    <?php if ( $highlight_text ) : ?>
                                        <spane class="highlight-text"><?php echo esc_html($highlight_text); ?></spane>
                                    <?php endif; ?>

                                    <?php if ( $highlight_description ) : ?>
                                        <p class="highlight-description"><?php echo esc_html($highlight_description); ?></p>
                                    <?php endif; ?>

                                </div>
                            <?php endforeach; ?>
                        </div>

                    <?php if ($section_highlight_items) : ?>
                    <?php elseif ( $section_highlight_items == 'list') : ?>
                        <ul class="list-items">
                            <?php foreach ( $list_item as $item ) :  
                                $section_list_items = $item['section_list_items'];  // ACF Text Field : List Text
                                ?>
                                <li class="list-item">

                                    <?php if ( $section_list_items ) : ?>
                                        <spane class="list-text"><?php get_template_part('assets/svgs/check-icon'); ?> <?php echo esc_html($section_list_items); ?></spane>
                                    <?php endif; ?>

                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; endif; ?>
                </div>
            </div>


        </div>
    </div>

</section>