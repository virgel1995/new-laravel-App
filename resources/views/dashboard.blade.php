<x-app-layout>
    <x-slot name="header">
    <a href="" class="top-0 left-20 py-5 ml-10 font-semibold text-xl text-gray-800 leading-tight">
        {{ ('Dashboard') }}
    </a>
    </x-slot>

    <div class=" md:grid md:grid-cols-7 md:gap-x-8 md:gap-y-10">

        <div class="sidebar  resize-x overscroll-auto relative col-span-2 transition delay-150 duration-1000 " >
            @include('mainlayots.sidebar')
          </div> <!-- 1 -->


          <div class="main relative bg-black col-span-5 transition delay-150 duration-1000 ">
            @include('post.create') <!-- post create card -->
            @foreach($posts as $post)
            <div class=" p-2"> <!-- user posts start  -->
                  <div class="flex items-center w-full px-4 py-10 bg-cover card bg-base-200" style="background-image: url(&quot;https://picsum.photos/id/314/1000/300&quot;);">
                      <div class="card glass sm:flex lg:card-side text-neutral-content">
                        <figure class="p-6">
                          {{-- <img src="https://picsum.photos/id/1005/300/200" class="rounded-lg shadow-lg"> --}}
                          @if ($post->image)
                          <img src="{{ asset('/storage/users_posts/'.$post->image) }}" class="rounded-lg shadow-lg h-32 py-auto w-24">
                          @endif
                        </figure>
                        <div class="max-w-md card-body">
                          <h2 class="card-title">{{ $post->user->first_name. ' ' .$post->user->middle_name.' : '.$post->title }}</h2>
                          <p>{{ Str::substr($post->content, 0, 250) }}</p>
                          <div class="card-actions">
                            <a href="{{ route('post.show',$post->slug) }}" class="btn glass rounded-full">View Post</a>
                          </div>
                        </div>
                      </div>
                    </div>
            </div> <!--  user posts end  -->
          @endforeach          </div> <!-- 1 -->
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






















