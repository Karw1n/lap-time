@extends('layouts.bloglayout')
<html>   

@section('content')
<div class="w-2/3 bg-white p-8 rounded shadow-md m">
        <h1 class="text-4xl font-bold mb-8 text-blue-700">
            Edit: {{ $post->title}}
        </h1>

    @if ($errors->any())
        <div>
            Errors:
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form
        action=" {{ route('blog.update', $post->id) }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf
        @method('Patch')
        <div class="mb-4">
            <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
            <input type="text" name="title" value="{{$post->title}}" class="w-full px-4 py-2 border rounded-md">
        </div>

        <div class="mb-4">
        <label for="excerpt" class="block text-gray-700 font-semibold mb-2">Excerpt:</label>
            <input type="text" name="excerpt" value="{{$post->excerpt}}" class="w-full px-4 py-2 border rounded-md">
        </div>

        <div class="mb-4">
            <label for="body" class="block text-gray-700 font-semibold mb-2">Body:</label>
            <textarea name="body" placeholder="Body..." class="w-full px-4 py-2 border rounded-md">{{$post->body}}</textarea>
        </div>
            
        <div class="mb-4">
            <label for="image" class="block text-gray-700 font-semibold mb-2">Upload Image:</label>

                <input
                    type="file"
                    name="image"
                    class="hidden">
        </div>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit Post</button>
        <a href="{{route('blog.index')}}">Cancel</a>
        
    </form>
</div>
@endsection
</html>