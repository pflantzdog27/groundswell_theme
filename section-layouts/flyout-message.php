<aside class="container" id="slideDisplayWindow" data-switch="<?php echo ($flyoutMessage == true ? 'active' : false);?>">
    <div class="col-md-6 col-xs-12" style="background: rgba(<?php echo $flyoutBackground; ?>,0.9);">
        <span class="closePopup icon-cross"></span>
        <?php if($flyoutTitle) : ?>
            <header>
                <h3><?php echo $flyoutTitle; ?></h3>
            </header>
        <?php endif; ?>
        <article>
            <?php if($flyoutContent == 'blog_post') {
                $post_object = get_field('flyout_message_content_post_object');
                if( $post_object ):
                    $post = $post_object;
                    setup_postdata( $post ); ?>
                    <div class="blog-post col-sm-8 col-sm-offset-2">
                        <article>
                            <figure>
                                <a href="<?php the_permalink();?>">
                                    <?php if ( has_post_thumbnail() ) {
                                        the_post_thumbnail('blog');
                                    }?>
                                    <figcaption>
                                        <h3><?php the_title();?></h3>
                                    </figcaption>
                                </a>
                            </figure>
                        </article>
                    </div>
                    <?php wp_reset_postdata();  ?>
                <?php endif; ?>
           <?php } else { ?>
                <?php echo $flyoutContentWysiwyg; ?>
           <?php } ?>
        </article>
        <div class="clearfix"></div>
        <footer>
            <?php if($flyoutAction == 'facebook') { ?>
                <div class="btn gs-btn" style="background : #3b5998"><div class="fb-like" data-href="https://www.facebook.com/GroundswellMovement" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></div>
            <?php } ?>
            <?php if($flyoutAction == 'twitter') { ?>
                <button class="btn gs-btn" style="background : #eaeaea; padding: 8px 12px 2px;"><a class="twitter-follow-button" href="https://twitter.com/GroundswellMvmt" data-show-count="false" data-lang="en">Follow @GroundswellMvmt</a></button>
            <?php } ?>
            <?php if($flyoutAction == 'donate') { ?>
               <button class="btn gs-btn gs-btn-white"><a href="#"><span class="icon-earth"></span>Donate</a></button>
            <?php } ?>
            <?php if($flyoutAction == 'fb_twitter') { ?>
                <div class="btn gs-btn" style="background : #3b5998"><div class="fb-like" data-href="https://www.facebook.com/GroundswellMovement" data-layout="button" data-action="like" data-show-faces="true" data-share="false"></div></div>
                <button class="btn gs-btn" style="background : #eaeaea; padding: 8px 12px 2px;"><a class="twitter-follow-button" href="https://twitter.com/GroundswellMvmt" data-show-count="false" data-lang="en">Follow @GroundswellMvmt</a></button>
            <?php } ?>
            <?php if($flyoutAction == 'all_options') { ?>
                <div class="btn gs-btn" style="background : #3b5998"><div class="fb-like" data-href="https://www.facebook.com/GroundswellMovement" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
                <button class="btn gs-btn" style="background : #eaeaea; padding: 8px 12px 2px;"><a class="twitter-follow-button" href="https://twitter.com/GroundswellMvmt" data-show-count="true" data-lang="en">Follow @GroundswellMvmt</a></button>
                <button class="btn gs-btn gs-btn-white"><a href="#"><span class="icon-earth"></span>Donate</a></button>
            <?php } ?>
            <?php if($flyoutAction == 'custom') { ?>
                <button class="btn gs-btn gs-btn-white"><a href="<?php echo $flyoutActionLink; ?>" <?php echo ($flyoutActionLinkChecker == true ? 'target="_blank"' : false);?>><?php echo $flyoutActionText; ?></a></button>
            <?php } ?>
            <?php if($flyoutAction == 'custom_fb') { ?>
                <div class="btn gs-btn" style="background : #3b5998"><div class="fb-like" data-href="https://www.facebook.com/GroundswellMovement" data-layout="button_count" data-action="like" data-show-faces="false" data-share="false"></div></div>
                <button class="btn gs-btn gs-btn-white"><a href="<?php echo $flyoutActionLink; ?>" <?php echo ($flyoutActionLinkChecker == true ? 'target="_blank"' : false);?>><?php echo $flyoutActionText; ?></a></button>
            <?php } ?>
            <?php if($flyoutAction == 'custom_twitter') { ?>
                <button class="btn gs-btn" style="background : #eaeaea; padding: 8px 12px 2px;"><a class="twitter-follow-button" href="https://twitter.com/GroundswellMvmt" data-show-count="true" data-lang="en">Follow @GroundswellMvmt</a></button>
                <button class="btn gs-btn gs-btn-white"><a href="<?php echo $flyoutActionLink; ?>" <?php echo ($flyoutActionLinkChecker == true ? 'target="_blank"' : false);?>><?php echo $flyoutActionText; ?></a></button>
            <?php } ?>
            <?php if($flyoutAction == 'custom_donate') { ?>
                <button class="btn gs-btn gs-btn-white"><a href="#"><span class="icon-earth"></span>Donate</a></button>
                <button class="btn gs-btn gs-btn-white"><a href="<?php echo $flyoutActionLink; ?>" <?php echo ($flyoutActionLinkChecker == true ? 'target="_blank"' : false);?>><?php echo $flyoutActionText; ?></a></button>
            <?php } ?>
            <?php if($flyoutAction == 'custom_custom') { ?>
                <button class="btn gs-btn gs-btn-white"><a href="<?php echo $flyoutActionLink; ?>" <?php echo ($flyoutActionLinkChecker == true ? 'target="_blank"' : false);?>><?php echo $flyoutActionText; ?></a></button>
                <button class="btn gs-btn gs-btn-white"><a href="<?php echo $flyoutActionLinkTwo; ?>" <?php echo ($flyoutActionLinkCheckerTwo == true ? 'target="_blank"' : false);?>><?php echo $flyoutActionTextTwo; ?></a></button>
            <?php } ?>
        </footer>
    </div>
</aside>
