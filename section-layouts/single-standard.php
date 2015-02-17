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
        <div class="col-sm-8" id="blog-left-column">
            <header class="single-post-header">
                <h1><?php the_title(); ?></h1>
            </header>
            <div class="visible-xs">
                <?php include('components/social-share-bar.php');?>
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
                    <?php echo $standardContent; ?>
                </article>
            </section>
        </div>
        <?php get_sidebar();?>
    </div>
</div