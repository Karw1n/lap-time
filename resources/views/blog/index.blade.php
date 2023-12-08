@extends('layouts.bloglayout')
<!doctype html>
<html>

@section('content')
<div class="flex items-center justify-center ">
  <div class="w-2/3 bg-white p-8 rounded shadow-md ">

    <h1 class="text-4xl font-bold mb-8 text-gray-800 text-center">Latest Blog Posts</h1>

    <!-- New Article Button -->
    @if (Auth::user())
    <a href=" {{ route('blog.create')}}">
        <button class="bg-blue-500 text-white px-4 py-2 rounded-md mb-6 hover:bg-blue-600">New Article</button>
    </a>
    @endif


    <div class="space-y-6">
    @foreach($posts as $post)
      <div class="border border-gray-300 p-4 rounded">
        <h2 class="text-xl font-semibold mb-2">
            <a href="{{ route('blog.show', $post->id) }}">{{ $post->title }}</a>
        </h2>
        <p class="text-gray-600 mb-4">{{ $post->excerpt }}</p>
        <p class="text-gray-500">Posted by:
            <a href="{{route('users.show', [$post->user_id])}}">{{$post->user->name}}</a>
            on {{$post->updated_at->format('d/m/Y')}}
        </p>
      </div>
      @if (Auth::id() === $post->user->id)
      <div class="mt-4">
          <button class="bg-blue-500 text-white px-4 py-2 rounded-md mr-4 hover:bg-blue-600">
            <a href="{{ route('blog.edit', $post->id)}}">Edit Post</a>
          </button>
          <button class="bg-red-500 text-white px-4 py-2 rounded-md hover:bg-red-600" type="submit">
            <form action=" {{ route('blog.destroy', $post->id) }}" method="POST">
               @csrf
                @method('DELETE')
                Delete
          </button>
        </div>
        @endif
    @endforeach
    </div>

    <div class="mt-3">
        {{$posts->links()}}
    </div>
  </div>
</div>
@endsection
</html>