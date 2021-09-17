
@foreach($comments as $comment)
<div class="display-comment">
    <div class="bg-blue-300 flex text-white py-2 border border-pink-900 rounded px-20 my-1">
        <span class="bg-pink-400 rounded border border-black capitalize p-1">
         {{ $comment->user->first_name.' '.$comment->user->middle_name }}
        </span> 
       <p class="py-2 ml-5"> : {{ $comment->comment }}</p>
    </div>
    <a href="" id="reply"></a>
    <form method="post" action="{{ route('reply.add') }}">
        @csrf
        <div class="form-group">
            <input type="text" name="comment" class="bg-blue-300 py-2 border border-pink-900 rounded px-20 my-1" />
            <input type="hidden" name="post_id" value="{{ $post_id }}" />
            <input type="hidden" name="comment_id" value="{{ $comment->id }}" />
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-sm btn-outline-danger py-0" style="font-size: 0.8em;" value="Reply" />
        </div>
    </form>

    @include('post.replys', ['comments' => $comment->replies])
</div>
@endforeach
