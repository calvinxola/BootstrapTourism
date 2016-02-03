<?php

/*
 * 
 *
 * 
 */

?>

<aside class="page-sidebar">
    <?php 
    if (is_page_template('page-left-sidebar.php')) {
        if (!dynamic_sidebar('sidebar-left')) : endif; 
    }else{ 
        if (!dynamic_sidebar('sidebar-right')) : endif; 
    } 
    ?>
</aside>

