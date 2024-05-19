<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"content="width=device-width initial-scale=1.0">

<title>Liste Workflows</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @vite('resources/css/app.css')



    <style>
        #social-links ul li{
        display: inline-block;}

        #social-links ul li a{
        padding: 20px;
        margin: 2px;
        font-size: 30px;
        color: rgb(46,41,114);
        background-color: #ccc};

        #social-links ul li a:hover{
            background-color:rgb(46,41,114);
            color:white;
        }
        </style>

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
                        $nbrworkflows= DB::table('workflows')->count();
                         @endphp
						<h2 class="topic-heading">{{$nbrworkflows}}</h2>
						<h2 class="topic">Workflows</h2>
					</div>

					<img src= "/images/workflow.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
                        @php
                        $nbrworkflowsactive = DB::table('workflows')->where('status', 'active')->count();
                       @endphp
						<h2 class="topic-heading">{{$nbrworkflowsactive}}</h2>
						<h2 class="topic">Les workflows actives</h2>
					</div>

					<img src="/images/active.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
                        @php
                        $nbrworkflowsinactive = DB::table('workflows')->where('status', 'inactive')->count();
                       @endphp
						<h2 class="topic-heading">{{$nbrworkflowsinactive }}</h2>
						<h2 class="topic">Les workflows inactives</h2>
					</div>

					<img src="/images/inactive.png"
						alt="comments">
				</div>


			</div>





			<div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Liste des workflows</h1>
                    <span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">
                        <a href="{{route('workflows.index')}}#user-form" onclick="scrollToForm()">Créer Workflow</a>
                    </span>
                </div>

                <div class="mb-4">
                    <input type="text" id="workflowSearchInput" placeholder="Rechercher des workflows..." class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
                    <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
                        <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Nom</th>
                                <th scope="col" class="px-6 py-3">Événement</th>
                                <th scope="col" class="px-6 py-3">Statuts</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="workflowTableBody">
                            @php
                                $workflows = DB::table('workflows')->get();
                            @endphp
                            @foreach($workflows as $workflow)
                            <tr class="border-b even:bg-slate-300 odd:bg-slate-400 workflow-item">
                                <td class="px-6 py-1">{{$workflow->id}}</td>
                                <td class="px-6 py-1">{{$workflow->name}}</td>
                                <td class="px-6 py-1">{{$workflow->event}}</td>
                                <td class="px-6 py-1">{{$workflow->status}}</td>
                                <td class="ps-3 py-1">
                                    <span class="inline-flex rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                        <a href="{{route('modifierworkflows.index',['id' => $workflow->id])}}" class="accepter"><img src="/images/editer.png" alt="Éditer"></a>
                                    </span>
                                    <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-red-900 hover:text-slate-400">
                                        <button onclick="openDeleteModal('{{ route('workflows.delete', ['id' => $workflow->id]) }}')">
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
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer ce workflow ? Cette action est irréversible.</p>
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




		<div class="report-container mt-12 pt-8 px-3 hidden" id="user-form">
			<div class="form-container max-w-lg mx-auto">
				<h1 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Créer Workflow</h1>


                <form action="{{ route('workflows.store') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
					@csrf

					<!-- nom du workflow-->
					<div class="mb-5">
						<label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">nom du workflow</label>
						<input type="text" id="name" name="name" placeholder="le nom du workflow " class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
						@error('name')
						<span class="error">{{ $message }}</span>
						@enderror
					</div>

					<!-- Champs pour le choix des d'evenement  -->
					<div class="mb-5">
						<label for="event" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Choisir les evenements</label>
						<select id="event" name="event"  class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
							<option>selectionner </option>
							<option value="LeadCreated">envoyer email a les leads lors de la creation </option>
							<option value="LeadUpdate">envoyer email a les leads lors de la mise à jour </option>
							<option value="3">envoyer un email de remercement pour lead won</option>
							<option value="4">envoyer un email de remercement pour lead lost </option>
						</select>
					</div>







					<!-- Boutons de soumission -->
					<div class="text-center">
						<button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Créer</button>
						<a href="#" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>

					</div>
				</form>
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
    document.getElementById('workflowSearchInput').addEventListener('input', function() {
        searchItems('workflowSearchInput', 'workflowTableBody', 'workflow-item');
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