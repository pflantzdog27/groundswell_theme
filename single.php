<?php get_header(); ?>

    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post();

            $postType = get_field('blog_posts_post_type');
            $standardContent = get_field('blog_posts_standard_content');
            $inspirationIntro = get_field('blog_posts_inspiration_intro');
            $inspirationOutro = get_field('blog_posts_inspiration_outro');
            $inspirationContent = get_field('blog_posts_inspiration_content');
            $videoSrc = get_field('blog_posts_inspiration_video');
            include('section-layouts/'. $postType . '.php') ;

        endwhile;
    endif;?>

<section id="blog" class="content-section">
    <div class="container">
        <?php require_once('section-layouts/blog-widget-small.php'); ?>
    </div>
</section>

<section id="petition-wrap" class="content-section" style="background: #44aeea;">
    <div class="container">
        <div class="parallax">
            <?php include('section-layouts/components/petitions-app-large.php');?>
        </div>
    </div>
</section>




<?php get_footer(); ?>

