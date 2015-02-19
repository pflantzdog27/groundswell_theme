<div class="section-template parallax three-column-section row" id="blog-post-index">
    <script id="blog-post-template" type="text/html">
        {{#.}}
        <div class="col-sm-4 blog-post" id="post-{{id}}">
            <article>
                <span class="{{postType}}"></span>
                <figure>
                    <a href="{{url}}">
                        <img class="img-responsive" src="{{image}}" alt="{{title}}">
                        <figcaption>
                            <h3>{{title}}</h3>
                        </figcaption>
                    </a>
                </figure>
                <p>{{excerpt}}</p>
                <footer>
                    <small>{{#tags}}<a href="<?php echo get_site_url(); ?>tag/{{tagUrl}}">{{tagName}}</a>  &nbsp;{{/tags}}</small><br>
                </footer>
            </article>
        </div>
        {{/.}}
    </script><!-- template end -->
</div>
