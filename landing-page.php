
<?php
/*
Template Name: Landing Page
*/
?>


<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post();?>
    <?php
        $introBackground = get_field('landing_page_intro_background');
        $introBackgroundImage = get_field('landing_page_intro_background_image');
        $introBackgroundColor = get_field('landing_page_intro_background_color');
    ?>
    <header class="first-level-intro" style="<?php echo ($introBackground == 'Image' ? 'background-image: url('.$introBackgroundImage.')' : 'background-color:'.$introBackgroundColor);?>">
        <div id="hero">
            <div class="container">
                <div class="jumbotron col-sm-12">
                    <hgroup>
                        <h1><?php the_title(); ?></h1>
                        <?php if(get_field('landing_page_intro_sub_title')) {?>
                            <h2><?php the_field('landing_page_intro_sub_title')?></h2>
                        <?php } ?>
                    </hgroup>
                </div>
            </div>
        </div>
    </header>
    <?php if(get_field('landing_page_intro_tester') == 'Yes') {?>
        <div id="sub-intro-section">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <?php the_field('landing_page_intro_text')?>
                    </div>
                </div>
            </div>
        </div>
    <?php }  ?>

    <?php if( have_rows('section_builder') ): ?>
        <?php while( have_rows('section_builder') ): the_row(); ?>

            <?php
                // Sub Fields
                $sectionTitle = get_sub_field('layout_section_title');
                $sectionTextColor = get_sub_field('layout_section_text_color');
                $sectionBackground = get_sub_field('section_background');
                $sectionBackgroundColor = get_sub_field('section_background_color');
                $sectionBackgroundImage = get_sub_field('section_background_image');
                $layout = get_sub_field('section_layout');
                    // Nine and Three Layout options // Two Halves Layout Options
                    $leftBlock = get_sub_field('layout_section_left');
                    $leftBlockContent = get_sub_field('layout_section_left_content');
                    $leftBlockActionButtonTest = get_sub_field('layout_section_left_action_button_checker');
                    $leftBlockActionButton = get_sub_field('layout_section_left_action_button');
                    $leftBlockActionLink = get_sub_field('layout_section_left_action_link');
                    $leftBlockImage = get_sub_field('layout_section_left_image');
                    $rightBlock = get_sub_field('layout_section_right');
                    $rightBlockContent = get_sub_field('layout_section_right_content');
                    $rightBlockActionButton = get_sub_field('layout_section_right_action_button');
                    $rightBlockActionLink = get_sub_field('layout_section_right_action_link');
                    $rightBlockImage = get_sub_field('layout_section_right_image');
                    // Full Width Layout Options
                    $fullBlock = get_sub_field('layout_section_full_width_block');
                    $fullBlockContent = get_sub_field('layout_section_full_width_content');
                    $fullBlockTextBlock = get_sub_field('layout_section_full_width_text_block');
                    $fullBlockCarouselItems = get_sub_field('layout_section_full_width_carousel');
                    $fullBlockCarouselID = get_sub_field('layout_section_full_width_carousel_id');
                    $fullBlockStaffWidget = get_sub_field('layout_section_full_width_staff_info_widget');
                    $fullBlockRowOfBlocks = get_sub_field('layout_section_full_width_blocks_per_row');
                    $fullBlockRowOfBlocksContent = get_sub_field('layout_section_full_width_content_of_blocks');
            ?>

            <section id="section-<?php the_ID();?>" class="content-section" style="<?php echo ($sectionBackground == 'Image' ? 'background:url('.$sectionBackgroundImage.');' : 'background:'. $sectionBackgroundColor.';');?> color: <?php echo $sectionTextColor; ?>">
                <div class="container">
                    <?php include ('section-layouts/'.$layout.'.php'); ?>
                </div>
            </section>

        <?php endwhile; ?>
    <?php endif; /* Section Builder */ ?>

    <section id="gallery" class="content-section" style="color:#fff; background: #44aeea;">
        <div class="container">
            <div class="section-template parallax single-column-section row">
                <h2 class="section-title col-sm-12">Photo Gallery</h2>
                <div class="col-sm-12">
                    <?php include('partials/photoGallery-buckets.php');?>
                </div>
            </div>
        </div>
    </section>


    <aside class="section-breaker" style="background: #ea5a3a;">
        <div class="container">
            <div class="row">
                <header class="col-sm-12">
                    <h2>Let's make faith-rooted change together. <a href="#">Talk to Us</a></h2>
                </header>
            </div>
        </div>
    </aside>


<?php endwhile; endif; /*main condition to check if content exist*/ ?>



<?php get_footer(); ?>

