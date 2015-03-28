<div class="section-template row">
    <?php if( $sectionDividerCheck && $sectionTitle ) : ?>
            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
    <?php endif; /* END section title */ ?>
    <div class="section-left-column col-sm-6">
        <?php if(!$sectionDividerCheck && $sectionTitle) : ?>
            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
        <?php endif; /* END section title */ ?>
        <?php include('components/left-half.php'); ?>
    </div>
    <div class="section-right-column <?php echo (!$sectionDividerCheck && $rightBlock != 'Petition App' ? 'parallax' : false);?> col-sm-6" <?php echo ($rightBlock == 'Petition App' ? 'id="petition-wrap"' : false);?> <?php echo ($rightBlock ==
    'Email Signup' ? 'id="email-subscription"' : false);?>>
        <?php include('components/right-half.php'); ?>
    </div>
</div>