@extends('layouts.bloglayout')
<html>

@section('content')
    <div class="w-2/3 bg-white p-8 rounded shadow-md m">

    <h1 class="text-4xl font-bold mb-8 text-blue-700">Create New Post</h1>

    @if ($errors->any())
    <!-- Error Display -->
    <div class="mb-4 text-red-500">
        Errors:
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <!-- New Post Form -->
    <form action=" {{ route('blog.store') }}"
        method="POST"
        enctype="multipart/form-data">
        @csrf

    <div class="mb-4">
        <label for="title" class="block text-gray-700 font-semibold mb-2">Title:</label>
        <input type="text" name="title"  value="{{old('title')}}" class="w-full px-4 py-2 border rounded-md">
    </div>

    <div class="mb-4">
        <label for="excerpt" class="block text-gray-700 font-semibold mb-2">Excerpt:</label>
        <textarea type="text" name="excerpt" value="{{old('excerpt')}}" class="w-full px-4 py-2 border rounded-md"></textarea>
    </div>

    <div class="mb-4">
        <label for="body" class="block text-gray-700 font-semibold mb-2">Body:</label>
        <textarea name="body" value="{{old('body')}}" class="w-full px-4 py-2 border rounded-md"></textarea>
    </div>

    <div class="mb-4">
        <label for="image" class="block text-gray-700 font-semibold mb-2">Upload Image:</label>
        <input type="file" id="image" name="image" class="w-full">
    </div>

    <div class="flex justify-between">
        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Submit</button>
        <button type="button" class="bg-gray-500 text-white px-4 py-2 rounded-md hover:bg-gray-600">
            <a href="{{route('blog.index')}}">Cancel<a>

        </button>
    </div>
    </form>

    </div>
@endsection

</html>