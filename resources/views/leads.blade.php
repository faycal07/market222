<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Liste Leads</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
	@vite('resources/css/app.css')
</head>

<body>

	 @include('navbar')
	<div class="main-container">
		@include('sidebar')
		<div class="main " id="main">
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

			<div class="box-container" class="mb-3">


				<div class="box box1">
					<div class="text">

                          @php
                          $user_id = auth()->id();
                          $nombreleads= DB::table('leads')->where('user_id', $user_id)->count();
                          @endphp
						<h2 class="topic-heading">{{$nombreleads}}<h2>
						<h2 class="topic">Leads</h2>
					</div>

					<img src= "/images/leads.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
                        @php
                        $sources = DB::table('lead_sources')->count();
                        @endphp
						<h2 class="topic-heading">{{$sources}}</h2>
						<h2 class="topic">Les sources des leads</h2>
					</div>

					<img src="/images/sources.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
                        @php
                        $types= DB::table('lead_types')->count();
                        @endphp
						<h2 class="topic-heading">{{$types}}</h2>
						<h2 class="topic">les types des Leads</h2>
					</div>

					<img src="/images/typeslead.png"
						alt="comments">
				</div>
                <div class="box box2">
					<div class="text">

                         @php
                         $user_id = auth()->id();
                         $nombreopportunites= DB::table('opportunites')->where('user_id', $user_id)->count();
                         @endphp

						<h2 class="topic-heading">{{$nombreopportunites}}</h2>
						<h2 class="topic">Opportunitées</h2>
					</div>

					<img src="images/opportunites.png"
						alt="opportunies">
				</div>
            </div>







			<div class="report-container min-w-full">
				<div class="report-header">
					<h1 class="recent-Articles">Suivi Leads</h1>

				</div>



				<div class="relative overflow-x-auto shadow-md sm:rounded-lg  my-5 p-5 " id="suivileads">



                    @foreach ($opportunites as $opportunite)
                    <h2 class="ms-4 underline text-lg font-semibold bg-gray-100 border-2 px-8 w-fit">{{ $opportunite->nom }}</h2>
                    <div class="flex mb-4 overflow-x-auto">
                        @foreach ($opportunite->stages as $stage)
                            <div class="flex-1 p-4 bg-gray-100 border-2">
                                <h3 class="text-md font-semibold">{{ $stage->nom }}</h3>
                                <ul class="mt-2 connectedSortable" id="sortable-{{ $stage->id }}">
                                    @foreach ($opportunite->leads as $lead)
                                        @if ($lead->stage_id === $stage->id)
                                            <div class="mb-5">
                                                <li class="flex flex-row">
                                                    <div class="mr-5 h-10 w-32 shadow-sm">{{ $lead->nom }} est à {{ $lead->stage->probabilite }}%</div>
                                                    <form action="{{ route('suivilead', $lead->id) }}" method="post" id="form-{{ $lead->id }}">
                                                        @csrf
                                                        @method('PUT')
                                                        <select name="stage_id"
                                                                class="h-10 w-auto shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-full focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
                                                                required onchange="submitForm({{ $lead->id }})">
                                                            <option value="" selected disabled>Deplacer</option>
                                                            @foreach ($opportunite->stages as $stageOption)
                                                                <option value="{{ $stageOption->id }}">{{ $stageOption->nom }}</option>
                                                            @endforeach
                                                        </select>
                                                    </form>
                                                </li>
                                            </div>
                                        @endif
                                    @endforeach
                                </ul>
                            </div>
                        @endforeach
                    </div>
                @endforeach






				</div>
			</div>


			<div class="report-container min-w-full">
				<div class="report-header">
					<h1 class="recent-Articles">Leads</h1>

					<div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
                            <input type="search" id="leadSearchInput" name="username" onkeyup="searchLeads()" class=" me-28 peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                            <label for="leadSearchInput"  class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>

					<span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">

						<a href="{{route('pageleads')}}#user-form" onclick="scrollToForm()" >Créer Lead</a></span>
				</div>









				<div class="relative overflow-x-auto shadow-md sm:rounded-lg  my-5">
					<table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
						<thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
							<tr>
								<th scope="col" class="px-6 py-3">
									Lead ID
								</th>
								<th scope="col" class="px-6 py-3">
									Nom
								</th>
								<th scope="col" class="px-6 py-3">
									E-Mail
								</th>
								<th scope="col" class="px-6 py-3">
									Téléphone
								</th>
								<th scope="col" class="px-6 py-3">
									Type
								</th>
								<th scope="col" class="px-6 py-3">
									Source
								</th>
								<th scope="col" class="px-6 py-3">
									Opportunité
								</th>
								<th scope="col" class="px-6 py-3">
									Stage
								</th>
								<th scope="col" class="px-6 py-3">
									Produits
								</th>
								<th scope="col" class="px-6 py-3">
									Actions
								</th>
							</tr>
						</thead>
						<tbody class=>
							@foreach ($leads as $lead)
							<tr class=" lead-item border-b even:bg-slate-300 odd:bg-slate-400">
								<td class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-cyan-800 ">
									{{ $lead->id }}
								</td>
								<td class="px-6 py-1">
									{{ $lead->nom }}
								</td>
								<td class="px-6 py-1">
									{{ $lead->email }}
								</td>
								<td class="px-6 py-1">
									{{ $lead->tel }}
								</td>
								<td class="px-6 py-1">
									{{ $lead->type->nom }}
								</td>
								<td class="px-6 py-1">
									{{ $lead->source->name }}
								</td>



								<td class="px-6 py-1">
									{{ $lead->opportunite ? $lead->opportunite->nom : 'N/A' }}
								</td>
								<td class="px-6 py-1">
									{{ optional($lead->stage)->nom }}
								</td>
								<td class="ps-3 py-1">
									<ol>
										@foreach ($lead->products as $product)
										<li class="flex"><img src="/images/marque.png" alt="-" class="h-5 w-5 pe-1">{{ $product->nom }}</li>
										@endforeach
									</ol>
								</td>
                                <td class="ps-10">
                                    <!-- Boutons d'action -->
                                    <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                        <a href="{{ route('modifierlead.index',[$lead->id]) }}">
                                            <img src="/images/editer.png" alt="editer">
                                        </a>
                                    </span>
                                    <!-- Bouton de suppression avec confirmation -->
                                    <span class="inline-block rounded-md px-1 py-1 w-8 h-8  hover:bg-red-900 hover:text-slate-400">
                                        <button onclick="openDeleteModal('{{ $lead->id }}')">
                                            <img src="/images/supprimer.png" alt="supprimer">
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
        <p class="mt-2 text-gray-600 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer ce lead ? Cette action est irréversible.</p>
        <div class="mt-4 flex justify-end space-x-4">
            <button id="cancelButton" class="px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Annuler</button>
            <!-- Formulaire de suppression -->
            <form id="deleteForm" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
            </form>
        </div>
    </div>
</div>







						<div class="report-container mt-12 pt-8 px-3 hidden" id="user-form">

							<div class="form-container max-w-lg mx-auto">
								<h2 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Créer Lead</h2>
								<form action="{{ route('ajouterlead') }}" method="POST" class="max-w-lg mx-auto ">
									@csrf
									<div class="mb-5">
										<label for="nom" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Nom de Lead:</label>
										<input type="text" id="nom" name="nom" required
											class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
											placeholder="Nom de Lead">
                                            @error('nom')
                                            <div>
                                                {{$message}}
                                            </div>

                                            @enderror
									</div>
									<div class="mb-5">
										<label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">E-Mail:</label>
										<input type="email" id="email" name="email" required
											class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
											placeholder="E-Mail">
                                            @error('email')
                                            <div>
                                                {{$message}}
                                            </div>

                                            @enderror
									</div>
									<div class="mb-5">
										<label for="tel" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Téléphone:</label>
										<input type="number" id="tel" name="tel" required
											class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"
											placeholder="Téléphone">
                                            @error('tel')
                                            <div>
                                                {{$message}}
                                            </div>

                                            @enderror
									</div>

									<div class="mb-5">
										<label for="types_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Type:</label>
										<select id="types_id" name="types_id" required
											class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
											<option value="1">Existant</option>
											<option value="2">Nouveau</option>
										</select>
                                        @error('types_id')
                                        <div>
                                            {{$message}}
                                        </div>

                                        @enderror
									</div>
									<div class="mb-5">
										<label for="sources_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Source:</label>
										<select id="sources_id" name="sources_id" required
											class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
											<option value="1">E-Mail</option>
											<option value="2">Téléphone</option>
											<option value="3">Web</option>
											<option value="4">Direct</option>
											<option value="5">Formulaire</option>
										</select>
                                        @error('sources_id')
                                        <div>
                                            {{$message}}
                                        </div>

                                        @enderror
									</div>
									<div class="mb-5">
										<label for="produit_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Produits:</label>
										<select name="produit_id[]" id="produit_id" multiple required
											class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" >
											@foreach ($products as $product)
											<option value="{{ $product->id }}">{{ $product->nom }}</option>
											@endforeach
										</select>
                                        @error('produit_id')
                                        <div>
                                            {{$message}}
                                        </div>

                                        @enderror
									</div>
									<div class="mb-5">
										<label for="opportunite_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Opportunité:</label>
										<select name="opportunite_id" id="opportunite_id"
										class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" required>
											@foreach ($opportunites as $opportunite)
												<option value="{{ $opportunite->id }}">{{ $opportunite->nom }}</option>
											@endforeach
										</select>
                                        @error('opportunite_id')
                                        <div>
                                            {{$message}}
                                        </div>

                                        @enderror
									</div>
									<div class="flex items-center justify-center h-16">
									<button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Créer</button>
									<a href="#" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>

								</div>
								</form>
										</div>
							</div>









					</div>
				</div>
			</div>
		</div>
	</div>


    <script>
        function submitForm(leadId) {
            var form = document.getElementById('form-' + leadId);
            form.submit();
        }
 </script>


    <script>
  let scrollToDiv = "{{ session('scrollToDiv') }}";
    if (scrollToDiv) {
        // Scroll to the specified div
        let target = document.querySelector(scrollToDiv);
        if (target) {
            target.scrollIntoView({ behavior: 'smooth' });
        }
    }


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
  function searchLeads() {
    // Récupérer le texte saisi dans le champ de recherche
    var searchText = document.getElementById('leadSearchInput').value.toLowerCase();

    // Récupérer toutes les lignes du tableau
    var rows = document.querySelectorAll('.lead-item');

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
    function openDeleteModal(leadId) {
        // Mettre à jour l'action du formulaire de suppression avec l'ID du lead
        document.getElementById('deleteForm').action = '/lead/' + leadId;
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
