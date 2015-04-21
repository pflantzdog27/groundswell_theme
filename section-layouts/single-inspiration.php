<section id="blog-video">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-9">
                <header class="single-post-header">
                    <h1><?php the_title(); ?></h1>
                </header>
                <div class="author-info row">
                    <div class="post-intro col-sm-12">
                        <div class="author-name">
                            <h4>Posted by <?php echo ($standardContentAuthor ? $standardContentAuthor : the_author_posts_link());?></h4>
                        </div>
                       <p><?php echo $inspirationIntro; ?></p>
                    </div>
                </div>
                <article class="blog-post-full">
                    <?php include('components/social-share-bar.php');?>

                    <?php if($inspirationContent == 'Video') : ?>
                            <div class="embed-responsive embed-responsive-16by9" id="video-content">
                                <?php if(!$videoObject) { ?>
                                    <?php echo do_shortcode( '[video src="'. $videoSrc.'" width="960" height="540"]' ); ?>
                                <?php } else {
                                    echo $videoObject;
                                } ?>
                            </div>
                    <?php endif; ?>


                    <?php if($inspirationContent == 'Image') : ?>
                        <figure class="featured-image-content">
                            <img src="<?php echo $imageSrc; ?>" class="img-responsive">
                        </figure>
                    <?php endif; ?>

                    <?php if($inspirationContent == 'wysiwyg') : ?>
                        <?php echo $contentWYSIWYG ?>
                    <?php endif; ?>

                    <?php if($inspirationContent == 'Slideshow') :
                       include('components/inspiration-slideshow.php');
                    endif; ?>

                    <?php echo $inspirationOutro ?>
                    <?php include('components/social-share-bar.php');?>
                </article>
                <footer class="blog-meta-info">
                    <b>Topics: </b>
                    <?php
                    $categories = get_the_category();
                    $separator = ', ';
                    $output = '';
                    if($categories){
                        foreach($categories as $category) {
                            $output .= '<a style="text-decoration: underline" href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ),
                                    $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
                        }
                        echo trim($output, $separator);
                    }
                    ?><br>
                    <?php if($inspirationAbout) { ?>
                        <b>About: </b><?php echo $inspirationAbout; ?><br>
                    <?php } ?>
                </footer>
            </div>
            <!-- sidebar -->
            <div id="inspiration-sidebar" class="col-md-3 hidden-sm hidden-xs">
                <?php //dynamic_sidebar( 'sidebar_inspiration_single' ); //SIDEBAR WIDGETS ?>
                <?php  $post_ID = $wp_query->posts[0]->ID;
                $all_cats_of_post = get_the_category($post_ID);
                for($i = 0; $i < sizeof($all_cats_of_post); $i++) { ?>
                    <div class="sidebar-widget">
                        <ul>
                            <?php global $post; $cat_posts = get_posts('numberposts=3&exclude='.$post_ID.'&category='.$all_cats_of_post[$i]->cat_ID);
                            if($cat_posts) { ?>
                                <h2 class="widget-title">More Inspiration</h2>
                            <?php }
                            foreach($cat_posts as $post) : ?>
                                <div class="blog-post" id="post-<?php the_ID();?>">
                                    <article>
                                        <figure>
                                            <a href="<?php the_permalink();?>">
                                                <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                                    the_post_thumbnail('blog');
                                                } ?>
                                                <figcaption>
                                                    <h3><?php the_title();?></h3>
                                                </figcaption>
                                            </a>
                                        </figure>
                                    </article>
                                </div>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                <?php } ?>
            </div>

        </div>
    </div>
</section>

<section id="blog" class="content-section">
    <div class="container">
        <div class="row" style="margin-bottom: 25px;">
            <div class="col-sm-6">
                <p>If you like this post <a href="#">Subscribe</a>, <a href="#">Donate</a> or read another below:</p>
            </div>
            <div class="select-menu col-sm-6 col-md-5 col-xs-12 pull-right">
                <div class="select-box">
                    <h5>Topics <span> — select — </span> <b class="icon-arrow-down"></b></h5>
                </div>
                <div class="select-options scroll-area row">
                    <?php $blogList = get_field('blog_list_topics', 'option'); ?>
                    <?php echo $blogList; ?>
                </div>
            </div>
        </div>
        <?php require_once('components/blog-widget-small.php'); ?>
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

<div class="social-link-bar visible-xs" id="sticky-social-links">
    <ul class="list-unstyled col-sm-8 col-sm-offset-2">
        <li class="facebook col-xs-4"><a class="facebook-share" href="" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436')">
                <i class="icon-facebook"></i> Share
            </a></li>
        <li class="twitter col-xs-4"><a href="http://twitter.com/intent/tweet?url=&text=<?php the_title();?>&via=groundswellmvmt" target="_blank">
                <i class="icon-twitter"></i> Tweet
            </a></li>
        <li class="bottom-menu col-xs-4">
            <button type="button" class="navbar-toggle collapsed" id="hamburger-toggle" data-toggle="collapse" data-target="#primary-navigation">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar top"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </li>
    </ul>
    <div class="clearfix"></div>
</div>
