<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Modifier Workflow</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{asset('images/logotoudja.png')}}" type="image/x-icon"/>


</head>

<body>

    @include('navbar')

	<div class="main-container">
        @include('sidebar')
		<div class="main" >


      <div class="report-container mt-12 pt-8 px-3" id="user-form">



        @if (session('success'))
        <div class="bg-green-200 text-green-800 p-4 mb-4 message success auto-dismiss">{{ session('success') }}</div>
        @endif
        <div class="form-container max-w-lg mx-auto">
          <h1 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Modifier Workflow</h1>

          <div class="form-container">

          <form action="{{route('workflows.update',['id' => $workflow->id])}}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
            @csrf
      @method('PUT')
          	<!-- nom du workflow-->
					<div class="mb-5">
						<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">nom du workflow</label>
						<input type="text" id="name" name="name" placeholder="{{$workflow->name}} " class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
						@error('name')
						<span class="error">{{ $message }}</span>
						@enderror
					</div>

                    <!-- Champs pour le choix de status  -->
					<div class="mb-5">
						<label for="status" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Choisir le status</label>
						<select id="status" name="status"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
							<option>selectionner </option>
							<option value="active">active</option>
							<option value="inactive">inactive</option>

						</select>
                        @error('status')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
					</div>

					<!-- Champs pour le choix des d'evenement  -->
					<div class="mb-5">
						<label for="event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Choisir les evenements</label>
						<select id="event" name="event"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
							<option>selectionner </option>
							<option value="LeadCreated">envoyer email a les leads lors de la creation </option>
							<option value="LeadUpdate">envoyer email a les leads lors de la mise à jour </option>
							<option value="3">envoyer un email de remercement pour lead won</option>
							<option value="4">envoyer un email de remercement pour lead lost </option>
						</select>
                        @error('event')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
					</div>



					<!-- Boutons de soumission -->
					<div class="text-center">
						<button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Modifier</button>
                        <a href="{{route('workflows.index')}}" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>
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

<script src="{{ asset('js/index.js') }}"></script>

</body>
</html>
