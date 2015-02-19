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

                    <?php // partners template ?>
                    <figure class="col-xs-6 col-sm-3 partner-figure">
                        <a target="_blank" href="<?php the_field('partner_link'); ?>"><img class="img-responsive" src="<?php the_field('partner_logo'); ?>" alt="<?php the_title(); ?>"></a>
                    </figure>

                <?php if($i == 3 || $i == 7 || $i == 11 || $i == 15 || $i == 19 || $i == 23 || $i == $len - 1) { // end the new slide (4 items per slide) ?>
                    </div>
                <?php } ?>
                <?php $i++;?>
            <?php endforeach; ?>
        </div>
        <?php // carousel controls ?>
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
    </div>
    <?php wp_reset_postdata(); ?>
<?php endif; /* END carousel items  */ ?>