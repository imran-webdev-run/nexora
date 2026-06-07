<?php 
    $section_sub_heading               = get_sub_field('section_sub_heading');                 // ACF Sub Field : Section Sub Heading
    $section_title                     = get_sub_field('section_title');                         // ACF Sub Field : Section Title
    $testimonial_items                 = get_sub_field('testimonial_items');                     // ACF Repeater Field : Testimonial Items

?>

<section class="testimonials-section layout-padding">
    <div class="testimonials-section-wrapper pt-lg-100 pt-50 pb-lg-100 pb-50">
        <div class="section-top-content-wrapper">
            <?php if ( $section_sub_heading ) : ?>
                <p class="section-sub-heading"><?php echo esc_html($section_sub_heading); ?></p>
            <?php endif; ?>

            <?php if ( $section_title ) : ?>
                <h2 class="section-top-title"><?php echo esc_html($section_title); ?></h2>
            <?php endif; ?>
        </div>

        <div class="testimonial-items">
            <?php if ( $testimonial_items ) : ?>
                <?php foreach ( $testimonial_items as $item ) : 
                    $testimonial_rating         = $item['testimonial_rating'];          // ACF Number Field : Testimonial Rating
                    $show_ratings               = $item['show_ratings'];                // ACF True/False Field : Show Ratings
                    $show_testimonial_video     = $item['show_testimonial_video'];      // ACF True/False Field : Show Testimonial Video
                    $testimonial_video          = $item['testimonial_video'];           // ACF File Type Field : Testimonial Video
                    $testimonial_review         = $item['testimonial_review'];          // ACF Textarea Field : Testimonial Review
                    $show_author_image          = $item['show_author_image'];           // ACF True/False Field : Show Author Image
                    $author_image               = $item['author_image'];                // ACF Image Field : Author Image
                    $author_name                = $item['author_name'];                 // ACF Text Field : Author Name
                    $author_designation         = $item['author_designation'];          // ACF Text Field : Author Designation

                    
                    if ($show_testimonial_video == true && $testimonial_video) {
                         $video_media = 'video-review';
                    
                    } else {
                         $video_media = '';
                    }

                    $name_parts = explode( ' ', trim( $author_name ) );

                    $first_letter = strtoupper(
                        substr( $name_parts[0], 0, 1 )
                    );

                    $last_letter = '';

                    if ( count( $name_parts ) > 1 ) {

                        $last_letter = strtoupper(
                            substr( end( $name_parts ), 0, 1 )
                        );
                    }

                    $initials = $first_letter . $last_letter;
                ?>
                    <div class="testimonial-items-wrapper">
                        <div class="testimonial-items-inner">

                            <div class="testimonial-items-top">
                                <?php if ( $testimonial_rating ) : ?>
                                    <div class="testimonial-rating <?php echo esc_attr( $video_media ); ?>">
                                            <div class="rating-star-wrapper">
                                            <?php for ( $i = 1; $i <= $testimonial_rating ; $i++) : ?>
                                                <?php if ( $show_ratings == true) : ?>
                                                    <span class="rating-star">
                                                        <?php get_template_part('assets/svgs/star-icon' , 'page') ?>
                                                    </span>
                                                <?php endif; ?>
                                            <?php endfor ; ?>
                                            </div>
                                    
                                        <?php if ( $show_testimonial_video && $testimonial_video ) : ?>
                                        <div class="testimonial-video">

                                            <button class="video-link">
                                                <?php get_template_part('assets/svgs/play-icon', 'page'); ?>
                                                WATCH VIDEO
                                            </button>

                                        </div>
                                        <?php endif; ?>
                                    </div>
                                    
                                <?php endif;?>
                                
                                <?php if ( $testimonial_review ) : ?>
                                    <p class="testimonial-content"><?php echo wp_kses_post( $testimonial_review ); ?></p>
                                <?php endif; ?>
                            </div>

                            <div class="author-info-wrapper">
                                    <div class="author-profile">
                                        <?php if ( $show_author_image && $author_image ) : ?>
                                            <div class="author-image">
                                                <img src="<?php echo esc_url($author_image['url']); ?>" alt="<?php echo esc_attr($author_image['alt']); ?>">
                                            </div>
                                            <?php else : ?>
                                            <span class="avatar-placeholder">
                                                <?php echo esc_html( $initials ); ?>
                                            </span>
                                        <?php endif; ?>
                                    </div>

                                <div class="author-info">
                                    <?php if ( $author_name ) : ?>
                                        <h5 class="author-name"><?php echo esc_html($author_name); ?></h5>
                                    <?php endif; ?>

                                    <?php if ( $author_designation ) : ?>
                                        <p class="author-designation"><?php echo esc_html($author_designation); ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>

                        </div>

                        <div class="video-popup">

                            <div class="video-overlay"></div>

                            <div class="video-content">

                                <button type="button" class="video-close">
                                    &times;
                                </button>

                                <video controls autoplay muted playsinline>
                                    <source
                                        src="<?php echo $testimonial_video['url']; ?>"
                                        type="video/mp4"
                                    >
                                </video>

                            </div>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>