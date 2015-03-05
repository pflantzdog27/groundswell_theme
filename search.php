<?php get_header(); ?>


    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-8">
                    <h1>Blog Search Results for : <b><?php echo get_search_query(); ?></b></h1>
                </div>
            </div>
        </div>
    </header>
    <section id="blog" class="content-section">
        <div class="container">
			<?php if ( have_posts() ) { ?>
				<div class="section-template parallax three-column-section row">
					<?php while ( have_posts() ) : the_post();?>
						<div class="col-sm-4 blog-post" id="post-<?php the_ID();?>">
							<article>
								<span class="<?php the_field('blog_posts_post_type');?>"></span>
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
			<?php } else { ?>
				<div class="section-template parallax three-column-section row">
					<header style="text-align: center;">
                        <span class="icon-earth" style="display: block; font-size: 150px"></span>
						<h3>Sorry, your search hasn't returned with any results. </h3>
                        <p>Try searching using a different term by clicking the search icon (<span class="glyphicon glyphicon-search"></span>) in the top navigation bar.</p>
					</header>
				</div>
			<?php } ?>
        </div>
    </section>
<?php get_footer(); ?>