<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

<!DOCTYPE html>
<html lang="en">

<!--header-->
    <?php

	get_template_part( 'template-parts/entry-header' );?>

<main class="entry-content container" id="resourcesContent">
        <div class="row">
            <?php
            $resourceTitle = get_field('resource-title');
            $resourceDescription = get_field('resource-description');
            $year = get_field('resource-year');
            $author = get_field('resource-author');
            $link = get_field('resource-link');
            ?>
            <div class="col-md">
                <h2><?php echo $resourceTitle?></h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md">
                <?php
                $image = get_field('resource-image');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                ?>
                <img class="img-fluid img-thumbnail mx-auto d-block" src="<?php echo $image?>" id="resourceImage">
            </div>
            <div class="col-md">
                <p id="resourceDesc"><?php echo $resourceDescription?></p>
                <table class="table table-striped table-sm" id="metadataTable">
                    <tbody>
                    <tr>
                        <th class="w-25 text-center" scope="row">Year</th>
                        <td><?php echo $year?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" scope="row">Author(s)</th>
                        <td><?php echo $author?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" scope="row">Access</th>
                        <td><?php echo "<a href='$link' target='_blank'>Find source here</a>"?></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
</main>


<div class="section-inner">
    <?php
    wp_link_pages(
        array(
            'before'      => '<nav class="post-nav-links bg-light-background" aria-label="' . esc_attr__( 'Page', 'twentytwenty' ) . '"><span class="label">' . __( 'Pages:', 'twentytwenty' ) . '</span>',
            'after'       => '</nav>',
            'link_before' => '<span class="page-number">',
            'link_after'  => '</span>',
        )
    );

    edit_post_link();

    // Single bottom post meta.
    twentytwenty_the_post_meta( get_the_ID(), 'single-bottom' );

    if ( is_single() ) {

        get_template_part( 'template-parts/entry-author-bio' );

    }
    ?>

</div><!-- .section-inner -->

<?php

if ( is_single() ) {

    get_template_part( 'template-parts/navigation' );

}
?>

</article><!-- .post -->
</html>