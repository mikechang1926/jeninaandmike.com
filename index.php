<?php
require('access.php');

?>


<!doctype html>
<!--[if IE 7]>
<html class="no-js lt-ie9 lt-ie8" lang="en">
   <![endif]-->
   <!--[if IE 8]>
   <html class="no-js lt-ie9" lang="en">
      <![endif]-->
      <!--[if gt IE 8]><!-->
      <html class="no-js" lang="en">
         <!--<![endif]-->
         <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
            <title>Jenina & Mike</title>
            <link href="http://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet" type="text/css" />
            <link href="http://fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet" type="text/css" />
            <link href="http://fonts.googleapis.com/css?family=Lato:300" rel="stylesheet" type="text/css" />
            <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
            <link href="http://fonts.googleapis.com/css?family=Raleway:200" rel="stylesheet" type="text/css" />
            <link href="http://fonts.googleapis.com/css?family=Cedarville+Cursive" rel="stylesheet" type="text/css" />
            <link rel="stylesheet" href="assets/css/reset.css" />
            <link rel="stylesheet" href="assets/css/main.css" />
            <link rel="stylesheet" href="refineslide.css" />
            <script src="assets/js/jquery.js"></script>
            
            <link rel="stylesheet" type="text/css" href="ubergallery/resources/UberGallery.css" />
<link rel="stylesheet" type="text/css" href="ubergallery/resources/colorbox/2/colorbox.css" />
<script type="text/javascript" src="ubergallery/resources/colorbox/jquery.colorbox.js"></script>


            <link rel="stylesheet" type="text/css" href="skins/tango/skin.css" />
            <!--<script type="text/javascript" src="//use.typekit.net/icb7ute.js"></script>
               <script type="text/javascript">try{Typekit.load();}catch(e){}</script>-->
            <script src="jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
            <script type="text/javascript">
               $(function() {
               	$('#carousel').carouFredSel({
               		width: '100%',
               		items: {
               			visible: 3,
               			start: -1
               		},
               		scroll: {
               			items: 1,
               			duration: 1000,
               			timeoutDuration: 3000
               		},
               		prev: '#prev',
               		next: '#next',
               		pagination: {
               			container: '#pager',
               			deviation: 1
               		}
               	});
               });
            </script>

            <style type="text/css">
               html, body {
               height: 100%;
               padding: 0;
               margin: 0;
               }
               body {
               min-height: 500px;
               }
               
               body * {
               font-family: "museo-sans",sans-serif;
               font-size: 14px;
               color: #333;
               line-height: 22px;
               padding-top: 10px;
               }
               h3 {
               	padding-top: 30px;
               	font-size: 14px;
               	text-transform: uppercase;
               }
                     	h4 {
           		font-size: 20px;
           		padding-top: 20px;
           		padding-bottom: 20px;
           	}
               #wrapper {
               background-color: #fff;
               width: 100%;
               overflow: hidden;
               position: absolute;
               left: 0;
               }
               .wrap.group {
               margin-top: 500px;
               }
               #carousel img {
               display: block;
               float: left;
               }
               #prev, #next {
               background-color: rgba(255, 255, 255, 0.7);
               display: block;
               height: 450px;
               width: 50%;
               top: 0;
               position: absolute;
               }
               #prev:hover, #next:hover {
               background-color: #fff;
               background-color: rgba(255, 255, 255, 0.8);
               }
               #prev {
               left: -480px;
               }
               #next {
               right: -480px;
               }
               #pager {
               margin-left: -470px;
               position: absolute;
               left: 50%;
               bottom: 10px;
               }
               #pager a {
               border: 1px solid rgba(255, 255, 255, 0.2);
               border-radius: 5px;
               display: inline-block;
               width: 10px;
               margin: 0 5px 0 0;
               }
               #pager a:hover {
               background-color: rgba(255, 255, 255, 0.5);
               }
               #pager a span {
               display: none;
               }
               #pager a.selected {
               background-color: #fff;
               }
               #donate-spacer {
               height: 100%;
               }
               #donate {
               border-top: 1px solid #999;
               width: 750px;
               padding: 50px 75px;
               margin: 0 auto;
               overflow: hidden;
               }
               #donate p, #donate form {
               margin: 0;
               float: left;
               }
               #donate p {
               width: 650px;
               }
               #donate form {
               width: 100px;
               }
               #logo {
               }
               #nav {
               font-size: 24px;
               font-family: "museo-sans",sans-serif;
               font-weight: 600;
               letter-spacing: 3px;
               text-transform: uppercase;
               }
               #footer1 {
               margin-top: 0px;
               background: #000000;
               padding-top: 0px;
               text-shadow: 0px 1px 0px rgba(255,255,255,.5); /* 50% white from bottom */
               }
               #copy1 {
               font-family: "museo-sans",sans-serif;
               margin-top:0px;
               text-align: right;
               color: #1e1e1e;
               font-weight: normal;
               padding-right: 5px;
               font-size: 10px;
               letter-spacing: 2px;
               text-transform: uppercase;
               cursor: pointer;
               padding-top: 0px;
               }
               #orchid {
               float: left;
               position: relative;
               top: -155px;
               }
               #bios {
               margin-bottom: 100px;
               }
               .party {
               float: left;
               width: 250px;
               margin: 7px;
               background-color: #EEE;
               border-color: 1px solid #CCC;
               padding: 10px;
               -moz-box-shadow: 1px 1px 3px #AAA;
               -webkit-box-shadow: 1px 1px 3px #AAA;
               box-shadow: 1px 1px 3px #AAA;
               }
               .party h2 {
               margin-right: 10px;
               }
               .gallery {
               float: left;
               padding-right: 10px
               }
               .bio {
               color: #999;
               padding-left: 20px;
               }
               .bio h4 {
               color: #555;
               font-family: 'Cedarville Cursive', arial, serif;
               font-size: 28px;
               line-height: 25px;
               }
               .bio {
               }
               #nav-top {
               width: 200px;
               margin-left: auto;   margin-right: auto;
               }
               .button {
               font-weight: normal;
               font-size: 12px;
               }
               .gallery {
               padding-top: 0px;
               padding-right: 30px;
               padding-bottom: 10px;
               }
               .gallery img {
               margin-left: 5px;
               padding-top: 0px;
               border: 1px solid #aaa;
               -moz-box-shadow: 0px 3px 8px #ccc;
               -webkit-box-shadow: 0px 3px 8px #ccc;
               box-shadow: 0px 3px 8px #ccc;
               }
               #rsvp-form-actual-form * {
               padding-top: 0px;
               }
               #rsvp-form-actual-form input{
               margin: 0 5px;
               }
               #top-buttons {
               position: fixed;
               right: 0px;
               top: 0px;
               z-index: 9999999;
               }
               #gbookcontainer {
               height: 780px;
               background: url(../images/guestbook.png);
               background-repeat: no-repeat;
               }
               
                              #candle {
               background: url(./candle.png);
               background-repeat: no-repeat;
               }
               
                             #cord {
               background: url(./cord.png);
               background-repeat: no-repeat;
               }
                             #veil {
               background: url(./veil.png);
               background-repeat: no-repeat;
               }
               
               #_guestbook iframe {
               width: 100%; 
               max-width: 1200px;
               height: 590px;
               }
               #top-buttons * {
               font-size: 10px;
               }

               .label {
               display: inline-block;
               width: 500px;
               }
               .block {
               	border: 1px dashed #ccc;
               	padding: 20px;
               }
               .contact {
               	width: 200px;
               	
               	float: left;
               }
     li {
     overflow: auto;
     }
   #mycarousel li {
     	overflow: initial;
     }
     .letter {
     	width:80%;
     padding: 20px;  
     	margin: 20px 20px;
	  -moz-box-shadow:    0px 0px 25px 5px #ccc;
  -webkit-box-shadow: 0px 0px 25px 5px #ccc;
  box-shadow:         0px 0px 25px 5px #ccc;
     }
     .shadow {
     		  -moz-box-shadow:    0px 0px 25px 5px #ccc;
  -webkit-box-shadow: 0px 0px 25px 5px #ccc;
  box-shadow:         0px 0px 25px 5px #ccc;
  overflow: auto;
     }
     .letter p {
     	padding: 20px;
   
     }
     .cursive {
     	  	font-size: 24px;
     	        font-family: 'Cedarville Cursive', arial, serif;
     }
     #nav li {
     	overflow: hidden;
     }
     
     .jcarousel-item  {
     	overflow:hidden;
     }
     #_entourage {
     	overflow: hidden;
     }
     
     .float-left {
     	float: left;
     	padding: 20px
     }
     
     .little-friend {
     	background: #DDD;
     	width: 260px;
     }
     .little-friend .bio {
     	clear: both;
     	padding-left: 5px;
     }
     .little-friend img {
     	float: left;
     }
     
     .lb-image, .lb-dataContainer, .lb-outerContainer {
    	padding-top: 0px;
     }
     .lb-dataContainer * {
	     padding-top: 0px;
     }
     #pages a {
     	color: #666666;
     	font-weight: bold;
     }
     
     .events-col {
      float: left;
      width: 100%;
     }
     .events-col-right {
     float: left;
     width: 70%;
     	}
     	
     	.sponsors {
     	
     		margin-bottom: 100px;
     		float: left;
     	}
            </style>
            <script src="assets/js/modernizr.js"></script>
            <!--[if lt IE 9]>
            <script src="assets/js/respond.min.js"></script>
            <![endif]-->
         </head>
         <body>
            <div id="top-buttons" class="group">
               <a id="github" href="#guestbook">GUESTBOOK</a>
            </div>
            <div style="text-align: center; clear: both;">
               <img src="images/logo.png" width="300" />
            </div>
            <div id="wrapper">
               <div id="carousel">
               	    <img src="images/17.jpg" alt="building6" width="960" height="512" />
                  <img src="images/1.jpg" alt="building1" width="960" height="512" />
                  <img src="images/2.jpg" alt="building2" width="960" height="512" />
                  <img src="images/3.jpg" alt="building3" width="960" height="512" />
                  <img src="images/4.jpg" alt="building4" width="960" height="512" />
                  <img src="images/6.jpg" alt="building6" width="960" height="512" />
                  <img src="images/7.jpg" alt="building6" width="960" height="512" />
                  <img src="images/8.jpg" alt="building6" width="960" height="512" />
                  <img src="images/9.jpg" alt="building6" width="960" height="512" />
                  <img src="images/10.jpg" alt="building6" width="960" height="512" />
                  <img src="images/11.jpg" alt="building4" width="960" height="512" />
                  <img src="images/12.jpg" alt="building5" width="960" height="512" />
                  <img src="images/13.jpg" alt="building6" width="960" height="512" />
                  <img src="images/14.jpg" alt="building6" width="960" height="512" />
                  <img src="images/15.jpg" alt="building6" width="960" height="512" />
                  <img src="images/16.jpg" alt="building6" width="960" height="512" />
                 </div>
               <a style="height: 540px;" href="#" id="prev" title="Show previous"> </a>
               <a style="height: 540px;" href="#" id="next" title="Show next"> </a>
            </div>
            <div class="wrap group">
               <div class="group section-wrap" style="padding-bottom:8px;">
                  <nav id="nav">
                     <ul class="group">
                        <li><a href="#story">Our Story<br />
                           <span>- About Us -</span>


                           
                           
                           
                           </a>
                        </li>
                        <li class="nav-2"><a href="#events">Events<br />
                           <span>- and Pictures -</span>
                           </a>
                        </li>
                        <li class="nav-3"><a href="#entourage">Entourage<br />
                           <span>- Bridal Party -</span>
                           </a>
                        </li>
                        <li class="nav-4"><a href="#wedding">Big Day<br />
                           <span>- Wedding Day Info -</span>
                           </a>
                        </li>
                                        <li class="nav-4"><a href="#travel">Travel<br />
                                        	
                           <span>- Staying in SF -</span>
                           </a>
                        </li>
                     </ul>
                  </nav>
                  	<div class="letter">
                  			
                  				<div class="cursive">Dear Family & Friends:</div><br>
                  				Thank you for being there for us and for supporting us throughout our relationship. You have all made a difference in our lives.  We'd be honored if you can join us on August 31, 2013 to celebrate our union.  
<br><br>
To our dear Parents,<br>
Thank you for being the best parents we could ever ask for and for raising us the way you did.  You have been there for us through thick and thin, and have provided us with unconditional love and support (both growing up and throughout our relationship).  The way we treat and value each other can only be explained by the relationships we know the best. We can only hope and wish that our marriage can be as successful and loving as yours. We love you!
       			<br>
<div class="cursive"> Love, <br>Jenina & Mike</div>
                  				
                  			
                  		</div>
                  <ul id="pages">
           
                  	   <li id="_travel">
                  	   	 <h2 class="subtitle"> <span>Travel Information</span></h2>
                  	   	  <ol>
                        <li>
                        <h4>Contact Information</h4>
<div class="contact">

<strong>Jenina Clamor</strong><br>
Bride <br>
bride@jeninaandmike.com<br>
(510) 377-6407<br>
</div><div class="contact">
<strong>Mike Chang </strong><br>
Groom<br>
groom@jeninaandmike.com<br>
(408) 605-5502<br>
</div><div class="contact">
<strong>Nena Clamor</strong><br>
Mother of the Bride<br>
nenaclamor AT gmail.com<br>
(925) 736-6301 home<br>
(925) 683-8431 cell<br>
</div><div class="contact">
<strong>Jess Clamor</strong><br>
Father of the Bride<br>
jessclamor AT att.net<br>
(925) 736-6301 home<br>
(925) 683-8640 cell <br>
</div><div class="contact">
<strong>Jane Chang</strong><br>
Mother of the Groom<br>
janehcchang AT gmail.com<br>
(408) 489-6353 cell<br>
</div><div class="contact">
<strong>Chun Chang</strong><br>
Father of the Groom<br>
changchunlung AT gmail.com<br>
</div>
                        </li>
                           <li>

                              <h4>Short Stay</h4>
                              We have arranged with <a href="http://www.starwoodhotels.com/lemeridien/property/overview/index.html?propertyID=1957">Le Meridien Hotel</a>, which is conveniently located next door to the reception, to block a set of rooms for our wedding attendants. They happen to be our caterer as well.
<h3>Rates</h3>
							  Hotel is pleased to confirm the following special 2013 net, non-commissionable guest room rates:
								<br><br>
								
								<div class="block">
							  <div class="label">Dates available:</div> 		8/30, 8/31<br><br>
							 <div class="label"> Run of House</div> 			$219<br>
							  <div class="label">Studio</div>				$219<br>
							  <br>
							 <div class="label">Additional Person:</div>    $ 20.00 per person<br>
							 </div>
	<br>
							  All guest room rates are quoted exclusive of applicable state and local taxes, currently 15.57%.
<br><br>
							  <h3>To Reserve</h3>
							  Le Meridien understands that reservations will be made by individual. Please kindly advise your attendees to call 1-866-837-4184 to arrange their hotel reservations and mention Clamor / Chang Wedding for the special group rate.


							  <h3>Reservation Deadline</h3>
							  All room requests to be received by Wednesday, July, 31, 2013 prior to your major arrival day of Friday, August 30, 2013.
							  <h3>Check-In & Check-Out Times</h3>
							  Standard check out time is 12:00 noon. Check-in time is 3:00 PM. Please let us know if you require any special
							  arrangements.


                           </li>
							<li>
							<h4>Longer Stay</h4>
							There are several hotels in the area if you choose not to extend your stay at Le Meridien.
							However, if you do intend on staying at Le Meridien, please book it at the same time the rate above is booked for those 2 days.
							</li>
							              <li>
                         
							<h4>Things To Do</h4>
							<div class="shadow">
                          	<img class="float-left" src="./eat.png" />
                          <div class="float-left">
                       <strong>Attractions</strong><br><br>Some of our favorite places include:<br>
                        Golden Gate Bridge<br>
                        Pier 39<br>
                        Union Square<br>
                        Ghirardelli Square<br>
                        Alcatraz<br>
                        Fisherman's Wharf<br>
                        Chinatown<br>
                        <br> Visit <a href="http://sanfrancisco.travel/todo/">San Francisco Travel</a> for some cool places to visit!
                          </div></div>
                            <div class="shadow">
                          	<img class="float-left" src="./shopping.png" />
            
                                    <div class="float-left">
                                 <strong>Places to Shop</strong><br><br>Powell Street<br>Union Square<br>Westfield San Francisco Center<br>Pier 39<br> <br> Visit <a href="http://sanfrancisco.travel/shop/">San Francisco Travel</a> for some cool places to shop!

                          </div></div>
                           </li>
                           </li>
						</ol>
                  	   </li>
                  	
                     <li id="_story">
                        <h2 class="subtitle"> <span>About Jenina and Mike</span></h2>
                   
<iframe src="http://player.vimeo.com/video/55618648?color=f0a400" width="500" height="281" frameborder="0" webkitAllowFullScreen mozallowfullscreen allowFullScreen></iframe> <p>Lucky - Story of Jenina & Mike from <a href="http://vimeo.com/user8445178">Mike Chang</a> on <a href="http://vimeo.com">Vimeo</a>.</p>


                     <!-- /#story -->
                                           
                     <li id="_wedding">
                        <h2 class="subtitle"> <span>Itinerary on the Wedding Day</span></h2>
                      <ol>
                      
                      
                
                           <li>
                              <h4>Time & Place</h4>
                              Ceremony begins at 2PM on August 31, 2013

                             <h3>Ceremony</h3> <div clas="label">Ceremony begins promptly at 2PM on August 31, 2013<br><strong><a href="http://www.stmarycathedralsf.org/">Cathedral of Saint Mary of the Assumption</a></strong>  1111 Gough Street, San Francisco, CA 94109<br>
                        <iframe width="425" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=1111+Gough+Street,+San+Francisco,+CA+94109&amp;aq=&amp;sll=37.784182,-122.424621&amp;sspn=0.010141,0.020492&amp;t=h&amp;gl=us&amp;ie=UTF8&amp;hq=&amp;hnear=1111+Gough+St,+San+Francisco,+California+94109&amp;layer=c&amp;cbll=37.784228,-122.424431&amp;panoid=OiqMybp7MEXfT4Oj7I9TBw&amp;cbp=13,255.8,,0,-12.63&amp;ll=37.778127,-122.424431&amp;spn=0.021302,0.048237&amp;z=14&amp;output=svembed"></iframe><br /><small><a href="https://maps.google.com/maps?f=q&amp;source=embed&amp;hl=en&amp;geocode=&amp;q=1111+Gough+Street,+San+Francisco,+CA+94109&amp;aq=&amp;sll=37.784182,-122.424621&amp;sspn=0.010141,0.020492&amp;t=h&amp;gl=us&amp;ie=UTF8&amp;hq=&amp;hnear=1111+Gough+St,+San+Francisco,+California+94109&amp;layer=c&amp;cbll=37.784228,-122.424431&amp;panoid=OiqMybp7MEXfT4Oj7I9TBw&amp;cbp=13,255.8,,0,-12.63&amp;ll=37.778127,-122.424431&amp;spn=0.021302,0.048237&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>
                              <h3>Reception</h3><div clas="label">Adult-only Formal Reception begins promptly at 4:00PM on August 31, 2013<br><strong><a href="http://bentleyreserve.com">Bentley Reserve</a></strong>  301 Battery Street  San Francisco, CA 94111<br>
                         <iframe width="425" height="240" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?q=301+Battery+Street,+San+Francisco,+CA&amp;layer=c&amp;sll=37.794357,-122.400217&amp;cbp=13,275.64,,0,-19.1&amp;cbll=37.794386,-122.400152&amp;hl=en&amp;gl=us&amp;ie=UTF8&amp;hq=&amp;hnear=301+Battery+St,+San+Francisco,+California+94111&amp;t=h&amp;panoid=f7MUK_0lwva6KfcqDA18tw&amp;source=embed&amp;ll=37.789709,-122.400184&amp;spn=0.016279,0.036478&amp;z=14&amp;output=svembed"></iframe><br /><small><a href="https://maps.google.com/maps?q=301+Battery+Street,+San+Francisco,+CA&amp;layer=c&amp;sll=37.794357,-122.400217&amp;cbp=13,275.64,,0,-19.1&amp;cbll=37.794386,-122.400152&amp;hl=en&amp;gl=us&amp;ie=UTF8&amp;hq=&amp;hnear=301+Battery+St,+San+Francisco,+California+94111&amp;t=h&amp;panoid=f7MUK_0lwva6KfcqDA18tw&amp;source=embed&amp;ll=37.789709,-122.400184&amp;spn=0.016279,0.036478&amp;z=14" style="color:#0000FF;text-align:left">View Larger Map</a></small>      <li>
                           	<h4>Parking</h4>

							  For the reception, discounted Valet Parking $30 per car at Le Meridien Hotel, located right next door.<br> For the Cathedral there are plenty of free parking located on-site.
                           
                        </ol>
                 
                     </li>
                     <!-- /#tuning -->
                     <li id="_guestbook">
                        <div id="gbookcontainer">
                           <iframe frameBorder="0" src="http://jeninaandmike.com/c23rK/index.php"></iframe>
                        </div>
                     </li>
                     <li id="_events">
                     
                     <div class="events-col">
                        <h2 class="subtitle"><span>It's Time to Celebrate!</span></h2>
                        <ol>
                           <li>
                              <h4>Enagement Party #1</h4>
                              <h3>Hosted by Mr. & Mrs. Jess Clamor</h3>
                              11/10/12 Las Vegas, NV, Clamor Residence</span><br />
                              Our engagement party was a success! Thanks to Mr. and Mrs. Clamor (Jenina's wonderful parents), we were able to have a dream engagement party surrounded by all the people we love. Thanks to everyone that were able to come out. It was a special time and reminded us of how fortunate we are.
                              Thank you especially the Jenina's parents, for opening your home and celebrating this special time with us. I am blessed and looking forward to having you as my in-laws.
                              See the pictures here.
                           </li>
                           <li>
                              <h4>
                                 Engagement Party #2
                              </h4>
                              <h3>Hosted by Geraldine & Charmayne</h3>
                              <br />
                              <span class="small">12/16/12 Foster City, CA</span> <br />
                              Sunday, December 16 at 11:00 AM to Sunday, December 16 at 2:30 PM<br />
                              Come join us for a Sunday Brunch Buffet to celebrate Jenina and Mike's engagement! Experience Sunday brunch surrounded by streams of koi ponds and waterfalls! Featuring : a fresh bakery, omelette/waffle stations, fresh seafood, salad bar, imported and domestic cheeses, carving stations with prime rib, seasonal hot entrees, spectacular dessert displays & much more!
                              Adults: $28.95
                              Children (5-12) $15.95 (4-under) free
                              Please RSVP by Sunday, 12/9/12<br>
                           </li>
                           <li>
                              <h4>
                                 Bridal Shower
                              </h4>
                              <h3>Hosted by Auntie rose, Gina, Janice and Jamie</h3>
                              <img src="jamiesinvite.png" />
                           </li>
                                                      <li>
						                                 <h4>
						                                    Bachelorette Party
						                                 </h4>
						                                 <h3>Hosted by Jamie, Matron of Honor</h3>
						                                 August 3 12PM, San Francisco
                           </li>
                           <li>
                              <h4>
                                 Bachelor Party
                              </h4>
                              <h3>Hosted by John, Best Man</h3>
                              July 12-14, Las Vegas <br>
                           </li>
                                <li>
                              <h4>
                                Wedding Rehearsal for Bridal Entourage
                              </h4>
                              TBA
                           </li>
                           
                        </ol>
                
					</div>
                     </li>
                     <!-- /#_events -->
                     <li id="_entourage">
<h2 class="subtitle"><span>The Wedding Party Lineup</span></h2>
                        <ul id="mycarousel" class="jcarousel jcarousel-skin-tango">
                           <li><img src="entourage/jamie.png" width="80" height="107" alt="" /></li>
                           <li class="mike"><img src="entourage/john.png" width="80" height="107" alt="" /></li>
                           <li><img src="entourage/geraldine.png" width="80" height="107" alt="" /></li>
                           <li class="mike"><img src="entourage/gene.png" width="80" height="107" alt="" /></li>
                           <li><img src="entourage/hanna.png" width="80" height="107" alt="" /></li>
                           <li class="mike"> <img src="entourage/liwei.png" width="80" height="107" alt="" /></li>
                           <li> <img src="entourage/marivic.png" width="80" height="107" alt="" /></li>
                           <li><img src="entourage/mansi.png" width="80" height="107" alt="" /></li>
                           <li class="mike"><img src="entourage/albert.png" width="80" height="107" alt="" /></li>
                           <li><img src="entourage/johanna.png" width="80" height="107" alt="" /></li>
                           <li class="mike"><img src="entourage/bhaskar.png" width="80" height="107" alt="" /></li>
                           <li class="mike"><img src="entourage/kevin.png" width="80" height="107" alt="" /></li>
                        </ul>
                        <div id="bios">
                           <div id="jamie" class="party">
                              <h2 />
                              Matron of Honor</h4>
                              <div class="gallery">
                                 <br /><img width="100" height="108" src="entourage/jamie-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Jamie Vallestero</h4><p>
Many of my greatest memories have been with my BEST everything: My best friend, best cousin, best sister, best nurse, best right hand, best partner… Jenna--as I call her! It is with great pleasure to be included in witnessing Jenna join in the Sacrament of Marriage with the kindest, BIGGEST appetite, the love of her life, the man of her dreams, the person who will make her happy forever... Michael Yi-han Chang!
</p><p>From the moment Jenina told me about Mike, I had tears of joy because I saw a happiness that I had never seen in her. It was when I met Mike, I knew my feelings were confirmed! Without a doubt Mike is the one for her! Mike is like the missing puzzle that not only fit with Jenina but with the whole family. His positive and friendly personality is a compliment to the perfection of someone I have always believed to be already perfect, Jenina!
</p><p>I wish them all the best and I am so happy to welcome Mike into our family! I look forward to many future memories to come and with many more family members that will develop out of this love!
<br><br>-Jamie</br></p><p>
Jamie and Jenina have been inseparable since Jamie was born 1.5 years after Jenina.  Jamie is Jenina’s first cousin on her mom’s side and is like the little sister Jenina never had.  They share countless memories from all the good times and the ups and downs in their lives.  Jenina is lucky to have Jamie in her life. <br><br>-Jenina</p>

                                 <a href="entourage/jamiefamily.png" rel="lightbox" title="my caption">Jamie, Dwight, and Darren at Our Engagement Party in Vegas</a>
                              </div>
                           </div>
                           <div id="john" class="party">
                              <h2 />
                              Best Man</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/john-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>John Yi</h4>
                                 <p>
                                    <strong>When did they meet?</strong> <br />September 2003<br />
                                 </p>
                                 <p>
                                    <strong>How did they meet?</strong>	 <br />Rushing for the same fraternity
                                 </p>
                                 <p>
                                    <strong>Where did they meet?</strong> On the steps of the University of Michigan Union building
                                 </p>
                                 <p>                                    "The first time I saw Mike Chang was at the steps of the Michigan Union waiting for the start of a Pi Alpha Phi rush event. We were both 18 year old college freshmen getting ourselves into something we really had no business doing.

                                 </p>

                                 <p>

                                    Nevertheless, this process of brotherhood and hazing made me come to appreciate and cherish a then-thugged out FOB with whom I shared little to no common interest with. To this day we are still very little alike but it is through such adversity and conflict, like the U.S. Civil War, we have managed to fight and hate but eventually reunite under a loose banner of mutual understanding and reluctant friendship.

                                 </p>


                              </div>
                           </div>
                           <div id="geraldine" class="party">
                              <h2 />
                              Maid of Honor</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/geraldine-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Geraldine Nisperos</h4>
                                 

<p>Geraldine and Jenina were classmates during their college years in nursing school at University of San Francisco.  Geraldine and Jenina became best friends after college when they ended up as pediatric nurses working in the same hospital (still currently work together at Lucile Packard Children’s Hospital in Palo Alto, California) as new grads.  Geraldine’s adorable son, JJ,  is one of Jenina’s godsons.  Geraldine has been officially been “adopted” by Jenina’s family.  Geraldine is like a “little” big sister Jenina never had! <br><br>-Jenina</p>
                                  </div>
                           </div>
                           <div id="albert" class="party">
                              <h2 />
                              Groomsman</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/albert-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Albert Hu</h4><p>
                               <strong>  How did they meet?</strong><br>
                                 A night out in San Francisco through mutual friend Sandra<br><br>
                                 <strong>
                                 When did they meet?</strong>
                                 July 2007
                              <strong>   Where did they meet?</strong><br>
                                 San Francisco State University apartment</p>
                                 <p>Albert, affectionately known to Mike as Alby, met Mike through a mutual friend on a night out in San Francisco. Albert did not like Mike at first, but grew to love him the more he gets to know him.</p>
                                 <p>Mike considers Albert one of his "boys", and hangs out with him every now and then even though they don't live near each other anymore. Their work life crossed paths at one point where both of them were working for Cisco. They like to talk in geek, and celebrates everytime Mike gets a new job with a bottle of champagne at Straits. Albert likes to salvage items from Mike's electronic junk yard. Albert also likes to deadlift, squat, and eat.</p>
                              </div>
                           </div>
                           <div id="gene" class="party">
                              <h2 />
                              Groomsman</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/gene-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Gene Kim</h4>
                                 <p>
                                    <strong>When did they meet?</strong> <br />September 2003<br />
                                 </p>
                                 <p>
                                    <strong>How did they meet?</strong>	 <br />Rushing for the same fraternity
                                 </p>
                                 <p>
                                    <strong>Where did they meet?</strong> On the steps of the University of Michigan Union building
                                 </p>
                                 <p>
                                    Gene was one of Mike's closest friends in college. He came from Korea to study in the US and befriended Mike through their fraternity at the University of Michigan. <br />
                                    They have gone through good and rough times together and were witnesses of each other's personal growths over the years. Gene has cooked plenty of Korean food for Mike. Gene has since moved back to Korea. They have remained friends after all this time. As a testament to their relationship, Gene is going to fly over to the US 3 times for Mike (engagement party, bachelor party, and wedding).
                                 </p>
                              </div>
                           </div>
                           <div id="bhaskar" class="party">
                              <h2 />
                              Groomsman</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/bhaskar-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Bhaskar Bhattacharjee</h4>
                                 <p>
                                    <strong>When did they meet?</strong> <br />May 2007<br />
                                 </p>
                                 <p>
                                    <strong>How did they meet?</strong>	 <br />Co-workers
                                 </p>
                                 <p>
                                    <strong>Where did they meet?</strong><br /> Cisco Building 22, Second Floor
                                 </p>
                                 <p>
                                    <strong>CSCO price when they worked together</strong><br />-32%
                                 </p>
                                 <p>
                                    Mike met Bhaskar as a new intern at now-defunct Cisco Systems. This was Mike's first job in the United States, and the beginning of his engineering career. Mike was recruited as an intern in Bhaskar's group. They became friends since then.
                                 </p>
                                 <p>
                                    After Mike left to finish his school work, he was in talk with Cisco again for a possible 2-peat. Bhaskar encouraged this move, and since then Bhaskar regained the 20 pounds he lost while Mike was gone. The have eaten at every single restaurant within 20 miles of Milpitas over the time they've worked together.
                                 </p>
                              </div>
                           </div>
                           <div id="hanna" class="party">
                              <h2 />
                              bridesmaid</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/hanna-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Hanna Chang</h4><p>
                                 <strong>When did they meet?</strong> <br />March 1989<br /></p>
                                 <p>
                                    <strong>How did they meet?</strong>	 <br />Mike wanted to see what the fuss is about
                                 </p>
                                 <p>
                                    <strong>Where did they meet?</strong><br />Taiwan
                                 </p><p>
                                 Hanna is one of the oldest friends Mike has on this list. They were the best of friends growing up, and still today Mike does not hesitate to call Hanna for any problem he has. She accompanies Mike through all his moves in Taiwan, Canada, and California. Sure they had their quarrels, but Hanna is forever one of Mike's favorite siblings.
                                </p> <p></p>
                              </div>
                           </div>
                           <div id="johanna" class="party">
                              <h2 />
                              bridesmaid</h4>
                              <div class="gallery"> 
                                 <br /><img  width="100" height="108"  src="entourage/johanna-large.png" />
                              </div>
                              <div class="bio">

                                 <h4>Johanna Chang</h4><p>
<strong>Who am I?<br><br></strong>

I am your second cousin or niece (haha). I am completing residency in radiology at harbor-ucla and will see you at Lucille Packard for a year of fellowship. 
<br><br>
<strong>How did you meet?<br><br></strong>

Well, there are many pics of Jenina and I in cribs (She had and still has a lot more hair), so I guess you could say we have known each other all of our lives. I can fully vouch for the sweetness and fierce loyalty of her character.
<br><br>
<strong>What do you have to say about Mike and Jenina?<br><br></strong>

Well, I haven't met Mike yet, but he seems to make her uber happy and I like that a lot.
<br><br>
Jenina is a wonderful, smart, gorgeous person, and I am lucky to have grown up with her

                                 <br><br>-Johanna
</p>

<p>
Johanna is Jenina’s niece (her first cousin’s daughter on her dad’s side), but the funny thing is that she has known Jenina since she was 2 months old.  Johanna has always been there for Jenina, including being by her side during her Baptism, and practicing the cha cha and tango for countless hours (she was in Jenina’s Cotillion (18th Birthday party).  Jenina is happy that Johanna will again be by her side on her special day.  <br><br>-Jenina
</p></div>
                           </div>
                           <div id="liwei" class="party">
                              <h2 />
                              groomsman</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/liwei-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Li-Wei Wu</h4>
                                 <p><strong>How did they meet?</strong><br />
                                    Don't remember, but should have involved their parents
                                 </p>
                                 <p>
                                    <strong>When did they meet?</strong><br />
                                    1985
                                 </p>
                                 <p>Li-Wei is a honored guest from Taiwan, and Mike's eldest cousin, or Mike's Mother's Elder-Sister's Child.</p>
                                 <p> Mike remembers that everytime they saw each other in their childhood, the adults loved to stand us side by side and compare our heights. Li-Wei was a good 5-inches taller than Mike for most of Mike's life. Mike's memories of Li-Wei includes playing in the mud, Li-Wei's kindness in giving his Dragon Ball stickers collection, buying Crayon Shin Chan comics from the stores in Miao-Li. He is Mike's closest cousin, and Mike cannot be more grateful than having Li-Wei attend his wedding.
                              </div>
                           </div>
                           <div id="kevin" class="party">
                              <h2 />
                              groomsman</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/kevin-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Kevin Liang</h4>
                                 <p><strong>How did they meet?</strong><br />
                                    Meeting to discuss potentially living together
                                 </p>
                                 <p><strong>
                                    When did they meet?</strong><br />
                                    March 2011
                                 </p>
                                 <p><strong>
                                    Where did they meet?</strong><br />
                                    Banana Leaf
                                 </p>
                                 <p>
                                    Kevin met with Mike through their mutual friend Kharen. Kevin at the time was new to California and looking for a place to stay for his new job at Cisco systems. Kevin was Mike's roommate for the past year.
                                 </p>
                                 <p>
                                    As a well-to-do professional, he is one of the few friends that my parents liked (the rest being the ones listed here). They shared their passion for fitness and hip hop. Like Mike, Kevin has lived in multiple countries and states in his life. Mike found it incredible that they had so much in common, and attributed it to the fact that they are both half-Hakka. Kevin enjoys basketball and "rap-beefs."
                                 </p>
                                 </p>
                              </div>
                           </div>
                           <div id="mansi" class="party">
                              <h2 />
                              bridesmaid</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/mansi-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Mansi Shah</h4>
                                 
                                  <p>
                                 I can't remember if it was the first day or just within the first week, but Jenina and I became friends very early on in the 4th grade. We had to do a fire drill and the entire class had to evacuate to the playground. We were both new to the school and neither one of us knew anyone else. We were both standing next to each other and somehow we started talking and have been friends ever since. It has been 22 years of friendship now and we have been through everything together - birthday parties, sleepovers, playing with our rabbits, first dances, graduations, proms, crushes, heartbreaks, even piano recitals! And that barely begins to cut the surface. We used to wonder about the types of men we would marry - our adolescent dreams have now become a reality and she is marrying Mike! I'm so excited to celebrate with the two of you. Just be prepared - I cried at the Cotillion, I will most likely cry at the wedding =)
                                 
                                 <br><br>-Mansi
                                 </p>
                                 
                                 
                                 <p>Mansi is Jenina’s childhood best friend.  They met when they were 9 years old on the first day of elementary school at Golden View in San Ramon, California.  Jenina just moved from Fremont to Danville, so she was lucky to have found a best friend.  They were inseparable in school until they graduated high school at Monte Vista High School in Danville. The earliest memory Jenina has of Mansi is that first day of school when all of the students were already outside in an assembly and Mansi walks in with her parents.  Mansi has been there for Jenina ever since, through all the milestones in her life, including being in her Cotillion (Jenina’s 18th Birthday).  Jenina and Mansi’s friendship is one in a million! 
                                 <br><br>-Jenina
                                 </p>
                                
                              </div>
                           </div>
                           <div id="marivic" class="party">
                              <h2 />
                              bridesmaid</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/marivic-large.png" />
                              </div>
                              <div class="bio">
                                 <h4>Marivic Lee</h4>
<p>                                 Marivic met Jenina in the Philippines when she was about 1 year old.  Marivic and Jenina are first cousins on her mom’s side.  They were always together every time Jenina would go to the Philippines to visit.  Jenina is excited that Marivic is coming all the way from the Philippines to be by her side as her bridesmaid. <br><br>-Jenina </p>
<p> We met at our grandparent’s house when her family visited the Philippines when we were kids. <br> Jenina is one of the sweetest girls I’ve ever known. As a woman she is independent and hardworking. She’s always caring, thoughtful and kind to everyone. I wish you all the best in the next chapter of your journey. <br>
Hi Mike, I may not have met you yet but I can see you make Jenina happy and that’s all that matters. <br>
Congratulations on your engagement. <br><br>
-Marivic</p>
                             </div>                           
                             
                             
                             </div>
                            </div>
                        <div class="sponsors">
                            <div class="little-friend party">
                              	                              <h2 />
                              Principal Sponsors</h4>
                         
                              <div class="bio">
                                 <h4>
Mr. Rolando Rivera & Mrs. Marlene Madriaga
</h4>
                            </div>   
                        </div>    
                        
                                                    <div class="little-friend party">
                              	                              <h2 />
                              Principal Sponsors</h4>
                         
                              <div class="bio">
                                 <h4>
Mr. Francisco Chua & Mrs. Guia Chua
</h4>
                            </div>   
                        </div>    
                        
                        
                        
                                                    <div class="little-friend party">
                              	                              <h2 />
                              Principal Sponsors</h4>
                         
                              <div class="bio">
                                 <h4>
Mr. Jaime Rivera & Mrs. Rosalinda Rivera
</h4>
                            </div>   
                        </div>    
                        
                        
                        
                                                    <div class="little-friend party">
                              	                              <h2 />
                              Principal Sponsors</h4>
                         
                              <div class="bio">
                                 <h4>
Mr. Victoriano Chua & Mrs. Lily Chua
</h4>
                            </div>   
                        </div>    
                        
                        
                        
                        </div>

<div class="sponsors">

                            
                            
                            
                                         <div class="little-friend party" id="candle">
                              	                              <h2 />
                              Candle Sponsors</h4>
                         
                              <div class="bio">
                                 <h4>
Gina Rivera & Alex Encarnacion 
</h4>
                            </div>   
                        </div>    
                        
                        
                        
                        
                                                 <div class="little-friend party" id="veil">
                              	                              <h2 />
                              Veil Sponsors</h4>
                         
                              <div class="bio">
                                 <h4>
Janice Diaz & Mario Diaz
</h4>
                            </div>   
                        </div>    
                        
                        
                        
                        
                
                        
                                                 <div class="little-friend party" id="cord">
                              	                              <h2 />
                              Cord Sponsors</h4>
                         
                              <div class="bio">
                                 <h4>
Anna Liza Ocampo & Joel Townsend 
</h4>
                            </div>   
                        </div>    
                                       </div>
                              <div class="little-friend party">
                              	                              <h2 />
                              jr. bridesmaid</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/maczine-large.png" />
                              </div>
                              <img src="./dress.png" />
                              <div class="bio">
                                 <h4>Maczine Arenas</h4>
                            </div>   
                            
                            </div>
                            
   
                            
                                      <div class="little-friend party">
                              	                              <h2 />
                              jr. bridesmaid</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/alyssa-large.png" />
                              </div>
                                <img src="./dress.png" />
                              <div class="bio">
                                 <h4>Alyssa Sales</h4>
                            </div>   
                            
                                </div>
                            
                            
                                    <div class="little-friend party">
                              	                              <h2 />
                              flower girl</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/siena-large.png" />
                              </div>
                                <img src="./flower.png" />
                              <div class="bio">
                                 <h4>Siena Encarnacion</h4>
                            </div>   
                            
                                </div>
                            
                            
                               <div class="little-friend party">
                              	                              <h2 />
                              flower girl</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/ella-large.png" />
                              </div>
                                <img src="./flower.png" />
                              <div class="bio">
                                 <h4>Ella Montalbo</h4>
                            </div>   
                            
                                </div>
                                
                                
                                
                                                                                   <div class="little-friend party">
                              	                              <h2 />
                              jr. groomsman</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/ace-large.png" />
                              </div>
                                <img src="./suite.png" />
                              <div class="bio">
                                 <h4>Ayce Mangapit</h4>
                            </div>   
                            
                                </div>
                                                         <div class="little-friend party">
                              	                              <h2 />
                              jr. groomsman</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/patrick-large.png" />
                              </div>
                                <img src="./suite.png" />
                              <div class="bio">
                                 <h4>Patrick Antonio</h4>
                            </div>   
                            
                                </div>
                                
                                
                                 <div class="little-friend party">
                              	                              <h2 />
                              ring bearer</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/dylan-large.png" />
                              </div>
                                <img src="./ring.png" />
                              <div class="bio">
                                 <h4>Dylan Navarro</h4>
                            </div>   
                                </div>
                            
                            
                            
                            
                                        <div class="little-friend party">
                              	                              <h2 />
                              coin bearer</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/aiden-large.png" />
                              </div>
                                <img src="./bible.png" />
                              <div class="bio">
                                 <h4>Aidan Encarnacion</h4>
                            </div>   
                                </div>
                            
                            
                                 
                                        <div class="little-friend party">
                              	                              <h2 />
                              bible bearer</h4>
                              <div class="gallery">
                                 <br /><img  width="100" height="108"  src="entourage/brandon-large.png" />
                              </div>
                                <img src="./bible.png" />
                              <div class="bio">
                                 <h4>Brandon Navarro</h4>
                            </div>   
                        </div>            	
                        
                     
                        
                        
                       
                        
                        </div>
                            
 
               </div>
               
               <br />    <div align="center">
                          <img width="300px;" src="images/divider_big_transparent.png" />
                         </div><br />
               </li> <!-- /#about -->
               </ul> <!-- /#pages -->
            </div>
            <!-- /.section-wrap -->
            </div> <!-- /.wrap -->
            <div id="footer1">
               <div id="copy1">&copy; 2012 to Forever, Jenina Clamor & Mike Chang </div>
            </div>
            <link href="lightbox.css" rel="stylesheet" />
            <script src="assets/js/jquery.scrollto.js"></script>
            <script src="lightbox.js"></script>
            <script src="jquery.refineslide.min.js"></script>
            <script src="assets/js/ios-orientation-change-fix.js"></script>
            <script src="assets/js/footer.js"></script>
            <script src="masonry.js"></script>
            <script type="text/javascript" src="lib/jquery.jcarousel.min.js"></script>
            <script type="text/javascript"></script>
            
    <link rel="stylesheet" type="text/css" href="ubergallery/resources/colorbox/5/colorbox.css" />    
    <script type="text/javascript" src="resources/colorbox/jquery.colorbox.js"></script>

         </body>
      </html>