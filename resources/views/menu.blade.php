<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Dashbord</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @vite('resources/css/app.css')

    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>


</head>

<body>

    @include('navbar')
	<div class="main-container">
		@include('sidebar')


		<div class="main">



            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5">
                <!-- Première carte -->
                <div class="bg-white rounded-lg shadow-md">
                    <!-- Contenu de la carte -->
                    <h2 class="text-lg font-semibold text-center py-4">Graphique d'utilisateurs</h2>
                    <div class="h-72">
                        <canvas id="userChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
                    </div>
                </div>

                <!-- Deuxième carte -->
                <div class="bg-white rounded-lg shadow-md">
                    <!-- Contenu de la carte -->
                    <h2 class="text-lg font-semibold text-center py-4">Graphique des roles</h2>
                    <div class="h-72">
                        <canvas id="userRoleChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
                    </div>
                </div>
                  <!-- Deuxième carte -->
                  <div class="bg-white rounded-lg shadow-md">
                    <!-- Contenu de la carte -->
                    <h2 class="text-lg font-semibold text-center py-4">Graphique des leads</h2>
                    <div class="h-72">
                        <canvas id="leadChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
                    </div>
                </div>

            <!-- Deuxième carte -->
            <div class="bg-white rounded-lg shadow-md">
              <!-- Contenu de la carte -->
              <h2 class="text-lg font-semibold text-center py-4">Graphique des stages des leads  </h2>
              <div class="h-72">
                  <canvas id="stagesChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
              </div>
          </div>
          <div class="bg-white rounded-lg shadow-md">
            <!-- Contenu de la carte -->
            <h2 class="text-lg font-semibold text-center py-4">Graphique des compagnes marketing</h2>
            <div class="h-72">
                <canvas id="compagnesChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md">
            <!-- Contenu de la carte -->
            <h2 class="text-lg font-semibold text-center py-4">Graphique des produits</h2>
            <div class="h-72">
                <canvas id="productsChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
            </div>
        </div>
        <div class="bg-white rounded-lg shadow-md">
            <!-- Contenu de la carte -->
            <h2 class="text-lg font-semibold text-center py-4">Graphique des produits selon la demande </h2>
            <div class="h-72">
                <canvas id="productLeadsChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md">
            <!-- Contenu de la carte -->
            <h2 class="text-lg font-semibold text-center py-4">Graphique des emails</h2>
            <div class="h-72">
                <canvas id="emailsChart" class="w-full h-full"></canvas> <!-- Canvas prenant toute la taille de la carte -->
            </div>
        </div>





        </div>


			<div class="box-container">

				<div class="box box1">
					<div class="text">
                        @php
                         // Compter le nombre d'utilisateurs
                         $nombreUtilisateurs = DB::table('users')->count();
                         @endphp
						<h2 class="topic-heading">{{ $nombreUtilisateurs }}</h2>
						<h2 class="topic">Utilisateurs</h2>
					</div>

					<img src="images/users.png"
						alt="users">
				</div>

				<div class="box box2">
					<div class="text">
                        @php
                        $nombreopportunites = DB::table('opportunites')->count();
                         @endphp
						<h2 class="topic-heading">{{$nombreopportunites}}</h2>
						<h2 class="topic">Opportunitées</h2>
					</div>

					<img src="images/opportunites.png"
						alt="opportunies">
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
                <div class="box box4">
					<div class="text">
                        @php
                        $stagesnbr= DB::table('stages')->count();
                        @endphp
						<h2 class="topic-heading">{{$stagesnbr}}</h2>
						<h2 class="topic">Les Stages d'une opportunitée</h2>
					</div>



					<img src="/images/stages.png"
						alt="comments">
				</div>
                <div class="box box5">
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

				<div class="box box6">
					<div class="text">
                        @php
                        $nombreleads= DB::table('leads')->count();
                         @endphp
						<h2 class="topic-heading">{{$nombreleads}}</h2>
						<h2 class="topic">Leads</h2>
					</div>

					<img src="images/leads.png"
						alt="leads">
				</div>

				<div class="box box7">
					<div class="text">
                        @php
                        $nombrecompagnes= DB::table('compagnes')->count();
                         @endphp
						<h2 class="topic-heading">{{$nombrecompagnes}}</h2>
						<h2 class="topic">Compagnes Marketinges</h2>
					</div>

					<img src="images/compagnes.png" alt="published">
				</div>
                <div class="box box8">
					<div class="text">
                        @php
                        $nombreproduct = DB::table('products')->count();
                         @endphp
						<h2 class="topic-heading">{{$nombreproduct}}</h2>
						<h2 class="topic">Produits</h2>
					</div>

					<img src="images/produits.png" alt="published">
				</div>
			</div>

            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold mb-4">Liste des Utilisateurs Non Archivés</h1>
                    <input type="text" id="userSearchInput" placeholder="Rechercher par mot">
                </div>

                <div class="report-body">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800">
                            <thead class="text-xs bg-gray-200 dark:bg-cyan-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Nom</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Role</th>
                                </tr>
                            </thead>
                            <tbody id="userTableBody">
                                @php
                                    $users = DB::table('users')->where('archiver', 'non')->get();
                                @endphp
                                @foreach($users as $user)
                                    <tr class="border-b even:bg-gray-100 odd:bg-gray-200 user-item">
                                        <td class="px-6 py-4 font-medium">{{ $user->id }}</td>
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>




            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold mb-4">Liste des Utilisateurs Archivés</h1>
                    <input type="text" id="archivedUserSearchInput" placeholder="Rechercher par mot">
                </div>

                <div class="report-body">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800">
                            <thead class="text-xs bg-gray-200 dark:bg-cyan-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Nom</th>
                                    <th scope="col" class="px-6 py-3">Email</th>
                                    <th scope="col" class="px-6 py-3">Role</th>
                                </tr>
                            </thead>
                            <tbody id="archivedUserTableBody">
                                @php
                                    $users = DB::table('users')->where('archiver', 'oui')->get();
                                @endphp
                                @foreach($users as $user)
                                    <tr class="border-b even:bg-gray-100 odd:bg-gray-200 archived-user-item">
                                        <td class="px-6 py-4 font-medium">{{ $user->id }}</td>
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">{{ $user->role }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>



            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold mb-4">Liste des Produits</h1>
                    <input type="text" id="productSearchInput" placeholder="Rechercher par mot">
                </div>

                <div class="report-body">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800">
                            <thead class="text-xs bg-gray-200 dark:bg-cyan-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">sku</th>
                                    <th scope="col" class="px-6 py-3">Nom</th>
                                    <th scope="col" class="px-6 py-3">Description</th>
                                    <th scope="col" class="px-6 py-3">Quantité</th>
                                    <th scope="col" class="px-6 py-3">Prix</th>
                                </tr>
                            </thead>
                            <tbody id="productTableBody">
                                @php
                                    $products = DB::table('products')->get();
                                @endphp
                                @foreach($products as $product)
                                    <tr class="border-b even:bg-gray-100 odd:bg-gray-200 product-item">
                                        <td class="px-6 py-4 font-medium">{{ $product->id }}</td>
                                        <td class="px-6 py-4">{{ $product->sku }}</td>
                                        <td class="px-6 py-4">{{ $product->nom }}</td>
                                        <td class="px-6 py-4">{{ $product->description }}</td>
                                        <td class="px-6 py-4">{{ $product->quantite }}</td>
                                        <td class="px-6 py-4">{{ $product->prix }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>





            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold mb-4">Liste des Opportunités</h1>
                    <input type="text" id="opportunitySearchInput" placeholder="Rechercher par mot">
                </div>

                <div class="report-body">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800">
                            <thead class="text-xs bg-gray-200 dark:bg-cyan-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Nom</th>
                                    <th scope="col" class="px-6 py-3">Stages</th>
                                </tr>
                            </thead>
                            <tbody id="opportunityTableBody">
                                @php
                                    $opportunities = DB::table('opportunites')->get();
                                @endphp

                                @foreach($opportunities as $opportunity)
                                    <tr class="border-b even:bg-gray-100 odd:bg-gray-200 opportunity-item">
                                        <td class="px-6 py-4">{{ $opportunity->id }}</td>
                                        <td class="px-6 py-4">{{ $opportunity->nom }}</td>
                                        <td class="px-6 py-4">
                                            @php
                                                $stages = DB::table('stages')
                                                            ->join('opportunite_stage', 'stages.id', '=', 'opportunite_stage.stage_id')
                                                            ->where('opportunite_stage.opportunite_id', '=', $opportunity->id)
                                                            ->get();
                                            @endphp

                                            @foreach($stages as $stage)
                                                <li>{{ $stage->nom }}</li>
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold mb-4">Liste des leads</h1>
                    <input type="text" id="leadSearchInput" placeholder="Rechercher par mot">
                </div>

                <div class="report-body">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800">
                            <thead class="text-xs bg-gray-200 dark:bg-cyan-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Nom</th>
                                    <th scope="col" class="px-6 py-3">E-mail</th>
                                    <th scope="col" class="px-6 py-3">Téléphone</th>
                                    <th scope="col" class="px-6 py-3">Type</th>
                                    <th scope="col" class="px-6 py-3">Source</th>
                                    <th scope="col" class="px-6 py-3">Opportunité</th>
                                    <th scope="col" class="px-6 py-3">Stage</th>
                                    <th scope="col" class="px-6 py-3">Produit(s)</th>
                                </tr>
                            </thead>
                            <tbody id="leadTableBody">
                                @php
                                    $leads = DB::table('leads')->get();
                                    $opportunites = DB::table('opportunites')->get()->keyBy('id');
                                    $sources = DB::table('lead_sources')->get()->keyBy('id');
                                    $types = DB::table('lead_types')->get()->keyBy('id');
                                @endphp

                                @foreach($leads as $lead)
                                    <tr class="border-b even:bg-gray-100 odd:bg-gray-200 lead-item">
                                        <td class="px-6 py-4">{{ $lead->id }}</td>
                                        <td class="px-6 py-4">{{ $lead->nom }}</td>
                                        <td class="px-6 py-4">{{ $lead->email }}</td>
                                        <td class="px-6 py-4">{{ $lead->tel }}</td>
                                        <td class="px-6 py-4">
                                            @php
                                                $type = $types->get($lead->types_id);
                                            @endphp
                                            {{ $type ? $type->nom : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $source = $sources->get($lead->sources_id);
                                            @endphp
                                            {{ $source ? $source->name : 'N/A' }}
                                        </td>

                                        <td class="px-6 py-4">
                                            @php
                                                $opportunite = $opportunites->get($lead->opportunite_id);
                                            @endphp
                                            {{ $opportunite ? $opportunite->nom : 'N/A' }}
                                        </td>
                                        <td class="px-6 py-4">
                                            @php
                                                $stage = $stages->get($lead->stage_id);
                                            @endphp
                                            {{ $stage ? $stage->nom : 'N/A' }}
                                        </td>


                                        <td class="px-6 py-4">
                                            @php
                                                $leadproduits = DB::table('lead_products')
                                                    ->where('lead_id', $lead->id)
                                                    ->join('products', 'lead_products.product_id', '=', 'products.id')
                                                    ->select('products.nom')
                                                    ->get();
                                            @endphp
                                            @foreach($leadproduits as $leadproduit)
                                                {{ $leadproduit->nom }}
                                                @if (!$loop->last)
                                                    ,
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold mb-4">Liste des Workflows</h1>
                    <input type="text" id="workflowSearchInput" placeholder="Rechercher par mot">
                </div>

                <div class="report-body">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800">
                            <thead class="text-xs bg-gray-200 dark:bg-cyan-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Nom</th>
                                    <th scope="col" class="px-6 py-3">Evenement</th>
                                    <th scope="col" class="px-6 py-3">Statut</th>
                                </tr>
                            </thead>
                            <tbody id="workflowTableBody">
                                @php
                                    $workflows = DB::table('workflows')->get();
                                @endphp

                                @foreach($workflows as $workflow)
                                    <tr class="border-b even:bg-gray-100 odd:bg-gray-200 workflow-item">
                                        <td class="px-6 py-4">{{ $workflow->id }}</td>
                                        <td class="px-6 py-4">{{ $workflow->name }}</td>
                                        <td class="px-6 py-4">{{ $workflow->event }}</td>
                                        <td class="px-6 py-4">{{ $workflow->status }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold mb-4">Liste des Compagnes</h1>
                    <input type="text" id="compagneSearchInput" placeholder="Rechercher par mot">
                </div>

                <div class="report-body">
                    <div class="overflow-x-auto shadow-md sm:rounded-lg my-5">
                        <table class="w-full text-sm text-left rtl:text-right text-gray-800 dark:text-gray-800">
                            <thead class="text-xs bg-gray-200 dark:bg-cyan-900">
                                <tr>
                                    <th scope="col" class="px-6 py-3">Id</th>
                                    <th scope="col" class="px-6 py-3">Titre</th>
                                    <th scope="col" class="px-6 py-3">Slogan</th>
                                    <th scope="col" class="px-6 py-3">Text de la compagne</th>
                                    <th scope="col" class="px-6 py-3">Image</th>
                                    <th scope="col" class="px-6 py-3">Date_limite</th>
                                </tr>
                            </thead>
                            <tbody id="compagneTableBody">
                                @php
                                    $compagnes = DB::table('compagnes')->get();
                                @endphp

                                @foreach($compagnes as $compagne)
                                    <tr class="border-b even:bg-gray-100 odd:bg-gray-200 compagne-item">
                                        <td class="px-6 py-4">{{ $compagne->id }}</td>
                                        <td class="px-6 py-4">{{ $compagne->title }}</td>
                                        <td class="px-6 py-4">{{ $compagne->slogan }}</td>
                                        <td class="px-6 py-4">{{ $compagne->text_compagne }}</td>
                                        <td class="px-3 py-1"><img src="{{ Storage::url($compagne->image) }}" alt="{{ $compagne->title }}" class="h-20 w-20"></td>
                                        <td class="px-6 py-4">{{ $compagne->date_limite }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>


		</div>
	</div>
    <script>
        // Récupérer les données des graphiques des utilisateurs et des leads passées par le contrôleur
        var userChartLabels = {!! json_encode($userChart['labels']) !!};
        var userChartData = {!! json_encode($userChart['data']) !!};
        //////////////////////////////////////////////////////
        var leadChartLabels = {!! json_encode($leadChart['labels']) !!};
        var leadChartData = {!! json_encode($leadChart['data']) !!};
        /////////////////////////////////////////////////////////////
        var compagnesChartLabels = {!! json_encode($compagnesChart['labels']) !!};
        var compagnesChartData = {!! json_encode($compagnesChart['data']) !!};
        /////////////////////////////////////////////////////////
        var productsChartLabels = {!! json_encode($productsChart['labels']) !!};
        var productsChartData = {!! json_encode($productsChart['data']) !!};
         ///////////////////////////////////////////////////////////////////
         var userRoleChartLabels = {!! json_encode($userRoleChart['labels']) !!};
         var userRoleChartData = {!! json_encode($userRoleChart['data']) !!};

         ////////////////////////////////////////////////////////////////
         // Récupérer les données du graphique des stages
         var stagesChartLabels = {!! json_encode($stagesChart['labels']) !!};
         var stagesChartData = {!! json_encode($stagesChart['data']) !!};
         var stagesChartBackgroundColor = {!! json_encode($stagesChart['backgroundColor']) !!};
         /////////////////////////////////////////////////////////////////////////////////////
         // Récupérer les données du graphique des leads par produit
          var productLeadsLabels = {!! json_encode($productLeads['labels']) !!};
          var productLeadsData = {!! json_encode($productLeads['data']) !!};
          //////////////////////////////////////////////////////////////////////////////////////////
          var emailChartData = {!! json_encode($emailsChart) !!};
    </script>



    <script src="{{ asset('js/graphe.js')}}"></script>
	<script src="{{ asset('js/index.js')}}"></script>
</body>
</html>
