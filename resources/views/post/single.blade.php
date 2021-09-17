
@extends('mainlayots.master2')
<style>
    .display-comment .display-comment {
        margin-left: 40px
    }
</style>
@section('content')
<div class="container bg-gray-300">
    <div class="row justify-content-center">
        <div class="">
            <div class="card">
                <div class="card-body grid grid-cols-5">
                <div class="col-span-4">
                    <p>{{ $post->title }}</p>
                    <p>{{ $post->content }}</p>
                </div>
                <div class="col-span-1">
                    <figure class="">
                        @if ($post->image)
                        <img src="{{ asset('/storage/users_posts/'.$post->image) }}" class="rounded-lg shadow-lg h-32  w-24">
                        @endif
                      </figure>
                </div>
                </div>

              <div class="card-body">
             <hr />
                <div class="">
                @include('post.replys', ['comments' => $post->comments, 'post_id' => $post->id])
            </div>
                <hr />
               </div>
               <div class="card-body">
                <h5>Leave a comment</h5>
                <form method="post" action="{{ route('comment.add') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="comment" class="bg-blue-300 flex text-white py-2 border border-pink-900 rounded px-20 my-1" />
                        <input type="hidden" name="post_id" value="{{ $post->id }}" />
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Add Comment" />
                    </div>
                </form>
               </div>

            </div>
        </div>
    </div>
</div>
@endsection
