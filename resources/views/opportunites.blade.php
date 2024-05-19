<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Liste Opportunitées</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @vite('resources/css/app.css')
</head>

<body>

    @include('navbar')

	<div class="main-container">
		@include('sidebar')
		<div class="main" id="main">
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



			<div class="box-container">

				<div class="box box1">
					<div class="text">
                        @php
                         $nombreopportunites = DB::table('opportunites')->count();
                         @endphp
						<h2 class="topic-heading">{{$nombreopportunites}}</h2>
						<h2 class="topic">Opportunitée</h2>
					</div>

					<img src="images/opportunites.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
						<h2 class="topic-heading">150</h2>
						<h2 class="topic">Likes</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185030/14.png"
						alt="likes">
				</div>



                <div class="report-container">
                    <div class="report-header">
                        <h1 class="recent-Articles">Liste des Opportunités</h1>
                        <a href="{{ route('opportunites.index') }}#user-form" onclick="scrollToForm()" class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">Créer Opportunité</a>
                    </div>

                    <div class="mb-4">
                        <input type="text" id="opportuniteSearchInput" placeholder="Rechercher des opportunités..." class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                    </div>

                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
                            <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
                                <tr>
                                    <th scope="col" class="px-6 py-3">ID</th>
                                    <th scope="col" class="px-6 py-3">Nom</th>
                                    <th scope="col" class="px-6 py-3">Stages</th>
                                    <th scope="col" class="px-6 py-3">Actions</th>
                                </tr>
                            </thead>
                            <tbody id="opportuniteTableBody">
                                @foreach ($opportunites as $opportunite)
                                <tr class="border-b even:bg-slate-300 odd:bg-slate-400 opportunite-item">
                                    <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-cyan-800">{{ $opportunite->id }}</td>
                                    <td class="px-6 py-4">{{ $opportunite->nom }}</td>
                                    <td class="px-6 py-4">
                                        <ul>
                                            @foreach ($opportunite->stages as $stage)
                                            <li class="flex d-flex items-center">
                                                <div class="h-5 w-5 pe-1">
                                                    <img src="/images/marque.png" alt="-">
                                                </div>
                                                {{ $stage->nom }}
                                            </li>
                                            @endforeach
                                        </ul>
                                    </td>
                                    <td class="px-5">
                                        <span class="inline-flex rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                            <a href="{{ route('modifieropportunite.index', ['id' => $opportunite->id]) }}">
                                                <img src="/images/editer.png" alt="Editer">
                                            </a>
                                        </span>
                                        <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-red-900 hover:text-slate-400">
                                            <button onclick="openDeleteModal('{{ route('supprimeropportunite', ['opportunite' => $opportunite->id]) }}')">
                                                <img src="/images/supprimer.png" alt="Supprimer">
                                            </button>
                                        </span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Modal de confirmation de suppression -->
<div id="deleteModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 max-w-md p-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Confirmation de suppression</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer cette opportunité ? Cette action est irréversible.</p>
        <div class="mt-4 flex justify-end space-x-4">
            <button id="cancelButton" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Annuler</button>
            <!-- Formulaire de suppression -->
            <form id="deleteForm" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
            </form>
        </div>
    </div>
</div>


			<div class="report-container mt-6 pt-8 px-3 hidden" id="user-form">
				<div class="form-container max-w-lg mx-auto">
					<h2 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Creer Opportunitée</h2>

					<form action="{{ route('creeropportunite') }}" method="POST" class="opportunite-form">
						@csrf
						<div class="form-group mb-5">
							<label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Nom de l'opportunité:</label>
							<input type="text" id="nom" name="nom" required
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
								placeholder="Nom de l'opportunité">
						</div>
						<div class="form-group mb-5 scrollbar">
							<label for="stages_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Stages:</label>
							<select


							id="stages_id" name="stages_id[]" multiple required
								class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
								>
								@foreach($stages as $stage)
								<option value="{{ $stage->id }}">{{ $stage->nom }}</option>
								@endforeach
							</select>
						</div>
						<div class="flex items-center justify-center h-16">
						<button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Créer</button>
						<a href="#" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>

					</div>
					</form>
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

<script>
    document.getElementById('opportuniteSearchInput').addEventListener('input', function() {
        searchItems('opportuniteSearchInput', 'opportuniteTableBody', 'opportunite-item');
    });

    function searchItems(inputId, tableBodyId, rowClass) {
        var searchText = document.getElementById(inputId).value.toLowerCase();
        var rows = document.querySelectorAll(`#${tableBodyId} .${rowClass}`);

        rows.forEach(function(row) {
            var cells = row.querySelectorAll('td');
            var shouldDisplayRow = false;

            cells.forEach(function(cell) {
                if (cell.innerText.toLowerCase().includes(searchText)) {
                    shouldDisplayRow = true;
                }
            });

            if (shouldDisplayRow) {
                row.style.display = 'table-row';
            } else {
                row.style.display = 'none';
            }
        });
    }
    </script>
<script>
    // Fonction pour ouvrir le modal de confirmation de suppression
    function openDeleteModal(actionUrl) {
        // Mettre à jour l'action du formulaire de suppression avec l'URL correcte
        document.getElementById('deleteForm').action = actionUrl;
        // Afficher le modal
        document.getElementById('deleteModal').classList.remove('hidden');
    }

    // Fonction pour fermer le modal de confirmation de suppression
    function closeDeleteModal() {
        // Masquer le modal
        document.getElementById('deleteModal').classList.add('hidden');
    }

    // Ajouter un gestionnaire d'événements au bouton Annuler
    document.getElementById('cancelButton').addEventListener('click', closeDeleteModal);
</script>
	<script src="{{ asset('js/index.js')}}"></script>
</body>
</html>