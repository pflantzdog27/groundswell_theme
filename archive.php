<?php get_header(); ?>


<?php if ( have_posts() ) : ?>

    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <?php if(is_category()) :
                        $category = get_the_category(); ?>
                        <h1>Topic : <b><?php single_cat_title(); ?></b></h1>
                    <?php endif ?>
                    <?php if(single_month_title()) :?>
                        <h1>Month : <b><?php single_month_title(' '); ?></b></h1>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </header>
    <section id="blog" class="content-section">
        <div class="container">
            <div class="section-template parallax three-column-section row">
                <?php while ( have_posts() ) : the_post();?>
                    <div class="col-sm-4 blog-post" id="post-<?php the_ID();?>">
                        <article>
                            <figure>
                                <a href="<?php the_permalink();?>">
                                    <?php if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                        the_post_thumbnail('blog');
                                    }?>
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