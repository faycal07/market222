<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <title>Modifier Opportunité</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
    @vite('resources/css/app.css')
</head>

<body>

    @include('navbar')

    <div class="main-container">
        @include('sidebar')
        <div class="main">

            @if ($errors->any())
            <div class="bg-red-200 text-red-800 p-4 mb-4 message error auto-dismiss">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 mb-4 message success auto-dismiss">{{ session('success') }}</div>
            @endif


            <div class="report-container mt-0 pt-8 px-3">
                <div class="form-container max-w-lg mx-auto">
                    <h2 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Modifier Opportunité</h2>

                    <div class="form-container">
                        <form action="{{ route('modifieropportunite', ['opportunite' => $opportunite->id]) }}" method="POST" class="opportunite-form" >
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-5">
                                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Nom de l'opportunité:</label>
                                <input type="text" id="nom" name="nom" value="{{ $opportunite->nom }}" required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Nom de l'opportunité" required>

                                    @error('nom')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="stages_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Stages:</label>
                                <select id="stages_id" name="stages_id[]" multiple required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
                                    @foreach($stages as $stage)
                                    <option value="{{ $stage->id }}">{{ $stage->nom }}</option>
                                    @endforeach
                                </select>

                                @error('stages_id[]')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="flex items-center justify-center h-16">
                                <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Modifier</button>
                            </div>
                        </form>


                    </div>
                </div>
            </div>



        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const messages = document.querySelectorAll('.auto-dismiss');

            messages.forEach(function(message) {
                setTimeout(function() {
                    message.style.display = 'none';
                }, 4000); // 4 secondes
            });
        });
    </script>

    <script src="{{ asset('js/index.js')}}"></script>
</body>

</html>
