<?php 
    $section_sub_heading                 = get_sub_field('section_sub_heading');          // ACF Text Field : Section Sub Heading
    $team_items                          = get_sub_field('team_items');                   // ACF Repeater Field : Teams Logos
?>

<section class="working-with-teams layout-padding">
    <div class="working-with-teams-wrapper pt-50 pb-50">
        <?php if ( $section_sub_heading ) : ?>
            <p class="section-sub-heading" ><?php echo esc_html($section_sub_heading); ?> </p>
        <?php endif; ?>

        <?php if ( $team_items ) : ?>
            <div class="team-items">
                <?php foreach ( $team_items as $item ) :  
                    $team_logo = $item['team_logo'];  // ACF File Type Field : Team Logo
                    
                    ?>
                    <div class="team-item">
                        <?php if ( $team_logo ) : 
                            $file_path = get_attached_file( $team_logo['ID'] );
                            $extension = strtolower( pathinfo( $file_path, PATHINFO_EXTENSION ) );

                            if ( $extension === 'svg' && file_exists( $file_path ) ) {

                                echo file_get_contents( $file_path );

                            } else {

                                echo '<img src="' . esc_url( $team_logo['url'] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';

                            }
                        endif; ?>

                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>