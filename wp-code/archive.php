<?php
get_header();
?>

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
                        <p>
                            <?php esc_html_e( 'Sorry, no posts matched your criteria.' ); ?>
                        </p>
                    <?php endif; ?>
                </div>
            </div> <!-- .container -->


<?php
get_footer();
?>