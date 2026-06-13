<?php 
    $hero_inner_title               = get_sub_field('hero_inner_title');                // ACF Text Field : Hero Inner Title
    $hero_inner_description         = get_sub_field('hero_inner_description');          // ACF Textarea Field : Hero Description

    $hero_bg_type                   = get_sub_field('hero_bg_type');                    // ACF Button Group Field : Hero BG Type solid/image/video
    $background_type                = get_sub_field('background_type');                 // ACF Group Field : 

    if ( $hero_bg_type === 'solid' ) {

        $bg_color = $background_type['bg_color'] ?? '';

    } elseif ( $hero_bg_type === 'image' ) {

        $bg_image = $background_type['bg_image'] ?? '';

    } elseif ( $hero_bg_type === 'video' ) {

        $bg_video = $background_type['bg_video'] ?? '';

    }
?>

<section class="inner-hero-section layout-padding">
    <div class="inner-hero-wrapper">
        <div class="hero-content">
            <?php if ($hero_inner_title ) : ?>
                <div class="inner-hero-title-wrapper">
                    <h2 class="inner-hero-title"><?php echo esc_html( $hero_inner_title ) ; ?></h2>
                </div>
            <?php endif; ?>

            <?php if ($hero_inner_description ) : ?>
                <div class="inner-hero-sescription-wrapper">
                    <p class="inner-hero-sescription"><?php echo esc_html( $hero_inner_description ) ; ?></p>
                </div>
            <?php endif; ?>
            <?php custom_breadcrumb(); ?>
        </div>

        <div class="hero-media ">

        <?php if ( $hero_bg_type === 'solid' && !empty($bg_color) ){?>
                <div class="hero-bg-color <?php if (!empty($bg_color)){echo 'style="background: ' . $bg_color . '; "';} ?>">
                    
                </div>

        <?php}elseif ($bg_image === 'image' && !empty($bg_image)){ ?>
                <div class="hero-bg-image">
                    <img src="<?php echo esc_url($bg_image['url']) ; ?>" alt="">
                </div>

        <?php}elseif ($bg_video === 'video' && !empty($bg_video)){ ?>

                    <div class="hero-video media">
                        <video controls autoplay muted playsinline loop>
                            <source src="<?php echo $bg_video['url'] ; ?>" type="video/mp4">
                            <source src="movie.ogg" type="video/ogg">
                        </video>
                    </div>
                <?php } 
                
            ?>

        </div>
    </div>
</section>