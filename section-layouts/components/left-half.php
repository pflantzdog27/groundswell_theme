<?php if($leftBlock == 'Content Field') { ?>
    <article>
        <?php echo $leftBlockContent; ?>
        <?php if($leftBlockActionButtonTest == 'Yes') { ?>
            <button class="btn gs-btn gs-btn-orange"><a href="<?php echo $leftBlockActionLink;?>"><?php echo $leftBlockActionButton;?></a></button>
        <?php } ?>
    </article>
<?php } elseif ($leftBlock == 'Image') { ?>
    <img class="img-responsive" src="<?php echo $leftBlockImage; ?>" alt="Image">
<?php } elseif ($leftBlock == 'Email Signup') {
    include('email-input-form.php');
      } ?>

