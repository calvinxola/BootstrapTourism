<div class="navigation">
    <span class="inner-wrap">
        <?php 
        echo paginate_links( 
                    array(
                        'next_text'          => __('>'),
                        'prev_text'          => __('<')
                    ) 
                );
        ?>
    </span>
</div>





