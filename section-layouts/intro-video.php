<header id="intro-section-wrapper">
    <div id="intro-section">
        <video id="homepage-videoBG" class="video-js hidden-xs"
               poster="<?php bloginfo('template_url') ?>/images/training-bg.jpg"
               controls="false"
               preload="auto"
               autoplay="autoplay"
               muted="muted"
               data-setup='{ "techOrder": ["youtube"], "src": "<?php echo $introYoutubeSrc ;?>"}'>
            <p class="vjs-no-js">To view this video please enable JavaScript, and consider upgrading to a web browser that <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a></p>
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
            <span id="playback-control" class="icon-pause hidden-xs"></span>
        </div>

        <!-- get started button -->
        <button id="get-started"><a href="#"><span class="icon-arrow-down"></span></a></button>
    </div>

    <?php if($introContentChecker == 'Yes') { ?>
        <div id="sub-intro-section">
            <div class="container">
                <div class="row">
                    <?php echo  $introContent; ?>
                </div>
            </div>
        </div>
    <?php } ?>
</header>