<?php
    $section_top_sub_heading                = get_sub_field('section_top_sub_heading');             // ACF Text Field : Section Top Sub Field
    $section_top_title                      = get_sub_field('section_top_title');                   // ACF Text Field : Section Top Title
    $section_top_description                = get_sub_field('section_top_description');             // ACF Textarea Field : Section Top Description
    
    $plan_duration_label                    = get_sub_field('plan_duration_label');                 // ACF Repeater Field : Pricing Plan Name monthly/yearly
    $label_class                            = 'active';

    $monthly_plan                           = get_sub_field('monthly_plan');                        // ACF Repeater Field : Monthly Pricing Plan 
    $yearly_plan                            = get_sub_field('yearly_plan');                         // ACF Repeater Field : Yearly Pricing Plan 


?>

<section class="pricing-section layout-padding">
    <div class="pricing-section-wrapper pt-lg-100 pt-50 pb-lg-100 pb-50">
        <div class="section-top">
            <?php if ( $section_top_sub_heading ) : ?>
                <p class="section-sub-heading" ><?php echo esc_html($section_top_sub_heading); ?> </p>
            <?php endif; ?>

            <?php if ( $section_top_title ) : ?>
                <h2 class="section-heading" ><?php echo esc_html($section_top_title); ?> </h2>
            <?php endif; ?>

            <?php if ( $section_top_description ) : ?>
                <p class="section-top-description" ><?php echo esc_html($section_top_description); ?> </p>
            <?php endif; ?>
        </div>

        <div class="pricing-section-bottom">
            <div class="plan-duration-wrapper">
                <?php if ( $plan_duration_label ) : ?>
                    <?php foreach ( $plan_duration_label as $index => $duration ) :
                            $duration_label     = $duration['duration_label'];
                            $extra_savings      = $duration['extra_savings'];
                        ?>
                        <div class="plan-duration <?php echo $index === 0 ? 'active' : ''; ?>">
                            <?php if ( $duration_label ) : ?>
                                <button class="duration-label" ><?php echo esc_html($duration_label) ; ?></button>
                            <?php endif; ?>

                            <?php if ( $extra_savings ) : ?>
                                <span class="extra-save"><?php echo esc_html($extra_savings) ; ?></span>
                            <?php endif; ?>
                        </div>

                <?php endforeach; endif; ?>
            </div>

            <div class="pricing-plan-wrapper">
                <div class="pricing-plan active">
                    <?php if ( $monthly_plan ) : ?>
                        <div class="plan-boxes">
                            <?php foreach ( $monthly_plan as $plan ) :
                                    $package_name                       = $plan['package_name'];          // ACF Text Field : Plane Name 
                                    $show_highlight_plan                = $plan['show_highlight_plan'];  // ACF True/False Field : Show Highlight Plane
                                    $highlight_text                     = $plan['highlight_text'];       // ACF Text Field : Highlight Text
                                    $package_description                = $plan['package_description'];   // ACF Text Field : Package Description Text
                                    $price                              = $plan['price'];                // ACF Text Field : Pakege Price Text
                                    $duration                           = $plan['duration'];             // ACF Text Field : Pakege Duration
                                    $cta_button                         = $plan['cta_button'];           // ACF Link Field : CTA Button Text
                                    $unlock_items                       = $plan['unlock_items'];         // ACF Repeater Field : Package Unloc Items
                                ?>
                                
                                <div class="monthly-plan-box <?php echo $show_highlight_plan ? 'highlight-plan' : ''; ?>">
                                    <div class="pakege-name-wrapper">
                                        <?php if ( $package_name ) : ?>
                                            <span class="package-name" ><?php echo esc_html($package_name) ; ?></span>

                                            <?php if ( $show_highlight_plan ) : ?>
                                                <span class="package-highlight"><?php echo esc_html( $highlight_text ) ; ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>

                                    <div class="package-description">
                                        <?php if ( $package_description ) : ?>
                                            <span class="package-description"><?php echo esc_html( $package_description ) ; ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pakege-price">
                                        <?php if ( $price ) : ?>
                                            <h3><?php echo esc_html( $price ) ; ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if ( $duration ) : ?>
                                            <span><?php echo esc_html( $duration ) ; ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pakege-link">
                                        <?php if ( $cta_button ) : ?>
                                            <a href="<?php echo esc_url($cta_button['url']) ; ?>"><?php echo esc_html($cta_button['title']) ; ?></a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pakegr-unloc-items">
                                        <?php if ( $unlock_items ) : ?>
                                            <ul class="unlock-items-boxes">
                                            <?php foreach ( $unlock_items as $item ) :
                                                    $item_name      = $item['item_name'];
                                                ?>
                                                <?php if ( $item_name ) : ?>
                                                    <li class="unlock-item-box"><?php get_template_part('assets/svgs/check-icon'); ?> <?php echo esc_html( $item_name ) ; ?></li>

                                            <?php endif; endforeach;?>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="pricing-plan">
                    <?php if ( $yearly_plan ) : ?>
                        <div class="plan-boxes">
                            <?php foreach ( $yearly_plan as $plan ) :
                                    $package_name                       = $plan['package_name'];          // ACF Text Field : Plane Name 
                                    $show_highlight_plan                = $plan['show_highlight_plan'];  // ACF True/False Field : Show Highlight Plane
                                    $highlight_text                     = $plan['highlight_text'];       // ACF Text Field : Highlight Text
                                    $package_description                = $plan['package_description'];   // ACF Text Field : Package Description Text
                                    $price                              = $plan['price'];                // ACF Text Field : Pakege Price Text
                                    $duration                           = $plan['duration'];             // ACF Text Field : Pakege Duration
                                    $cta_button                         = $plan['cta_button'];           // ACF Link Field : CTA Button Text
                                    $unlock_items                       = $plan['unlock_items'];         // ACF Repeater Field : Package Unloc Items
                                ?>

                                <div class="yearly-plan-box <?php echo $show_highlight_plan ? 'highlight-plan' : ''; ?>">
                                    <div class="pakege-name-wrapper">
                                        <?php if ( $package_name ) : ?>
                                            <span class="package-name" ><?php echo esc_html($package_name) ; ?></span>

                                            <?php if ( $show_highlight_plan ) : ?>
                                                <span class="package-highlight"><?php echo esc_html( $highlight_text ) ; ?></span>
                                            <?php endif; ?>
                                        <?php endif; ?>

                                    </div>

                                    <div class="package-description">
                                        <?php if ( $package_description ) : ?>
                                            <span class="package-description"><?php echo esc_html( $package_description ) ; ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pakege-price">
                                        <?php if ( $price ) : ?>
                                            <h3><?php echo esc_html( $price ) ; ?></h3>
                                        <?php endif; ?>
                                        
                                        <?php if ( $duration ) : ?>
                                            <span><?php echo esc_html( $duration ) ; ?></span>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pakege-link">
                                        <?php if ( $cta_button ) : ?>
                                            <a href="<?php echo esc_url($cta_button['url']) ; ?>"><?php echo esc_html($cta_button['title']) ; ?></a>
                                        <?php endif; ?>
                                    </div>

                                    <div class="pakegr-unloc-items">
                                        <?php if ( $unlock_items ) : ?>
                                            <ul class="unlock-items-boxes">
                                            <?php foreach ( $unlock_items as $item ) :
                                                    $item_name      = $item['item_name'];
                                                ?>
                                                <?php if ( $item_name ) : ?>
                                                    <li class="unlock-item-box"><?php get_template_part('assets/svgs/check-icon'); ?> <?php echo esc_html( $item_name ) ; ?></li>

                                            <?php endif; endforeach;?>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                </div>

                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            
        </div>
    </div>
</section>