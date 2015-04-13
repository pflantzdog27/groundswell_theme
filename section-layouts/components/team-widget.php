<div id="team-graphic" class="col-sm-12">
    <?php if( have_rows('layout_section_full_width_team_widget') ): /* Check if the widget has entries */?>
        <ul class="list-unstyled clearfix">
            <?php while( have_rows('layout_section_full_width_team_widget') ): the_row(); ?>
                <?php //Vars
                $stafferSelection = get_sub_field('team_widget_team_member');
                $user_info = get_userdata($stafferSelection['ID']);
                ?>
                <li>
                    <header>
                        <img src="<?php echo get_avatar_url(get_avatar( $stafferSelection['ID'], 300 )); ?>" alt="<?php echo $stafferSelection['user_firstname'];?> <?php echo $stafferSelection['user_lastname'];?>" class="img-responsive">
                        <h4><?php echo $stafferSelection['user_firstname'];?> <?php echo $stafferSelection['user_lastname'];?></h4>
                    </header>
                    <article class="hidden">
                        <p><?php echo $stafferSelection['user_description'];?></p>
                        <footer>
                            <p>Connect with <?php echo $stafferSelection['user_firstname'];?>:
                                <a href="mailto:<?php echo $stafferSelection['user_email'];?>"><i class="icon-mail"></i></a>
                                <?php if($user_info->twitter) : ?><a href="https://twitter.com/<?php echo $user_info->twitter ?>" target="_blank"><i class="icon-twitter"></i></a><?php endif; ?>
                                <?php if($user_info->linkedin) : ?><a href="<?php echo $user_info->linkedin ?>" target="_blank"><i class="icon-linkedin"></i></a><?php endif; ?>
                            </p>
                        </footer>
                    </article>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; /* Widget entries */ ?>
</div>
<div id="team-member-bio" class="col-sm-12"></div>