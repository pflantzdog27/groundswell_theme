<div class="faq">
    <?php if( have_rows('layout_section_expandable_tabs') ): /* Check if the widget has entries */?>
        <ul class="list-unstyled">
            <?php while( have_rows('layout_section_expandable_tabs') ): the_row(); ?>
                <?php //Vars
                $expandableTabsExposed = get_sub_field('layout_section_expandable_tabs_exposed');
                $expandableTabsHidden = get_sub_field('layout_section_expandable_tabs_hidden');
                ?>
                <li>
                    <span class="icon-plus"></span>
                    <p class="faq-question"><?php echo $expandableTabsExposed; ?></p>
                    <div class="faq-answer">
                        <?php echo $expandableTabsHidden; ?>
                    </div>
                </li>
            <?php endwhile; ?>
        </ul>
    <?php endif; ?>
</div>