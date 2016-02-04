/*   
 * 
 *  Custom JS code
 *  Author: Xola Sikafungana
 *  
*/

//jQuery 
jQuery(document).ready(function(){
    
    //Menu system
    jQuery('<div class="menu-icon closed"><span>Menu</span></div>').insertBefore('.master-header .main-menu-wrap');
    
    jQuery('.master-header .menu-icon span').click(function(){
        jQuery('.master-header .menu-icon').toggleClass('closed open');
        jQuery('.master-header .main-menu').slideToggle();
        jQuery('.master-header .main-menu').toggleClass('closed open');
    });
});
