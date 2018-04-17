/*
 * AllInOne Banner - Banner With Thumbnails v3.0
 *
 * Copyright 2012, LambertGroup
 * 
*/


(function($) {
	
	var effects_arr=new Array(
			'fade',
			
			'slideFromLeft',
			'slideFromRight',
			'slideFromTop',
			'slideFromBottom',
			
			'topBottomDroppingStripes',
			'topBottomDroppingReverseStripes',
			
			'bottomTopDroppingStripes',
			'bottomTopDroppingReverseStripes',
			
			'asynchronousDroppingStripes',
			
			'leftRightFadingStripes',
			'leftRightFadingReverseStripes',
			
			'topBottomDiagonalBlocks',
			'topBottomDiagonalReverseBlocks',
			
			'randomBlocks'					
			
	);		
	
	var stripe_width;
	var new_stripe_width;	
	var delay_time = 100;
	var delay_time_stripes_step=50;
	var delay_time_blocks_step=25;
	
	var arrowClicked=false;
	
	var currentCarouselLeft=0;
	var val = navigator.userAgent.toLowerCase();	
	
	

	function animate_singular_text(elem,current_obj,options) {
		if (options.responsive) {
			newCss='';
			if (elem.css('font-size').lastIndexOf('px')!=-1) {
				fontSize=elem.css('font-size').substr(0,elem.css('font-size').lastIndexOf('px'));
				newCss+='font-size:'+fontSize/(options.origWidth/options.width)+'px;';
			} else if (elem.css('font-size').lastIndexOf('em')!=-1) {
				fontSize=elem.css('font-size').substr(0,elem.css('font-size').lastIndexOf('em'));
				newCss+='font-size:'+fontSize/(options.origWidth/options.width)+'em;';
			}
			
			if (elem.css('line-height').lastIndexOf('px')!=-1) {
				lineHeight=elem.css('line-height').substr(0,elem.css('line-height').lastIndexOf('px'));
				newCss+='line-height:'+lineHeight/(options.origWidth/options.width)+'px;';
			} else if (elem.css('line-height').lastIndexOf('em')!=-1) {
				lineHeight=elem.css('line-height').substr(0,elem.css('line-height').lastIndexOf('em'));
				newCss+='line-height:'+lineHeight/(options.origWidth/options.width)+'em;';
			}
			
			elem.wrapInner('<div class="newFS" style="'+newCss+'" />');
			
		}

		var theLeft=elem.attr('data-final-left');
		var theTop=elem.attr('data-final-top');
		if (options.responsive) {
			theLeft=parseInt(theLeft/(options.origWidth/options.width),10);
			theTop=parseInt(theTop/(options.origWidth/options.width),10);
		}
  
        var opacity_aux=1;
		if (current_obj.isVideoPlaying==true)
		   opacity_aux=0;
        elem.animate({
                opacity: opacity_aux,
                left:theLeft+'px',
                top: theTop+'px'
              }, elem.attr('data-duration')*1000, function() {
                if (current_obj.isVideoPlaying==true) {
                   var texts = $(current_obj.currentImg.attr('data-text-id')).children();
				   texts.css("opacity",0);
		        }
              });			
	};
        
        
        
        
	function animate_texts(current_obj,options,allinone_thumbnailsBanner_the,bannerControls) {
		$(current_obj.currentImg.attr('data-text-id')).css("display","block");
		var texts = $(current_obj.currentImg.attr('data-text-id')).children();

		var i=0;
		currentText_arr=Array();
		texts.each(function() {
			currentText_arr[i] = $(this);
            
            
		  var theLeft=currentText_arr[i].attr('data-initial-left');
		  var theTop=currentText_arr[i].attr('data-initial-top');
		  if (options.responsive) {
				theLeft=parseInt(theLeft/(options.origWidth/options.width),10);
				theTop=parseInt(theTop/(options.origWidth/options.width),10);
		  }		  

            currentText_arr[i].css({
				'left':theLeft+'px',
				'top':theTop+'px',
				'opacity':parseInt(currentText_arr[i].attr('data-fade-start'),10)/100
			});
            
            var currentText=currentText_arr[i];
            setTimeout(function() { animate_singular_text(currentText,current_obj,options);}, (currentText_arr[i].attr('data-delay')*1000));    
            	
            i++;
        });		
	};
	
	
	function shuffle(o){
		for(var j, x, i = o.length; i; j = parseInt(Math.random() * i,10), x = o[--i], o[i] = o[j], o[j] = x);
		return o;
	};	
	
	
	//circ
	function the_arc(current_obj,options) {
			nowx = (new Date).getTime();
			if (!current_obj.mouseOverBanner && !current_obj.effectIsRunning && options.showCircleTimer) {	 
				current_obj.ctx.clearRect(0,0,current_obj.canvas.width,current_obj.canvas.height);
  	            
                current_obj.ctx.beginPath();
                current_obj.ctx.globalAlpha=options.behindCircleAlpha/100;
                current_obj.ctx.arc(options.circleRadius+2*options.circleLineWidth, options.circleRadius+2*options.circleLineWidth, options.circleRadius, 0, 2 * Math.PI, false);
                current_obj.ctx.lineWidth = options.circleLineWidth+2;
                current_obj.ctx.strokeStyle = options.behindCircleColor;
                current_obj.ctx.stroke();
                

                current_obj.ctx.beginPath();
                current_obj.ctx.globalAlpha=options.circleAlpha/100;
                current_obj.ctx.arc(options.circleRadius+2*options.circleLineWidth, options.circleRadius+2*options.circleLineWidth, options.circleRadius, 0, ((current_obj.timeElapsed+nowx)-current_obj.arcInitialTime)/1000*2/options.autoPlay*Math.PI,  false);
                current_obj.ctx.lineWidth = options.circleLineWidth;
                current_obj.ctx.strokeStyle = options.circleColor;
                current_obj.ctx.stroke();
             }
    }		
	
	
	
        // generate the stripes
        function allinone_thumbnailsBanner_generate_stripes(allinone_thumbnailsBanner_container,options,current_obj) {
			$('.stripe', allinone_thumbnailsBanner_container).remove();
			$('.block', allinone_thumbnailsBanner_container).remove();
            stripe_width = Math.round(options.width/options.numberOfStripes);
			new_stripe_width=stripe_width;
        	var cssBgResize=true;
			for (var i = 0; i < options.numberOfStripes; i++){
				if (i == options.numberOfStripes-1) {
					new_stripe_width=allinone_thumbnailsBanner_container.width()-stripe_width*(options.numberOfStripes-1);
					//alert (stripe_width+'  -  '+new_stripe_width);
				}
				if (!options.responsive || (!$.browser.msie) || ($.browser.msie && $.browser.version>=9)  ) {
					if (val.indexOf("ipad") != -1 || val.indexOf("iphone") != -1 || val.indexOf("ipod") != -1 || val.indexOf("webos") != -1) {
						cssBgResize=false;
					} else {
						allinone_thumbnailsBanner_container.append(
							$('<div class="stripe"></div>').css({ 
								opacity:'0',
								left:(stripe_width*i)+'px', 
								width:new_stripe_width+'px',
								height:'0px', 
								background: 'url("'+ current_obj.current_imgInside.attr('src') +'") '+ (-1)*(i * stripe_width) +'px 0%'
							})
						);
					}
				} else {
					cssBgResize=false;
				}
				
				if (!cssBgResize) {
					mleft=(-1)*(stripe_width*i);
					allinone_thumbnailsBanner_container.append(
						$('<div class="stripe"><img src="'+current_obj.current_imgInside.attr('src')+'" width="'+options.width+'" height="'+options.height+'" style="margin-left:'+mleft+'px;"></div>').css({ 
							opacity:'0',
							left:(stripe_width*i)+'px', 
							width:new_stripe_width+'px',
							height:'0px'
						})
					);						
				}
			}
			
			if (options.responsive && cssBgResize) {
				if (!$.browser.msie || ($.browser.msie && $.browser.version>=9) ) {
					$('.stripe', allinone_thumbnailsBanner_container).css({
						'-webkit-background-size':options.width+'px '+options.height+'px',
						'-moz-background-size':options.width+'px '+options.height+'px',
						'-o-background-size':options.width+'px '+options.height+'px',
						'-ms-background-size':options.width+'px '+options.height+'px',
						'background-size':options.width+'px '+options.height+'px'
					});				
			
				}
			}
        };
        
        
        
        // generate the blocks
        function allinone_thumbnailsBanner_generate_blocks(allinone_thumbnailsBanner_container,options,current_obj) {
			$('.stripe', allinone_thumbnailsBanner_container).remove();
			$('.block', allinone_thumbnailsBanner_container).remove();
			var block_width = Math.round(options.width/options.numberOfColumns);
			var block_height = Math.round(options.height/options.numberOfRows);
        	var new_block_width=block_width;
			var new_block_height=block_height;
			var cur_left=0;
			var cur_top=0;
        	var cssBgResize=true;	
            for(var i = 0; i < options.numberOfRows; i++){
            	for(var j = 0; j < options.numberOfColumns; j++){
					cur_left=block_width*j;
					cur_top=block_height*i;
					
					if (j == options.numberOfColumns-1) {
						new_block_width=options.width-block_width*(options.numberOfColumns-1);
					} else {
						new_block_width=block_width;
					}
					
					if (i == options.numberOfRows-1) {
						new_block_height=options.height-block_height*(options.numberOfRows-1);
					} else {
						new_block_height=block_height;
					}					
					
					if (!options.responsive || (!$.browser.msie) || ($.browser.msie && $.browser.version>=9)  ) {
						if (val.indexOf("ipad") != -1 || val.indexOf("iphone") != -1 || val.indexOf("ipod") != -1 || val.indexOf("webos") != -1) {
							cssBgResize=false;
						} else {
							allinone_thumbnailsBanner_container.append(
								$('<div class="block"></div>').css({ 
									opacity:'0',
									left:cur_left+'px', 
									top:cur_top+'px',
									width:new_block_width+'px',
									height:new_block_height+'px',
									background: 'url("'+ current_obj.current_imgInside.attr('src') +'") -'+ cur_left +'px -'+ cur_top +'px'
								})
							);
						}
					} else {
						cssBgResize=false;
					}
					
					if (!cssBgResize) {
						mleft=(-1)*cur_left;
						mtop=(-1)*cur_top;
						allinone_thumbnailsBanner_container.append(
							$('<div class="block"><img src="'+current_obj.current_imgInside.attr('src')+'" width="'+options.width+'" height="'+options.height+'" style="margin-left:'+mleft+'px; margin-top:'+mtop+'px;"></div>').css({ 
								opacity:'0',
								left:cur_left+'px', 
								top:cur_top+'px',
								width:new_block_width+'px',
								height:new_block_height+'px'
							})
						);					
					}
					
            	}
			}
			if (options.responsive && cssBgResize) {
				if (!$.browser.msie || ($.browser.msie && $.browser.version>=9) ) {
					$('.block', allinone_thumbnailsBanner_container).css({
						'-webkit-background-size':options.width+'px '+options.height+'px',
						'-moz-background-size':options.width+'px '+options.height+'px',
						'-o-background-size':options.width+'px '+options.height+'px',
						'-ms-background-size':options.width+'px '+options.height+'px',
						'background-size':options.width+'px '+options.height+'px'
					});
				}
			}			
			
        };		
        
	


	function animate_block(block,i,j,options,allinone_thumbnailsBanner_container){
        var w = block.width();
        var h = block.height();
        block.css({'width':'0'});
        block.css({'height':'0'});
        if (i==options.numberOfRows-1 && j==options.numberOfColumns-1) 
        	setTimeout(function(){
				block.animate({ opacity:'1.0', width:w, height:h }, (options.effectDuration*1000)/3 , '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
			}, (delay_time));               	
        else	
			setTimeout(function(){
				block.animate({ opacity:'1.0', width:w, height:h }, (options.effectDuration*1000)/3 );
			}, (delay_time));
		delay_time += delay_time_blocks_step;
	};    
    
    
    
    function carouselScroll(direction,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb,current_obj) {
		currentCarouselLeft=allinone_thumbnailsBanner_thumbsHolder.css('left').substr(0,allinone_thumbnailsBanner_thumbsHolder.css('left').lastIndexOf('px'));
		if (direction===1 || direction===-1) {
			current_obj.isCarouselScrolling=true;
			allinone_thumbnailsBanner_thumbsHolder.css('opacity','0.5');
			allinone_thumbnailsBanner_thumbsHolder.animate({
			    opacity: 1,
			    left: '+='+direction*current_obj.carouselStep
			  }, 500, 'easeOutCubic', function() {
			      // Animation complete.
				  disableCarouselNav(current_obj,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb);						  
				  current_obj.isCarouselScrolling=false;
			});				
		} else {
				if ( currentCarouselLeft != (-1) * Math.floor( current_obj.current_img_no/options.numberOfThumbsPerScreen )*current_obj.carouselStep) {
					current_obj.isCarouselScrolling=true;
					allinone_thumbnailsBanner_thumbsHolder.css('opacity','0.5');
					allinone_thumbnailsBanner_thumbsHolder.animate({
					    opacity: 1,
					    left: (-1) * Math.floor( current_obj.current_img_no/options.numberOfThumbsPerScreen )*current_obj.carouselStep
					  }, 500, 'easeOutCubic', function() {
					      // Animation complete.
						  disableCarouselNav(current_obj,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb);						  
						  current_obj.isCarouselScrolling=false;
					});
				}
		}
	
		
	};
	
	function disableCarouselNav(current_obj,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb) {
		currentCarouselLeft=allinone_thumbnailsBanner_thumbsHolder.css('left').substr(0,allinone_thumbnailsBanner_thumbsHolder.css('left').lastIndexOf('px'));
		if (currentCarouselLeft <0 ) {
			if (allinone_thumbnailsBanner_carouselLeftNav.hasClass('carouselLeftNavDisabled'))
				allinone_thumbnailsBanner_carouselLeftNav.removeClass('carouselLeftNavDisabled');
		} else {
			allinone_thumbnailsBanner_carouselLeftNav.addClass('carouselLeftNavDisabled');
		}		
		
		if (Math.abs(currentCarouselLeft-current_obj.carouselStep)<(thumbsHolder_Thumb.width()+current_obj.thumbMarginLeft)*total_images) {
			if (allinone_thumbnailsBanner_carouselRightNav.hasClass('carouselRightNavDisabled'))
				allinone_thumbnailsBanner_carouselRightNav.removeClass('carouselRightNavDisabled');
		} else {
			allinone_thumbnailsBanner_carouselRightNav.addClass('carouselRightNavDisabled');
		}				
	};
	    
    
    
    
    // navigation
	function allinone_thumbnailsBanner_navigation(direction,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb){
		var navigateAllowed=true;
		if ((!options.loop && current_obj.current_img_no+direction>=total_images) || (!options.loop && current_obj.current_img_no+direction<0))
			navigateAllowed=false;
		
		if (navigateAllowed) {
			$('.newFS', allinone_thumbnailsBanner_container ).contents().unwrap();
			current_obj.arcInitialTime=(new Date).getTime();
			current_obj.timeElapsed=0;				
			
				if (options.showCircleTimer) {
						//clearInterval(current_obj.intervalID);
	
						current_obj.ctx.clearRect(0,0,current_obj.canvas.width,current_obj.canvas.height);
						current_obj.ctx.beginPath();
						current_obj.ctx.globalAlpha=options.behindCircleAlpha/100;
						current_obj.ctx.arc(options.circleRadius+2*options.circleLineWidth, options.circleRadius+2*options.circleLineWidth, options.circleRadius, 0, 2 * Math.PI, false);
						current_obj.ctx.lineWidth = options.circleLineWidth+2;
						current_obj.ctx.strokeStyle = options.behindCircleColor;
						current_obj.ctx.stroke();            
						
						
						current_obj.ctx.beginPath();
						current_obj.ctx.globalAlpha=options.circleAlpha/100;
						current_obj.ctx.arc(options.circleRadius+2*options.circleLineWidth, options.circleRadius+2*options.circleLineWidth, options.circleRadius, 0, 0,  false);
						current_obj.ctx.lineWidth = options.circleLineWidth;
						current_obj.ctx.strokeStyle = options.circleColor;
						current_obj.ctx.stroke();	
								
						//current_obj.intervalID=setInterval(function(){the_arc(current_obj,options)}, 125);
				}			
			
			//hide previous texts
			$(current_obj.currentImg.attr('data-text-id')).css("display","none");
			
			//deactivate previous
			$(thumbsHolder_Thumbs[current_obj.current_img_no]).removeClass('thumbsHolder_ThumbON');
			
			//set current img
			if (options.randomizeImages && !current_obj.bottomNavClicked) {
				var rand_no=Math.floor(Math.random() * total_images);
				if (current_obj.current_img_no===rand_no)
					current_obj.current_img_no=Math.floor(Math.random() * total_images);
				else
					current_obj.current_img_no=rand_no;
			} else {
				if (current_obj.current_img_no+direction>=total_images) {
					current_obj.current_img_no=0;
				} else if (current_obj.current_img_no+direction<0) {
					current_obj.current_img_no=total_images-1;
				} else {
					current_obj.current_img_no+=direction;
				}
			}
			current_obj.bottomNavClicked=false;
			//activate current
			$(thumbsHolder_Thumbs[current_obj.current_img_no]).addClass('thumbsHolder_ThumbON');
			//auto scroll carousel if needed
			currentCarouselLeft=allinone_thumbnailsBanner_thumbsHolder.css('left').substr(0,allinone_thumbnailsBanner_thumbsHolder.css('left').lastIndexOf('px'));
			if (current_obj.current_img_no===0 || current_obj.current_img_no===total_images-1) {
				carouselScroll(0,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb,current_obj);
			} else {
				carouselScroll(1001,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb,current_obj);
			}
			
			current_obj.currentImg = $(imgs[current_obj.current_img_no]);
            current_obj.current_imgInside=current_obj.currentImg.find('img:first');		
					
            
			//set current_effect
			if(current_obj.currentImg.attr('data-transition')){
					current_effect = current_obj.currentImg.attr('data-transition');
					if (current_effect=='random') {
								current_effect=effects_arr[Math.floor(Math.random()*(effects_arr.length))];
					}
      } else if (options.defaultEffect!='random') {
            	current_effect=options.defaultEffect;	            	
      } else {
            	current_effect=effects_arr[Math.floor(Math.random()*(effects_arr.length))];
      }

			//alert(current_obj.current_img_no);
			current_obj.effectIsRunning=true;
			if(current_effect == 'fade' || current_effect == 'slideFromLeft' || current_effect == 'slideFromRight' || current_effect == 'slideFromTop' || current_effect == 'slideFromBottom'){
				allinone_thumbnailsBanner_generate_stripes(allinone_thumbnailsBanner_container,options,current_obj);
				var first_stripe = $('.stripe:first', allinone_thumbnailsBanner_container);
				
				if (current_effect == 'fade') {
					first_stripe.css({
						'top':'0px',
	                    'height': '100%',
	                    'width': allinone_thumbnailsBanner_container.width() + 'px'
	                });
					first_stripe.animate({ opacity:'1.0' }, (options.effectDuration*2000), '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
				}
				
				if (current_effect == 'slideFromLeft') {
					first_stripe.css({
						'top':'0px',
	                    'height': '100%',
	                    'width': '0'
	                });
					first_stripe.animate({ opacity:'1.0', width:allinone_thumbnailsBanner_container.width() + 'px' }, (options.effectDuration*1000), '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
				}
				
				if (current_effect == 'slideFromRight') {
					first_stripe.css({
						'top':'0px',
	                    'height': '100%',
	                    'width':  '0',
	                    'left': allinone_thumbnailsBanner_container.width()+5 + 'px'
	                });
					first_stripe.animate({ opacity:'1.0', left:'0', 'width':  allinone_thumbnailsBanner_container.width() + 'px' }, (options.effectDuration*1000), '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
				}

				if (current_effect == 'slideFromTop') {
					first_stripe.css({
						'top':'0px',
	                    'height': '0',
	                    'width': allinone_thumbnailsBanner_container.width() + 'px'
	                });
					first_stripe.animate({ opacity:'1.0', height:allinone_thumbnailsBanner_container.height() + 'px' }, (options.effectDuration*1000), '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
				}
				
				if (current_effect == 'slideFromBottom') {
					first_stripe.css({
						'top':'0px',
	                    'height': '0',
	                    'width': allinone_thumbnailsBanner_container.width() + 'px',
	                    'top': allinone_thumbnailsBanner_container.height() + 'px'
	                });
					first_stripe.animate({ opacity:'1.0', top:0, height:allinone_thumbnailsBanner_container.height() + 'px' }, (options.effectDuration*1000), '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
				}					
				
			}   
			
			if(current_effect.indexOf('Stripes')>=0) {
				allinone_thumbnailsBanner_generate_stripes(allinone_thumbnailsBanner_container,options,current_obj);
				if (current_effect.indexOf('Reverse')>=0){
					var stripes = $('.stripe', allinone_thumbnailsBanner_container).myReverse();
				} else {
					var stripes = $('.stripe', allinone_thumbnailsBanner_container);
				}
				delay_time = 100;
				i = 0;
				stripes.each(function(){
					var stripe = $(this);
					//setting the css for stripes according to current effect
					if(current_effect=='topBottomDroppingStripes' || current_effect=='topBottomDroppingReverseStripes')
						stripe.css({ 'top': '0px' });
					if(current_effect=='bottomTopDroppingStripes' || current_effect=='bottomTopDroppingReverseStripes')
						stripe.css({ 'bottom': '0px' });
					if(current_effect=='leftRightFadingStripes' || current_effect=='leftRightFadingReverseStripes')
						stripe.css({ 'top': '0px', 'height':'100%', 'width':'0' });						
					if (current_effect=='asynchronousDroppingStripes') {
						if (i % 2)
							stripe.css({ 'top': '0px' });
						else
							stripe.css({ 'bottom': '0px' });
					} 
					
					if(current_effect=='leftRightFadingStripes' || current_effect=='leftRightFadingReverseStripes') {
						var aux_stripe_width=stripe_width;
						if ( (current_effect=='leftRightFadingStripes' && i == options.numberOfStripes-1) || (current_effect=='leftRightFadingReverseStripes' && i==0) )
							aux_stripe_width=new_stripe_width;
						
						if(i == options.numberOfStripes-1){
							setTimeout(function(){
								stripe.animate({ width:aux_stripe_width+'px', opacity:'1.0' }, (options.effectDuration*800), '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
							}, (delay_time));
						} else {
							setTimeout(function(){
								stripe.animate({ width:aux_stripe_width+'px', opacity:'1.0' }, (options.effectDuration*800) );
							}, (delay_time));
						}							
					} else {
							if(i == options.numberOfStripes-1){
								setTimeout(function(){
									stripe.animate({ height:'100%', opacity:'1.0' }, (options.effectDuration*1000), '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
								}, (delay_time));
							} else {
								setTimeout(function(){
									stripe.animate({ height:'100%', opacity:'1.0' }, (options.effectDuration*1000) );
								}, (delay_time));
							}
					}
					delay_time += delay_time_stripes_step;
					i++;
				});
			} //if stripes
			
			
			if(current_effect.indexOf('Blocks')>=0) {
				allinone_thumbnailsBanner_generate_blocks(allinone_thumbnailsBanner_container,options,current_obj);
				if (current_effect.indexOf('Reverse')>=0){
					var blocks = $('.block', allinone_thumbnailsBanner_container).myReverse();
				} else if (current_effect=='randomBlocks') {
					var blocks = shuffle($('.block', allinone_thumbnailsBanner_container));
				} else {
					var blocks = $('.block', allinone_thumbnailsBanner_container);
				}
				delay_time = 100;
				
				if (current_effect=='randomBlocks') {
					i=0;
					var total_blocks = options.numberOfRows*options.numberOfColumns;
					blocks.each(function(){
						var block = $(this);
		                var w = block.width();
		                var h = block.height();
		                block.css({'width':'0'});
		                block.css({'height':'0'});							
						if(i == total_blocks-1){
		                	setTimeout(function(){
								block.animate({ opacity:'1.0', width:w, height:h }, (options.effectDuration*1000)/3 , '', function(){ allinone_thumbnailsBanner_container.trigger('effectComplete'); });
							}, (delay_time));               	
						} else {
							setTimeout(function(){
								block.animate({ opacity:'1.0', width:w, height:h }, (options.effectDuration*1000)/3 );
							}, (delay_time));
						}
						delay_time += delay_time_blocks_step;
						i++;
					});						
				} else {

						var row_i=0;
						var col_i=0;
						var blocks_arr=new Array();
						blocks_arr[row_i] = new Array();
						blocks.each(function(){
								blocks_arr[row_i][col_i] = $(this);
								col_i++;
								if(col_i == options.numberOfColumns){
									row_i++;
									col_i = 0;
									blocks_arr[row_i] = new Array();
								}
						});
	
						
						//first part
						row_i=0;
						col_i=0;
						delay_time = 100;
						var block = $(blocks_arr[row_i][col_i]);
						animate_block(block,0,0,options,allinone_thumbnailsBanner_container);
						while (row_i<options.numberOfRows-1 || col_i<options.numberOfColumns-1) {
							if (row_i<options.numberOfRows-1)
								row_i++;
							if (col_i<options.numberOfColumns-1)
								col_i++;
	
							i=row_i;
							if (col_i<row_i && options.numberOfRows>options.numberOfColumns)
								i=row_i-col_i;
							j=0;
							if (row_i<col_i && options.numberOfRows<options.numberOfColumns)
								j=col_i-row_i;
							while (i>=0 && j<=col_i) {
								var block = $(blocks_arr[i--][j++]);
								animate_block(block,i,j,options,allinone_thumbnailsBanner_container);
								//alert (i+' - '+j);
							}
	
						}
						
						
						//last part
						if (options.numberOfRows<options.numberOfColumns)
							delay_time-=(options.numberOfRows-1)*delay_time_blocks_step;
						else
							delay_time-=(options.numberOfColumns-1)*delay_time_blocks_step;
						
						limit_i=0;
						limit_j=col_i-row_i;

						while (limit_i<row_i && limit_j<col_i) {
							i=row_i+1; //options.numberOfRows-1;
							j=limit_j;
							while (i>limit_i && j<col_i) {
								i=i-1;
								j=j+1;							
								var block = $(blocks_arr[i][j]);
								animate_block(block,i,j,options,allinone_thumbnailsBanner_container);
							}
							limit_i++;
							limit_j++;
						}
	
				} // else randomBlocks
			} // if blocks
			
		} // if navigateAllowed
		
	};    
    
 
	

	
	
	


			function rearangethumbs(current_obj,options,total_images,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,thumbsHolder_Thumb,allinone_thumbnailsBanner_thumbsHolderVisibleWrapper,allinone_thumbnailsBanner_thumbsHolderWrapper) {
						//thumbs
						
						if (options.skin!="opportune") {
							allinone_thumbnailsBanner_thumbsHolderWrapper.css({
								"top":options.height+"px",
								"margin-top":parseInt(options.thumbsWrapperMarginTop/(options.origWidth/options.width),10)+"px",
								"height":parseInt(options.origthumbsHolderWrapperH/(options.origWidth/options.width),10)+"px"
							});

							bgTopCorrection=0;
							if (options.origWidth/options.width==1 && options.thumbsReflection>0) {
								bgTopCorrection=-7;
							}

							allinone_thumbnailsBanner_carouselLeftNav.css('background-position','0px '+((allinone_thumbnailsBanner_thumbsHolderWrapper.height()-options.origthumbsHolderWrapperH)/2+bgTopCorrection)+'px');
							allinone_thumbnailsBanner_carouselRightNav.css('background-position','0px '+((allinone_thumbnailsBanner_thumbsHolderWrapper.height()-options.origthumbsHolderWrapperH)/2+bgTopCorrection)+'px');
							
							allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.css('width',options.width-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width());
							options.origWidthThumbsHolderVisibleWrapper=options.origWidth-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width()	;				
							

							thumbsHolder_Thumbs.css({
								'width':parseInt(options.origThumbW/(options.origWidthThumbsHolderVisibleWrapper/allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.width()),10)+'px',
								'height':parseInt(options.origThumbH/(options.origWidthThumbsHolderVisibleWrapper/allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.width()),10)+'px'
	
							});
							
							
							if (options.numberOfThumbsPerScreen >= total_images) {
								allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.css('left',parseInt((allinone_thumbnailsBanner_thumbsHolderWrapper.width() - (thumbsHolder_Thumb.width()+current_obj.thumbMarginLeft)*total_images)/2,10)+parseInt(current_obj.thumbMarginLeft/2,10)+'px');
							}							
							
							
							var imageInside = $('.thumbsHolder_ThumbOFF', allinone_thumbnailsBanner_container).find('img:first');
							if (options.thumbsReflection>0) {
								imageInside.unreflect();
							}

							imageInside.css({
								"width":thumbsHolder_Thumbs.width()+"px",
								"height":thumbsHolder_Thumbs.height()+"px",
								"margin-top":parseInt((allinone_thumbnailsBanner_thumbsHolderWrapper.height()-thumbsHolder_Thumbs.height())/2,10)+bgTopCorrection+"px"
							});
							
							//create reflection
							if (options.origWidth/options.width==1 && options.thumbsReflection>0) {
								var op = { opacity: options.thumbsReflection/100 };
								imageInside.reflect(op);
							}							
							
							
							
							current_obj.thumbMarginLeft=Math.floor( (allinone_thumbnailsBanner_thumbsHolderWrapper.width()-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width()-thumbsHolder_Thumb.width()*options.numberOfThumbsPerScreen)/(options.numberOfThumbsPerScreen-1) );
							thumb_i=-1;
							allinone_thumbnailsBanner_thumbsHolder.children().each(function() {
								thumb_i++;
								theThumb = $(this);
								theThumb.css('background-position','center '+(options.thumbsOnMarginTop/(options.origWidth/options.width))+'px');
								if ( thumb_i<=0 ) {
									theThumb.css('margin-left',Math.floor( ( allinone_thumbnailsBanner_thumbsHolderWrapper.width()-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width()-(current_obj.thumbMarginLeft+theThumb.width())*(options.numberOfThumbsPerScreen-1) - theThumb.width() )/2 )+'px');
								} else {
									theThumb.css('margin-left',current_obj.thumbMarginLeft+'px');		
								}
							});

							current_obj.carouselStep=(thumbsHolder_Thumb.width()+current_obj.thumbMarginLeft)*options.numberOfThumbsPerScreen;

						}				
			}






			function doResize(current_obj,options,current_effect,total_images,imgs,allinone_thumbnailsBanner_the,bannerControls,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,thumbsHolder_Thumb,allinone_thumbnailsBanner_leftNav,allinone_thumbnailsBanner_thumbsHolderVisibleWrapper,allinone_thumbnailsBanner_thumbsHolderWrapper) {
					var bodyOverflow_initial=$('body').css('overflow');
					$('body').css('overflow','hidden');
								
					/*responsiveWidth=allinone_thumbnailsBanner_the.parent().parent().width();
					responsiveHeight=allinone_thumbnailsBanner_the.parent().parent().height();*/
					if (options.enableTouchScreen) {
						responsiveWidth=allinone_thumbnailsBanner_the.parent().parent().parent().width();
						responsiveHeight=allinone_thumbnailsBanner_the.parent().parent().parent().height();
					} else {
						responsiveWidth=allinone_thumbnailsBanner_the.parent().parent().width();
						responsiveHeight=allinone_thumbnailsBanner_the.parent().parent().height();						
					}		
		
					if (options.responsiveRelativeToBrowser) {
						responsiveWidth=$(window).width();
						responsiveHeight=$(window).height();
					}
					

					if (options.width100Proc) {
						options.width=responsiveWidth;
					}
					
					if (options.height100Proc) {
						options.height=responsiveHeight;
					}

					if (options.origWidth!=responsiveWidth || options.width100Proc) {
						if (options.origWidth>responsiveWidth || options.width100Proc) {
							options.width=responsiveWidth;
						} else if (!options.width100Proc) {
							options.width=options.origWidth;
						}
						if (!options.height100Proc)
							options.height=options.width/current_obj.bannerRatio;
							
						options.width=parseInt(options.width,10);
						options.height=parseInt(options.height,10);								

						if (options.enableTouchScreen && options.responsive)
							options.width-=1;
						
						//set banner size
						allinone_thumbnailsBanner_container.width(options.width);
						allinone_thumbnailsBanner_container.height(options.height);
						
						if (val.indexOf("ipad") != -1 || val.indexOf("iphone") != -1 || val.indexOf("ipod") != -1 || val.indexOf("webos") != -1 || ($.browser.msie && $.browser.version<=7)) {
							$('#curBgImgIos', allinone_thumbnailsBanner_container).attr('src',current_obj.current_imgInside.attr("src"));
							$('#curBgImgIos', allinone_thumbnailsBanner_container).width(options.width);
							$('#curBgImgIos', allinone_thumbnailsBanner_container).height(options.height);
						} else {
							if (!$.browser.msie || ($.browser.msie && $.browser.version>=9) ) {
								allinone_thumbnailsBanner_container.css({
									'-webkit-background-size':options.width+'px '+options.height+'px',
									'-moz-background-size':options.width+'px '+options.height+'px',
									'-o-background-size':options.width+'px '+options.height+'px',
									'-ms-background-size':options.width+'px '+options.height+'px',
									'background-size':options.width+'px '+options.height+'px'
								});
							} else if ($.browser.version==8) {
								allinone_thumbnailsBanner_container.css({filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+current_obj.current_imgInside.attr('src')+"',sizingMethod='scale')"});	
							}
						}
						
						if (options.enableTouchScreen) {
							allinone_thumbnailsBanner_container.parent().width(options.width+1);
							allinone_thumbnailsBanner_container.parent().height(options.height);
						}
						
						
						bannerControls.css('margin-top',parseInt((options.height-allinone_thumbnailsBanner_leftNav.height())/2,10)+'px');


						for (i=0; i<total_images; i++) {
							//reposition text
							$($(imgs[i]).attr('data-text-id')).css('width',allinone_thumbnailsBanner_the.width()+'px');
						}
						
						
						rearangethumbs(current_obj,options,total_images,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,thumbsHolder_Thumb,allinone_thumbnailsBanner_thumbsHolderVisibleWrapper,allinone_thumbnailsBanner_thumbsHolderWrapper);


					
					clearTimeout(current_obj.timeoutID);
					
					allinone_thumbnailsBanner_navigation(1,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb);
						
						
					}
					

					$('body').css('overflow',bodyOverflow_initial);
			}		


	
	
	
	
	
	
	$.fn.allinone_thumbnailsBanner = function(options) {
	
		var options = $.extend({},$.fn.allinone_thumbnailsBanner.defaults, options);

		return this.each(function() {
			var allinone_thumbnailsBanner_the = $(this);

					responsiveWidth=allinone_thumbnailsBanner_the.parent().width();
					responsiveHeight=allinone_thumbnailsBanner_the.parent().height();
					if (options.responsiveRelativeToBrowser) {
						responsiveWidth=$(window).width();
						responsiveHeight=$(window).height();
					}			
					options.origWidth=options.width;
					if (options.width100Proc)
						options.width=responsiveWidth;
					
					options.origHeight=options.height;
					if (options.height100Proc) {
						options.height=responsiveHeight;
					}
						
					if (options.responsive && (options.origWidth!=responsiveWidth || options.width100Proc)) {
						if (options.origWidth>responsiveWidth || options.width100Proc) {
							options.width=responsiveWidth;
						} else {
							options.width=options.origWidth;
						}
						if (!options.height100Proc)
							options.height=options.width/(options.origWidth/options.origHeight);	
					}	
					
					options.width=parseInt(options.width,10);
					options.height=parseInt(options.height,10);								
					
					if (options.enableTouchScreen && options.responsive)
						options.width-=1;				
			
			allinone_thumbnailsBanner_the.css("display","block");
			
			//the controllers
			var allinone_thumbnailsBanner_wrap = $('<div></div>').addClass('allinone_thumbnailsBanner').addClass(options.skin);
			var bannerControlsDef = $('<div class="bannerControls">   <div class="leftNav"></div>   <div class="rightNav"></div>      </div>  <div class="contentHolderVisibleWrapper"><div class="contentHolder"></div></div>   <div class="thumbsHolderWrapper"><div class="thumbsHolderVisibleWrapper"><div class="thumbsHolder"></div></div></div> <canvas class="mycanvas"></canvas>');						
			allinone_thumbnailsBanner_the.wrap(allinone_thumbnailsBanner_wrap);
			allinone_thumbnailsBanner_the.after(bannerControlsDef);
			 
			if (!options.showAllControllers)
				bannerControls.css("display","none");
			
			//the elements
			var allinone_thumbnailsBanner_container = allinone_thumbnailsBanner_the.parent('.allinone_thumbnailsBanner');
			var bannerControls = $('.bannerControls', allinone_thumbnailsBanner_container);
			
			var allinone_thumbnailsBanner_leftNav = $('.leftNav', allinone_thumbnailsBanner_container);
			var allinone_thumbnailsBanner_rightNav = $('.rightNav', allinone_thumbnailsBanner_container);
			allinone_thumbnailsBanner_leftNav.css("display","none");
			allinone_thumbnailsBanner_rightNav.css("display","none");			
			if (options.showNavArrows) {
				if (options.showOnInitNavArrows) {
					allinone_thumbnailsBanner_leftNav.css("display","block");
					allinone_thumbnailsBanner_rightNav.css("display","block");
				}
			}


			var allinone_thumbnailsBanner_thumbsHolderWrapper = $('.thumbsHolderWrapper', allinone_thumbnailsBanner_container);
			var allinone_thumbnailsBanner_thumbsHolderVisibleWrapper = $('.thumbsHolderVisibleWrapper', allinone_thumbnailsBanner_container);
			var allinone_thumbnailsBanner_thumbsHolder = $('.thumbsHolder', allinone_thumbnailsBanner_container);
			
			var allinone_thumbnailsBanner_carouselLeftNav;
			var allinone_thumbnailsBanner_carouselRightNav;
			allinone_thumbnailsBanner_carouselLeftNav=$('<div class="carouselLeftNav"></div>');
			allinone_thumbnailsBanner_carouselRightNav=$('<div class="carouselRightNav"></div>');
			allinone_thumbnailsBanner_thumbsHolderWrapper.append(allinone_thumbnailsBanner_carouselLeftNav);
			allinone_thumbnailsBanner_thumbsHolderWrapper.append(allinone_thumbnailsBanner_carouselRightNav);
			allinone_thumbnailsBanner_carouselRightNav.css('right','0');
			
			allinone_thumbnailsBanner_thumbsHolder.css('width',allinone_thumbnailsBanner_carouselLeftNav.width()+'px');

			
			if (!options.showThumbs || !options.showOnInitThumbs)
				allinone_thumbnailsBanner_thumbsHolderWrapper.css("display","none");
			
			//the vars
			var current_effect=options.defaultEffect;
			var total_images=0;
			/*var current_obj = {
					current_img_no:0,
					currentImg:0,
					isCarouselScrolling:false,
					bottomNavClicked:false,
					effectIsRunning:false
				};			
			var current_obj.timeoutID; // the autoplay timeout ID
			var current_obj.mouseOverBanner=false;*/
			var current_obj = {
				current_img_no:0,
				currentImg:0,
				current_imgInside:'',
				windowWidth:0,
				carouselStep:0,
				thumbMarginLeft:0,				
				bottomNavClicked:false,
				effectIsRunning:false,
				mouseOverBanner:false,
				timeoutID:'',
				intervalID:'',
				arcInitialTime:(new Date).getTime(),
				timeElapsed:0,
				windowWidth:0,
				canvas:'',
				ctx:'',
				bannerRatio:options.origWidth/options.origHeight				
			};			


			var i = 0;



			current_obj.canvas = $('.mycanvas', allinone_thumbnailsBanner_container)[0];
			current_obj.canvas.width=2*options.circleRadius+4*options.circleLineWidth;
			current_obj.canvas.height=2*options.circleRadius+4*options.circleLineWidth;
			if (options.showCircleTimer) {	
				if ($.browser.msie) {
					if (parseInt($.browser.version,10)<9) {
					   current_obj.canvas = G_vmlCanvasManager.initElement(current_obj.canvas);
					   if (!options.showCircleTimerIE8IE7 && options.showCircleTimer) {
						   options.showCircleTimer=false;
					   }
					}
				}
				current_obj.ctx = current_obj.canvas.getContext('2d');
			}			
			
			
			//set banner size
			allinone_thumbnailsBanner_container.width(options.width);
			allinone_thumbnailsBanner_container.height(options.height);
			
			/*bannerControls.width('100%');
			bannerControls.height('100%');*/
			bannerControls.css('margin-top',parseInt((options.height-allinone_thumbnailsBanner_leftNav.height())/2,10)+'px');
			
			//get images
			var theul= allinone_thumbnailsBanner_the.find('ul:first');
			var imgs = theul.children();
			var thumbsHolder_Thumb;
			var thumbsHolder_MarginTop=0;
			imgs.each(function() {
	            current_obj.currentImg = $(this);
	            if(!current_obj.currentImg.is('li')){
	            	current_obj.currentImg = current_obj.currentImg.find('li:first');
	            }
	            	
	            if(current_obj.currentImg.is('li')){
	            	current_obj.currentImg.css('display','none');
	            	total_images++;

	            
		            //generate thumbsHolder
					var image_name = $(imgs[total_images-1]).attr('data-bottom-thumb');
					thumbsHolder_Thumb = $('<div class="thumbsHolder_ThumbOFF" rel="'+ (total_images-1) +'"><img src="' + image_name + '"></div>');
		            allinone_thumbnailsBanner_thumbsHolder.append(thumbsHolder_Thumb);
					if (options.origThumbW==0) {

					   	if (options.numberOfThumbsPerScreen==0) {
							options.numberOfThumbsPerScreen=Math.floor((options.origWidth-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width())/thumbsHolder_Thumb.width());
						}
						options.origThumbW=thumbsHolder_Thumb.width();
						options.origThumbH=thumbsHolder_Thumb.height();
						options.origthumbsHolderWrapperH=allinone_thumbnailsBanner_thumbsHolderWrapper.height();
						current_obj.thumbMarginLeft=Math.floor( (options.origWidth-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width()-thumbsHolder_Thumb.width()*options.numberOfThumbsPerScreen)/(options.numberOfThumbsPerScreen-1) );
                    }

		            //alert (current_obj.thumbMarginLeft);
		            allinone_thumbnailsBanner_thumbsHolder.css('width',allinone_thumbnailsBanner_thumbsHolder.width()+current_obj.thumbMarginLeft+thumbsHolder_Thumb.width()+'px');
		            //alert (current_obj.thumbMarginLeft+' - '+allinone_thumbnailsBanner_thumbsHolderWrapper.width()+' - '+allinone_thumbnailsBanner_carouselLeftNav.width()+' - '+allinone_thumbnailsBanner_carouselRightNav.width()+' - '+thumbsHolder_Thumb.width()+' - '+options.numberOfThumbsPerScreen);
		            if ( total_images<=1 ) {
		            	thumbsHolder_Thumb.css('margin-left',Math.floor( ( allinone_thumbnailsBanner_thumbsHolderWrapper.width()-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width()-(current_obj.thumbMarginLeft+thumbsHolder_Thumb.width())*(options.numberOfThumbsPerScreen-1) - thumbsHolder_Thumb.width() )/2 )+'px');
		            } else {
		            	thumbsHolder_Thumb.css('margin-left',current_obj.thumbMarginLeft+'px');
		            }
		            	
		            
		            thumbsHolder_MarginTop=parseInt((allinone_thumbnailsBanner_thumbsHolderWrapper.height()-parseInt(thumbsHolder_Thumb.css('height').substring(0, thumbsHolder_Thumb.css('height').length-2)))/2,10);
		            //alert (thumbsHolder_MarginTop);
		            //thumbsHolder_Thumb.css('margin-top',thumbsHolder_MarginTop+'px');
	            }	            
	            //alert (thumbsHolder_Width)
	        });
			
			//alert (allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.width());
			allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.css('width',allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.width()-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width());
			allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.css('left',allinone_thumbnailsBanner_carouselLeftNav.width());
			
			current_obj.carouselStep=(thumbsHolder_Thumb.width()+current_obj.thumbMarginLeft)*options.numberOfThumbsPerScreen;
			//disable left nav
			if (Math.floor( current_obj.current_img_no/options.numberOfThumbsPerScreen ) === 0)
				allinone_thumbnailsBanner_carouselLeftNav.addClass('carouselLeftNavDisabled');
			
			//disable right nav
			if (Math.floor( current_obj.current_img_no/options.numberOfThumbsPerScreen ) == Math.floor( total_images/options.numberOfThumbsPerScreen ))
				allinone_thumbnailsBanner_carouselRightNav.addClass('carouselRightNavDisabled');			
			
			/*// REMOVE
			allinone_thumbnailsBanner_thumbsHolderWrapper.css({
					"top":options.height+"px",
					"margin-top":parseInt(options.thumbsWrapperMarginTop,10)+"px",
					"height":parseInt(options.origthumbsHolderWrapperH,10)+"px"
			});*/
			
		    
			if (options.thumbsReflection>0)
				thumbsHolder_MarginTop=thumbsHolder_MarginTop-7;
			var img_inside = $('.thumbsHolder_ThumbOFF', allinone_thumbnailsBanner_container).find('img:first');
			img_inside.css("margin-top",thumbsHolder_MarginTop+"px");
			
			//create reflection
			/*var op = { opacity: options.thumbsReflection/100 };
			img_inside.reflect(op);*/
			
			
			
			
/**********************/			
			allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.css({
				'width':(options.origWidth-allinone_thumbnailsBanner_carouselLeftNav.width()-allinone_thumbnailsBanner_carouselRightNav.width()),
				'left':allinone_thumbnailsBanner_carouselLeftNav.width()+'px'
			});
			
			
			current_obj.carouselStep=(thumbsHolder_Thumb.width()+current_obj.thumbMarginLeft)*options.numberOfThumbsPerScreen;
			//disable left nav
			allinone_thumbnailsBanner_carouselLeftNav.addClass('carouselLeftNavDisabled');
			
			//disable right nav and center thumbs
			if (options.numberOfThumbsPerScreen >= total_images) {
				allinone_thumbnailsBanner_carouselRightNav.addClass('carouselRightNavDisabled');
				allinone_thumbnailsBanner_carouselLeftNav.css('display','none');
				allinone_thumbnailsBanner_carouselRightNav.css('display','none');
				allinone_thumbnailsBanner_thumbsHolderVisibleWrapper.css('left',parseInt((allinone_thumbnailsBanner_thumbsHolderWrapper.width() - (thumbsHolder_Thumb.width()+current_obj.thumbMarginLeft)*total_images)/2,10)+'px');
			}
			
			allinone_thumbnailsBanner_thumbsHolderWrapper.css("top",options.height+'px');
		    

			var img_inside = $('.thumbsHolder_ThumbOFF', allinone_thumbnailsBanner_container).find('img:first');
			img_inside.css("margin-top",thumbsHolder_MarginTop+"px");
			options.origthumbsHolder_MarginTop=thumbsHolder_MarginTop;



var thumbsHolder_Thumbs=$('.thumbsHolder_ThumbOFF', allinone_thumbnailsBanner_container);
rearangethumbs(current_obj,options,total_images,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,thumbsHolder_Thumb,allinone_thumbnailsBanner_thumbsHolderVisibleWrapper,allinone_thumbnailsBanner_thumbsHolderWrapper);

/**********************/			
			
	        //initialize first number image
			current_obj.current_img_no = options.firstImg;
			if (options.firstImg>total_images)
				current_obj.current_img_no=total_images;
			if (options.firstImg<0)
				current_obj.current_img_no=0;
				
			//initialize first image number if randomize option is set
			if(options.randomizeImages){
	        	current_obj.current_img_no = Math.floor(Math.random() * total_images);
	        }


			if (current_obj.current_img_no>=options.numberOfThumbsPerScreen) {
				for (q=0;q<Math.floor(current_obj.current_img_no/options.numberOfThumbsPerScreen);q++) {
					carouselScroll(-1,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb,current_obj);
				}
			}	        

	        
	        //Get first image (using initialized above current_obj.current_img_no) and init first bg
            current_obj.currentImg = $(imgs[current_obj.current_img_no]);
			current_obj.current_imgInside=current_obj.currentImg.find('img:first');
	        
			
			if (val.indexOf("ipad") != -1 || val.indexOf("iphone") != -1 || val.indexOf("ipod") != -1 || val.indexOf("webos") != -1 || ($.browser.msie && $.browser.version<=7)) {
				allinone_thumbnailsBanner_container.append('<img id="curBgImgIos" src="'+ current_obj.current_imgInside.attr("src") +'" width="'+options.width+'" height="'+options.height+'">');
			} else {
				allinone_thumbnailsBanner_container.css('background','url("'+ current_obj.current_imgInside.attr('src') +'") no-repeat');
				if (options.responsive) {
					if (!$.browser.msie || ($.browser.msie && $.browser.version>=9) ) {
						allinone_thumbnailsBanner_container.css({
							'-webkit-background-size':options.width+'px '+options.height+'px',
							'-moz-background-size':options.width+'px '+options.height+'px',
							'-o-background-size':options.width+'px '+options.height+'px',
							'-ms-background-size':options.width+'px '+options.height+'px',
							'background-size':options.width+'px '+options.height+'px'
						});
						
					} else if ($.browser.version==8) {
						allinone_thumbnailsBanner_container.css({filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+current_obj.current_imgInside.attr('src')+"',sizingMethod='scale')"});	
					}
				}
			}

	        
			if (options.enableTouchScreen) {
				var randomNo=Math.floor(Math.random()*100000);
				
				allinone_thumbnailsBanner_container.wrap('<div id="bannerWithThumbnailsParent_'+randomNo+'" style="position:relative;" />');
				$('#bannerWithThumbnailsParent_'+randomNo).width(options.width+1);
				$('#bannerWithThumbnailsParent_'+randomNo).height(options.height);
				//$('#bannerWithThumbnailsParent_'+randomNo).css('overflow','hidden');
				//$('#bannerWithThumbnailsParent_'+randomNo).css('border','1px solid #ff0000');
				
				allinone_thumbnailsBanner_container.css({
					'cursor':'url('+options.absUrl+'skins/hand.cur),url('+options.absUrl+'skins/hand.cur),move',
					'left':'0px',
					'position':'absolute'
				});
				
				rightVal=parseInt(allinone_thumbnailsBanner_rightNav.css('right').substring(0, allinone_thumbnailsBanner_rightNav.css('right').length-2),10);
				
				//alert(allinone_thumbnailsBanner_container.parent().attr('id'));
				
				//$("body").css("overflow", "hidden");
				
				allinone_thumbnailsBanner_container.mousedown(function() {
					rightVal=parseInt(allinone_thumbnailsBanner_rightNav.css('right').substring(0, allinone_thumbnailsBanner_rightNav.css('right').length-2),10);
					if (rightVal<0 && !arrowClicked) {
						allinone_thumbnailsBanner_rightNav.css('visibility','hidden');
						allinone_thumbnailsBanner_leftNav.css('visibility','hidden');
						allinone_thumbnailsBanner_rightNav.css('right','0');
					}
				});	
				
				allinone_thumbnailsBanner_container.mouseup(function() {
					arrowClicked=false;
					if (rightVal<0) {	
						allinone_thumbnailsBanner_rightNav.css('right',rightVal+'px');
						allinone_thumbnailsBanner_rightNav.css('visibility','visible');
						allinone_thumbnailsBanner_leftNav.css('visibility','visible');							
					}					
				});

				allinone_thumbnailsBanner_container.draggable({ 
					axis: 'x',
					containment: 'parent',
					start: function(event, ui) {
						origLeft=$(this).css('left');
					},
					stop: function(event, ui) {
						if (!current_obj.effectIsRunning) {
							finalLeft=$(this).css('left');
							direction=1;
							if (origLeft<finalLeft) {
								direction=-1;
							}	
							//alert (origLeft+'<'+finalLeft+'-'+direction);
							allinone_thumbnailsBanner_navigation(direction,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb);
						}
						if (rightVal<0) {	
							allinone_thumbnailsBanner_rightNav.css('right',rightVal+'px');
							allinone_thumbnailsBanner_rightNav.css('visibility','visible');
							allinone_thumbnailsBanner_leftNav.css('visibility','visible');							
						}
						$(this).css('left','0px');
					}
				});
			}				

	        
	        
	        //generate the text for first image
			animate_texts(current_obj,options,allinone_thumbnailsBanner_the,bannerControls);
	        
	        
	
			
			

			
			
			

			

	        //Event when Animation finishes
			allinone_thumbnailsBanner_container.bind('effectComplete', function(){
				current_obj.effectIsRunning=false;
				

					if (val.indexOf("ipad") != -1 || val.indexOf("iphone") != -1 || val.indexOf("ipod") != -1 || val.indexOf("webos") != -1 || ($.browser.msie && $.browser.version<=7)) {
						$('#curBgImgIos', allinone_thumbnailsBanner_container).attr('src',current_obj.current_imgInside.attr("src"));
						$('#curBgImgIos', allinone_thumbnailsBanner_container).width(options.width);
						$('#curBgImgIos', allinone_thumbnailsBanner_container).height(options.height);
					} else {
						allinone_thumbnailsBanner_container.css('background','url("'+ current_obj.current_imgInside.attr('src') +'") no-repeat');
						if (options.responsive) {
							if (!$.browser.msie || ($.browser.msie && $.browser.version>=9) ) {
								allinone_thumbnailsBanner_container.css({
									'-webkit-background-size':options.width+'px '+options.height+'px',
									'-moz-background-size':options.width+'px '+options.height+'px',
									'-o-background-size':options.width+'px '+options.height+'px',
									'-ms-background-size':options.width+'px '+options.height+'px',
									'background-size':options.width+'px '+options.height+'px'
								});
								
							} else if ($.browser.version==8) {
								allinone_thumbnailsBanner_container.css({filter: "progid:DXImageTransform.Microsoft.AlphaImageLoader(src='"+current_obj.current_imgInside.attr('src')+"',sizingMethod='scale')"});	
							}
					}
				}			
				
				
				current_obj.arcInitialTime=(new Date).getTime();
				current_obj.timeElapsed=0;			
				if (options.showCircleTimer) {
						clearInterval(current_obj.intervalID);
	
						current_obj.ctx.clearRect(0,0,current_obj.canvas.width,current_obj.canvas.height);
						current_obj.ctx.beginPath();
						current_obj.ctx.globalAlpha=options.behindCircleAlpha/100;
						current_obj.ctx.arc(options.circleRadius+2*options.circleLineWidth, options.circleRadius+2*options.circleLineWidth, options.circleRadius, 0, 2 * Math.PI, false);
						current_obj.ctx.lineWidth = options.circleLineWidth+2;
						current_obj.ctx.strokeStyle = options.behindCircleColor;
						current_obj.ctx.stroke();            
						
						
						current_obj.ctx.beginPath();
						current_obj.ctx.globalAlpha=options.circleAlpha/100;
						current_obj.ctx.arc(options.circleRadius+2*options.circleLineWidth, options.circleRadius+2*options.circleLineWidth, options.circleRadius, 0, 0,  false);
						current_obj.ctx.lineWidth = options.circleLineWidth;
						current_obj.ctx.strokeStyle = options.circleColor;
						current_obj.ctx.stroke();	
								
						current_obj.intervalID=setInterval(function(){the_arc(current_obj,options)}, 125);
				}				
				

				animate_texts(current_obj,options,allinone_thumbnailsBanner_the,bannerControls);
				
				if (options.autoPlay>0 && total_images>1 && !current_obj.mouseOverBanner) {
					clearTimeout(current_obj.timeoutID);
					current_obj.timeoutID=setTimeout(function(){ allinone_thumbnailsBanner_navigation(1,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb)},options.autoPlay*1000);
				}				
	        }); //bind
			
			
			
			

			
			
			//pause on hover
			allinone_thumbnailsBanner_container.mouseenter(function() {
				current_obj.mouseOverBanner=true;
				
				clearTimeout(current_obj.timeoutID);
				nowx = (new Date).getTime();
				current_obj.timeElapsed=current_obj.timeElapsed+(nowx-current_obj.arcInitialTime);
				
				if (options.autoHideNavArrows && options.showNavArrows) {
					allinone_thumbnailsBanner_leftNav.css("display","block");
					allinone_thumbnailsBanner_rightNav.css("display","block");
				}
				
				//alert (options.autoHideThumbs+' && '+options.showThumbs);
				
				if (options.autoHideThumbs && options.showThumbs) {
					allinone_thumbnailsBanner_thumbsHolderWrapper.css("display","block");
					
				}				
			});
			
			allinone_thumbnailsBanner_container.mouseleave(function() {
				current_obj.mouseOverBanner=false;
				nowx = (new Date).getTime();
				if (options.autoHideNavArrows && options.showNavArrows) {
					allinone_thumbnailsBanner_leftNav.css("display","none");
					allinone_thumbnailsBanner_rightNav.css("display","none");
				}
				if (options.autoHideThumbs && options.showThumbs) {
					allinone_thumbnailsBanner_thumbsHolderWrapper.css("display","none");
				}			
				if (options.autoPlay>0 && total_images>1) {
					clearTimeout(current_obj.timeoutID);
					current_obj.arcInitialTime = (new Date).getTime();
					var new_delay = parseInt(options.autoPlay*1000-((current_obj.timeElapsed+nowx)-current_obj.arcInitialTime),10);
					
					current_obj.timeoutID=setTimeout(function(){ allinone_thumbnailsBanner_navigation(1,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb)},new_delay);
				}
			});
			
			


			allinone_thumbnailsBanner_container.click(function() {
				if ($(imgs[current_obj.current_img_no]).attr('data-link')!=undefined && $(imgs[current_obj.current_img_no]).attr('data-link')!='' && !current_obj.effectIsRunning && !arrowClicked) {
					var cur_target=options.target;
					if ($(imgs[current_obj.current_img_no]).attr('data-target')!=undefined && $(imgs[current_obj.current_img_no]).attr('data-target')!=''){
						cur_target=$(imgs[current_obj.current_img_no]).attr('data-target');
					}
					
					if (cur_target=="_blank")
						window.open($(imgs[current_obj.current_img_no]).attr('data-link'));
					else
						window.location = $(imgs[current_obj.current_img_no]).attr('data-link');
				}	
			});

			
			
			//controllers
			allinone_thumbnailsBanner_leftNav.mousedown(function() {
				arrowClicked=true;
				if (!current_obj.effectIsRunning) {
					clearTimeout(current_obj.timeoutID);
					allinone_thumbnailsBanner_navigation(-1,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb);
				}
			});
			allinone_thumbnailsBanner_leftNav.mouseup(function() {
				arrowClicked=false;
			});				
			allinone_thumbnailsBanner_rightNav.mousedown(function() {
				arrowClicked=true;
				if (!current_obj.effectIsRunning) {
					clearTimeout(current_obj.timeoutID);
					allinone_thumbnailsBanner_navigation(1,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb);
				}
			});
			allinone_thumbnailsBanner_rightNav.mouseup(function() {
				arrowClicked=false;
			});				
			
	
	

			var TO = false;
			$(window).resize(function() {
				doResizeNow=true;
				if (navigator.userAgent.indexOf('Android') != -1) {
					if (options.windowOrientationScreenSize0==0 && window.orientation==0)
						options.windowOrientationScreenSize0=$(window).width();
						
					if (options.windowOrientationScreenSize90==0 && window.orientation==90)
						options.windowOrientationScreenSize90=$(window).height();	
						
					if (options.windowOrientationScreenSize_90==0 && window.orientation==-90)
						options.windowOrientationScreenSize_90=$(window).height();						
					
					if (options.windowOrientationScreenSize0 && window.orientation==0 && $(window).width()>options.windowOrientationScreenSize0)	
						doResizeNow=false;

					if (options.windowOrientationScreenSize90 && window.orientation==90 && $(window).height()>options.windowOrientationScreenSize90)	
						doResizeNow=false;
						
					if (options.windowOrientationScreenSize_90 && window.orientation==-90 && $(window).height()>options.windowOrientationScreenSize_90)	
						doResizeNow=false;	
						
						
					if (current_obj.windowWidth==0) {
						doResizeNow=false;
						current_obj.windowWidth=$(window).width();
					}

				}
				if ($.browser.msie && parseInt($.browser.version,10)==9 && current_obj.windowWidth==0)
					doResizeNow=false;
				
				
				if (current_obj.windowWidth==$(window).width()) {
					doResizeNow=false;
					if (options.windowCurOrientation!=window.orientation && navigator.userAgent.indexOf('Android') != -1) {
						options.windowCurOrientation=window.orientation;
						doResizeNow=true;
					}
				} else {
					/*if (current_obj.windowWidth===0 && (val.indexOf("ipad") != -1 || val.indexOf("iphone") != -1 || val.indexOf("ipod") != -1 || val.indexOf("webos") != -1))
						doResizeNow=false;*/
					current_obj.windowWidth=$(window).width();
				}
				
				
				if (options.responsive && doResizeNow) {
					 if(TO !== false)
						clearTimeout(TO);
					 
					
					 TO = setTimeout(function(){ doResize(current_obj,options,current_effect,total_images,imgs,allinone_thumbnailsBanner_the,bannerControls,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,thumbsHolder_Thumb,allinone_thumbnailsBanner_leftNav,allinone_thumbnailsBanner_thumbsHolderVisibleWrapper,allinone_thumbnailsBanner_thumbsHolderWrapper) }, 300); //200 is time in miliseconds
				}
			});	
	
			
			
			
			
			//bottom nav
			var thumbsHolder_Thumbs=$('.thumbsHolder_ThumbOFF', allinone_thumbnailsBanner_container);
			thumbsHolder_Thumbs.mousedown(function() {
				arrowClicked=true;
				if (!current_obj.effectIsRunning) {
					var currentBut=$(this);
					var i=currentBut.attr('rel');
					//deactivate previous 
					$(thumbsHolder_Thumbs[current_obj.current_img_no]).removeClass('thumbsHolder_ThumbON');
					
					current_obj.bottomNavClicked=true;
					current_obj.current_img_no=i-1;
					allinone_thumbnailsBanner_navigation(1,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb);
				}
			});
			thumbsHolder_Thumbs.mouseup(function() {
				arrowClicked=false;
			});				
			
			thumbsHolder_Thumbs.mouseenter(function() {
				var currentBut=$(this);
				var i=currentBut.attr('rel');
				
				currentBut.addClass('thumbsHolder_ThumbON');
			});
			
			thumbsHolder_Thumbs.mouseleave(function() {
				var currentBut=$(this);
				var i=currentBut.attr('rel');

				if (current_obj.current_img_no!=i)
					currentBut.removeClass('thumbsHolder_ThumbON');
			});	
			
			
			//carousel controllers
			allinone_thumbnailsBanner_carouselLeftNav.click(function() {
				arrowClicked=true;
				if (!current_obj.isCarouselScrolling) {
					currentCarouselLeft=allinone_thumbnailsBanner_thumbsHolder.css('left').substr(0,allinone_thumbnailsBanner_thumbsHolder.css('left').lastIndexOf('px'));

					if (currentCarouselLeft <0 ) 
						carouselScroll(1,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb,current_obj);
				}
			});
			
			
			allinone_thumbnailsBanner_carouselRightNav.click(function() {
				arrowClicked=true;
				if (!current_obj.isCarouselScrolling) {
					currentCarouselLeft=allinone_thumbnailsBanner_thumbsHolder.css('left').substr(0,allinone_thumbnailsBanner_thumbsHolder.css('left').lastIndexOf('px'));
					if (Math.abs(currentCarouselLeft-current_obj.carouselStep)<(thumbsHolder_Thumb.width()+current_obj.thumbMarginLeft)*total_images) 
						carouselScroll(-1,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb,current_obj);
				}
			});
		


		
			

			//first start autoplay
			$(thumbsHolder_Thumbs[current_obj.current_img_no]).addClass('thumbsHolder_ThumbON');
			if (options.autoPlay>0 && total_images>1) {
				if (options.showCircleTimer) {
					current_obj.intervalID=setInterval(function(){the_arc(current_obj,options)}, 125);
				}
				
				current_obj.timeoutID=setTimeout(function(){ allinone_thumbnailsBanner_navigation(1,current_obj,current_effect,allinone_thumbnailsBanner_container,thumbsHolder_Thumbs,imgs,allinone_thumbnailsBanner_thumbsHolder,allinone_thumbnailsBanner_carouselLeftNav,allinone_thumbnailsBanner_carouselRightNav,options,total_images,thumbsHolder_Thumb)},options.autoPlay*1000);
			}			
			
			
		});
	};

	//reverse effect
	$.fn.myReverse = [].reverse;
	
	//
	// plugin skins
	//
	$.fn.allinone_thumbnailsBanner.defaults = {
			skin: 'cool',
			width:960,
			height:384,
			width100Proc:false,
			height100Proc:false,				
			randomizeImages: false,
			firstImg:0,
			numberOfStripes:20,
			numberOfRows:5,
			numberOfColumns:10,
			defaultEffect:'random',
			effectDuration:0.5,
			autoPlay:4,
			loop:true,
			target:"_blank",
			showAllControllers:true,
			showNavArrows:true,
			showOnInitNavArrows:true, // o1
			autoHideNavArrows:true, // o1
			showThumbs:true,
			showOnInitThumbs:true,
			autoHideThumbs:false,
			thumbsReflection:50,
			enableTouchScreen:true,
			absUrl:'',
			
			showCircleTimer:true,
			showCircleTimerIE8IE7:false,
			circleRadius:10,
			circleLineWidth:4,
			circleColor: "#FF0000",
			circleAlpha: 100,
			behindCircleColor: "#000000",
			behindCircleAlpha: 50,
			responsive:false,
			responsiveRelativeToBrowser:true,
			
			numberOfThumbsPerScreen:0,
				
			thumbsOnMarginTop:0,
			thumbsWrapperMarginTop:0,
			origWidth:0,
			origHeight:0,
			origThumbW:0,
			origThumbH:0,
			origthumbsHolderWrapperH:121,
			origthumbsHolder_MarginTop:0,
			windowOrientationScreenSize0:0,
			windowOrientationScreenSize90:0,
			windowOrientationScreenSize_90:0,
			windowCurOrientation:0
	};
	


})(jQuery);

