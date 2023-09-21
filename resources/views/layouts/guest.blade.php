<!DOCTYPE html>
<html lang="pl">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>
      Language clinic - najlepsza szkoła językowa
    </title>
    <meta name="description" content="Sprawdź swój angielski i pobierz darmowe materiały z naszej szkoły językowej. Naucz się angielskieg z nami rozmawiaj swobodnie" />
    <meta name="keywords" content="język angielski, nauka języka, american english, tutlo, szkołajęzykowa, język dla ciebie, skuteczna nauka języka, szybka nauka angielskiego, angielski od podstaw, angielski dla dorosłych, angielski dla zaawansowanych, szkoła językowawarszawa, szkoła językowa opoczno, szkoła językowa ełk, szkoła językowa Augustów, Szkoła językowa Łódź" />
    <meta name="author" content="Wise - szkoła językowa" />
    
    <!-- fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Covered+By+Your+Grace&family=Dokdo&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="{{ asset('images/favicon.ico') }}" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Big+Shoulders+Inline+Text&family=Open+Sans:wght@300&family=Orbitron&family=Six+Caps&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/resources/css/fontello.css" type="text/css" />
    <!-- Define your gradient here - use online tools to find a gradient -->
    <style>
      .green-border:focus {
        border-color: #a3e635;
        outline: none;
      }
      .gradient {
        background: linear-gradient(180deg, #fae8ff 0%, #d8b4fe 100%);
      }
  
      /* Animate vertical fade in */
      .animate {
      opacity: 0;
      transform: translateY(50px);
      transition: all 0.4s ease-in-out;
      }

      .animate.show {
      opacity: 1;
      transform: translateY(0);
      }

      @keyframes scrollText {
        0% {
          transform: translateX(-100%);
        }
        100% {
          transform: translateX(100%);
        }
      }

      /* animate blurr fade in */
      .anim-hidden{
        opacity: 0;
        transition: all 1s;
        filter: blur(5px);
      }
      .anim-show{
        opacity: 1;
        filter: blur(0px);
      }

      /* animate side slide */
      .slide-hidden{
        opacity: 0;
        transition: all 1s;
        transform: translateX(-30%);
        filter: blur(5px);
      }
      .slide-show{
        opacity: 1;
        transform: translateX(0);
        filter: blur(0px);
      }
      .slide:nth-child(2){
        transition-delay: 200ms;
      }
      .slide:nth-child(3){
        transition-delay: 300ms;
      }
      .slide:nth-child(4){
        transition-delay: 400ms;
      }
      .slides{
        display:flex;
        flex-wrap: wrap;
      }
      
    </style>
    @vite('resources/css/app.css')
  </head>
  <body class="leading-normal tracking-normal text-slate-800 bg-slate-100" style="font-family:'Source Sans Pro', sans-serif;">
    <!--Nav-->
    <nav id="header" class="fixed w-full z-30 top-0 bg-slate-100/50">
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 pt-2">
        <div class="ml-4 px-2 flex items-center border-solid border-2 border-black rounded-md">
          <a class="toggleColour no-underline hover:no-underline text-2xl font-bold transform transition hover:scale-110 duration-300 ease-in-out m-auto" style="font-family: Orbitron"href="/">      
            L
          </a>
        </div>
        <div class="block lg:hidden pr-4">
          <button id="nav-toggle" class="flex items-center p-1 text-white  focus:outline-none focus:shadow-outline transform transition hover:scale-110 duration-300 ease-in-out">
            <svg class="fill-current h-6 w-6 mb-1" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <title>Menu</title>
              <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" />
            </svg>
          </button>
        </div>
        <div class="w-full flex-grow lg:flex items-center lg:w-auto hidden lg:mt-0 bg-slate-100/80 lg:bg-transparent text-slate-800 lg:p-0 z-20 mt-3"  id="nav-content">
          <ul class="list-reset lg:flex justify-end flex-1 items-center md:mb-0 pb-2">
            <li class="mr-3">
              <a class="toggleColour inline-block py-2 px-4 font-bold no-underline transform transition hover:scale-110 duration-300 ease-in-out" style="font-family:'Orbitron'" href="/przetestuj-swoj-angielski">Przetestuj swój angielski</a>
            </li>
            <li class="mr-3">
              <a class="toggleColour inline-block py-2 px-4 font-bold no-underline transform transition hover:scale-110 duration-300 ease-in-out" style="font-family:'Orbitron'" href="#">O nas</a>
            </li>
            @auth
              
              <li class="mr-3">
                <a class="toggleColour inline-block py-2 px-4 font-bold no-underline transform transition hover:scale-110 duration-300 ease-in-out" style="font-family:'Orbitron'" href="/">Administracja</a>
              </li>
             
              <li class="mr-3">
                <a class="toggleColour inline-block py-2 px-4 font-bold no-underline transform transition hover:scale-110 duration-300 ease-in-out" style="font-family:'Orbitron'" href="/">Twoje konto</a>
              </li>
              @else
              <li class="mr-3">
                <a class="toggleColour inline-block py-2 px-4 font-bold no-underline transform transition hover:scale-110 duration-300 ease-in-out" style="font-family:'Orbitron'" href="/register">Rejestracja</a>
              </li>
              <li class="mr-3">
                <a class="toggleColour inline-block py-2 px-4 font-bold no-underline transform transition hover:scale-110 duration-300 ease-in-out" style="font-family:'Orbitron'" href="/login">Logowanie</a>
              </li>
            @endauth
          </ul>
        </div>
        </div>
        
      </div>
    </nav>

    <!--Hero-->
    
  
      {{ $slot }}
   

    <!-- FOOTER -->
    <footer class="bg-slate-100/40">
    <!-- Change the colour #f8fafc to match the previous section colour -->
      
     
      <section class="container mx-auto text-center py-6 anim-hidden">
        <h2 class="w-full my-2 text-4xl font-bold leading-tight text-center">
          Jeśli masz jakiekolwiek pytania - skontaktuj się z nami!
        </h2>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto bg-black w-1/6 opacity-25 my-0 py-0 rounded-t"></div>
        </div>
        <h3 class="my-4 text-3xl leading-tight">
          info@testyourenglish.com
        </h3>
        <h3 class="my-4 text-3xl leading-tight">
          
        </h3>
        <div class="w-full mx-auto flex flex-wrap items-center justify-center">
          <a class="mx-4 text-white no-underline hover:no-underline text-2xl lg:text-4xl transform transition hover:scale-105 duration-300 ease-in-out" href="https://www.instagram.com/wise_developers_/?igshid=ZDdkNTZiNTM%3D&fbclid=IwAR1y-6P8zyitC7zka1FfY4Wos05rirXvyUtkywGjFG4518xe4bahtNnlS-Q" target="_blank">
            <img class="h-6" src="{{ asset('/images/instagram.png')}}" />
          </a>
          <a class="mx-4 text-white no-underline hover:no-underline text-2xl lg:text-4xl transform transition hover:scale-105 duration-300 ease-in-out" href="https://www.facebook.com/people/WiseDev/100090727395598/" target="_blank">
            <img class="h-6" src="{{ asset('/images/facebook.png')}}" />
          </a>
          
        </div>
      </section>
    </footer>
    
   
    <!-- Navigation management  -->
    <script>
      /*
      var scrollpos = window.scrollY;
      var header = document.getElementById("header");
      var navcontent = document.getElementById("nav-content");
      
      var brandname = document.getElementById("brandname");*/

      var toToggle = document.querySelectorAll(".toggleColour");
      
      
    </script>
    <script>
      /*Toggle dropdown list*/
    

      var navMenuDiv = document.getElementById("nav-content");
      var navMenu = document.getElementById("nav-toggle");

      document.onclick = check;
      function check(e) {
        var target = (e && e.target) || (event && event.srcElement);

        //Nav Menu
        if (!checkParent(target, navMenuDiv)) {
          // click NOT on the menu
          if (checkParent(target, navMenu)) {
            // click on the link
            if (navMenuDiv.classList.contains("hidden")) {
              navMenuDiv.classList.remove("hidden");
            } else {
              navMenuDiv.classList.add("hidden");
            }
          } else {
            // click both outside link and outside menu, hide menu
            navMenuDiv.classList.add("hidden");
          }
        }
      }
      function checkParent(t, elm) {
        while (t.parentNode) {
          if (t == elm) {
            return true;
          }
          t = t.parentNode;
        }
        return false;
      }

      // Fade in effect 

     
    const animateElements = document.querySelectorAll(".animate");

    window.addEventListener("scroll", () => {
      animateElements.forEach((element) => {
        if (isElementInViewport(element)) {
          element.classList.add("show");
        }
      });
    });

    function isElementInViewport(element) {
      const rect = element.getBoundingClientRect();
      return (
        rect.top >= 0 &&
        rect.left >= 0 &&
        rect.bottom <=
          (window.innerHeight || document.documentElement.clientHeight) &&
        rect.right <= (window.innerWidth || document.documentElement.clientWidth)
      );
    }

   // animation fade in
   const observer = new IntersectionObserver((entries) => {
		entries.forEach((entry) =>{
		if (entry.isIntersecting){
			entry.target.classList.add('anim-show');
		} else{
			entry.target.classList.remove('anim-show');
		}
		});
	});
	
	const hiddenElements = document.querySelectorAll('.anim-hidden');
	hiddenElements.forEach((el) => observer.observe(el));

  // animation slide in
  const slideobserver = new IntersectionObserver((entries) => {
		entries.forEach((entry) =>{
		if (entry.isIntersecting){
			entry.target.classList.add('slide-show');
		} else{
			entry.target.classList.remove('slide-show');
		}
		});
	});
	
	const slideElements = document.querySelectorAll('.slide-hidden');
	slideElements.forEach((el) => slideobserver.observe(el));


    </script>
  </body>
</html>