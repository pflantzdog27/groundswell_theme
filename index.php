<?php get_header(); ?>

    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-4 col-xs-12">
                    <h1>Blog</h1>
                </div>

                <div class="select-menu col-sm-6 col-md-5 col-xs-12">
                    <div class="select-box">
                        <h5>Topics <span> ------ </span> <b class="icon-arrow-down"></b></h5>
                    </div>
                    <div class="select-options scroll-area">
                        <?php
                        $args = array(
                            'show_option_all'    => false,
                            'exclude'            => 1,
                            'title_li'           => null,
                        ); ?>
                        <ul class="list-unstyled">
                            <?php wp_list_categories( $args ); ?>
                        </ul>
                    </div>
                </div>
                <div class="search col-sm-3 col-xs-12">
                    <form method="get" role="search" action="<?php echo home_url( '/' ); ?>">
                        <div class="form-group col-sm-12">
                            <input type="text" class="form-control" value="" name="s" placeholder="Search">
                            <button type="submit" class="btn gs-btn gs-btn-blue"><span class="icon-arrow-right"></span></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </header>


    <!-- THIS SECTION SHOULD NOT USE A LOOP BUT RATHER A MUSTACHE TEMPLATE USING JSON API (http://localhost/groundswell/redesign_wordpress/api/get_category_posts/?category_slug=domestic-violence) -->
    <section id="blog" class="content-section">
        <div class="container">
            <div class="section-template parallax three-column-section row" id="blog-post-index">
                <script id="blog-post-long-template" type="text/html">
                    {{#.}}
                        <div class="col-sm-4 blog-post">
                            <article>
                                <figure>
                                    <a href="{{url}}">
                                        <img class="img-responsive" src="{{image}}" alt="{{title}}">
                                        <figcaption>
                                            <h3>{{title}}</h3>
                                        </figcaption>
                                    </a>
                                </figure>
                                <div class="author-info row">
                                    <figure class="col-sm-2">
                                        <img class="img-responsive" src="http://placehold.it/50x50" alt="Author Name">
                                    </figure>
                                    <div class="author-name">
                                        <h5>{{author}}</h5>
                                    </div>
                                </div>
                                <p>{{excerpt}}</p>
                                <footer>
                                    <small>{{#tags}}<a href="<?php echo get_site_url(); ?>{{tagUrl}}">{{tagName}}</a>  &nbsp;{{/tags}}</small><br>
                                </footer>
                            </article>
                        </div>
                    {{/.}}
                </script><!-- template end -->
            </div>
        </div>
    </section>

    <aside class="section-breaker" style="background: #fff;">
        <div class="container">
            <div class="row">
                <header class="col-sm-12">
                    <button id="load-posts" class="btn gs-btn-orange col-sm-offset-3 col-sm-6">Load More Posts</button>
                </header>
            </div>
        </div>
    </aside>

    <section id="petition-wrap" class="content-section" style="background: #44aeea;">
        <div class="container">
            <div class="parallax">
                <?php include('partials/petitions-app-large.php');?>
            </div>
        </div>
    </section>




<?php get_footer(); ?>