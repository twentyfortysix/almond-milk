function removeClass(elementName, className){
  var items = Array.from(document.getElementsByClassName(elementName));

  items.forEach(item => {
    item.classList.remove(className);
  });

}

function revealSecret(el){
  var holder = el.parentNode.parentNode.parentNode
  var parent = el.parentNode.parentNode
  if(parent.classList.contains('exposed')){
    parent.classList.remove("exposed");
    holder.classList.remove("secret_exposed");
  }else{
    removeClass('treasure', 'exposed')
    removeClass('item', 'exposed')
    parent.classList.add("exposed");
    holder.classList.add("secret_exposed");

    // var id = el.getAttribute('data-hash')
    // if(typeof id !== 'undefined' || id !== null){
    // 	setTimeout(function(){
    // 		lenis.scrollTo('#'+id, {offset: -10})
    // 		sniffBreakpoints(anchors)
    // 	}
    // 	, 500)
    // }
  }
}
document.addEventListener('click', function (event) {
  // collapsible items
  if (event.target.matches('.expose')){;
    event.preventDefault();
    revealSecret(event.target)
    
  }
}, false);