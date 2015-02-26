<?php
$carouselItems = get_field('blog_posts_inpiration_slideshow');
$carouselType = get_field('blog_posts_inspiration_slideshow_type'); ?>
<?php if( have_rows('blog_posts_inpiration_slideshow') ): /* Check if the widget has entries */?>
    <div id="full-width-slider" class="carousel slide">
        <div class="carousel-inner" role="listbox">
            <?php  $i = 0;
            $len = count($carouselItems); ?>
                <?php while( have_rows('blog_posts_inpiration_slideshow') ): the_row(); ?>
                    <?php
                    $slideshowImage = get_sub_field('blog_posts_inpiration_slideshow_image');
                    $slideshowTweet = get_sub_field('blog_posts_inpiration_slideshow_tweet');
                    $slideshowCaption = get_sub_field('blog_posts_inpiration_slideshow_caption');
                    ?>

                        <div class="item <?php echo ($i == 0 ? 'active' : false);?>">
                            <?php if($carouselType == 'images') { ?>
                                <figure>
                                    <img class="img-responsive" src="<?php echo $slideshowImage; ?>" alt="Slideshow Image">
                                    <figcaption>
                                        <?php echo $slideshowCaption; ?>
                                    </figcaption>
                                </figure>
                            <?php } else { ?>
                                 <?php echo $slideshowTweet; ?>
                            <?php } ?>
                        </div>
                    <?php $i++;?>
                <?php endwhile; ?>
        </div>
        <?php if($len > 1) : ?>
            <ol class="carousel-indicators">
                <?php for ($c = 0; $c < $len; $c++) { ?>
                    <li class="<?php echo ($c == 0 ? 'active' : '');?>" data-target="#full-width-slider" data-slide-to="<?php echo $c; ?>"></li>
                <?php } ?>
            </ol>
            <a class="left carousel-control" href="#full-width-slider" role="button" data-slide="prev">
                <span class="icon-arrow-left"></span>
                <i class="sr-only">Previous</i>
            </a>
            <a class="right carousel-control" href="#full-width-slider" role="button" data-slide="next">
                <span class="icon-arrow-right"></span>
                <i class="sr-only">Next</i>
            </a>
        <?php endif; ?>
    </div>
<?php endif; ?>
