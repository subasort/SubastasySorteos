!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lte-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lte-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lte-ie9"> <![endif]-->
<!--[if IE 9]>         <html class="no-js lte-ie9"> <![endif]-->
<!--[if gt IE 9]><!--> <html class="no-js"> <!--<![endif]-->
   <head>

      <meta charset="utf-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, minimal-ui">
      <meta name="apple-mobile-web-app-capable" content="yes">

      <meta name="description" content="A randomizer from Humblebee">
      <meta property="og:title" content="Fluky"/>
      <meta property="og:description" content="A randomizer from Humblebee">
      <meta property="og:url" content="http://fluky.io"/>
      <meta property="og:image" content="http://fluky.io/img/fluky-fb-img-v2.png"/>

      <title>Fluky</title>

      <link rel="shortcut icon" href="favicon.png">
      <link rel="apple-touch-icon" href="img/general/apple-touch/apple-touch-icon-iphone-60x60.png">
      <link rel="apple-touch-icon" sizes="76x76" href="img/general/apple-touch/apple-touch-icon-ipad-76x76.png">
      <link rel="apple-touch-icon" sizes="120x120" href="img/general/apple-touch/apple-touch-icon-iphone-retina-120x120.png">
      <link rel="apple-touch-icon" sizes="152x152" href="img/general/apple-touch/apple-touch-icon-ipad-retina-152x152.png">

      <style>
      body,html {height: 100%; width: 100%; padding: 0; background: #f7f0ee !important; overflow: hidden; position: relative;}
      .wrapper { height: 100%; width: 100%; }
      .wrapper .section { overflow: hidden; }
      .wrapper .barrio { font-family: 'Barrio'; font-size: 0px;  }

      .share {margin: 15px 15px; position: absolute; left: 0; right: 0;}
      .share .fb-like {margin-right: 10px; width: auto !important; display: inline-block !important; float: left;}

      #audio {position: absolute; z-index: 1000; top: 15px; right: 15px;}
      #audio .control {display: inline-block; width: 25px; height: 25px; cursor: pointer; margin-left: 10px; background: url(img/soundoff.svg) no-repeat; background-size: contain;}
      #audio .control.playing{background: url(img/sound.svg) no-repeat;background-size: contain;}
      #audio .info {display: inline-block; width: 25px; height: 25px; cursor: pointer; background: url(img/info.svg) no-repeat; background-size: contain;}
      #audio .info span {opacity: 0; -webkit-transition-duration: 100ms; -moz-transition-duration: 100ms; -o-transition-duration: 100ms; transition-duration: 100ms; background-color: #6ed2a0; position: absolute; right: calc(100% + 10px); color: #fff; padding: 1em 1.5em; font-size: 1em; line-height: 1.2;}
      #audio .info a {color: inherit; text-decoration: none; font-weight: bold;}
      #audio .info.show > span {opacity:1;}
      .touch #theme, .touch #cheer, .touch #audio {display: none;height: 0px;}

      #awwwards{ position: absolute;width: 126px;height: 126px;text-indent: -666em;overflow: hidden;z-index: 999;-webkit-transition: all 1s ease;transition: all 1s ease; }
      #awwwards.bottom{bottom: 0; right: 0;}

      #awwwards a{position: absolute;top: 0;left: 0;display: block;width: 126px; height: 126px;background-repeat: no-repeat;background-position: 4px -23px;background-size: 145px 145px;}
      #awwwards.bottom.right a{ background-position: -23px 4px;-webkit-transform: rotate(-90deg);transform: rotate(-90deg);}
      #awwwards.honorable.white a{background-image: url(img/awwwards_honorable_white.png);}
      @media only screen and (-Webkit-min-device-pixel-ratio: 1.5), only screen and (-moz-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2),  only screen and (min-device-pixel-ratio: 1.5) {
         #awwwards.honorable.white a{ background-image: url(img/awwwards_honorable_white@2x.png); }
      }

      .touch #awwwards {display:none;}

      </style>

      <script>

         (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
         (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
         m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
         })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

         ga('create', 'UA-54504559-1', 'fluky.io');
         ga('send', 'pageview');

      </script>

   </head>

   <body>

      <div id="fb-root"></div>
      <script>(function(d, s, id) {
         var js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id;
         js.src = "//connect.facebook.net/sv_SE/sdk.js#xfbml=1&appId=795274167179436&version=v2.0";
         fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));</script>

      <audio id="theme" autoplay loop>
         <source src="sounds/fluky-soundtrack.mp3" type="audio/mpeg">
         <source src="sounds/fluky-soundtrack.ogg" type="audio/ogg">
         Your browser does not support this audio format.
      </audio>

      <audio id="cheer">
         <source src="sounds/cheer.mp3" type="audio/mpeg">
         <source src="sounds/cheer.ogg" type="audio/ogg">
         Your browser does not support this audio format.
      </audio>

      <div id="wrapper" class="wrapper">

         <h1 class="barrio">Fluky</h1>

         <div id="audio">
            <span class="info">
                  <span>Monkeys Spinning Monkeys" Kevin MacLeod (<a href="http://incompetech.com">incompetech.com</a>)
                  Licensed under Creative Commons: By Attribution 3.0
                  <a href="http://creativecommons.org/licenses/by/3.0/">http://creativecommons.org/licenses/by/3.0/</a></span>
               </span>
               <span class="control playing">
            </span>
         </div>
      </div>

      <script>window.twttr = (function (d, s, id) {
         var t, js, fjs = d.getElementsByTagName(s)[0];
         if (d.getElementById(id)) return;
         js = d.createElement(s); js.id = id; js.src= "https://platform.twitter.com/widgets.js";
         fjs.parentNode.insertBefore(js, fjs);
         return window.twttr || (t = { _e: [], ready: function (f) { t._e.push(f) } });
      }(document, "script", "twitter-wjs"));</script>

       <script>
         var cb = function() {
           var l = document.createElement('link'); l.rel = 'stylesheet';
           l.href = 'css/screen.css';
           var h = document.getElementsByTagName('head')[0]; h.parentNode.insertBefore(l, h);
         };
         var raf = requestAnimationFrame || mozRequestAnimationFrame ||
             webkitRequestAnimationFrame || msRequestAnimationFrame;
         if (raf) raf(cb);
         else window.addEventListener('load', cb);
      </script>

      <script src="js/modernizr.js" defer></script>
      <script src="js/vendor.js" defer></script>
      <script src="js/app.js" defer></script>

   </body>

   <script id="sections-template" type="text/x-handlebars-template">
      <div id="sections">
         <section id="intro" class="section">

            <div class="share">
               <div class="fb-like" data-href="http://fluky.io" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false">
               </div>
                <a href="https://twitter.com/share?text=A randomizer from Humblebee" class="twitter-share-button" data-lang="en">Tweet</a>
            </div>


            <canvas id="confetti-intro"></canvas>

            <div class="logo">
               <img src="img/logo.svg">
               <h1>A randomizer from <a href="http://humblebee.se">Humblebee</a></h1>
            </div>

            <button class="btn-wrapper" id="start">
               <span class="btn-action">Start</span>
               <span class="big-btn"></span>
            </button>

            <div id="awwwards" class="honorable white bottom right">
               <a href="http://www.awwwards.com" target="_blank">Awwwards</a>
            </div>

         </section>

         <section id="spinning-wheel" class="section">

            <div class="add-thing-wrapper">

               <form id="add-thing">
                  <input id="thing-box" type="text" placeholder="Add something">
                  <button type="submit" id="add-thing-btn"></button>
               </form>

               <ul id="thing-list">
                  <li class="generatedUrl flip-container">
                     <div class="flipper">
                        <span class="front">Share</span>
                        <input type="text" id="url-to-share" class="back">
                     </div>
                  </li>
               </ul>

               <button class="btn-wrapper spin" id="spin-mobile">
                 <span class="btn-action">Go!</span>
                 <span class="big-btn"></span>
               </button>

            </div>

            <div class="wheel-wrapper">
               <div class="table">
                  <div>
                     <canvas id="wheel"></canvas>
                     <div id="arm"></div>
                     <button class="btn-wrapper spin" id="spin">
                        <span class="btn-action">Go!</span>
                        <span class="big-btn"></span>
                     </button>
                  </div>
               </div>
            </div>

            <span class="error"></span>

         </section>

         <section id="winner" class="section">

            <div class="share">
               <div class="fb-like" data-href="http://fluky.io" data-layout="button_count" data-action="like" data-show-faces="true" data-share="false">
               </div>
                <a href="https://twitter.com/share?text=A randomizer from Humblebee" class="twitter-share-button" data-lang="en">Tweet</a>
            </div>

            <canvas id="confetti-winner"></canvas>
            <h2 class="winner"></h2>

            <button id="restart" class="btn-wrapper">
               <span class="btn-action">Restart</span>
               <span class="big-btn"></span>
            </button>

         </section>

      </div>

  </script>

  <script id="thing-template" type="text/x-handlebars-template">
      <li style="background-color:{{color}};">
         <span>{{text}}</span>
         <button type="button" class="remove"></button>
      </li>
  </script>

</html>
