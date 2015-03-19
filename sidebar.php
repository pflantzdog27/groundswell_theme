<?php if ( is_active_sidebar( 'sidebar_blog_single' ) ) : ?>
    <aside class="col-sm-3 col-xs-12" id="right-sidebar">
        <?php  $post_ID = $wp_query->posts[0]->ID;
        $all_cats_of_post = get_the_category($post_ID);
        for($i = 0; $i < sizeof($all_cats_of_post); $i++) { ?>
            <div class="sidebar-widget">
                <ul>
                    <?php global $post; $cat_posts = get_posts('numberposts=4&exclude='.$post_ID.'&category='.$all_cats_of_post[$i]->cat_ID);
                    if($cat_posts) { ?>
                        <h2 class="widget-title">Related Posts</h2>
                    <?php }
                    foreach($cat_posts as $post) : ?>
                        <li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        <?php } ?>
        <?php dynamic_sidebar( 'sidebar_blog_single' ); //WIDGETS ?>
    </aside>
<?php endif; ?>

