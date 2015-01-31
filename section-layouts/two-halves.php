<div class="section-template row">
    <div class="section-left-column col-sm-6">
        <?php if($sectionTitle) : ?>
            <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
        <?php endif; /* END section title */ ?>
        <article>
            <?php echo $leftBlockContent; ?>
        </article>
    </div>
    <div class="section-right-column parallax col-sm-6">
        <article>
            <?php echo $rightBlockContent; ?>
        </article>
    </div>
</div>