<?php
    $article_section_top_heading    = get_sub_field('article_section_top_heading'); // ACF Text Field : Article Section Sub Heading
    $article_section_top_title      = get_sub_field('article_section_top_title');   // ACF Text Field : Article Section Heading
    $show_all_article               = get_sub_field('show_all_article');            // ACF Link Field : Show All Article

    $source_type                    = get_sub_field('source_type');                 // ACF Button Group Field : Source Type latest/manual 
    $data_source                    = get_sub_field('data_source');                 // ACF Group Field 
    $manual_post                    = get_sub_field('manual_post');                 // ACF Relationship Field : Manual Post Celect
    $posts_per_page                 = $data_source['posts_per_page'];               // ACF Number Field : Show Post Per Page

    $layout_style                   = get_sub_field('layout_style');
    if ( $layout_style == 'grid'){
        $layout_class = 'card-grid';
        $columns = get_sub_field('columns');
    } else {
        $layout_class = 'post-card-boxes-carousel';
        
    }
?>

<article class="post-card-grid-section layout-padding">
    <div class="article-section-inner pt-lg-120 pt-50 pb-lg-120 pb-50">
        <div class="article-section-top">
            <div class="article-section-heading-wrapper">
                <?php if ( $article_section_top_heading ) : ?>
                    <p class="article-section-sub-heading"><?php echo esc_html($article_section_top_heading); ?></p>
                <?php endif; ?>

                <?php if ( $article_section_top_title ) : ?>
                    <h2 class="article-section-top-title"><?php echo esc_html($article_section_top_title); ?></h2>
                <?php endif; ?>
            </div>

            <div class="show-all-article-link">
                <?php if ( $show_all_article ) : ?>
                    <a href="<?php echo esc_url( get_permalink( get_option( 'page_for_posts' ) ) ); ?>"><?php echo esc_html( $show_all_article['title']) ; ?></a>
                <?php endif; ?>
            </div>
        </div>

        <?php if ( $source_type == 'latest' ):  ?>
        <div class="post-card-boxes <?php echo esc_attr($layout_class) ; ?> <?php echo ( $layout_style === 'grid') ? 'columns-' . esc_attr( $columns ) : '' ; ?>">

            <?php 
                $latest_posts    = new WP_Query(array(
                    'post_type'         => $post,
                    'posts_per_page'    => $posts_per_page,
                ));
            ?>

            <?php if ($latest_posts->have_posts() ) : ?>
                <?php while ( $latest_posts->have_posts() ) : $latest_posts->the_post(); ?>
                <div class="post-card-box">
                    <div class="post-thumb">
                        <div class="thumbnail media">
                        <?php the_post_thumbnail(); ?>
                        </div>
                    </div>

                    <div class="post-info">
                        <div class="category">
                            <?php $categories   = get_the_category();
                                if ( !empty($categories)) :
                                    foreach ( $categories as $category ) :
                            ?>
                            <span>
                                <?php echo esc_html( $category->name ); ?>
                            </span>
                            <?php endforeach; endif; ?>
                        </div>

                        <h3><?php the_title(); ?></h3>
                        
                        <div class="box-footer">
                            <span class="post-date">
                                <?php echo get_the_date( 'M j, Y' ); ?>
                            </span>
                            <div class="read-time">
                                <?php echo ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) . ' min read'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endwhile; endif; ?>

            <?php wp_reset_postdata(); ?>

        </div>

        <?php elseif ( $source_type == 'manual' ):  ?>
        <div class="post-card-boxes <?php echo esc_attr($layout_class) ; ?> <?php echo ( $layout_style === 'grid') ? 'columns-' . esc_attr( $columns ) : '' ; ?>">

            <?php $manual_post = get_sub_field('manual_post'); 
                        if ( $manual_post ) :
               
                    foreach ( $manual_post as $post ) : 
                        setup_postdata( $post ) ;
                ?>

                <div class="post-card-box">
                    <div class="post-thumb">
                        <div class="thumbnail media">
                        <?php the_post_thumbnail(); ?>
                        </div>
                    </div>

                    <div class="post-info">
                        <div class="category">
                            <?php $categories   = get_the_category();
                                if ( !empty($categories)) :
                                    foreach ( $categories as $category ) :
                            ?>
                            <span>
                                <?php echo esc_html( $category->name ); ?>
                            </span>
                            <?php endforeach; endif; ?>
                        </div>

                        <h3><?php the_title(); ?></h3>
                        
                        <div class="box-footer">
                            <span class="post-date">
                                <?php echo get_the_date( 'M j, Y' ); ?>
                            </span>
                            <div class="read-time">
                                <?php echo ceil( str_word_count( wp_strip_all_tags( get_the_content() ) ) / 200 ) . ' min read'; ?>
                            </div>
                        </div>
                    </div>
                </div>

            <?php endforeach; endif; ?>

            <?php wp_reset_postdata(); ?>

        </div>

        <?php endif; ?>
    </div>
</article>