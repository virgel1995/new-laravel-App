@extends('mainlayots.master2')

@section('title')
{{  __('Personal Page') }}
@endsection

@section('content')
<div class="pc-profileCard w-screen  bg-white  flex flex-row flex-wrap p-3"> <!-- pc profile card start -->
    <div class="mx-auto w-2/3">

  <div class="rounded-lg shadow-lg bg-gray-600 w-full flex flex-row flex-wrap p-3 antialiased"
   style="
    background-image: url('{{ asset('/storage/'.config('chatify.user_background.folder').'/'.$user->background) }}');
    background-repeat: no-repat;
    background-size: cover;
  "> <!-- background -->

    <div class="indicator md:w-1/3 w-full">
        @if(Cache::has('user-is-online-' . $user->id))
        <div class="indicator-item indicator-bottom  indicator-start badge badge-success bg-green-400"
        ></div>
         @else
         <div class="indicator-item indicator-bottom indicator-start badge badge-success bg-gray-400"
         ></div>
        @endif

      <img class="rounded-lg shadow-lg antialiased" src="{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}">
    </div> <!-- avatar  -->

    <div class="md:w-2/3 w-full px-3 flex flex-row flex-wrap">
      <div class="w-full text-right text-gray-700 font-semibold relative pt-3 md:pt-0">

        <div class="text-2xl text-white leading-tight capitalize">{{ $user->first_name.' '.$user->middle_name }}
        </div> <!-- first and middle name -->

        <div class="text-normal text-gray-300 hover:text-gray-400 cursor-pointer">
            <span class="border-b border-dashed border-gray-500 pb-1">{{ $user->email }}</span>
        </div><!-- email -->

        <a href="{{ route('user.edit' )  }}"
            class="p-2 mt-2 mx-1 rounded-full border border-double fas fa-cog bg-indigo-300 hover:bg-indigo-600 text-white hover:text-red-900
            ring-2 ring-pink-800 ring-offset-0 hover:ring-offset-4
            transition duration-700 ease-in transform hover:translate-y-4 hover:scale-110"></a> <!-- settings -->

         @if ($user->role != 'admin')
         <a href="{{ route('user' ,$user->id )  }}"
         class="p-2 mt-2 rounded-full border border-double fas fa-paper-plane bg-indigo-300 hover:bg-indigo-600 text-white hover:text-red-900
         ring-2 ring-pink-800 ring-offset-0 hover:ring-offset-4
         transition duration-700 ease-in transform hover:translate-y-4 hover:scale-110"></a> <!-- privte chat -->
         @else
      <p class="p-2 mt-2 rounded-full border border-double fas fa-remove-format bg-indigo-300 hover:bg-indigo-600 text-white hover:text-red-900
      ring-2 ring-pink-800 ring-offset-0 hover:ring-offset-4
      transition duration-700 ease-in transform hover:translate-y-4 hover:scale-110">  {{ __('Demo User') }}</p>
          @endif




        <div class="text-sm text-gray-300 hover:text-gray-400 cursor-pointer md:absolute pt-3 md:pt-0 bottom-0 right-0">
            @if($user->last_seen != null)
        Last Seen :<b> {{ \Carbon\Carbon::parse($user->last_seen)->diffForHumans() }} </b>
        @else
             {{ __('Demo User') }}
        @endif
        </div><!-- last seen -->

      </div>
    </div>
  </div>

    </div>
</div>
<!-- pc profile card end -->

<!-- phone profile card -->

  <div class=" bg-gray-900 flex mt-2 justify-center md:hidden items-center">

    <div class="indicator h-56 w-72 absolute flex justify-center items-center">
        @if(Cache::has('user-is-online-' . $user->id))
        <div class="indicator-item indicator-bottom indicator-center badge badge-success bg-green-400"></div>
         @else
         <div class="indicator-item indicator-bottom indicator-center badge badge-success bg-gray-400"></div>
        @endif
        <img
        class="object-cover h-20 w-20 rounded-full"
        src="{{ asset('/storage/'.config('chatify.user_avatar.folder').'/'.$user->avatar) }}"
        alt=""/>
    </div>

    <div
      class="
        h-56
        mx-4
        w-5/6
        bg-blue-400
        rounded-3xl
        shadow-md
        sm:w-80 sm:mx-0
      "
      style="
    background-image: url('{{ asset('/storage/'.config('chatify.user_background.folder').'/'.$user->background) }}');
    background-repeat: no-repat;
    background-size: cover;

  "
    >
      <div class="h-1/2 w-full flex justify-between items-baseline px-3 py-5">
        <a href="{{ route('user.edit')  }}"
            class="p-1  rounded-full border border-double
             fas fa-cog bg-indigo-300 hover:bg-indigo-600 text-white hover:text-red-900
            ring-2 ring-pink-800 ring-offset-0 hover:ring-offset-4
            transition duration-700 ease-in transform
             hover:translate-y-4 hover:scale-110"></a> <!--settings icon -->



        @if ($user->role != 'admin')
        <a href="{{ route('user' ,$user->id )  }}"
        class="p-2 mt-2 rounded-full border border-double fas fa-paper-plane bg-indigo-300 hover:bg-indigo-600 text-white hover:text-red-900
        ring-2 ring-pink-800 ring-offset-0 hover:ring-offset-4
        transition duration-700 ease-in transform hover:translate-y-4 hover:scale-110"></a> <!-- privte chat -->
        @else
         <p class="p-2 mt-2 rounded-full border border-double fas fa-remove-format bg-indigo-300 hover:bg-indigo-600 text-white hover:text-red-900
             ring-2 ring-pink-800 ring-offset-0 hover:ring-offset-4
            transition duration-700 ease-in transform hover:translate-y-4 hover:scale-110">  {{ __('Demo User') }}</p>
         @endif




        {{--
                   <svg
          xmlns="http://www.w3.org/2000/svg"
          class="h-6 w-6"
          fill="none"
          viewBox="0 0 24 24"
          stroke="white"
        >
          <path
            stroke-linecap="round"
            stroke-linejoin="round"
            stroke-width="1"
            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
          />
        </svg> <!-- shop icon -->
         --}}
      </div>

      <div
        class="
          bg-white
          h-1/2
          w-full
          rounded-3xl
          flex flex-col
          justify-around
          items-center
        "
      >
        <div class="w-full h-1/2 flex justify-between items-center px-3 pt-2">
          <div class="flex flex-col justify-center items-center">
            <h1 class="text-gray-500 text-xs">{{ $user->country }}</h1>
            <img class="w-10" src="https://www.countryflags.io/{{ substr($user->country, -2) }}/shiny/64.png" alt="">
          </div>
          <div class="flex flex-col justify-center items-center">
            <h1 class="text-gray-500 text-xs">Statues</h1>
            @if(Cache::has('user-is-online-' . $user->id))
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                Online
              </span>
             @else
            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-gray-100 text-gray-600">
                Offline
            </span>
            @endif

          </div>
        </div>
        <div class="w-full h-1/2 flex flex-col justify-center items-center">
          <h1 class="text-gray-700 font-bold">{{ $user->first_name.' '.$user->middle_name }}</h1>
          <h1 class="text-gray-500 text-sm">{{ $user->email }}</h1>
        </div>
      </div>
    </div>
  </div>

  <div class=" md:grid md:grid-cols-7 md:gap-x-8 md:gap-y-10">

    <div class="sidebar  resize-x overscroll-auto relative col-span-2 transition delay-150 duration-1000 " >
        @include('mainlayots.sidebar')
      </div> <!-- 1 -->


      <div class="main relative bg-black col-span-5 transition delay-150 duration-1000 ">
          Lorem ipsum, dolor sit amet consectetur adipisicing elit. Maiores impedit perferendis suscipit eaque, iste dolor cupiditate blanditiis ratione.
      </div> <!-- 1 -->
</div>

@endsection
