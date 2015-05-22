<?php if($rightBlock == 'Petition App') {
    include('petitions-app-small.php');
} elseif($rightBlock == 'Content Field') { ?>
    <article>
        <?php echo $rightBlockContent; ?>
    </article>
<?php } elseif($rightBlock == 'Email Signup') {
    include('email-input-form.php');
} elseif($rightBlock == 'Social Buttons') { ?>
    <div class="in-section-social">
        <div class="btn gs-btn" style="background : #3b5998"><div class="fb-like" data-href="https://www.facebook.com/GroundswellMovement" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
        <button class="btn gs-btn" style="background : #eaeaea; padding: 8px 12px 2px;"><a class="twitter-follow-button" href="https://twitter.com/GroundswellMvmt" data-show-count="true" data-show-screen-name="false" data-lang="en">Follow @GroundswellMvmt</a></button>
    </div>
<?php } elseif ($rightBlock == 'Image') { ?>
<img class="img-responsive" src="<?php echo $rightBlockImage; ?>" alt="Image">
<?php } ?>