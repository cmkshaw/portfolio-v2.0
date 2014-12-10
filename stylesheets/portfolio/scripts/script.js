 $(document).ready(function() {


var $container = $('#container');


$('#container').imagesLoaded();




	   $('#container').isotope({
	  // options
	  itemSelector : '.item',
	  layoutMode : 'fitRows'
	});
		   $('#filters a').click(function(){
		  var selector = $(this).attr('data-filter');
		  $container.isotope({ filter: selector });
		  return false;

			});

//http://stackoverflow.com/questions/2907367/have-a-div-cling-to-top-of-screen-if-scrolled-down-past-it
	var $window = $(window),
       $stickyEl = $('#topnav'),
       elTop = $stickyEl.offset().top;

   $window.scroll(function() {
        $stickyEl.toggleClass('sticky', $window.scrollTop() > elTop);



    });



 });