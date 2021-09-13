<x-app-layout>
    <x-slot name="header">
        <a href="" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Dashboard') }}
        </a>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">




                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<x-app-layout>
    <x-slot name="header">
        <a href="" class="font-semibold text-xl text-gray-800 leading-tight">
            {{ ('Dashboard') }}
        </a>
        <button class="openbtn" onclick="openNav()">☰ </button>
    </x-slot>

    <div class="mainpage">

   <div class="">
            @include('mainlayots.sidebar')
  </div> <!-- 1 -->


    <div id="main" class="">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
    </div> <!-- 1 -->

</div>


<script>
    function openNav() {
    document.getElementById("mySidebar").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
  }

  function closeNav() {
    document.getElementById("mySidebar").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
  }
</script>


    @include('mainlayots.Pagefooter')
</x-app-layout>













<div class="bg-gray-200 flex justify-center items-center relative rounded-full">
    <!-- Heroicon `user` -->
    <svg class="w-9 h-9 m-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
    </svg>
    <!-- active -->
    <span class="w-4 h-4 bg-green-500 absolute bottom-0 right-0 rounded-full"></span>
    <!-- sleep -->
    <!-- <span class="w-4 h-4 bg-yellow-500 absolute bottom-0 right-0 rounded-full"></span> -->
    <!-- away -->
    <!-- <span class="w-4 h-4 bg-red-500 absolute bottom-0 right-0 rounded-full"></span> -->
  </div>








