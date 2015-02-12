<div class="section-template parallax single-column-section row">
    <?php if($sectionTitle) : ?>
        <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
    <?php endif; /* END section title */ ?>

    <?php if($fullBlock == 'Team Widget') : // ******* TEAM WIDGET ******* ?>
        <?php include('components/team-widget.php'); ?>
    <?php endif; /*  END team widget */ ?>


    <?php if($fullBlock == 'Curated Carousel') : // ****** CURATED CAROUSEL ***** ?>
        <?php include('components/photo-gallery-buckets.php'); ?>
    <?php endif; /*  END curated carousel*/ ?>


    <?php if($fullBlock == 'Text Block') :  // ***** TEXT BLOCK ****** ?>
        <h2><?php echo $fullBlockTextBlockContent;?></h2>
        <button class="btn gs-btn gs-btn-blue"><a href="<?php echo $fullBlockTextBlockActionLink;?>"><?php echo $fullBlockTextBlockActionText;?></a></button>
    <?php endif; /*  END text block*/ ?>

    <?php if($fullBlock == 'Content Block') :  // ***** CONTENT BLOCK ****** ?>
        <?php echo $fullBlockContent; ?>
    <?php endif; /*  END text block*/ ?>

    <?php if($fullBlock == 'Photo Gallery') : // ***** PHOTO GALLERY ****** ?>
        <?php include('components/photo-gallery-buckets.php'); ?>
    <?php endif; ?>

</div>

