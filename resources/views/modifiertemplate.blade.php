<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Modifier Template</title>
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


			<div class="report-container mt-0 pt-8 px-3">
				<div class="form-container max-w-lg mx-auto ">
					<h2 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Modifier Utilisateur</h2>



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
						<div class="form-container">
                            <form action="{{ route('templates.update',['id' => $template->id] ) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                                @csrf
                                @method('PUT')
                                <div class="flex flex-col">
                                    <label for="nom" class="text-sm font-medium mb-1">Nom du template :</label>
                                    <input type="text" id="nom" name="nom" required value="{{$template->nom}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">

                                    @error('nom')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="subject" class="text-sm font-medium mb-1">Objet du template :</label>
                                    <input type="text" id="subject" name="subject" required value="{{$template->subject}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @error('subject')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="mobile" class="text-sm font-medium mb-1">Contenu mobile du template :</label>
                                    <input type="text" id="mobile" name="mobile" required value="{{$template->mobile}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @error('mobile')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="web" class="text-sm font-medium mb-1">Contenu web du template :</label>
                                    <input type="text" id="web" name="web" required value="{{$template->web}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @error('web')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="email" class="text-sm font-medium mb-1">E-mail :</label>
                                    <input type="email" id="email" name="email" required value="{{$template->email}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @error('email')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="telephone" class="text-sm font-medium mb-1">Contenu téléphone du template :</label>
                                    <input type="text" id="telephone" name="telephone" required value="{{$template->telephone}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @error('telephone')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>

                                <div class="flex flex-col">
                                    <label for="adresse" class="text-sm font-medium mb-1">Contenu adresse du template :</label>
                                    <input type="text" id="adresse" name="adresse" required value="{{$template->adresse}}" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    @error('adresse')
                                    <div>
                                        {{$message}}
                                    </div>

                                    @enderror
                                </div>

                                <!-- Boutons de soumission -->
                                <div class="text-center">
                                    <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Modifier</button>

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
