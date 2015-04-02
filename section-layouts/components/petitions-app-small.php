<div id="petition-content">
    <header class="groundswell-campaigns row">
        <h3 class="col-xs-5">Campaigns</h3>
        <h5 id="cat-selector" class="col-xs-7"><span>Topics</span> <b class="icon-arrow-down"></b></h5>
        <ul id="cat-list" class="list-unstyled clearfix">
            <script id="categoryLayout" type="text/html">
                {{#.}}
                    <li data-value="categories/{{slug}}">{{category}}</li>
                {{/.}}
            </script>
        </ul>
    </header>
    <div id="petitions" class="petition-widget scroll-area">
        <script id="petitionsLayout" type="text/html">
            {{#.}}
                <div class="item row" id="petitionID-{{index}}">
                    <figure class="col-xs-12 col-sm-3">
                        <a href="{{url}}" target="_blank"><img class="img-responsive" src="{{image}}" alt="{{title}}"></a>
                        <figcaption class="progress">
                            <div class="progress-bar status-bar"  role="progressbar" aria-valuenow="{{ percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ percent }}%">
                                <p>&nbsp;</p>
                            </div>
                            <span><b>{{signatures}}</b> of {{goal}}</span>
                        </figcaption>
                    </figure>
                    <div class="col-xs-12 col-sm-9">
                        <h4><a href="{{url}}" target="_blank">{{title}}</a></h4>
                        <footer class="petition-meta-info">
                            <small>Created by: <b>{{creator}}</b></small>
                            <p><small><a href="{{url}}" target="_blank">Click to take action</a></small></p>
                        </footer>
                    </div>
                </div>
            {{/.}}
        </script>
    </div>
</div>
