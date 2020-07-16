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

	$(document).on('click', 'a', function(event) {
        // scroll to anchor
        if($(this).attr('href') != '#'){
          if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
            if (target.length) {
              $('html,body').animate({
                scrollTop: target.offset().top
              }, 1000);
              return false;
            }
          }
        }
    })

  // references opener
  $('.switch').click(function(event) {
    event.preventDefault();
    $(this).prev('.references').toggleClass('open')
    $(this).toggleClass('active')
  })
});
