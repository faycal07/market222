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
  <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
  @vite('resources/css/app.css')
  <link rel="icon" href="{{ asset('images/logotoudja.png') }}" type="image/x-icon"/>


  <title>Partager compagne</title>
</head>
<body class="bg-gray-100">

    @auth
        @if (auth()->user()->role == 'marketing')
            @include('navbar')
        @endif
    @endauth
    <div class="main-container flex">
        @auth
        @if (auth()->user()->role == 'marketing')
            @include('sidebar')
        @endif
    @endauth
    <div class="main" id="main" style="padding-top: 10px">
    <div class="flex flex-auto items-center justify-center p-1">
    <div class="w-full max-w-4xl bg-sky-950 shadow-lg rounded-lg overflow-hidden">
        <div class="bg-gradient-to-r from-slate-950 to-sky-700 p-1">
            <h1 class="text-2xl font-bold text-white text-center">{{ $compagne->title }}</h1>
        </div>
        <div class="p-4">
            <div class="flex justify-center">
                <img src="{{ Storage::url($compagne->image) }}" alt="{{ $compagne->title }}" class="rounded-2xl shadow-lg h-full w-full object-cover">
            </div>
            <div class="text-center">
                <h3 class="text-xl font-semibold text-white">{{ $compagne->slogan }}</h3>
                <p class="text-white">{{ $compagne->text_compagne }}</p>
            </div>
            @auth
            @if (auth()->user()->role == 'marketing')
            <div class="flex flex-wrap justify-center space-x-2">
                @foreach($sharebuttons as $key => $value)
                    <a href="{{ $value }}" target="_blank" class="h-14 w-auto inline-flex items-center px-4 py-0 text-white bg-slate-950 hover:bg-blue-700 rounded-full shadow transition">

                            @if ($key === 'facebook')
                            <i class="fa-brands fa-facebook fa-2xl"></i>
                            @elseif ($key === 'twitter')
                            <i class="fa-brands fa-x-twitter fa-2xl"></i>
                            @elseif ($key === 'linkedin')
                            <i class="fa-brands fa-linkedin fa-2xl"></i>
                            @elseif ($key === 'whatsapp')
                            <i class="fa-brands fa-whatsapp fa-2xl"></i>
                                @elseif ($key === 'telegram')
                                <i class="fa-brands fa-telegram fa-2xl"></i>
                                @elseif ($key === 'reddit')
                                <i class="fa-brands fa-reddit fa-2xl"></i>
                                @elseif ($key === 'pinterest')
                                <i class="fa-brands fa-pinterest fa-2xl"></i>
                                @endif

                    </a>
                @endforeach
            </div>
            @endif
            @endauth
        </div>
    </div>
    </div>
    </div>
    </div>

    <script src="{{ asset('js/index.js') }}"></script>
</body>
</html>


