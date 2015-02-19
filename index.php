<?php get_header(); ?>

    <header class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 col-md-4 col-xs-12">
                    <h1>Blog</h1>
                </div>

                <div class="select-menu col-sm-6 col-md-5 col-xs-12 pull-right">
                    <div class="select-box">
                        <h5>Topics <span> --- select --- </span> <b class="icon-arrow-down"></b></h5>
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
            </div>
        </div>
    </header>

    <section id="blog" class="content-section">
        <div class="container">
            <?php require_once('section-layouts/components/blog-widget.php'); ?>
        </div>
    </section>

    <aside class="section-breaker" id="load-more-posts" style="background: #fff;">
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
                <?php include('section-layouts/components/petitions-app-large.php');?>
            </div>
        </div>
    </section>




<?php get_footer(); ?>