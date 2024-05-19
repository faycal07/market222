<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"content="width=device-width initial-scale=1.0">

<title>Liste Compagnes</title>
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
                    $nbrcompagens= DB::table('compagnes')->count();
                     @endphp
						<h2 class="topic-heading">{{$nbrcompagens}}</h2>
						<h2 class="topic">Compagnes</h2>
					</div>

					<img src= "/images/compagnes.png"
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

				<div class="box box3">
					<div class="text">
						<h2 class="topic-heading">320</h2>
						<h2 class="topic">Comments</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210184645/Untitled-design-(32).png"
						alt="comments">
				</div>

				<div class="box box4">
					<div class="text">
						<h2 class="topic-heading">70</h2>
						<h2 class="topic">Published</h2>
					</div>

					<img src=
"https://media.geeksforgeeks.org/wp-content/uploads/20221210185029/13.png" alt="published">
				</div>
			</div>





			<div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Liste des Compagnes</h1>
                    <span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">
                        <a href="{{ route('compagnes.index') }}#user-form" onclick="scrollToForm()">Créer Compagne</a>
                    </span>
                    <input type="text" id="compagneSearchInput" placeholder="Rechercher..." class="mt-3 px-3 py-2 border rounded-md">
                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
                    <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
                        <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Titre</th>
                                <th scope="col" class="px-6 py-3">Contenu</th>
                                <th scope="col" class="px-6 py-3">Slogan</th>
                                <th scope="col" class="px-6 py-3">Leads</th>
                                <th scope="col" class="px-6 py-3">Date limite</th>
                                <th scope="col" class="px-6 py-3">Image</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                                $leads = DB::table('leads')->get();
                                $compagnes = DB::table('compagnes')->get();
                            @endphp
                            @foreach ($compagnes as $compagne)
                                <tr class="compagne-item border-b even:bg-slate-300 odd:bg-slate-400">
                                    <td class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-cyan-800">{{ $compagne->id }}</td>
                                    <td class="px-6 py-1">{{ $compagne->title }}</td>
                                    <td class="px-6 py-1">{{ $compagne->text_compagne }}</td>
                                    <td class="px-6 py-1">{{ $compagne->slogan }}</td>
                                    <td class="px-6 py-1">
                                        <ol>
                                            @php
                                                $leadNames = [];
                                                $leadIds = DB::table('compagne_lead')->where('compagne_id', $compagne->id)->pluck('lead_id')->toArray();
                                                foreach ($leadIds as $leadId) {
                                                    $lead = $leads->firstWhere('id', $leadId);
                                                    if ($lead) {
                                                        $leadNames[] = $lead->nom;
                                                    }
                                                }
                                                echo implode(', ', $leadNames);
                                            @endphp
                                        </ol>
                                    </td>
                                    <td class="px-6 py-1">{{ $compagne->date_limite }}</td>
                                    <td class="px-3 py-1"><img src="{{ Storage::url($compagne->image) }}" alt="{{ $compagne->title }}" class="h-20 w-20"></td>
                                    <td class="ps-3 py-1">
                                        <span class="inline-flex rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                            <a href="{{ route('modifiercompagne.index', ['id' => $compagne->id]) }}" class="accepter">
                                                <img src="/images/editer.png" alt="editer">
                                            </a>
                                        </span>
                                        <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-red-900 hover:text-slate-400">
                                            <button onclick="openDeleteModal('{{ route('deletecompagne', ['id' => $compagne->id]) }}')">
                                                <img src="/images/supprimer.png" alt="supprimer">
                                            </button>
                                        </span>
                                        <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                            <a href="{{ route('email.envoyer', ['id' => $compagne->id]) }}" class="btn btn-send">
                                                <img src="/images/email.png" alt="editer">
                                            </a>
                                        </span>
                                        <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                            <a href="{{ route('sms.envoyer', ['id' => $compagne->id]) }}" class="btn btn-send">
                                                <img src="/images/sms.png" alt="editer">
                                            </a>
                                        </span>
                                        <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                            <a href="{{ route('compagnes.share', ['id' => $compagne->id]) }}">
                                                <img src="/images/partage.png" alt="">
                                            </a>
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
                    <p class="mt-2 text-gray-600 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer cette campagne ? Cette action est irréversible.</p>
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
				<h1 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Créer Compagne</h1>



				<form action="{{route('creercompagne')}}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
					@csrf

					<!-- Titre de la compagne -->
					<div class="mb-5">
						<label for="compagne_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Titre de la Compagne</label>
						<input type="text" id="compagne_title" name="compagne_title" placeholder="Titre de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
						@error('compagne_title')
						<span class="error">{{ $message }}</span>
						@enderror
					</div>

					<!-- Slogan de la compagne -->
					<div class="mb-5">
						<label for="compagne_slogan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Slogan de la Compagne</label>
						<input type="text" id="compagne_slogan" name="compagne_slogan" placeholder="Slogan de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
						@error('compagne_slogan')
						<span class="error">{{ $message }}</span>
						@enderror
					</div>

					<!-- Texte de la compagne -->
					<div class="mb-5">
						<label for="text_compagne" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Texte de la Compagne</label>
						<textarea id="text_compagne" name="text_compagne" rows="4" placeholder="Texte de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></textarea>
						@error('text_compagne')
						<span class="error">{{ $message }}</span>
						@enderror
					</div>

					<!-- Image de la compagne -->
					<div class="mb-5">
						<label for="compagne_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Image</label>
						<input type="file" id="compagne_image" name="compagne_image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
						@error('compagne_image')
						<span class="error">{{ $message }}</span>
						@enderror
					</div>

					<!-- Date de création de la compagne -->
					<div class="mb-5">
						<label for="compagne_date_limite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Date Limite</label>
						<input type="date" id="compagne_date_limite" name="compagne_date_limite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
						@error('compagne_date_limite')
						<span class="error">{{ $message }}</span>
						@enderror
					</div>

					<!-- Champs pour le choix des leads -->



					<div class="mb-5">
						<label for="lead_options" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Choisir les Leads</label>
						<select id="lead_options" name="lead_option" onchange="showConditionalFields()" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
							<option>selectionner </option>
							<option value="lead_sources">Lead Sources</option>
							<option value="products">Produits</option>
							<option value="lead_types">Types de Leads</option>
							<option value="all_leads">Tous les Leads</option>
						</select>
					</div>

					<!-- Champs conditionnels en fonction de l'option sélectionnée -->

					<div class="mb-5 conditional-field" id="source-id-condition" style="display: none;">
						<label for="source_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner la source de lead</label>
						<select id="source_id" name="source_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
							@php
							//
							$sources = DB::table('lead_sources')->get();
							@endphp
							@foreach($sources as $source)
							<option value="{{$source->id}}">{{$source->name}}</option>
							@endforeach
						</select>
					</div>



					<div class=" mb-5 conditional-field" id="product-condition" style="display: none;">
						<label for="product_id"  class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner le produit</label>
						   <select id="product_id" name="product_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
							@php
							//
							$products = DB::table('products')->get();
							@endphp
							@foreach($products as $product)
								   <option value="{{$product->id}}">{{$product->nom}}</option>
								   @endforeach

								  </select>
								  </div>

								  <div class=" mb-5 conditional-field" id="lead-type-id-condition" style="display: none;">
									<label for="lead_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner le type de lead</label>
									  <select id="lead_type_id" name="lead_type_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
									   @php
									   //
									   $types = DB::table('lead_types')->get();
									   @endphp
									   @foreach($types as $type)
										   <option value="{{$type->id}}">{{$type->nom}}</option>
										@endforeach
									   </select>

								  </div>

					<input type="hidden" id="compagne_leads" name="compagne_leads" value=''>

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
        document.getElementById('compagneSearchInput').addEventListener('input', function() {
    searchCompagnes();
});

function searchCompagnes() {
    // Récupérer le texte saisi dans le champ de recherche
    var searchText = document.getElementById('compagneSearchInput').value.toLowerCase();

    // Récupérer toutes les lignes du tableau
    var rows = document.querySelectorAll('.compagne-item');

    // Parcourir chaque ligne du tableau
    rows.forEach(function(row) {
        // Récupérer toutes les cellules de la ligne
        var cells = row.querySelectorAll('td');

        // Initialiser une variable pour vérifier si la ligne doit être affichée ou non
        var shouldDisplayRow = false;

        // Parcourir chaque cellule de la ligne
        cells.forEach(function(cell) {
            // Vérifier si le contenu de la cellule correspond au texte de recherche
            if (cell.innerText.toLowerCase().includes(searchText)) {
                // Si au moins une cellule correspond, la ligne doit être affichée
                shouldDisplayRow = true;
            }
        });

        // Afficher ou masquer la ligne en fonction du résultat de la recherche
        if (shouldDisplayRow) {
            row.style.display = 'table-row'; // Pour un tableau
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
