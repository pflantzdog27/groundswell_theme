<?php if( $fullBlockCarouselItems ): /* If items exist carousel has items */ ?>
    <div id="<?php echo $fullBlockCarouselID; ?>" class="carousel slide">
        <div class="carousel-inner" role="listbox">
            <?php
            $i = 0;
            $len = count($fullBlockCarouselItems);
            ?>
            <?php foreach( $fullBlockCarouselItems as $post): // variable must be called $post (IMPORTANT) ?>
                <?php setup_postdata($post); ?>
                <?php if($i == 0 || $i == 4 || $i == 8 || $i == 12 || $i == 16 || $i == 20) { // if the item is a multiple of 4 or zero start a new slide?>
                    <div class="item <?php echo ($i == 0 ? 'active' : '');?>">
                <?php }?>

                    <?php if(get_field('partner_logo')) { ?>
                        <figure class="col-xs-6 col-sm-3 partner-figure">
                            <a target="_blank" href="<?php the_field('partner_link'); ?>"><img class="img-responsive" src="<?php the_field('partner_logo'); ?>" alt="<?php the_title(); ?>"></a>
                        </figure>
                    <?php } else { ?>
                        <div class="col-sm-4 blog-post" id="post-<?php the_ID();?>">
                            <article>
                                <figure>
                                    <a href="<?php the_permalink();?>">
                                        <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                            the_post_thumbnail('blog');
                                        }?>
                                        <figcaption>
                                            <h3><?php the_title();?></h3>
                                        </figcaption>
                                    </a>
                                </figure>
                            </article>
                        </div>
                    <?php }?>


                <?php if($i == 3 || $i == 7 || $i == 11 || $i == 15 || $i == 19 || $i == 23 || $i == $len - 1) { // end the new slide (4 items per slide) ?>
                    </div>
                <?php } ?>
                <?php $i++;?>
            <?php endforeach; ?>
        </div>
        <?php if($len > 4) : ?>
            <ol class="carousel-indicators">
                <?php for ($c = 0; $c < $len /4; $c++) { ?>
                    <li class="<?php echo ($c == 0 ? 'active' : '');?>" data-target="#<?php echo $fullBlockCarouselID; ?>" data-slide-to="<?php echo $c; ?>"></li>
                <?php } ?>
            </ol>
            <a class="left carousel-control" href="#<?php echo $fullBlockCarouselID; ?>" role="button" data-slide="prev">
                <span class="icon-arrow-left"></span>
                <i class="sr-only">Previous</i>
            </a>
            <a class="right carousel-control" href="#<?php echo $fullBlockCarouselID; ?>" role="button" data-slide="next">
                <span class="icon-arrow-right"></span>
                <i class="sr-only">Next</i>
            </a>
        <?php endif; ?>
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; /* END carousel items  */ ?>