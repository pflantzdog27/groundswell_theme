<div class="section-template parallax single-column-section">
    <?php if($sectionTitle) : ?>
        <h2 class="section-title"><?php echo $sectionTitle; ?></h2>
    <?php endif; /* END section title */ ?>

    <?php if($fullBlock == 'Team Widget') : // ******* TEAM WIDGET ******* ?>
        <?php include('components/team-widget.php'); ?>
    <?php endif; /*  END team widget */ ?>


    <?php if($fullBlock == 'Curated Carousel') : // ****** CURATED CAROUSEL ***** ?>
        <?php include('components/curated-carousel.php'); ?>
    <?php endif; /*  END curated carousel*/ ?>


    <?php if($fullBlock == 'Text Block') :  // ***** TEXT BLOCK ****** ?>
        <h2><?php echo $fullBlockTextBlockContent;?></h2>
        <?php if($fullBlockTextBlockActionText) { ?>
            <button class="btn gs-btn gs-btn-blue"><a href="<?php echo $fullBlockTextBlockActionLink;?>"><?php echo $fullBlockTextBlockActionText;?></a></button>
        <?php } ?>
    <?php endif; /*  END text block*/ ?>

    <?php if($fullBlock == 'Content Block') :  // ***** CONTENT BLOCK ****** ?>
        <?php echo $fullBlockContent; ?>
    <?php endif; /*  END text block*/ ?>

    <?php if($fullBlock == 'Photo Gallery') : // ***** PHOTO GALLERY ****** ?>
        <?php include('components/photo-gallery-buckets.php'); ?>
    <?php endif; ?>

    <?php if($fullBlock == 'Blog Block') : // ***** BLOG POSTS ****** ?>
        <?php $blogCat = get_category($fullBlockBlogCat);?>
        <div id="single-row-blogs" data-start-cat="<?php echo $blogCat->slug;?>">
            <?php include('components/blog-widget.php'); ?>
            <button class="btn gs-btn gs-btn-orange"><a href="/blog">Read more of the latest on our blog</a></button>
        </div>
    <?php endif; ?>
    <?php if($fullBlock == 'Recent Campaigns') : // ***** RECENT CAMPAIGNS ****** ?>
        <?php include('components/petition-blocks.php'); ?>
    <?php endif; ?>

    <?php if($fullBlock == 'Expandable Tabs') : // ***** EXPANDABLE TABS ****** ?>
        <?php echo $expandableTabsContent;?>
        <?php include('components/expandable-tabs.php'); ?>
        <?php if($expandableTabsActionText != '') { ?>
            <button class="btn gs-btn gs-btn-orange top-corner-btn"><a href="<?php echo $expandableTabsActionLink; ?>"><?php echo $expandableTabsActionText ?></a></button>
        <?php } ?>
    <?php endif; ?>

</div>



