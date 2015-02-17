<header class="single-post-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1><?php the_title(); ?></h1>
            </div>
        </div>
    </div>
</header>

<section id="blog-video">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div class="author-info row">
                    <div class="post-intro col-sm-9">
                       <p><?php echo $inspirationIntro; ?></p>
                    </div>
                    <div class="author col-sm-3">
                        <figure>
                            <?php echo get_avatar( $post->post_author, 50 ); ?>
                        </figure>
                        <div class="author-name">
                            <h4><?php the_author(); ?></h4>
                        </div>
                    </div>
                </div>
                <article class="blog-post-full">
                    <?php include('components/social-share-bar.php');?>

                    <!-- video embed -->
                    <?php if($inspirationContent == 'Video') : ?>
                        <div class="embed-responsive embed-responsive-16by9" id="video-content">
                            <?php echo do_shortcode( '[video src="'. $videoSrc.'" width="1160" height="600"]' ); ?>`
                        </div>
                    <?php endif; ?>
                    <?php echo $inspirationOutro ?>
                    <?php include('components/social-share-bar.php');?>
                </article>
                <footer class="row">

                    <div class="col-sm-12">
                        <strong>Topics: </strong>
                        <?php  $posttags = get_the_tags();
                        if ($posttags) {
                            foreach($posttags as $tag) {
                                echo '<a href="' . get_site_url() .'/'. $tag->slug . '">' . $tag->name . '</a> | ';
                            }
                        }
                        ?><br>
                        <?php if($inspirationAbout) { ?>
                            <strong>About: </strong><?php echo $inspirationAbout; ?><br>
                        <?php } ?>
                    </div>
                </footer>
            </div>
        </div>
    </div>
</section>