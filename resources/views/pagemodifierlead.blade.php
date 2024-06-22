<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Modifier Lead</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

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
                    <h2 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Modifier Lead</h2>

                    <div class="form-container">
                        <form action="/lead/{{$lead->id}}" method="POST" class="user-form">
                            @csrf
                            @method('PUT')

                            <div class="form-group mb-5">
                                <label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Nom de Lead:</label>
                                <input type="text" id="nom" name="nom" value="{{$lead->nom}}" required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Nom de Lead">

                                @error('nom')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">E-Mail:</label>
                                <input type="email" id="email" name="email" value="{{$lead->email}}" required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="E-Mail">

                                @error('email')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Téléphone:</label>
                                <input type="number" id="tel" name="tel" value="{{$lead->tel}}" required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                    placeholder="Téléphone">

                                @error('tel')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="types_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Type:</label>
                                <select id="types_id" name="types_id" required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    <option value="1" @if($lead->types_id == '1') selected @endif>Existant</option>
                                    <option value="2" @if($lead->types_id == '2') selected @endif>Nouveau</option>
                                </select>


                                @error('types_id')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="sources_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Source:</label>
                                <select id="sources_id" name="sources_id" required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    <option value="1" @if($lead->sources_id == '1') selected @endif>E-Mail</option>
                                    <option value="2" @if($lead->sources_id == '2') selected @endif>Téléphone</option>
                                    <option value="3" @if($lead->sources_id == '3') selected @endif>Web</option>
                                    <option value="4" @if($lead->sources_id == '4') selected @endif>Direct</option>
                                    <option value="5" @if($lead->sources_id == '5') selected @endif>Formulaire</option>
                                </select>

                                @error('sources_id')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>
                            <div class="form-group mb-5">
                                <label for="produit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Produits:</label>
                                <select name="produit_id[]" id="produit_id" multiple required
                                    class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @foreach ($products as $product)
                                    <option value="{{ $product->id }}" @if(in_array($product->id, $lead->products->pluck('id')->toArray())) selected @endif>{{ $product->nom }}</option>
                                    @endforeach
                                </select>

                                @error('produit_id[]')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>


                            <div class="form-group mb-5">
                                <label for="opportunite_id"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Opportunité</label>
                                <select name="opportunite_id" id="opportunite_id"
                                class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @foreach ($opportunites as $opportunite)
                                        <option value="{{ $opportunite->id }}" @if($lead->opportunite_id == $opportunite->id) selected @endif>
                                            {{ $opportunite->nom }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('opportunite_id')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>

                            <div class="flex items-center justify-center h-16">
                                <button type="submit"
                                    class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5">Modifier</button>
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
