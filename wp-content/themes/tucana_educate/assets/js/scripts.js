jQuery(document).ready(function(){
   jQuery(".acc-arrow").click(function(){
        jQuery(this).toggleClass('minus');
        jQuery(this).toggleClass('plus');
    });
  
});

jQuery(document).ready(function() {	


  //Get all the LI from the #tabMenu UL
  jQuery('#tabMenu li').click(function(){
    
    //perform the actions when it's not selected
    if (!jQuery(this).hasClass('selected')) {    
           
	    //remove the selected class from all LI    
	    jQuery('#tabMenu li').removeClass('selected');
	    
	    //Reassign the LI
	    jQuery(this).addClass('selected');
	    
	    //Hide all the DIV in .boxBody
	    jQuery('.boxBody div.parent').slideUp('1500');
	    
	    //Look for the right DIV in boxBody according to the Navigation UL index, therefore, the arrangement is very important.
	    jQuery('.boxBody div.parent:eq(' + jQuery('#tabMenu > li').index(this) + ')').slideDown('1500');
	    
	 }
    
  }).mouseover(function() {

    //Add and remove class, Personally I dont think this is the right way to do it, anyone please suggest    
    jQuery(this).addClass('mouseover');
    jQuery(this).removeClass('mouseout');   
    
  }).mouseout(function() {
    
    //Add and remove class
    jQuery(this).addClass('mouseout');
    jQuery(this).removeClass('mouseover');    
    
  });

	//Mouseover with animate Effect for Category menu list
  jQuery('.boxBody #category li').click(function(){

    //Get the Anchor tag href under the LI
    window.location = jQuery(this).children().attr('href');
  }).mouseover(function() {

    //Change background color and animate the padding
    jQuery(this).css('backgroundColor','#888');
    jQuery(this).children().animate({paddingLeft:"20px"}, {queue:false, duration:300});
  }).mouseout(function() {
    
    //Change background color and animate the padding
    jQuery(this).css('backgroundColor','');
    jQuery(this).children().animate({paddingLeft:"0"}, {queue:false, duration:300});
  });  
	
	//Mouseover effect for Posts, Comments, Famous Posts and Random Posts menu list.
  jQuery('#.boxBody li').click(function(){
    window.location = jQuery(this).children().attr('href');
  }).mouseover(function() {
    jQuery(this).css('backgroundColor','#888');
  }).mouseout(function() {
    jQuery(this).css('backgroundColor','');
  });  	
	
});
