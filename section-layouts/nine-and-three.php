<div class="section-template row">
    <div class="section-left-column col-sm-9">
        <?php if($sectionTitle) : // Title ?>
            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
        <?php endif;  ?>
        <article>
            <?php echo $leftBlockContent; ?>
        </article>
    </div>
    <div class="col-sm-3 section-right-column">
        <?php if($rightBlockImage) : // IMAGE ?>
            <img src="<?php echo $rightBlockImage;?>" class="img-responsive" alt="Image">
        <?php endif; /* END right block image */ ?>

        <?php if($rightBlock == 'Action Button') :  // ACTION BUTTON ?>
            <button class="btn gs-btn gs-btn-orange col-sm-10"><a href="<?php echo $rightBlockActionLink;?>"><?php echo $rightBlockActionButton;?></a></button>
        <?php endif;  ?>
    </div>
</div>

