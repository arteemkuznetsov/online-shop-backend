<li class="paginator__elem paginator__elem_next">
    <a href="<?php echo $active_tab ?>.php?<?php if ($active_tab == 'catalog') echo $uri_query ?>&page=<?php
    if ($current_page < $number_of_pages) :
        echo ++$current_page;
    else :
        echo $current_page;
    endif;
    ?>" class="paginator__link">Следующая страница</a>
</li>