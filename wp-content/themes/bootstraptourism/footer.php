<?php
/**
 *
 * 
 * 
 */
?>
    </section>
    
    <footer class="master-footer">
        <div class="site-footer">
            <?php if (!dynamic_sidebar('Site Footer')) :?><?php endif; ?>
        
        <div class="credits">
            <div class="copyright">
                <p>&copy; <?php the_time('Y'); ?> <?php echo get_bloginfo('name'); ?></p>
            </div>
            
            <div class="developer">
                <p>Developed by <a href="#">LightSpeed</a></p>
            </div>
        </div>
        </div>
    </footer>

    <?php wp_footer(); ?>
</body>
</html>