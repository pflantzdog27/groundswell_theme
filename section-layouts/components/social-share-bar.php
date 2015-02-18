<div class="social-link-bar">
    <ul class="list-unstyled col-sm-8 col-sm-offset-2">
        <li class="facebook col-xs-4"><a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href),'facebook-share-dialog','width=626,height=436'); //_gaq.push(['_trackEvent', 'Facebook', // 'Facebook-Top Single Post Page', '<?php //the_title();?>']);return false;">
                <i class="icon-facebook"></i><span class="hidden-xs"> Share</span>
        </a></li>
        <li class="twitter col-xs-4"><a href="http://twitter.com/intent/tweet?url=&text=<?php the_title();?>&via=groundswell" target="_blank">
                <i class="icon-twitter"></i><span class="hidden-xs"> Tweet</span>
        </a></li>
        <li class="email col-xs-4"><a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink();?>">
                <i class="icon-mail"></i><span class="hidden-xs"> Email</span>
        </a></li>
    </ul>
    <div class="clearfix"></div>
</div>