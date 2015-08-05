jQuery(document).ready(function () {
  jQuery('[data-toggle="offcanvas"]').click(function () {
    jQuery('.row-offcanvas').toggleClass('active')
  });
});

jQuery('.tree-toggle').click(function () {
    jQuery('.nav .tree').hide();
	jQuery(this).parent().children('ul.tree').toggle(100);
});

(function(jQuery){
	jQuery(document).ready(function(){
		jQuery('ul.dropdown-menu [data-toggle=dropdown]').on('click', function(event) {
			event.preventDefault(); 
			event.stopPropagation(); 
			jQuery(this).parent().siblings().removeClass('open');
			jQuery(this).parent().toggleClass('open');
		});
	});
})(jQuery);

jQuery(function(){
    jQuery('.dropdowns').hover(function() {
         jQuery(this).toggleClass('open');
    });
});