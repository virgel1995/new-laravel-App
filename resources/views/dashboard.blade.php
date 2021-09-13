<x-app-layout>
    <x-slot name="header">
    <div class="absolute">
        <a id="openbtn" class="openbtn top-0 left-0 p-2 text-white rounded hover:bg-indigo-400 hover:text-white bg-black hidden">☰ </a>

        <a href="javascript:void(0)" id="closebtn" class="closebtn top-0 left-0 p-2 text-white rounded hover:bg-indigo-400 hover:text-white bg-black" >×</a>
    </div>
    <a href="" class="top-0 left-20 py-5 ml-10 font-semibold text-xl text-gray-800 leading-tight">
        {{ ('Dashboard') }}
    </a>
    </x-slot>

    <div class=" md:grid md:grid-cols-7 md:gap-x-8 md:gap-y-10">

        <div class="sidebar  resize-x overscroll-auto relative col-span-2 transition delay-150 duration-1000 " >
            @include('mainlayots.sidebar')
          </div> <!-- 1 -->


          <div class="main relative bg-black col-span-5 transition delay-150 duration-1000 ">
              Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
          </div> <!-- 1 -->
    </div>

    <script>
    //     function openNav() {
    //    var side = document.getElementById("mySidebar");
    //    var main = document.getElementById("main");
    //    var Btn = document.getElementById("openbtn");

    //   }

    //   function closeNav() {
    //     var side = document.getElementById("mySidebar");
    //    var main = document.getElementById("main");
    //    var Btn = document.getElementById("openbtn");

    //     side.classList.remove('.col-span-2');
    //     main.classList.remove('.col-span-5');
    //     main.classList.add('.col-span-6');
    //     Btn.classList.remove('.hidden');
    //   }



    </script>

    @include('mainlayots.Pagefooter')
</x-app-layout>






















