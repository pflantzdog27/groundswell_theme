<?php get_header(); ?>


<?php if ( have_posts() ) : ?>
    <?php $user_bio = get_the_author_meta('description'); ?>
    <?php $user_email = get_the_author_meta('user_email'); ?>
    <?php $user_twitter = get_the_author_meta('twitter'); ?>
    <?php $user_facebook = get_the_author_meta('facebook'); ?>
    <?php $user_linkedin = get_the_author_meta('linkedin'); ?>


    <header class="page-header">
        <div class="container">
            <div class="row" id="curator-info-block">
                <div class="col-md-2 col-xs-4">
                    <figure>
                        <?php echo get_avatar( $post->post_author, 165 ); ?>
                    </figure>
                </div>
                <div class="col-md-10 col-xs-8">
                    <h1><?php the_author(); ?></h1>
                    <div class="contact-curator">
                        <a href="mailto:<?php echo $user_email;?>"><i class="icon-mail"></i></a>
                        <?php if($user_twitter) : ?><a href="https://twitter.com/<?php echo $user_twitter ?>" target="_blank"><i class="icon-twitter"></i></a><?php endif; ?>
                        <?php if($user_facebook) : ?><a href="<?php echo $user_facebook ?>" target="_blank"><i class="icon-facebook"></i></a><?php endif; ?>
                        <?php if($user_linkedin) : ?><a href="<?php echo $user_linkedin ?>" target="_blank"><i class="icon-linkedin"></i></a><?php endif; ?>
                    </div>
                    <p><?php echo $user_bio; ?></p>
                </div>
            </div>
        </div>
    </header>

    <section id="blog" class="content-section">
        <div class="container">
            <h2 class="section-title">Posts by <?php the_author(); ?></h2>
            <div class="section-template parallax three-column-section row">
                <?php while ( have_posts() ) : the_post();?>
                    <div class="col-sm-4 blog-post" id="post-<?php the_ID();?>">
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
                <?php endwhile; ?>
            </div>

            <nav style="text-align: center;">
                <?php wpbeginner_numeric_posts_nav(); ?>
            </nav>

        </div>
    </section>

<?php endif; ?>

<?php get_footer(); ?>