<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <script src="https://cdn.tailwindcss.com"></script>

      <style type="text/tailwindcss">
        @layer utilities{
                .container{
                @apply px-10 mx-auto;
            }
                }
      </style>
    </head>
    <body >
        <div class="container">
        <div class="flex justify-between my-5">
            <h2 class="text-red-500 text-xl">Edit - {{ $ourPost->name }}</h2>
            <a href="/" class="bg-green-600 text-white rounded py-2 px-4">Back To Home</a>
        </div>
<dvi>
    <form method="POST" action="{{route('update', $ourPost->id)}}" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col gap-5">
            <label for="">Name</label>
            <input type="text" name="name" value="{{ $ourPost->name }}" class="bg-yellow-300 py-2 px-4 rounded">
                @error('name')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

            <label for="">Description</label>
            <input type="text" name="description" value="{{ $ourPost->description }}" class="bg-red-300 py-2 px-4 rounded">

                 @error('description')
                    <p class="text-red-600">{{ $message }}</p>
                @enderror

            <label for="">Select Image</label>
            <input type="file" name="image" id="">

            <div>
                <input type="submit" class="bg-green-500 text-white py-2 px-4 rounded">
            </div>
        </div>
    </form>
</dvi>
        </div>
    </body>
</html>
