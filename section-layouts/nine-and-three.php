<div class="section-template row">
    <div class="section-left-column col-sm-9">
        <?php if($sectionTitle) : ?>
            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
        <?php endif; /* END section title */ ?>
        <article>
            <?php echo $leftBlockContent; ?>
        </article>
    </div>
    <div class="col-sm-3">
        <?php if($rightBlockImage) : ?>
            <img src="<?php echo $rightBlockImage;?>" class="img-responsive" alt="Image">
        <?php endif; /* END right block image */ ?>


    </div>
</div>

