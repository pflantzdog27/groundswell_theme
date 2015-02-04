<header class="first-level-intro" style="<?php echo ($introBackground ==  'Image' ? 'background-image: url('.$introBackgroundImage.')' : 'background-color:'.$introBackgroundColor);?>">
    <div id="hero">
        <div class="container">
            <?php if($introMessageChecker != 'Hero Message') {  // OVERLAY MESSAGE ?>
                <div class="jumbotron col-sm-12">
                    <hgroup>
                        <h1><?php the_title(); ?></h1>
                        <?php if($introMessageChecker == 'Page Title and Subtitle') { ?>
                            <h2><?php echo $introSubTitle; ?></h2>
                        <?php } ?>
                    </hgroup>
                </div>
            <?php } else { ?>
                <div class="jumbotron col-sm-12 col-md-9 col-lg-8">
                    <h1><?php echo $introHeroMessage; ?></h1>
                </div>
            <?php } ?>
        </div>
    </div>
</header>
<?php if($introContentChecker == 'Yes') { ?>
    <div id="sub-intro-section">
        <div class="container">
            <div class="row">
                <?php echo  $introContent; ?>
            </div>
        </div>
    </div>
<?php } ?>