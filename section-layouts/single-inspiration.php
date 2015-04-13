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
                            <h4>Posted by <?php the_author_posts_link();?></h4>
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

                    <?php if($inspirationContent == 'Slideshow') :
                       include('components/inspiration-content-carousel.php');
                    endif; ?>
                    <?php echo $inspirationOutro ?>
                    <?php include('components/social-share-bar.php');?>
                </article>
                <footer>
                    <strong>Topics: </strong>
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
                        <strong>About: </strong><?php echo $inspirationAbout; ?><br>
                    <?php } ?>
                </footer>
            </div>

            <div id="inspiration-sidebar" class="col-md-3 hidden-sm hidden-xs">
                <?php dynamic_sidebar( 'sidebar_inspiration_single' ); //SIDEBAR WIDGETS ?>
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
                <i class="icon-facebook"></i><span class="hidden-xs"> Share</span>
            </a></li>
        <li class="twitter col-xs-4"><a href="http://twitter.com/intent/tweet?url=&text=<?php the_title();?>&via=groundswellmvmt" target="_blank">
                <i class="icon-twitter"></i><span class="hidden-xs"> Tweet</span>
            </a></li>
        <li class="email col-xs-4"><a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink();?>">
                <i class="icon-mail"></i><span class="hidden-xs"> Email</span>
            </a></li>
    </ul>
    <div class="clearfix"></div>
</div>