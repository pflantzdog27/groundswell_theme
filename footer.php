<?php // vars
    $footerLeftBlock = get_field('footer_left_block', 'option');
    $footerMiddleBlock = get_field('footer_middle_block', 'option');
    $footerRightBlock = get_field('footer_right_block', 'option');
    $footerCopyright = get_field('footer_copyright', 'option');
?>

<footer id="footer">
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-6" id="contact-info">
                <?php echo $footerLeftBlock; ?>
            </div>
            <div class="col-xs-6 col-sm-3" id="site-map">
                <?php echo $footerMiddleBlock; ?>
            </div>
            <div class="col-xs-6 col-sm-3" id="jump-buttons">
                <?php echo $footerRightBlock; ?>
            </div>
        </div>
        <div id="copyright">
            <?php echo $footerCopyright;?>
        </div>
    </div>
</footer>

<span id="back-top">
    <i class="icon-arrow-up"></i>
</span>

<script>window.twttr=(function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],t=window.twttr||{};if(d.getElementById(id))return;js=d.createElement(s);js.id=id;js.src="https://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);t._e=[];t.ready=function(f){t._e.push(f);};return t;}(document,"script","twitter-wjs"));</script>

<?php wp_footer(); ?>


</body>
</html>