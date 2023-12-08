@extends('layouts.bloglayout')
<!doctype html>

<html>
<body class="bg-gray-100 font-sans">
@section('content')    
    <div class="flex-1 p-8">
        
    
    <div class="text-center">
        <h1 class="text-5xl font-bold mb-4 text-gray-800">
            {{ $post->title }}
        </h1>

        
        <p>
            <span class="mt-4 text-gray-500 dark:text-gray-400 text-sm leading-relaxed">
            Made by:
                <a href="{{route('users.show', [$post->user_id])}}">
                    {{$post->user->name}}
                </a>
                    on {{$post->updated_at->format('d/m/Y')}}
            </span>
        </p>
    </div> 

    <div class="pt-10 pb-10 text-gray-900 text-xl text-left">
        <p class="text-gray-600 mb-6 underline">
           {{ $post->excerpt }}
        </p>

        <p class="prose text-black pt-10 items-center">   
            {{ $post->body }}
            <img src="{{ $post->getImageURL()}}" class="ml-2">    
        </p>    
    </div>

</div>

    <div class="comment-container border border-gray-300 bg-white p-4 rounded shadow-md mb-4">
        <h3>Comments</h3>
        
            @foreach ($post->comments as $comment)
            <div class="bg-white p-4 rounded shadow-md mb-4">
                <div class="flex items-start">
                    <div>
                        <h4 class="font-semibold"><a href="" >{{$comment->user->name}}:</a></h4>
                        <p class="mt-2">{{ $comment->content}}</p>
                    </div>
                </div>
                @if (Auth::id() === $comment->user->id || auth()->user()->role_as === 1)
                <div class="flex justify-end mt-2">
                <button class="bg-blue-500 text-white px-4 py-2 rounded-md mr-2 hover:bg-blue-600">Edit</button>
                <button type="button" value="{{$comment->id}}" class="deleteComment bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600">
                    Delete
                </button>
                @endif
          </div>
            </div>
            @endforeach
            
        <div class="bg-gray-100 p-4 rounded shadow-md mb-4">
        <h3 class="text-xl font-semibold mb-4">Add a Comment</h3>
        <input type="hidden" name="id" id="id" value="{{$post->id}}">
        <form action="" method="POST">
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $post->id }}">
            <div class="mb-4">
            <label for="comment" class="block text-gray-700">Your Comment:</label>
            <textarea id="content" name="content" placeholder="Enter your comment here..." class="w-full px-3 py-2 border rounded-md"></textarea>
            </div>
            <button type="submit" id="addComentBtn" class="bg-blue-500 text-black px-4 py-2 rounded-md hover:bg-blue-600">Post Comment</button>
        </form>
        </div>
    </div>

    @if (Auth::id() === $post->user->id || auth()->user()->role_as === 1)
    <div class="mt-4 items-center">
    <button class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-blue-600">
            <a href="{{ route('blog.edit', $post->id)}}">Edit Post</a>
    </button>

    <form action=" {{ route('blog.destroy', $post->id) }}" method="POST">
            @csrf
            @method('DELETE')
          <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" type="submit">
            Delete
    </button>
    </div>
    @endif

@endsection
</body>


<script>
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf_token"]').attr('content')
        }

    })

    $('addCommentBtn').click(function(e) {
        var content = $('#content').val();
        var id = $('#id').val();

        $.ajax({
            type:'POST',
            dataType: 'json', 
            data: {content:content, _token: '{{csrf_token()}}'},
            url: '/blog/'+id,
            success: function(data) {
                console.log('Data Saved');
            },
            error: function(error) {
                console.log(error);
            }
            
        })
    })
</script>
</html>

