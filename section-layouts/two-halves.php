<div class="section-template row">
    <div class="section-left-column col-sm-6">
        <?php if($sectionTitle) : ?>
            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
        <?php endif; /* END section title */ ?>
        <article>
            <?php echo $leftBlockContent; ?>
            <?php if($leftBlockActionButtonTest == 'Yes') { ?>
                <button class="btn gs-btn gs-btn-orange"><a href="<?php echo $leftBlockActionLink;?>"><?php echo $leftBlockActionButton;?></a></button>
            <?php } ?>
        </article>
    </div>
    <div class="section-right-column <?php echo (!$sectionDividerCheck ? 'parallax' : false);?> col-sm-6" <?php echo ($rightBlock == 'Petition App' ? 'id="petition-wrap"' : false);?> <?php echo ($rightBlock == 'Email Signup' ? 'id="email-subscription"' : false);?>>
        <?php if($rightBlock == 'Petition App') {
            include('petitions-app-small.php');
        } elseif($rightBlock == 'Content Field') { ?>
            <article>
                <?php echo $rightBlockContent; ?>
            </article>
        <?php } elseif($rightBlock == 'Email Signup') {
            include('email-input-form.php');
        } ?>
    </div>
</div>