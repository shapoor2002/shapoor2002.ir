jQuery(function($) {
    $("#munk-burger").click(function() {
        $(".navbar").slideToggle("800", function() {});
		var site_header_height = $('.munk-header').height();
		$('.layout-one .navbar').css('top', site_header_height);
		$('.layout-one .navbar, .layout-two .navbar').css('left', 0);
    });
});

jQuery(function($) {
    $(".munk-header-elements .search-trigger").click(function() {
        $(".munk-header-search-form").slideToggle("fast", function() {});
		$('.munk-header-elements .search-trigger .icon-search').toggleClass('active');
    });
});