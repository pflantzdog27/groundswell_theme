<div id="petitions" class="block-layout-petitions"></div>

<script id="petitionsLayout" type="text/html">
    <div class="row">
        {{#.}}
            <div class="col-sm-3 petition">
                <figure>
                    <img class="img-responsive" src="{{image}}" alt="{{title}}">
                    <figcaption class="progress">
                        <div class="progress-bar status-bar"  role="progressbar" aria-valuenow="{{ percent }}" aria-valuemin="0" aria-valuemax="100" style="width: {{ percent }}%">
                            <p>&nbsp;</p>
                        </div>
                        <span><b>{{signatures}}</b> of {{goal}}</span>
                    </figcaption>
                </figure>
                <h4>{{title}}</h4>
            </div>
        {{/.}}
    </div>
</script>