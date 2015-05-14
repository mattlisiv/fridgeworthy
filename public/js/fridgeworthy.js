$(document).ready(function() {
var isfirst=true;
	
// ======================================
// Sticky Header
// ======================================
$('.my-sticky-element').waypoint('sticky');
$(window).resize(function() {
	if(document.documentElement.scrollWidth<680){
		$(".mobile-nav").css("display","block");
		if(isfirst){
			window.scrollTo(0, 0);
			window.scrollTo(0, 1000);
			isfirst = false;
		}
	}
	else {
		$(".mobile-nav").css("display","none");
		isfirst = true;
	}
});

// ======================================
// Modal
// ======================================
$('.modal-popup').setupModal()
	

// ======================================
// Helper functions
// ======================================
// Get section or article by href
function getRelatedContent(el){
  return $($(el).attr('href'));
}
// Get link by section or article id
function getRelatedNavigation(el){
  return $('nav a[href=#'+$(el).attr('id')+']');
}


// ======================================
// smooth scroll to content
// ======================================
$('.scrollbtn').on('click',function(e){
  e.preventDefault();
  //testing break//console.log (getRelatedContent(this).offset());
  if (!getRelatedContent(this).offset()) {
	  document.location.href=this.href;
  }
  else {
    $('html,body').animate({scrollTop:getRelatedContent(this).offset().top - 120}, 500);
  }
});

// ======================================
// jump with offset
// ======================================
// The function actually applying the offset
function offsetAnchor() {
    if(location.hash.length !== 0) {
        window.scrollTo(window.scrollX, window.scrollY - 120);
    }
}

// This will capture hash changes while on the page
$(window).on("hashchange", function () {
    offsetAnchor();
});

// This is here so that when you enter the page with a hash,
// it can provide the offset in that case too. Having a timeout
// seems necessary to allow the browser to jump to the anchor first.
window.setTimeout(function() {
    offsetAnchor();
}, 1); // The delay of 1 is arbitrary


// ======================================
// toggle active button
// ======================================
var wpDefaults={
  context: window,
  continuous: true,
  enabled: true,
  horizontal: false,
  offset: 0,
  triggerOnce: false
};

$('section,article')
   .waypoint(function(direction) {
     // Highlight element when related content
     // is 10% percent from the bottom... 
     // remove if below
     getRelatedNavigation(this).toggleClass('active', direction === 'down');
   }, {
     offset: '50%' // 
   })
   .waypoint(function(direction) {
     // Highlight element when bottom of related content
     // is 100px from the top - remove if less
     // TODO - make function for this
     getRelatedNavigation(this).toggleClass('active', direction === 'up');
   }, {
     offset: function() {  return -$(this).height() + 350; }
   });
});

// ======================================
// cleanup active buttons upon exit
// ======================================
$( window ).unload(function() {
  return true;
});



