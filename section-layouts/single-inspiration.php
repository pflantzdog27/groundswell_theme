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
                            <h4>Posted by: <b><?php the_author_posts_link();?></b></h4>
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
                    $separator = ' ';
                    $output = '';
                    if($categories){
                        foreach($categories as $category) {
                            $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s" ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
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