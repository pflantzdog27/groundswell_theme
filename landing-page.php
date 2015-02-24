
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
$introMessageChecker = get_field('landing_page_intro_message_checker');
$introSubTitle = get_field('landing_page_intro_sub_title');
$introHeroMessage = get_field('landing_page_hero_message');
$introYoutubeSrc = get_field('landing_page_intro_video_src');
$introContentChecker = get_field('landing_page_sub_intro_content_checker');
$introContent = get_field('landing_page_sub_intro_content');
?>

<?php if($introBackground != 'Video') { // test which layout to use
    include ('section-layouts/intro-non-video.php');
} else {
    include ('section-layouts/intro-video.php');
} ?>







<?php if( have_rows('section_builder') ): ?>
    <?php $i = 0; ?>

    <?php while( have_rows('section_builder') ): the_row(); ?>
        <?php
        // Sub Fields
        $sectionDividerCheck =  get_sub_field('section_divider');
        $sectionTitle = get_sub_field('layout_section_title');
        $sectionTextColor = get_sub_field('layout_section_text_color');
        $sectionBackground = get_sub_field('section_background');
        $sectionBackgroundColor = get_sub_field('section_background_color');
        $sectionBackgroundImage = get_sub_field('section_background_image');
        $sectionNumberCheck = get_sub_field('section_layout_number_check');
        $sectionNumber = get_sub_field('section_layout_number');
        $sectionNumberColor = get_sub_field('section_layout_number_color');
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
        $fullBlockStaffWidget = get_sub_field('layout_section_full_width_team_widget');
        $fullBlockPhotoGallery = get_sub_field('layout_section_full_width_photo_gallery');
        $fullBlockRowOfBlocks = get_sub_field('layout_section_full_width_blocks_per_row');
        $fullBlockRowOfBlocksContent = get_sub_field('layout_section_full_width_content_of_blocks');
        $fullBlockTextBlockContent = get_sub_field('layout_section_text_block_content');
        $fullBlockTextBlockActionText = get_sub_field('layout_section_text_block_action_text');
        $fullBlockTextBlockActionLink = get_sub_field('layout_section_text_block_action_link');
        $expandableTabs = get_sub_field('layout_section_expandable_tabs');
        $expandableTabsContent = get_sub_field('layout_section_expandable_tabs_content');
        ?>

        <section id="section-<?php echo $i; ?>" class="<?php echo ($sectionBackground == 'Image' ? 'coverBG' : false);?> <?php echo ($sectionDividerCheck ? 'section-breaker' : 'content-section');?>" style="<?php echo ($sectionBackground == 'Image' ? 'background-image:url('.$sectionBackgroundImage.');' :'background:'. $sectionBackgroundColor.';');?> color: <?php echo $sectionTextColor; ?>">
            <?php if($sectionNumberCheck) : ?>
                <aside class="section-number hidden-xs hidden-sm">
                    <span style="color:<?php echo ($sectionNumberColor == 'Dark' ? 'rgba(0,0,0,0.1)' : 'rgba(255,255,255,0.2)');?>"><?php echo $sectionNumber; ?></span>
                </aside>
            <?php endif; ?>
            <div class="container">
                <?php include ('section-layouts/'.$layout.'.php'); // get the layout specified ?>
            </div>
        </section>

        <?php $i++; ?>
    <?php endwhile; ?>
<?php endif; /* END Section Builder */ ?>


<?php endwhile; endif; // END primary if/while statements ?>



<?php get_footer(); ?>

