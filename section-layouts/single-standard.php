<div class="container">
    <div class="row">
        <div class="col-sm-1 hidden-xs" id="social-navigation">
            <div class="social-link-column">
                <ul class="list-unstyled">
                    <li class="facebook"><a href="#" class="facebook-share" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436')"><i class="icon-facebook"></i></a></li>
                    <li class="twitter"><a href="http://twitter.com/intent/tweet?url=&text=<?php the_title();?>&via=groundswellmvmt" target="_blank"><i class="icon-twitter"></i></a></li>
                    <li class="email"><a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink();?>"><i class="icon-mail"></i></a></li>
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
                    <div class="author-name">
                        <h4><b><?php the_author_posts_link();?></b>&nbsp; |<span><?php the_date();?></span></h4>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <article class="blog-post-full">
                    <?php echo $standardContent; ?>
                </article>
            </section>
        </div>
        <?php get_sidebar('sidebar_blog_single');?>
    </div>
</div