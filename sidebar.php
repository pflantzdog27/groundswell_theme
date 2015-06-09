<?php if ( is_active_sidebar( 'sidebar_blog_single' ) ) : ?>
    <aside class="col-sm-3 col-xs-12" id="right-sidebar">
        <?php dynamic_sidebar( 'sidebar_blog_single' ); //WIDGETS ?>

        <?php  $post_ID = $wp_query->posts[0]->ID;
        $all_cats_of_post = get_the_category($post_ID);
        for($i = 0; $i < sizeof($all_cats_of_post); $i++) { ?>
			<?php if($all_cats_of_post[$i]->cat_ID != 27 && $all_cats_of_post[$i]->cat_ID != 26 && $all_cats_of_post[$i]->cat_ID != 28 && 		$all_cats_of_post[$i]->cat_ID != 29 && $all_cats_of_post[$i]->cat_ID != 1) { ?>
				<?php global $post; $cat_posts = get_posts('numberposts=3&exclude='.$post_ID.'&category='.$all_cats_of_post[i]->cat_ID);
				if($cat_posts) { ?>
					<div class="sidebar-widget">
						<ul>
							<h2 class="widget-title">On <?php echo $all_cats_of_post[$i]->cat_name; ?></h2>
							<?php foreach($cat_posts as $post) : ?>
								<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
							<?php endforeach; ?>
						</ul>
					</div>
				<?php } ?>
			<?php } ?>	
        <?php } ?>
    </aside>
<?php endif; ?>

