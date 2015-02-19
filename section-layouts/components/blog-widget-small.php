
<div class="section-template parallax three-column-section row" id="blog-post-index">
    <script id="blog-post-template" type="text/html">
        {{#.}}
        <div class="col-sm-4 blog-post">
            <article id="{{id}}">
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
