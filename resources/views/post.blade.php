<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <meta property="og:url" content="{{ route('compagnes.index', $compagne->id) }}" />
  <meta property="og:title" content="{{ $compagne->title }}" />
  <meta property="og:description" content="{{ $compagne->text_compagne }}" />
  <meta property="og:image" content="{{ asset('storage/' . $compagne->image) }}" />
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  @vite('resources/css/app.css')

  <title>Partager compagne</title>
</head>

<body>

    @include('navbar')
    <div class="main-container">
      @include('sidebar')

      <div class="flex flex-auto items-center justify-center">
        <div class=" flex flex-col items-center justify-center w-full mx-auto rounded-lg  " >
            <H1  class="inline-flex items-center w-auto h-auto px-4 py-2 text-white font-bold rounded-full hover:bg-amber-600">{{ $compagne->title}}</H1>
          <img src="{{ Storage::url($compagne->image) }}" alt="{{ $compagne->title }}" class="h-2/3 w-1/3 ">
          <h3>{{$compagne->slogan}}</h3>
          <h6>{{$compagne->text_compagne}}</h6>
          <div class="flex flex-row items-center justify-center p-1 space-x-1 bg-gradient-to-r from-blue-200 to-sky-700 w-auto">
            @foreach($sharebuttons as $key => $value)
              <a href="{{$value}}" target="blank" class="inline-flex items-center w-auto h-auto px-4 py-2 text-white font-bold rounded-full hover:bg-amber-600">
                <svg class=" h-4 m-0" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $key === 'facebook' ? 'M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l-1-4h-4v-3a5 5 0 0 0-5-5z' : ($key === 'twitter' ? 'M20 2a10 10 0 0 1-10 10v8h7.4b-.5 1.7-1.7 2.8-3.5 2.8s-3.5-.6-4.7-1.7l-.7-.9v-4.5a2.74 2.74 0 0 1 2.1-2.8h1.1v-5z' : '') }}">
                  </path>
                </svg>
                {{ ucfirst($key) }}
              </a>
            @endforeach
          </div>
        </div>
      </div>
    </div>
    <script src="{{ asset('js/index.js')}}"></script>
  </body>
</html>
