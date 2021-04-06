
<?php
/**
 * The default template for displaying content of postcard posts
 *
 * Used for both singular and index.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since 1.0.0
 */

?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">

	<?php

	get_template_part( 'template-parts/entry-header' );

	if ( ! is_search() ) {
		get_template_part( 'template-parts/featured-image' );

	}

	?>

	<div class="post-inner <?php echo is_page_template( 'templates/template-objs.php' ) ? '' : 'thin'; ?> ">

		<div class="entry-content">

			<?php
			if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
				the_excerpt();
			} else {
                $image = get_field('objs-image');
                $tNailOne = get_field('objs-thumbnail_1');
                $tNailTwo = get_field('objs-thumbnail_2');
                $tNailThree = get_field('objs-thumbnail_3');
                $size = 'thumbnail'; // (thumbnail, medium, large, full or custom size)
                ?>
                <img class="img-fluid img-thumbnail mx-auto d-block" src="<?php echo $image?>">
                <div class="row">
                    <script src="<?php echo get_stylesheet_directory_uri()?>/js/lightbox.js"></script>
                    <div class="col">
                        <img src="<?php echo $tNailOne?>" onclick="openLightbox();toSlide(1)" class="hover-shadow preview">
                    </div>
                    <div class="col">
                        <img src="<?php echo $tNailTwo?>" onclick="openLightbox();toSlide(2)" class="hover-shadow preview">
                    </div>
                    <div class="col">
                        <img src="<?php echo $tNailThree?>" onclick="openLightbox();toSlide(3)" class="hover-shadow preview">
                    </div>
                </div>

                <div id="Lightbox" class="modal">
                    <script src="<?php echo get_stylesheet_directory_uri()?>/js/lightbox.js"></script>
                    <span class="close pointer" onclick="closeLightbox()">&times;</span>
                    <div class="modal-content">
                        <div class="slide">
                            <img src="<?php echo $tNailOne?>" class="image-slide"/>
                        </div>
                        <div class="slide">
                            <img src="<?php echo $tNailTwo?>" class="image-slide"/>
                        </div>
                        <div class="slide">
                            <img src="<?php echo $tNailThree?>" class="image-slide"/>
                        </div>

                        <a class="previous" onclick="changeSlide(-1)">&#10094;</a>
                        <a class="next" onclick="changeSlide(1)">&#10095;</a>

                        <div class="dots">
                            <div class="col">
                                <img src="<?php echo $tNailOne?>" class="modal-preview hover-shadow" onclick="toSlide(1)">
                            </div>
                            <div class="col">
                                <img src="<?php echo $tNailTwo?>" class="modal-preview hover-shadow" onclick="toSlide(2)">
                            </div>
                            <div class="col">
                                <img src="<?php echo $tNailThree?>" class="modal-preview hover-shadow" onclick="toSlide(3)">
                            </div>
                        </div>
                    </div>
                </div>
                <?php the_content( __( 'Continue reading', 'twentytwenty' ) );
            }
			?>
            <?php
                $title = get_field('objs-title');
                $year = get_field('objs-year');
                $description = get_field('objs-description');
                $message = get_field('objs-message');
                $publisher = get_field('objs-publisher');
                $source = get_field('objs-source');
                $link = get_field('objs-link');
                ?>

            <table id="metadataTable" class="table table-striped table-sm">
                <tbody>
                    <tr>
                        <th class="w-25 text-center" scope="row">Title</th>
                        <td><?php echo $title?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" scope="row">Year</th>
                        <td><?php echo $year?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" scope="row">Description</th>
                        <td><?php echo $description?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" style="width: 30%" scope="row">Message</th>
                        <td><?php echo $message?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" scope="row">Publisher</th>
                        <td><?php echo $publisher?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" scope="row">Credit Line</th>
                        <td><?php echo $source?></td>
                    </tr>
                    <tr>
                        <th class="w-25 text-center" scope="row">Access</th>
                        <td><?php echo "<a href='$link' target='_blank'>Find source here</a>"?></td>
                    </tr>

                </tbody>
            </table>

		</div><!-- .entry-content -->
	</div><!-- .post-inner -->

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

</article><!-- .post -->

