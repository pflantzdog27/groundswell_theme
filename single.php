<?php get_header(); ?>

<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        $postID = get_the_ID();
        $postType = get_field('blog_posts_post_type');
        $standardContent = get_field('blog_posts_standard_content');
        $standardContentAuthor = get_field('blog_posts_standard_author');
        $inspirationIntro = get_field('blog_posts_inspiration_intro');
        $inspirationOutro = get_field('blog_posts_inspiration_outro');
        $inspirationAbout = get_field('blog_posts_inspiration_about');
        $inspirationContent = get_field('blog_posts_inspiration_content');
        $videoSrc = get_field('blog_posts_inspiration_video');
        $contentWYSIWYG = get_field('blog_posts_inspiration_wysiwyg');
        $videoObject = get_field('blog_posts_inspiration_video_object');
        $imageSrc = get_field('blog_posts_inspiration_image');?>

        <div id="<?php echo $postID ?>" class="single-post-page-wrapper">
            <?php include('section-layouts/'. $postType . '.php') ; ?>
        </div>

    <?php endwhile;
endif; ?>

<section class="content-section" style="background: #44aeea; color: #fff;">
    <div class="container">
        <h2 class="section-title">Campaigns</h2>
        <div class="parallax">
            <?php include('section-layouts/components/petitions-app-large.php');?>
        </div>
    </div>
</section>




<?php get_footer(); ?>

