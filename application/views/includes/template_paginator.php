<ul class="paginator catalog-page__paginator">
    <?php
    if ($number_of_pages > 0) :
        for ($i = 0; $i < $number_of_pages; $i++) :
            $practical_page = $i + 1; // фактическая страница. мы же не с нуля считаем, когда страницы видим?
            if ($practical_page != $current_page) : // нетекущая страница
                ?>
                <li class="paginator__elem">
                    <a href="<?php echo $active_tab ?>.php?<?php if ($active_tab == 'catalog') echo $uri_query ?>&page=<?php echo $practical_page ?>"
                       class="paginator__link">
                        <?php echo $practical_page ?>
                    </a>
                </li>
            <?php else : // текущая страница ?>
                <li class="paginator__elem paginator__elem_current">
                    <a href="<?php echo $active_tab ?>.php?<?php if ($active_tab == 'catalog') echo $uri_query ?>&page=<?php echo $current_page ?>"
                       class="paginator__link">
                        <?php echo $practical_page ?>
                    </a>
                </li>
            <?php endif;
        endfor; ?>
        <li class="paginator__elem paginator__elem_next">
            <a href="<?php echo $active_tab ?>.php?<?php if ($active_tab == 'catalog') echo $uri_query ?>&page=<?php
            if ($current_page < $number_of_pages) :
                echo ++$current_page;
            else :
                echo $current_page;
            endif;
            ?>" class="paginator__link">Следующая страница</a>
        </li>
    <?php
    endif; ?>
</ul>