<?php if ( is_active_sidebar( 'sidebar_blog_single' ) ) : ?>
    <aside class="col-sm-3 col-xs-12" id="right-sidebar">
        <?php  $post_ID = $wp_query->posts[0]->ID;
        $all_cats_of_post = get_the_category($post_ID);
        for($i = 0; $i < sizeof($all_cats_of_post); $i++) { ?>
            <div class="sidebar-widget">
                <h2 class="widget-title">Related<?php //echo $all_cats_of_post[$i]->cat_name; ?> Posts</h2>
                <ul>
                    <?php global $post; $cat_posts = get_posts('numberposts=4&exclude='.$post_ID.'&category='.$all_cats_of_post[$i]->cat_ID); foreach($cat_posts as $post) : ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php } ?>
        <?php dynamic_sidebar( 'sidebar_blog_single' ); //WIDGETS ?>
    </aside>
<?php endif; ?>


<?php if ( is_active_sidebar( 'sidebar_inspiration_single' ) ) : ?>
    <div class="recent-article-sidebar col-sm-3">
        <?php dynamic_sidebar( 'sidebar_inspiration_single' ); //WIDGETS ?>
    </div>
<?php endif; ?>
