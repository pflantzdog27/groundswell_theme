<?php if($rightBlock == 'Petition App') {
    include('petitions-app-small.php');
} elseif($rightBlock == 'Content Field') { ?>
    <article>
        <?php echo $rightBlockContent; ?>
    </article>
<?php } elseif($rightBlock == 'Email Signup') {
    include('email-input-form.php');
} elseif($rightBlock == 'Social Buttons') { ?>
    <ul class="list-unstyled social-link-bar in-section-social">
        <li class="facebook col-xs-6"><a href="#"><i class="icon-facebook"></i><span class="hidden-xs"> Like Us</span></a></li>
        <li class="twitter col-xs-6"><a href="#"><i class="icon-twitter"></i><span class="hidden-xs"> Follow Us</span></a></li>
    </ul>
<?php } ?>