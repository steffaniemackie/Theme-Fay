// JavaScript Document

$(document).ready(function(e){
	$('html').addClass('js');
	/*
	var $slideshow = $('#slideshow'), 
		$slides		= $slideshow.find('#slides'),
		$slidenav = $slideshow.find('#slidenav'),
		slidelength = $slides.find('li').length, 
		currentslide = 1,
		nextslide = 1;
		
		$slides.find('li').css({'position':'absolute', 'left':'0px'});
		$slides.find('li h1').css({'bottom':'500px','opacity':0})
		$slides.find('li figure figcaption p').css({'bottom':'1000px','opacity':0})
		$slides.find('li figure figcaption a').css({'bottom':'1000px','opacity':0})
		$slides.find('li figure').css({'top':'500px','opacity':0});
		
		///Animate in First
		
		$slides.find('#slide-'+currentslide+' figure').animate({opacity:1,top:'500px'}, 100);
		$slides.find('#slide-'+currentslide+' h1').delay(500).animate({opacity:1,top:'3em'}, 500);
		$slides.find('#slide-'+currentslide+' p').delay(500).animate({opacity:1,top:'14em'}, 500);
		$slides.find('#slide-'+currentslide+' a').delay(500).animate({opacity:1,top:'35em'}, 500);
		
		
		///on Slide Nav Click 
		$slidenav.on('click', 'a', function(e){
			e.preventDefault();
			
			
		////// Header 
		
		
			
		var slidenum = $(this).attr('href');
			slidenum = slidenum.substring(7, slidenum.length);
			nextslide = slidenum;
			nextSlide(currentslide, nextslide);
			currentslide = nextslide;
			clearInterval(slideinterval);
		
});

///Run Slideshow on Timer 
		
			slideinterval = setInterval(theinterval, 10000);
	
	function theinterval(){
			if(currentslide < slidelength){
				nextslide++;
			} else{
				nextslide = 1; 	
			}
			nextSlide(currentslide,nextslide);
			
			if(currentslide < slidelength){
				currentslide++;
			} else{
				currentslide = 1; 	
			}
	
		}
	
	
	///Next Slide Function
	
	function nextSlide(aniout, aniin){
			////animate out the current slide
			$slides.find('#slide-'+aniout+' figure').animate({opacity:0,bottom:'-500px'}, 500);
			$slides.find('#slide-'+aniout+' p').animate({opacity:0,top:'-500px'}, 500);
			$slides.find('#slide-'+aniout+' a').animate({opacity:0,top:'-500px'}, 500);


			$slides.find('#slide-'+aniout+' h1').animate({opacity:0,top:500}, 500, function(){
			
				///// animation complete, animate next slide 
				$slides.find('#slide-'+aniin+' figure').animate({opacity:1,top:'-500px'}, 500);
				$slides.find('#slide-'+aniin+' h1').delay(500).animate({opacity:1,top:'3em'}, 500);
				$slides.find('#slide-'+aniin+' p').delay(500).animate({opacity:1,top:'14em'}, 500);
				$slides.find('#slide-'+aniin+' a').delay(500).animate({opacity:1,top:'35em'}, 500);
				
			
			
			});
		
			
	}
	
	
	*/
	
/////////
//
// New Slideshow 
//
//////////	


var $slide = $('body').find('.slide'), 
	i=0;
	
	$('body').find('#slide-1').addClass('active');
	$('.active').siblings().fadeOut(1000);
	
	var slideInterval = setInterval(nextSlide, 5000);
	
	function nextSlide(){
		i++;
		if(i < 3){
				$('.active').fadeOut(1000).removeClass('active').next().addClass('active').fadeIn(1500);
		} else {
			i = 0;
				$slide.removeClass('active').fadeOut(1000).first().addClass('active').fadeIn(1000);
			}
			
			}
		

	
/////////////////////////////////////////////////////////////////////
///
///	Gallery Filter 
///
/////////////////////////////////////////////////////////////////////	


		// on filter link click 
		$('#gallery nav li').on('click', function(e){
			// get data cat 
			var cat = $(this).data('cat');
			//find all with cat 
			if(cat != 'all'){
			$('#gallery [role=list]').find('li:not(.'+cat+')').hide(500);
			$('#gallery [role=list]').find('.'+cat).show(500);
			} else {
				$('#gallery [role=list] li').show(500);
			}
		});
		
//////////////////////////////////////////////////////////////////////
///
///  Fab Box 
///
//////////////////////////////////////////////////////////////////////

	if($('#fabbox').length< 1){
		$('body').append('<div id="fabbox" style="display:none;"><div id=close>X</div> <div id="prev"><</div><div id="next">></div><div id="image"></div><</div>');
		}
	
	$('#gallery').on('click', 'a', function(e){
		e.preventDefault();
		$('body').find('#fabbox').slideDown(500);
		
		var bigimg = $(this).attr('href');
		
		$('#gallery a.open').removeClass('open');
		$(this).addClass('open');
		
		$('body').find('#fabbox #image').html('<img src ="'+bigimg+'">');
	});
	
	$('body').on('click', '#fabbox #close', function(e){
		e.preventDefault();
		$('body').find('#fabbox').slideUp(500);
	});
	
	$('body').on('click', '#fabbox #next', function(e){
		var nextel = $('.open').parent().next();
		if(nextel.length > 0){
			var nextimg = nextel.find('a').attr('href');
			nextel.find('a').addClass('next');
		} else {
			var nextimg = $('#gallery [role=list] li:first').find('a').attr('href');
			$('#gallery [role=list] li:first').find('a').addClass('next');
		}
	
	
		
		
		$('.open').removeClass('open');
		
		$('.next').addClass('open').removeClass('next');
		$('#fabbox #image img').attr('src', nextimg);
		
		console.log($('.open').parent().next())
	});
	
	
	$('body').on('click', '#fabbox #prev', function(e){
		var nextel = $('.open').parent().prev();
		if(nextel.length > 0){
			var nextimg = nextel.find('a').attr('href');
			nextel.find('a').addClass('next');
		} else {
			var nextimg = $('#gallery [role=list] li:last').find('a').attr('href');
			$('#gallery [role=list] li:last').find('a').addClass('next');
		}
	
	
		
	
	
		$('.open').removeClass('open');
		
		$('.next').addClass('open').removeClass('next');
		$('#fabbox #image img').attr('src', nextimg);
		
	
	
	
		

});





////////////////////////////
//
// AJAX NAV
//
////////////////////////////
    var $container = $('#container');
    
    
    $('body').on('click', '#headernav a[href*=http], .button a', function(e){
        e.preventDefault();
        
        var nav_url = $(this).attr('href'); 
			history.pushState(null, null, this.href);
			
			
        $container.after('<div id=load_spinner>Loading...</div>').hide().fadeIn(100);
        $container.animate({opacity:0},500, function(){
        	load_page(nav_url);
            
        });
    });
              
            
    function load_page(nav_url){
    $.ajax({
            url: nav_url, 
            data: {load_with_ajax:true},
              
          	success:function(data){
                $container.html(data).animate({opacity:1},500);
              $('body').find('#load_spinner').fadeOut(500, function(){
                  $(this).remove();
                  
              });
                
            }
  
        });       
     }   

    });


