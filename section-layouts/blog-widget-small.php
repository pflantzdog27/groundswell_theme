<div class="row" style="margin-bottom: 25px;">
    <div class="col-sm-6">
        <p>If you like this post <strong><a href="#">Subscribe</a></strong>, <strong><a href="#">Donate</a></strong> or read another below:</p>
    </div>
    <div class="select-menu col-sm-6 col-md-5 col-xs-12 pull-right">
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
</div>
<div class="section-template parallax three-column-section row" id="blog-post-index">
    <script id="blog-post-template" type="text/html">
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
            </article>
        </div>
        {{/.}}
    </script><!-- template end -->
</div>

<aside class="section-breaker" style="background: #fff;">
    <div class="container">
        <div class="row">
            <header class="col-sm-12">
                <button id="load-posts" class="btn gs-btn-orange col-sm-offset-3 col-sm-6">Load More Posts</button>
            </header>
        </div>
    </div>
</aside>