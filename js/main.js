jQuery(document).ready(function($) {
		
	
  // fix typo
	var myArray = ["a", "A", "i", "I", "o", "O", "u", "U", "s", "S", "Z", "z", "V", "v", "by", "By", "ne", "Ne", 'ně', "do", "Do", "na", "Na", "od", "Od", "po", "Po", "za", "Za", "ze", "Ze", "no", "No", "co", "Co", "se", "Se", "ja", "Ja", "ty", "Ty", "on", "On", "mu", "Mu","my", "My", "vy", "Vy", "je", "Je", "ta", "Ta", "to", "To", "tu", "Tu", "ji", "Ji", "ale", "Ale", "nad", "Nad", "pod", "Pod", "bez", "Bez", "tak", "Tak", "že", "Že", "kde", "Kde", "Tak", "tak", "pro","Pro"];

    function avoidOrphans(){
	    for (var i=0,  total = myArray.length; i < total; i++) {
			// avoid single letter orpahns    	// 
	        var myArrayItem = (myArray[i]); 
	        $('p,._p').each(function() {
	            var text = jQuery(this).html();
	            $(this).html(text.replace(new RegExp(' '+myArrayItem+' ', 'g') , ' '+myArrayItem+'&nbsp;'));
	        });
	    }
    }

    // widont
    $('p,._p').each(function() {
         $(this).html($(this).html().replace(/\s([^\s<]+)\s*$/,'&nbsp;$1'));
    });
    
	avoidOrphans();
	
	// Select all links with hashes
	$('a[href*="#"]')
		// Remove links that don't actually link to anything
		.not('[href="#"]')
		.not('[href="#0"]')
		.click(function(event) {
		// On-page links
		if (
		  location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
		  && 
		  location.hostname == this.hostname
		) {
		  // Figure out element to scroll to
		  var target = $(this.hash);
		  target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
		  // Does a scroll target exist?
		  if (target.length) {
		    // Only prevent default if animation is actually gonna happen
		    event.preventDefault();
		    $('html, body').animate({
		      scrollTop: target.offset().top
		    }, 1000, function() {
		      // Callback after animation
		      // Must change focus!
		      var $target = $(target);
		      $target.focus();
		      if ($target.is(":focus")) { // Checking if the target was focused
		        return false;
		      } else {
		        $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
		        $target.focus(); // Set focus again
		      };
		    });
		  }
		}
	});
});
