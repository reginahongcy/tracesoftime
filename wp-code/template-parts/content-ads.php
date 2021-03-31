<!DOCTYPE html>
<html lang="en">

<!--header-->
<?php

get_template_part( 'template-parts/entry-header' );?>

<main class="entry-content container" id="resourcesContent">
    <div class="row">
        <?php
        $title = get_field('ad-title');
        $identifier = get_field('ad-identifier');
        $date = get_field('ad-date');
        $transcription = get_field('ad-transcription');
        $language = get_field('ad-language');
        $source = get_field('ad-source');
        $link = get_field('ad-link');
        ?>
        <div class="col-md">
            <h2><?php echo $title?></h2>
        </div>
        <div class="col-md">
            <h2>Transcription</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-md">
            <?php
            $image = get_field('ad-image');
            $size = 'full'; // (thumbnail, medium, large, full or custom size)
            ?>
            <img class="img-fluid img-thumbnail mx-auto d-block" src="<?php echo $image?>" id="resourceImage">
        </div>
        <div class="col-md">
            <p id="resourceDesc"><?php echo $transcription?></p>
        </div>
    </div>
    <div class="row">
            <table id="metadataTable" class="table table-striped table-sm">
                <tbody>
                <tr>
                    <th class="w-25 text-center" scope="row">Date (yyyy-mm-dd)</th>
                    <td><?php echo $date?></td>
                </tr>
                <tr>
                    <th class="w-25 text-center" scope="row">Language</th>
                    <td><?php echo $language?></td>
                </tr>
                <tr>
                    <th class="w-25 text-center" scope="row">Source</th>
                    <td><?php echo $source?></td>
                </tr>
                <tr>
                    <th class="w-25 text-center" scope="row">Access</th>
                    <td><?php echo "<a href='$link' target='_blank'>Find source here</a>"?></td>
                </tr>
                <tr>
                    <th class="w-25 text-center" scope="row">Credit Line</th>
                    <td><?php the_field('ad-credit_line'); ?></td>
                </tr>
                </tbody>
            </table>
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
