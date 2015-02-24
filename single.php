<?php get_header(); ?>

<?php if ( have_posts() ) :
    while ( have_posts() ) : the_post();
        $postID = get_the_ID();
        $postType = get_field('blog_posts_post_type');
        $standardContent = get_field('blog_posts_standard_content');
        $inspirationIntro = get_field('blog_posts_inspiration_intro');
        $inspirationOutro = get_field('blog_posts_inspiration_outro');
        $inspirationAbout = get_field('blog_posts_inspiration_about');
        $inspirationContent = get_field('blog_posts_inspiration_content');
        $videoSrc = get_field('blog_posts_inspiration_video');
        $videoObject = get_field('blog_posts_inspiration_video_object');
        $imageSrc = get_field('blog_posts_inspiration_image');?>

        <div id="<?php echo $postID ?>" class="single-post-page-wrapper">
            <?php include('section-layouts/'. $postType . '.php') ; ?>
        </div>

    <?php endwhile;
endif; ?>

<section id="blog" class="content-section">
    <div class="container">
        <div class="row" style="margin-bottom: 25px;">
            <div class="col-sm-6">
                <p>If you like this post <strong><a href="#">Subscribe</a></strong>, <strong><a href="#">Donate</a></strong> or read another below:</p>
            </div>
            <div class="select-menu col-sm-6 col-md-5 col-xs-12 pull-right">
                <div class="select-box">
                    <h5>Topics <span> --- select --- </span> <b class="icon-arrow-down"></b></h5>
                </div>
                <div class="select-options scroll-area">
                    <?php
                    $args = array(
                        'show_option_all'    => false,
                        'exclude'            => 1,
                        'title_li'           => null,
                    ); ?>
                    <ul class="list-unstyled">
                        <?php wp_list_categories( $args ); ?>
                    </ul>
                </div>
            </div>
        </div>
        <?php require_once('section-layouts/components/blog-widget-small.php'); ?>
    </div>
</section>

<aside class="section-breaker" id="load-more-posts" style="background: #fff;">
    <div class="container">
        <div class="row">
            <header class="col-sm-12">
                <button id="load-posts" class="btn gs-btn-orange col-sm-offset-3 col-sm-6">Load More Posts</button>
            </header>
        </div>
    </div>
</aside>

<section id="petition-wrap" class="content-section" style="background: #44aeea;">
    <div class="container">
        <div class="parallax">
            <?php include('section-layouts/components/petitions-app-large.php');?>
        </div>
    </div>
</section>




<?php get_footer(); ?>

