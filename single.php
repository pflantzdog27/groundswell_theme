



<?php get_header(); ?>
    <?php if ( have_posts() ) :
        while ( have_posts() ) : the_post(); ?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-1 hidden-xs" id="social-navigation">
                        <div class="social-link-column">
                            <ul class="list-unstyled">
                                <li class="facebook"><a href="#"><i class="icon-facebook"></i></a></li>
                                <li class="twitter"><a href="#"><i class="icon-twitter"></i></a></li>
                                <li class="email"><a href="#"><i class="icon-mail"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-8 col-sm-offset-0" id="blog-left-column">
                        <header class="single-post-header">
                            <h1><?php the_title(); ?></h1>
                        </header>
                        <div class="visible-xs">
                            <?php include('partials/social-share-bar.php');?>
                        </div>
                        <section id="blog-block">
                            <div class="author-info">
                                <figure>
                                    <?php echo get_avatar( $post->post_author, 50 ); ?>
                                </figure>
                                <div class="author-name">
                                    <h4><?php the_author();?></h4>
                                    <b><?php the_date();?></b>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <article class="blog-post-full">
                                <?php the_field('blog_posts_standard_content');?>
                            </article>
                        </section>
                    </div>
                    <?php get_sidebar();?>
                </div>
            </div>
        <?php endwhile; ?>
    <?php endif;?>

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

