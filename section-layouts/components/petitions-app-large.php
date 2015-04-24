<div id="petition-content">
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


