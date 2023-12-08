@extends('layouts.bloglayout')
<html>

@section('content')
<div class="w-2/3 bg-white p-8 rounded shadow-md">

<h1 class="text-4xl font-bold mb-8 text-blue-700">{{ $user->name }}'s Profile</h1>

<!-- User's Posts -->
<div class="mb-8">
    <h2 class="text-2xl font-semibold mb-4">{{ $user->name }}'s Posts</h2>
    
    <ul>
        @foreach ($user->posts as $post)
        <li><a href="{{ route('blog.show', [$post->id] )}}">{{$post->title}}</a></li>
        @endforeach
    </ul>
</div>

<!-- User's Comments -->
<div>
    <h2 class="text-2xl font-semibold mb-4">User's Comments</h2>
    <ul>
    @foreach ($user->comments as $comment)
    <li>
      <p>Comment on {{$comment->post->title}}</a>:</p>
      <p>{{$comment->content}}</p>
    </li>
    @endforeach
  </ul>
</div>
@endsection
</html>