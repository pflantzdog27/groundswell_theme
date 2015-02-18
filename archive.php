<?php get_header(); ?>


<?php if ( have_posts() ) : ?>

    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-4 col-xs-12">
                    <h1>Tag/Archive</h1>
                </div>
            </div>
        </div>
    </header>
    <section id="blog" class="content-section">
        <div class="container">
            <div class="section-template parallax three-column-section row" id="blog-post-index">
                <?php while ( have_posts() ) : the_post();?>
                    <div class="col-sm-4 blog-post" id="post-<?php the_ID();?>">
                        <article>
                            <span class="<?php the_field('blog_posts_post_type');?>"></span>
                            <figure>
                                <a href="<?php the_permalink();?>">
                                    <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                        the_post_thumbnail();
                                    } ?>
                                    <figcaption>
                                        <h3><?php the_title();?></h3>
                                    </figcaption>
                                </a>
                            </figure>
                            <p><?php the_field('blog_posts_excerpt');?></p>
                            <footer>
                                <?php  $posttags = get_the_tags();
                                if ($posttags) {
                                    foreach($posttags as $tag) {
                                        echo '<a href="' . get_site_url() .'/'. $tag->slug . '">' . $tag->name . '</a> | ';
                                    }
                                } ?>
                            </footer>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>

<?php endif; ?>

<?php get_footer(); ?>