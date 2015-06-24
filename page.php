<?php get_header(); ?>

    <?php if (have_posts()) : while (have_posts()) : the_post();?>
        <?php $flyoutMessage = get_field('flyout_message_checker');?>
        <header class="page-header">
            <div class="container">
                <h1><?php the_title(); ?></h1>
            </div>
        </header>

        <section class="page-section">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>
        <?php if($flyoutMessage) :
             include('section-layouts/flyout-message.php');
        endif;
        endwhile;
    endif; ?>

<?php get_footer(); ?>