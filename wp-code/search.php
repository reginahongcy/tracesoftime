<?php
/**
 * The template file for search results
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

get_header();
?>

    <main id="site-content" role="main">

<?php

$archive_title    = '';
$archive_subtitle = '';

if ( is_search() ) {
    global $wp_query;

    $archive_title = sprintf(
        '%1$s %2$s',
        '<span class="color-accent">' . __( 'Search:', 'twentytwenty' ) . '</span>',
        '&ldquo;' . get_search_query() . '&rdquo;'
    );

    if ( $wp_query->found_posts ) {
        $archive_subtitle = sprintf(
        /* translators: %s: Number of search results */
            _n(
                'We found %s result for your search.',
                'We found %s results for your search.',
                $wp_query->found_posts,
                'twentytwenty'
            ),
            number_format_i18n( $wp_query->found_posts )
        );
    } else {
        $archive_subtitle = __( 'We could not find any results for your search. You can give it another try through the search form below.', 'twentytwenty' );
    }
} elseif ( ! is_home() ) {
    $archive_title    = get_the_archive_title();
    $archive_subtitle = get_the_archive_description();
}

if ( $archive_title || $archive_subtitle ) {
    ?>

    <header class="archive-header has-text-align-center header-footer-group">

        <div class="archive-header-inner section-inner medium">

            <?php if ( $archive_title ) { ?>
                <h1 class="archive-title"><?php echo wp_kses_post( $archive_title ); ?></h1>
            <?php } ?>

            <?php if ( $archive_subtitle ) { ?>
                <div class="archive-subtitle section-inner thin max-percentage intro-text"><?php echo wp_kses_post( wpautop( $archive_subtitle ) ); ?></div>
            <?php } ?>

        </div><!-- .archive-header-inner -->

    </header><!-- .archive-header -->

    <?php
}?>

<!--start of code for displaying search results as cards-->
<!--. container-->
    <div class="container">
        <div class="row justify-content-between">
            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) :
                    the_post();?>
                    <?php
                    $image = get_field('objs-image');
                    $resourceImage = get_field('resource-image');
                    $adImage = get_field('ad-image');
                    $essayImage = get_field('essay-image');
                    $size = 'large'; // (thumbnail, medium, large, full or custom size)
                    $excerpt = get_field('excerpt');
                    ?>
                    <div class="card-deck col-md-4">
                        <a href="<?php echo get_the_permalink()?>">
                            <div class="card mb-3">
                                <?php if($image)?>
                                <img class="card-img-top" src="<?php echo $image?>">
                                <?php if($resourceImage)?>
                                <img class="card-img-top" src="<?php echo $resourceImage?>">
                                <?php if($adImage)?>
                                <img class="card-img-top" src="<?php echo $adImage?>">
                                <?php if($essayImage)?>
                                <img class="card-img-top" src="<?php echo $essayImage?>">
                                <div class="card-body">
                                    <h3 class="card-title"><?php the_title(); ?></h3>
                                    <p class="card-text"><?php echo $excerpt?></p>
                                    <!--                                        <a href="--><?php //echo get_the_permalink()?><!--">See More</a>-->
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            <?php else : ?>
            <?php endif; ?>
        </div>
    </div> <!-- .container --><!--end of code for displaying items as cards--> 



    <div class="no-search-results-form section-inner thin">

        <?php
        get_search_form(
            array(
                'label' => __( 'search again', 'twentytwenty' ),
            )
        );
        ?>

    </div><!-- .no-search-results -->

        <?php get_template_part( 'template-parts/pagination' ); ?>

    </main><!-- #site-content -->

<?php get_template_part( 'template-parts/footer-menus-widgets' ); ?>

<?php
get_footer();

