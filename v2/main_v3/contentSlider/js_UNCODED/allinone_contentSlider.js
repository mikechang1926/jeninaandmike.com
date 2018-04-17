/*
 * AllInOne Banner - Content Slider v3.0
 *
 * Copyright 2012, LambertGroup
 * 
*/


(function($) {

	function animate_singular_text(elem,current_obj,options) {
		if (options.responsive) {
			newCss='';
			if (elem.css('font-size').lastIndexOf('px')!=-1) {
				fontSize=elem.css('font-size').substr(0,elem.css('font-size').lastIndexOf('px'));
				//alert (fontSize+'  -   '+fontSize/(options.origWidth/options.width));
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

		var leftPos=elem.attr('data-final-left');
		var topPos=elem.attr('data-final-top');
		if (options.responsive) {
			leftPos=parseInt(leftPos/(options.origWidth/options.width),10);
			topPos=parseInt(topPos/(options.origWidth/options.width),10);
		}
  
        var opacity_aux=1;
		if (current_obj.isVideoPlaying==true)
		   opacity_aux=0;
        elem.animate({
                opacity: opacity_aux,
                left:leftPos+'px',
                top: topPos+'px'
              }, elem.attr('data-duration')*1000, function() {
                if (current_obj.isVideoPlaying==true) {
                   var alltexts = $(current_obj.currentImg.attr('data-text-id')).children();
				   alltexts.css("opacity",0);
		        }
              });			
	};
    
    
    
    
	function animate_texts(current_obj,options,allinone_contentSlider_the,bannerControls) {
		$(current_obj.currentImg.attr('data-text-id')).css("display","block");
		var thetexts = $(current_obj.currentImg.attr('data-text-id')).children();

		var i=0;
		currentText_arr=Array();
		thetexts.each(function() {
			currentText_arr[i] = $(this);
            
            
		  var theLeft=currentText_arr[i].attr('data-initial-left');
		  var theTop=currentText_arr[i].attr('data-initial-top');
		  if (options.responsive) {
				theLeft=parseInt(theLeft/(options.origWidth/options.width),10);
				theTop=parseInt(theTop/(options.origWidth/options.width),10);
		  }		  

			currentText_arr[i].css({
				"left":theLeft+"px",
				"top":theTop+"px",
				"opacity":parseInt(currentText_arr[i].attr('data-fade-start'),10)/100
			});
			
            
            var currentText=currentText_arr[i];
            setTimeout(function() { animate_singular_text(currentText,current_obj,options);}, (currentText_arr[i].attr('data-delay')*1000));    
            	
            i++;
        });		
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
	
    // navigation
	function allinone_contentSlider_navigation(direction,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver){
		var navigateAllowed=true;
		if ((!options.loop && current_obj.current_img_no+direction>=total_images) || (!options.loop && current_obj.current_img_no+direction<0))
			navigateAllowed=false;				
		
		if (navigateAllowed && !current_obj.slideIsRunning) {
			$('.newFS', allinone_contentSlider_container ).contents().unwrap();
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
			
			
			current_obj.slideIsRunning=true;
			current_obj.previous_current_img_no=current_obj.current_img_no;
			//hide previous texts
			$(current_obj.currentImg.attr('data-text-id')).css("display","none");
			
			//deactivate previous
			$(bottomNavButs[current_obj.current_img_no]).removeClass('bottomNavButtonON');
			

			allinone_contentSlider_playOver.css('display','none');				
			
			//set current img
			if (current_obj.current_img_no+direction>=total_images) {
				current_obj.current_img_no=0;
			} else if (current_obj.current_img_no+direction<0) {
				current_obj.current_img_no=total_images-1;
			} else {
				current_obj.current_img_no+=direction;
			}

			
			//alert (direction+' -- '+current_obj.current_img_no+' -- '+total_images)
			//activate current
			$(bottomNavButs[current_obj.current_img_no]).addClass('bottomNavButtonON');
			
			current_obj.currentImg = $(imgs[current_obj.current_img_no]);
		

			allinone_contentSlider_contentHolder.animate({
			    left:(-1)*current_obj.current_img_no*options.width+'px'
			  }, 800, 'easeOutQuad', function() {
			    // Animation complete.
				  current_obj.slideIsRunning=false;
				  
				  if ($(imgs[current_obj.current_img_no]).attr('data-video')=='true')
					allinone_contentSlider_playOver.css('display','block');

				  //reinit content to stop videos
				  if ($(imgs[current_obj.previous_current_img_no]).attr('data-video')=='true') {
				  		$('#contentHolderUnit_'+current_obj.previous_current_img_no, allinone_contentSlider_container).html($(imgs[current_obj.previous_current_img_no]).html());
						resizeRepositionUnitContent(current_obj.previous_current_img_no,current_obj,options,imgs,allinone_contentSlider_container,allinone_contentSlider_the,bannerControls);					
				  }
				  
				  animate_texts(current_obj,options,allinone_contentSlider_the,bannerControls);
				  
				  if (options.autoPlay>0 && total_images>1 && !current_obj.mouseOverBanner) {
					  clearTimeout(current_obj.timeoutID);
					  current_obj.timeoutID=setTimeout(function(){ allinone_contentSlider_navigation(1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver)},options.autoPlay*1000);
				  }						  
			});					
			//alert (current_obj.current_img_no)

			
		} // if navigateAllowed
		
	};
	
		
		
		
		function resizeImg(imageToResize,arrayID,current_obj,options) {
			var origDim=current_obj.origImgsDimensions[arrayID].split(";");
			if (options.responsive) {	
				origDim[0]=origDim[0]/(options.origWidth/options.width);
				origDim[1]=origDim[1]/(options.origWidth/options.width);
			}
			
			imageToResize.width(origDim[0]);
			imageToResize.height(origDim[1]);
		}
		
		
		function resizeRepositionUnitContent(arrayID,current_obj,options,imgs,allinone_contentSlider_container,allinone_contentSlider_the,bannerControls) {
			if (options.responsive) {
				imgInside = $('#contentHolderUnit_'+arrayID, allinone_contentSlider_container).find('img:first');
				if (imgInside.width()!=null) {
					resizeImg(imgInside,arrayID,current_obj,options);
				}
				
				textIdChildren = $($(imgs[arrayID]).attr('data-text-id')).children();
				k=-1;
				textIdChildren.each(function() {
					k++;
					//alert ( $(this).attr('id') );
					imgInside = $(this).find('img:first');
					if (imgInside.width()!=null) {
						resizeImg(imgInside,($(imgs[arrayID]).attr('data-text-id')+'-'+k),current_obj,options);
					}
				});
				
				//reposition text
				$($(imgs[arrayID]).attr('data-text-id')).css({
					'width':allinone_contentSlider_the.width()+'px',
					'left':parseInt(arrayID*options.width,10),
					'top':bannerControls.css('top')
				});
			}
		}
		
	
	
		function doResize(current_obj,options,total_images,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolderVisibleWrapper,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver,bottomNavButs,allinone_contentSlider_leftNav,bottomNavBut,allinone_contentSlider_bottomNav) {
					
					var bodyOverflow_initial=$('body').css('overflow');
					$('body').css('overflow','hidden');
					
					responsiveWidth=allinone_contentSlider_the.parent().parent().width();
					responsiveHeight=allinone_contentSlider_the.parent().parent().height();
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

						
						//set banner size
						allinone_contentSlider_container.width(options.width);
						allinone_contentSlider_container.height(options.height);
						
						allinone_contentSlider_contentHolderVisibleWrapper.width(options.width);
						allinone_contentSlider_contentHolderVisibleWrapper.height(options.height);
						
						allinone_contentSlider_contentHolder.width(options.width);//initial width
						allinone_contentSlider_contentHolder.height(options.height);
						
						//bannerControls.width('100%');
						//bannerControls.height('100%');
						bannerControls.css('margin-top',parseInt((options.height-allinone_contentSlider_leftNav.height())/2,10)+'px');

						
						contentHolderUnit = $('.contentHolderUnit', allinone_contentSlider_container);
						contentHolderUnit.width(options.width);
						contentHolderUnit.height(options.height);

						holderWidth=options.width*total_images;
						for (i=0; i<total_images; i++) {
							resizeRepositionUnitContent(i,current_obj,options,imgs,allinone_contentSlider_container,allinone_contentSlider_the,bannerControls);													
						}

						
	
						allinone_contentSlider_contentHolder.width(holderWidth);


							allinone_contentSlider_bottomNav.css({
								"left":parseInt((allinone_contentSlider_container.width()-allinone_contentSlider_bottomNav.width())/2,10)+"px"
							});

						

		 
		 
					//playover
					allinone_contentSlider_playOver.css({
						'left':parseInt((options.width-allinone_contentSlider_playOver.width())/2,10)+'px',
						'top':parseInt((options.height-allinone_contentSlider_playOver.height())/2,10)+'px'
					});

					
					clearTimeout(current_obj.timeoutID);
					
					allinone_contentSlider_navigation(1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver);
						
						
					}
					

					$('body').css('overflow',bodyOverflow_initial);
			}			
	
	

	
	$.fn.allinone_contentSlider = function(options) {

		var options = $.extend({},$.fn.allinone_contentSlider.defaults, options);

		return this.each(function() {
			var allinone_contentSlider_the = $(this);
					responsiveWidth=allinone_contentSlider_the.parent().width();
					responsiveHeight=allinone_contentSlider_the.parent().height();
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
			
			
			//the controllers
			var allinone_contentSlider_wrap = $('<div></div>').addClass('allinone_contentSlider').addClass(options.skin);
			var bannerControls = $('<div class="bannerControls">   <div class="leftNav"></div>   <div class="rightNav"></div>    </div>  <div class="contentHolderVisibleWrapper"><div class="contentHolder"></div></div>   <div class="playOver"></div>  <canvas class="mycanvas"></canvas>');
			allinone_contentSlider_the.wrap(allinone_contentSlider_wrap);
			allinone_contentSlider_the.after(bannerControls);
			

			
			//the elements
			var allinone_contentSlider_container = allinone_contentSlider_the.parent('.allinone_contentSlider');
			var bannerControls = $('.bannerControls', allinone_contentSlider_container);
			
			
			var allinone_contentSlider_contentHolderVisibleWrapper = $('.contentHolderVisibleWrapper', allinone_contentSlider_container);
			var allinone_contentSlider_contentHolder = $('.contentHolder', allinone_contentSlider_container);			
			
			
			var bottomNavLeft_aux=$('<div class="bottomNavLeft"></div>');
			var bottomNav_aux=$('<div class="bottomNav"></div>');
			var bottomNavRight_aux=$('<div class="bottomNavRight"></div>');
			
			allinone_contentSlider_the.after(bottomNavLeft_aux);
			allinone_contentSlider_the.after(bottomNav_aux);
			allinone_contentSlider_the.after(bottomNavRight_aux);
			 
			if (!options.showAllControllers)
				bannerControls.css("display","none");			
			
			
			var allinone_contentSlider_leftNav = $('.leftNav', allinone_contentSlider_container);
			var allinone_contentSlider_rightNav = $('.rightNav', allinone_contentSlider_container);
			allinone_contentSlider_leftNav.css("display","none");
			allinone_contentSlider_rightNav.css("display","none");			
			if (options.showNavArrows) {
				if (options.showOnInitNavArrows) {
					allinone_contentSlider_leftNav.css("display","block");
					allinone_contentSlider_rightNav.css("display","block");
				}
			}
			
			var allinone_contentSlider_bottomNav = $('.bottomNav', allinone_contentSlider_container);
			var allinone_contentSlider_bottomNavLeft = $('.bottomNavLeft', allinone_contentSlider_container);
			var allinone_contentSlider_bottomNavRight = $('.bottomNavRight', allinone_contentSlider_container);
			var allinone_contentSlider_bottomOverThumb;
			allinone_contentSlider_bottomNav.css("display","block");
			allinone_contentSlider_bottomNavLeft.css("display","block");
			allinone_contentSlider_bottomNavRight.css("display","block");

				allinone_contentSlider_bottomNav.css({"bottom":options.thumbsWrapperMarginBottom+"px", "top":"auto"});
				allinone_contentSlider_bottomNavLeft.css({"bottom":options.thumbsWrapperMarginBottom+"px", "top":"auto"});
				allinone_contentSlider_bottomNavRight.css({"bottom":options.thumbsWrapperMarginBottom+"px", "top":"auto"});			
			
			if (!options.showBottomNav) {
				allinone_contentSlider_bottomNav.css("display","none");
				allinone_contentSlider_bottomNavLeft.css("display","none");
				allinone_contentSlider_bottomNavRight.css("display","none");
			}
			if (!options.showOnInitBottomNav) {
				allinone_contentSlider_bottomNav.css("left","-5000px");
				allinone_contentSlider_bottomNavLeft.css("left","-5000px");
				allinone_contentSlider_bottomNavRight.css("left","-5000px");				
			}
			
			
			
			if (options.enableTouchScreen) {
				//allinone_contentSlider_container.css('cursor','url(skins/hand.cur),url(skins/hand.cur),move');
				allinone_contentSlider_contentHolder.css({
					'cursor':'url('+options.absUrl+'skins/hand.cur),url('+options.absUrl+'skins/hand.cur),move',
					'left':0+'px',
					'top':0+'px',
					'position':'absolute'
				});				
				
				
				allinone_contentSlider_contentHolder.draggable({ 
					axis: 'x',
					distance:10,
					start: function(event, ui) {
						origLeft=parseInt($(this).css('left'),10);
						allinone_contentSlider_playOver.css('display','none');
					},
					stop: function(event, ui) {
						if (!current_obj.slideIsRunning) {
							finalLeft=parseInt($(this).css('left'),10);
							direction=1;
							//alert (origLeft+ ' < '+finalLeft);
							if (origLeft<finalLeft) {
								direction=-1;
							}	
							allinone_contentSlider_navigation(direction,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver);
						}
					}
				});
		
			}
			
			
			
			
			//the vars
			
			var allinone_contentSlider_playOver=$('.playOver', allinone_contentSlider_container);
			allinone_contentSlider_playOver.css({
				'left':parseInt((options.width-allinone_contentSlider_playOver.width())/2,10)+'px',
				'top':parseInt((options.height-allinone_contentSlider_playOver.height())/2,10)+'px'
			});
			
			var total_images=0;
			var current_obj = {
					current_img_no:0,
					currentImg:0,
					previous_current_img_no:0,
					slideIsRunning:false,
					mouseOverBanner:false,
					isVideoPlaying:false,
					timeoutID:'',
					intervalID:'',
					arcInitialTime:(new Date).getTime(),
					timeElapsed:0,
					windowWidth:0,
					origImgsDimensions:Array(),
					canvas:'',
					ctx:'',
					bannerRatio:options.origWidth/options.origHeight
				};				

			//var current_obj.timeoutID; // the autoplay timeout ID
			
			
			var i = 0;
			
			
			current_obj.canvas = $('.mycanvas', allinone_contentSlider_container)[0];
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
			allinone_contentSlider_container.width(options.width);
			allinone_contentSlider_container.height(options.height);
			
			allinone_contentSlider_contentHolderVisibleWrapper.width(options.width);
			allinone_contentSlider_contentHolderVisibleWrapper.height(options.height);
			
			allinone_contentSlider_contentHolder.width(options.width);//initial width
			allinone_contentSlider_contentHolder.height(options.height);
			
			//bannerControls.width('100%');
			//bannerControls.height('100%');
			bannerControls.css('margin-top',parseInt((options.height-allinone_contentSlider_leftNav.height())/2,10)+'px');
			
			//get images
			//var origImgsDimensions=new Array();
			/*var origSlidesImgsDimensions=new Array();
			var origTextsImgsDimensions=new Array();*/
			
			var theul=allinone_contentSlider_the.find('ul:first');
			//alert (theul.attr("title"));
			
			var imgs = theul.children();
			var contentHolderUnit;
			var holderWidth=0;
			var bottomNavBut;
			var bottomNavWidth=0;
			var bottomNavMarginTop=0;
			var imgInside;		
			imgs.each(function() {
	            current_obj.currentImg = $(this);
	            if(!current_obj.currentImg.is('li')){
	            	current_obj.currentImg = current_obj.currentImg.find('li:first');
	            }
	            
	            //alert (current_obj.currentImg.attr('title'))
	            	
	            if(current_obj.currentImg.is('li')){
	            	total_images++;
	            	//'+current_obj.currentImg.html()+'
	            	contentHolderUnit = $('<div class="contentHolderUnit" rel="'+ (total_images-1) +'" id="contentHolderUnit_'+ (total_images-1) +'">'+current_obj.currentImg.html()+'</div>');
	            	contentHolderUnit.width(options.width);
	            	contentHolderUnit.height(options.height);
	            	allinone_contentSlider_contentHolder.append(contentHolderUnit);
	            	holderWidth=holderWidth+options.width;
	            	//alert (holderWidth);
					
	            	imgInside = $('#contentHolderUnit_'+(total_images-1), allinone_contentSlider_container).find('img:first');
	            	if (imgInside.width()!=null) {
						current_obj.origImgsDimensions[total_images-1]=imgInside.width()+';'+imgInside.height();
						if (options.responsive && options.origWidth!=responsiveWidth) {
							resizeImg(imgInside,(total_images-1),current_obj,options);
						}
					} else {
						current_obj.origImgsDimensions[total_images-1]=null;
					}
					//alert (current_obj.origImgsDimensions[total_images-1]);
	            	
		            //generate bottomNav
		            bottomNavBut = $('<div class="bottomNavButtonOFF" rel="'+ (total_images-1) +'"></div>');
		            allinone_contentSlider_bottomNav.append(bottomNavBut);
		            
		            
		            bottomNavWidth+=parseInt(bottomNavBut.css('padding-left').substring(0, bottomNavBut.css('padding-left').length-2),10)+bottomNavBut.width();
		            bottomNavMarginTop=parseInt((allinone_contentSlider_bottomNav.height()-parseInt(bottomNavBut.css('height').substring(0, bottomNavBut.css('height').length-2)))/2,10);
		            //alert (bottomNavMarginTop);
		            bottomNavBut.css('margin-top',bottomNavMarginTop+'px');
		            
		            allinone_contentSlider_contentHolder.append($(current_obj.currentImg.attr('data-text-id')));
		    		$(current_obj.currentImg.attr('data-text-id')).css({
						'width':allinone_contentSlider_the.width()+'px',
						'left':parseInt((total_images-1)*options.width,10),
						'top':bannerControls.css('top')
					});
					
	            	
					
					var textIdChildren = $(current_obj.currentImg.attr('data-text-id')).children();
					var k=-1;
					textIdChildren.each(function() {
						k++;
						//alert ( $(this).attr('id') );
						imgInside = $(this).find('img:first');
						if (imgInside.width()!=null) {
							current_obj.origImgsDimensions[current_obj.currentImg.attr('data-text-id')+'-'+k]=imgInside.width()+';'+imgInside.height();
							if (options.responsive && options.origWidth!=responsiveWidth) {	
								resizeImg(imgInside,(current_obj.currentImg.attr('data-text-id')+'-'+k),current_obj,options);
							}
						} else {
							current_obj.origImgsDimensions[current_obj.currentImg.attr('data-text-id')+'-'+k]=null;
						}
					});
					
					
					/*imgInside = $(current_obj.currentImg.attr('data-text-id')).find('img:first');
	            	if (imgInside.width()!=null) {
						current_obj.origImgsDimensions[current_obj.currentImg.attr('data-text-id')]=imgInside.width()+';'+imgInside.height();
						resizeImg(imgInside,current_obj.currentImg.attr('data-text-id'),current_obj,options);
					} else {
						current_obj.origImgsDimensions[current_obj.currentImg.attr('data-text-id')]=null;
					}*/
					//alert (current_obj.origImgsDimensions[current_obj.currentImg.attr('data-text-id')]);
		            
	            }	            

	        });		

			allinone_contentSlider_contentHolder.width(holderWidth);
			
			allinone_contentSlider_bottomNav.width(bottomNavWidth);
			if (options.showOnInitBottomNav) {
				allinone_contentSlider_bottomNav.css("left",parseInt((allinone_contentSlider_container.width()-bottomNavWidth)/2,10)+'px');
				allinone_contentSlider_bottomNavLeft.css("left",parseInt(allinone_contentSlider_bottomNav.css('left').substring(0, allinone_contentSlider_bottomNav.css('left').length-2),10)-allinone_contentSlider_bottomNavLeft.width()+'px');
				allinone_contentSlider_bottomNavRight.css("left",parseInt(allinone_contentSlider_bottomNav.css('left').substring(0, allinone_contentSlider_bottomNav.css('left').length-2),10)+allinone_contentSlider_bottomNav.width()+parseInt(bottomNavBut.css('padding-left').substring(0, bottomNavBut.css('padding-left').length-2),10)+'px');
			}	
			//for youtube iframes
			$("iframe").each(function(){
			      var ifr_source = $(this).attr('src');
			      var wmode = "?wmode=transparent";
			      $(this).attr('src',ifr_source+wmode);
			});
			
			
	        //initialize first number image
			current_obj.current_img_no=0;			
	        
	        
			current_obj.currentImg = $(imgs[0]);
	        //generate the text for first image
			animate_texts(current_obj,options,allinone_contentSlider_the,bannerControls);
	        
	        

			
/*
	        //Event when Animation finishes
			allinone_contentSlider_container.bind('effectComplete', function(){
				current_obj.slideIsRunning=false;
				
				
				//alert (current_obj.currentImg.attr('data-text-id'));
				animate_texts(current_obj,options,allinone_contentSlider_the,bannerControls);
				
				if (options.autoPlay>0 && total_images>1 && !current_obj.mouseOverBanner) {
					clearTimeout(current_obj.timeoutID);
					current_obj.timeoutID=setTimeout(function(){ allinone_contentSlider_navigation(1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver)},options.autoPlay*1000);
				}				
	        }); //bind
*/			
			

			
			//pause on hover
			allinone_contentSlider_container.mouseenter(function() {
				current_obj.mouseOverBanner=true;
				
				clearTimeout(current_obj.timeoutID);
				nowx = (new Date).getTime();
				current_obj.timeElapsed=current_obj.timeElapsed+(nowx-current_obj.arcInitialTime);
				
				
				if (options.autoHideNavArrows && options.showNavArrows) {
					allinone_contentSlider_leftNav.css("display","block");
					allinone_contentSlider_rightNav.css("display","block");
				}
				if (options.autoHideBottomNav && options.showBottomNav) {
					allinone_contentSlider_bottomNav.css({
						'display':'block',
						'left':parseInt((allinone_contentSlider_container.width()-bottomNavWidth)/2,10)+'px'
					});
					
					allinone_contentSlider_bottomNavLeft.css({
						'display':'block',
						'left':parseInt(allinone_contentSlider_bottomNav.css('left').substring(0, allinone_contentSlider_bottomNav.css('left').length-2),10)-allinone_contentSlider_bottomNavLeft.width()+'px'
						
					});
					
					allinone_contentSlider_bottomNavRight.css({
						'display':'block',
						'left':parseInt(allinone_contentSlider_bottomNav.css('left').substring(0, allinone_contentSlider_bottomNav.css('left').length-2),10)+allinone_contentSlider_bottomNav.width()+parseInt(bottomNavBut.css('padding-left').substring(0, bottomNavBut.css('padding-left').length-2),10)+'px'
					});
	
					
				}				
			});
			
			allinone_contentSlider_container.mouseleave(function() {
				current_obj.mouseOverBanner=false;
				nowx = (new Date).getTime();
				if (options.autoHideNavArrows && options.showNavArrows) {
					allinone_contentSlider_leftNav.css("display","none");
					allinone_contentSlider_rightNav.css("display","none");
				}
				if (options.autoHideBottomNav && options.showBottomNav) {
					allinone_contentSlider_bottomNav.css("display","none");
					allinone_contentSlider_bottomNavLeft.css("display","none");
					allinone_contentSlider_bottomNavRight.css("display","none");
				}				
				if (options.autoPlay>0 && total_images>1 && !current_obj.isVideoPlaying) {
					clearTimeout(current_obj.timeoutID);
					current_obj.arcInitialTime = (new Date).getTime();
					var new_delay = parseInt(options.autoPlay*1000-((current_obj.timeElapsed+nowx)-current_obj.arcInitialTime),10);
					current_obj.timeoutID=setTimeout(function(){ allinone_contentSlider_navigation(1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver)},new_delay);
				}
			});
			
			
			
			var contentHolderUnit=$('.contentHolderUnit', allinone_contentSlider_contentHolder);
			contentHolderUnit.click(function() {
				var i=$(this).attr('rel');
                if ($(imgs[current_obj.current_img_no]).attr('data-video')=='true') {
					
					if (i!=current_obj.current_img_no) {
						current_obj.isVideoPlaying=false;
					} else {
						clearTimeout(current_obj.timeoutID);	
						imgInside = $(this).find('img:first');
						imgInside.css('display','none');
						allinone_contentSlider_playOver.css('display','none');
						current_obj.isVideoPlaying=true;
					}
				}
				
				if ($(imgs[current_obj.current_img_no]).attr('data-link')!=undefined && i==current_obj.current_img_no && $(imgs[current_obj.current_img_no]).attr('data-link')!='') {
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
			
			allinone_contentSlider_playOver.click(function() {
				allinone_contentSlider_playOver.css('display','none');						
				clearTimeout(current_obj.timeoutID);	
				imgInside = $('#contentHolderUnit_'+current_obj.current_img_no, allinone_contentSlider_container).find('img:first');
				imgInside.css('display','none');
				current_obj.isVideoPlaying=true;	
			});			
			
			
			
			//controllers
			allinone_contentSlider_leftNav.click(function() {
				if (!current_obj.slideIsRunning) {
					current_obj.isVideoPlaying=false;
					clearTimeout(current_obj.timeoutID);
					allinone_contentSlider_navigation(-1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver);
				}
			});
			allinone_contentSlider_rightNav.click(function() {
				if (!current_obj.slideIsRunning) {
					current_obj.isVideoPlaying=false;
					clearTimeout(current_obj.timeoutID);
					allinone_contentSlider_navigation(1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver);
				}
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
				} else
					current_obj.windowWidth=$(window).width();
				
				
				
				if (options.responsive && doResizeNow) {
					 if(TO !== false)
						clearTimeout(TO);
					 
					
					 TO = setTimeout(function(){ doResize(current_obj,options,total_images,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolderVisibleWrapper,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver,bottomNavButs,allinone_contentSlider_leftNav,bottomNavBut,allinone_contentSlider_bottomNav) }, 300); //200 is time in miliseconds
				}
			});			
			
			
			
			
			
			//bottom nav
			var bottomNavButs=$('.bottomNavButtonOFF', allinone_contentSlider_container);
			bottomNavButs.click(function() {
				if (!current_obj.slideIsRunning) {
					current_obj.isVideoPlaying=false;
					
					var currentBut=$(this);
					var i=currentBut.attr('rel');
					//deactivate previous 
					$(bottomNavButs[current_obj.current_img_no]).removeClass('bottomNavButtonON');
					current_obj.previous_current_img_no=current_obj.current_img_no;
					//reinit content to stop videos
					$('#contentHolderUnit_'+current_obj.previous_current_img_no, allinone_contentSlider_container).html($(imgs[current_obj.previous_current_img_no]).html());
					resizeRepositionUnitContent(current_obj.previous_current_img_no,current_obj,options,imgs,allinone_contentSlider_container,allinone_contentSlider_the,bannerControls);
					

					current_obj.current_img_no=i-1;
					allinone_contentSlider_navigation(1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver);
					
					//alert (i+'  --  '+current_obj.current_img_no+'  --  '+total_images);
				}
			});
			
			bottomNavButs.mouseenter(function() {
				var currentBut=$(this);
				var i=currentBut.attr('rel');
				
				
				if (options.showPreviewThumbs) {
					allinone_contentSlider_bottomOverThumb = $('<div class="bottomOverThumb"></div>');
					currentBut.append(allinone_contentSlider_bottomOverThumb);
					var image_name=$(imgs[i]).attr('data-bottom-thumb');
					allinone_contentSlider_bottomOverThumb.html('<img src="'+ image_name + '">');
				}
				
				currentBut.addClass('bottomNavButtonON');
			});
			
			bottomNavButs.mouseleave(function() {
				var currentBut=$(this);
				var i=currentBut.attr('rel');

				if (options.showPreviewThumbs) {
					allinone_contentSlider_bottomOverThumb.remove();
				}				
				
				if (current_obj.current_img_no!=i)
					currentBut.removeClass('bottomNavButtonON');
			});			
			


			//first start autoplay
			$(bottomNavButs[current_obj.current_img_no]).addClass('bottomNavButtonON');
			if (options.autoPlay>0 && total_images>1) {
			if (options.showCircleTimer) {
					current_obj.intervalID=setInterval(function(){the_arc(current_obj,options)}, 125);
				}				
				
				current_obj.timeoutID=setTimeout(function(){ allinone_contentSlider_navigation(1,current_obj,options,total_images,bottomNavButs,imgs,allinone_contentSlider_the,bannerControls,allinone_contentSlider_contentHolder,allinone_contentSlider_container,allinone_contentSlider_playOver)},options.autoPlay*1000);
			}

			if ($(imgs[current_obj.current_img_no]).attr('data-video')=='true')
				allinone_contentSlider_playOver.css('display','block');
				
			
			
		});
	};

	
	//
	// plugin skins
	//
	$.fn.allinone_contentSlider.defaults = {
			skin: 'imposing',
			width:918,
			height:382,
			width100Proc:false,
			height100Proc:false,			
			autoPlay:7,
			loop:true,
			target:"_blank", //_blank/_self
			absUrl:'',
			showAllControllers:true,
			showNavArrows:true,
			showOnInitNavArrows:true, // o1
			autoHideNavArrows:true, // o1
			showBottomNav:true,
			showOnInitBottomNav:true, // o2
			autoHideBottomNav:true, // o2
			showPreviewThumbs:true,
			enableTouchScreen:true,
			
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
			
			thumbsWrapperMarginBottom:-35,		
			
			origWidth:0,
			origHeight:0,
			origThumbW:0,
			origThumbH:0,
			windowOrientationScreenSize0:0,
			windowOrientationScreenSize90:0,
			windowOrientationScreenSize_90:0,
			windowCurOrientation:0			
			
	};

})(jQuery);
