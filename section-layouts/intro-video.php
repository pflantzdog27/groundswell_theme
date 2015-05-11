<header id="intro-section-wrapper">
    <div id="intro-section" style="background:url(<?php bloginfo('template_url') ?>/images/training-bg.jpg)">
        <video id="homepage-videoBG" class="video-js hidden-xs hidden-sm"
               controls="false"
               preload="auto"
               autoplay="autoplay"
               poster="null"
               muted="muted"
               loop="true"
               data-setup='{ "techOrder": ["youtube"], "src": "<?php echo $introYoutubeSrc ;?>"}'>
            <img class="vjs-no-js" src="<?php bloginfo('template_url') ?>/images/training-bg.jpg">
        </video>

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
            <span id="playback-control" class="icon-pause hidden-xs hidden-sm intro-button"></span>
            <?php if($introVideoInfoChecker == 'yes') { ?>
                <button type="button" data-toggle="modal" data-target="#info-modal" id="video-info" class="intro-button hidden-xs hidden-sm"><span class="icon-info"></span></button>
                <!-- Modal -->
                <div class="modal fade" id="info-modal" tabindex="-1" role="dialog" aria-labelledby="video-info-modal" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <?php echo $introVideoInfo; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

        <!-- get started button -->
        <button id="get-started"><a href="#"><span class="icon-arrow-down"></span></a></button>
    </div>

    <?php if($introContentChecker == 'Yes') { ?>
        <div id="sub-intro-section">
            <div class="container">
                <div>
                    <?php echo  $introContent; ?>
                </div>
            </div>
        </div>
    <?php } ?>
</header>