@extends('mainlayots.master2')

@section('title')
{{  __('Personal Page') }}
@endsection

@section('content')

  <div class=" md:grid md:grid-cols-7 md:gap-x-8 md:gap-y-10">

    <div class="sidebar z-10  resize-x overscroll-auto relative col-span-2 transition delay-150 duration-1000 " >
        @include('mainlayots.sidebar')
      </div> <!-- 1 -->


      <div class="main relative bg-black  col-span-5 transition delay-150 duration-1000 ">
          @include('user.profile-card') <!-- profile card mobile and pc -->
          @include('post.create') <!-- post create card -->
          @foreach($posts as $post)
          <div class=" p-2"> <!-- user posts start  -->
                <div class="flex items-center w-full px-4 py-10 bg-cover card bg-base-200" style="background-image: url(&quot;https://picsum.photos/id/314/1000/300&quot;);">
                    <div class="card glass  lg:card-side text-neutral-content">
                      <figure class="p-6">
                        {{-- <img src="https://picsum.photos/id/1005/300/200" class="rounded-lg shadow-lg"> --}}
                        @if ($post->image)
                        <img src="{{ asset('/storage/users_posts/'.$post->image) }}" class="rounded-lg shadow-lg h-32 py-auto w-24">
                        @endif
                      </figure>
                      <div class="max-w-md card-body">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p>{{ Str::substr($post->title, 0, 250) }}</p>

                        <div class="card-actions">
                          <a href="{{ route('post.show',$post->slug) }}" class="btn glass rounded-full">Show All Post</a>
                        </div>
                      </div>
                    </div>
                  </div>
          </div> <!--  user posts end  -->
        @endforeach

      </div> <!-- 1 -->
</div>

@endsection
