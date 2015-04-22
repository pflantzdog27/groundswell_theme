<?php get_header(); ?>


    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <h1>Search Results for : <b><?php echo get_search_query(); ?></b></h1>
                </div>
            </div>
        </div>
    </header>
    <section class="content-section">
        <div class="container">
			<?php if ( have_posts() ) { ?>
                <ul class="list-unstyled" id="search-results-display">
                    <?php while ( have_posts() ) : the_post();?>
                        <li><h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2></li>
                    <?php endwhile; ?>
                </ul>
				<nav style="text-align: center;">
					<?php wpbeginner_numeric_posts_nav(); ?>
				</nav>
			<?php } else { ?>
					<header style="text-align: center;">
                        <span class="icon-earth" style="display: block; font-size: 150px"></span>
						<h3>Sorry, your search hasn't returned with any results. </h3>
                        <p>Try searching using a different term by clicking the search icon (<span class="glyphicon glyphicon-search"></span>) in the top navigation bar.</p>
					</header>
			<?php } ?>
        </div>
    </section>
<?php get_footer(); ?>