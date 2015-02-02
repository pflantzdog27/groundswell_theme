<div class="section-template parallax single-column-section row">
    <?php if($sectionTitle) : ?>
        <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
    <?php endif; /* END section title */ ?>

    <!-- STAFF WIDGET -->
    <?php if($fullBlock == 'Staff Info Widget') : ?>
        <div id="team-graphic" class="col-sm-12">
            <?php if( have_rows('layout_section_full_width_staff_info_widget') ): /* Check if the widget has entries */?>
                <ul class="list-unstyled clearfix">
                    <?php while( have_rows('layout_section_full_width_staff_info_widget') ): the_row(); ?>
                        <?php //Vars
                            $stafferSelection = get_sub_field('staff_info_widget_staffer');
                            $user_info = get_userdata($stafferSelection['ID']);
                        ?>
                        <li>
                            <header>
                                <img src="<?php echo get_avatar_url(get_avatar( $stafferSelection['ID'], 300 )); ?>" alt="<?php echo $stafferSelection['user_firstname'];?> <?php echo $stafferSelection['user_lastname'];?>" class="img-responsive">
                                <h4><?php echo $stafferSelection['user_firstname'];?> <?php echo $stafferSelection['user_lastname'];?></h4>
                            </header>
                            <article class="hidden">
                                <p><b><?php echo $stafferSelection['user_firstname'];?> <?php echo $stafferSelection['user_lastname'];?></b>, <i><?php echo $user_info->job_title ?></i>, <?php echo $stafferSelection['user_description'];?></p>
                                <footer>
                                    <p>Connect with <?php echo $stafferSelection['user_firstname'];?>:
                                        <a href="mailto:<?php echo $stafferSelection['user_email'];?>"><i class="icon-mail"></i></a>
                                        <a href="https://twitter.com/<?php echo $user_info->twitter ?>" target="_blank"><i class="icon-twitter"></i></a>
                                        <a href="<?php echo $user_info->linkedin ?>" target="_blank"><i class="icon-linkedin"></i></a>
                                    </p>
                                </footer>
                            </article>
                        </li>
                    <?php endwhile; ?>
                </ul>
            <?php endif; /* Widget entries */ ?>
        </div>
        <div id="team-member-bio" class="col-sm-12"></div>
    <?php endif; /*  END staff widget app*/ ?>
    <!-- END STAFF WIDGET -->

    <!-- CURATED CAROUSEL -->
    <?php if($fullBlock == 'Curated Carousel') : ?>
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

                                <!-- this layout "template" will only work for PARTNERS -->
                                <figure class="col-xs-6 col-sm-3 partner-figure">
                                    <a target="_blank" href="<?php the_field('partner_link'); ?>"><img class="img-responsive" src="<?php the_field('partner_logo'); ?>" alt="<?php the_title(); ?>"></a>
                                </figure>
                                <!-- end Partners -->

                            <?php if($i == 3 || $i == 7 || $i == 11 || $i == 15 || $i == 19 || $i == 23 || $i == $len - 1) { // end the new slide (4 items per slide) ?>
                                </div>
                            <?php } ?>
                        <?php $i++;?>
                    <?php endforeach; ?>
                </div>
                <!-- Controls -->
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
    <?php endif; /*  END curated carousel*/ ?>
    <!-- END CURATED CAROUSEL -->
</div>

