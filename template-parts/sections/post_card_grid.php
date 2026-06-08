<?php
    $article_section_top_heading    = get_sub_field('article_section_top_heading'); // ACF Text Field : Article Section Sub Heading
    $article_section_top_title      = get_sub_field('article_section_top_title');   // ACF Text Field : Article Section Heading
    $show_all_article               = get_sub_field('show_all_article');            // ACF Link Field : Show All Article

    $source_type                    = get_sub_field('source_type');                 // ACF Button Group Field : Source Type latest/manual 
    $data_source                    = get_sub_field('data_source');                 // ACF Group Field 
    $posts_per_page                 = $data_source['posts_per_page'];               // ACF Number Field : Show Post Per Page

    $layout_style                   = get_sub_field('layout_style');
    if ( $layout_style == 'grid'){
        $layout_class = 'grid';
        $columns = get_sub_field('columns');
    } else {
        $layout_class = 'carousel';
    }
?>

<article class="article-section layout-padding">
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
                    <a href="<?php echo esc_url( $show_all_article['url']) ; ?>"><?php echo esc_html( $show_all_article['title']) ; ?></a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</article>