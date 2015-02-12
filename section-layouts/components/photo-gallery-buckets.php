<div id="photo-gallery" class="carousel slide">
    <?php if( have_rows('layout_section_full_width_photo_gallery') ): ?>
        <div class="col-xs-4">
            <?php while( have_rows('layout_section_full_width_photo_gallery') ): the_row(); ?>
                <?php //vars
                $photoGalleryID = get_sub_field('photo_gallery_id');
                $photoGalleryPoster = get_sub_field('photo_gallery_poster');
                $photoGalleryTitle = get_sub_field('photo_gallery_title');
                $photoGalleryImages = get_sub_field('photo_gallery_images');
                ?>
                <figure>
                    <a rel="<?php echo $photoGalleryID ?>" class="fancybox" href="<?php echo $photoGalleryPoster ?>"><img class="img-responsive" src="<?php echo $photoGalleryPoster ?>" alt=""/></a>
                    <figcaption>
                        <h3><?php echo $photoGalleryTitle ?></h3>
                    </figcaption>
                    <span class="photo-count">3 <i class="icon-pictures"></i></span>
                </figure>

                <?php if( $photoGalleryImages ): ?>
                    <div class="hidden">
                        <?php foreach( $photoGalleryImages as $image ): ?>
                            <a rel="<?php echo $photoGalleryID ?>" class="fancybox" href="<?php echo $image['url']; ?>" title="<?php echo $image['caption']; ?>"></a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        </div>
    <?php endif; ?>
</div>
