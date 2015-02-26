<?php $carouselItems = get_field('repeater_field_name');
if($carouselItems): ?>
    <div id="full-width-slider" class="carousel slide">
        <div class="carousel-inner" role="listbox">
            <?php  $i = 0;
            $len = count($carouselItems); ?>
                <?php while ( have_rows('repeater_field_name') ) : the_row(); ?>
                    <div class="item <?php echo ($i == 0 ? 'active' : '');?>">
                        <figure>
                            <img src="img-responsive" src="{{}}" alt="{{}}">
                            <figcaption>
                                <p>When you get rid of ONE text overlay, they all go away until it is again expanded... <a href="#">READ MORE</a></p>
                            </figcaption>
                        </figure>
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
