<x-app-layout>
    

  <div class="w-full pt-10 bg-no-repeat bg-cover" style="background-image:url({{ asset('/images/freedom.jpg')}})">
    
    <div class="container px-3 mx-auto mt-6 flex flex-wrap flex-col md:flex-row items-center">
      <!--Left Col-->
      <div class="w-full md:w-3/6 text-center md:text-right pt-20 pr-10 anim-hidden">
        <div class="pt-12 pb-8 mb-24 md:pt-10 md:px-20 md:mx-10 bg-white/10 rounded-xl">
          <div>
            <p class="leading-normal text-xl md:text-3xl my-9 text-left" style="text-shadow: 0px 0px 4rem #eee">
              Sprawdź swój poziom angielskiego bezpłatnie i bez rejestracji. 
              Po wypełnieniu testu otrzymasz bezpłatnie materiały edukacyjne dostosowane do twoich umiejętności! 
            </p>
            <hr class="w-full ml-auto items-center border-b border-gray-50 opacity-25 mt-6 py-0" />
          </div>
          <div class="my-20">
            <a class="bg-slate-400/70  text-2xl p-4 rounded-lg hover:bg-slate-400 border-white border-2 tracking-wider" style="font-family: Orbitron" href="/test">
              Rozpocznij test!
            </a>
          </div>
        </div>
      </div>

      <!-- Right Col -->

      <div class="flex flex-col w-full md:w-3/6 justify-center hidden sm:block items-start text-center md:text-left">
        <img src="{{ asset('/images/flag.jpg')}}">
      </div>
    
    </div>
  </div>  
    
</x-app-layout>