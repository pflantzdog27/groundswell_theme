<div id="petition-content">
    <header class="groundswell-campaigns">
        <h5 id="cat-selector" class="pull-right"><span>Topics</span> <b class="icon-arrow-down"></b></h5>
        <ul id="cat-list" class="list-unstyled clearfix">
            <script id="categoryLayout" type="text/html">
                {{#.}}
                <li data-value="categories/{{slug}}">{{category}}</li>
                {{/.}}
            </script>
        </ul>
    </header>
    <div id="petitions" class="block-layout-petitions scroll-area">
        <script id="petitionsLayout" type="text/html">
            <div class="row">
                {{#.}}
                <div class="col-sm-3 petition">
                    <figure>
                        <a href="{{url}}" target="_blank"><img class="img-responsive" src="{{image}}" alt="{{title}}"></a>
                        <figcaption class="progress">
                            <div class="progress-bar status-bar"  role="progressbar" aria-valuenow="{{ percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ percent }}%">
                                <p>&nbsp;</p>
                            </div>
                            <span><b>{{signatures}}</b> of {{goal}}</span>
                        </figcaption>
                    </figure>
                    <h4>{{title}}</h4>
                    <footer class="petition-meta-info">
                        <p style="color:#333;"><small><a href="{{url}}" target="_blank" style="color:#fff;">Click to take action</a></small></p>
                    </footer>
                </div>
                {{/.}}
            </div>
        </script>
    </div>
</div>


