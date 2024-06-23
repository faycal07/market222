
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
    <link rel="icon" href="{{asset('images/logotoudja.png')}}" type="image/x-icon"/>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.7.0"></script>



</head>

<body>

    @include('navbar')
	<div class="main-container sm:flex md:flex">
		@include('sidebar')
        <div class="main">
<<<<<<< HEAD
            <nav class="bg-nav p-2 shadow-md mb-5 rounded-2xl">
=======
<<<<<<< HEAD
            <nav class="bg-nav p-2 shadow-md mb-5 rounded-2xl">
=======
            <nav class="bg-sky-950 p-2 shadow-md mb-5 rounded-2xl">
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                <div class="container mx-auto flex flex-wrap items-center justify-between">
                    <button class="text-white inline-flex p-3 hover:bg-gray-700 rounded-2xl lg:hidden ml-auto" id="nav-toggle">

                        <img src="{{asset('/images/menutel.png')}}" alt="menu" class="w-6 h-6">
                    </button>

                    @php
                    $user_role = auth()->user()->role;
                @endphp

<<<<<<< HEAD
                <div class="hidden w-full lg:flex md:flex-col md:flex-grow md:w-auto px-3" id="nav-contenttt" data-user-role="{{ $user_role }}">
                    <div class="md:inline-flex md:flex-wrap md:flex-row md:items-stretch md:w-auto w-full items-start flex flex-col md:h-auto space-x-0">
=======
<<<<<<< HEAD
                <div class="hidden w-full lg:flex md:flex-col md:flex-grow md:w-auto px-3" id="nav-contenttt" data-user-role="{{ $user_role }}">
                    <div class="md:inline-flex md:flex-wrap md:flex-row md:items-stretch md:w-auto w-full items-start flex flex-col md:h-auto space-x-0">
=======
                <div class="hidden w-full lg:flex lg:flex-col lg:flex-grow lg:w-auto px-3" id="nav-contenttt" data-user-role="{{ $user_role }}">
                    <div class="lg:inline-flex lg:flex-row lg:items-stretch lg:ml-1 lg:w-auto w-full items-start flex flex-col lg:h-auto space-x-0">
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                        <a href="#userSection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Utilisateurs</a>
                        <a href="#userSectionarchiver" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Archives</a>
                        <a href="#opportunitySection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Opportunités</a>
                        <a href="#leadSection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Leads</a>
                        <a href="#compagneSection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Compagnes</a>
                        <a href="#workflowSection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Workflows</a>
                        <a href="#productSection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Produits</a>
                        <a href="#Statistiques" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Statistiques</a>
<<<<<<< HEAD
=======
<<<<<<< HEAD
=======
                    </div>
                    <div class="lg:inline-flex lg:flex-row lg:items-stretch lg:ml-1 lg:w-auto w-full items-start flex flex-col lg:h-auto space-x-0">
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                        <a href="#leadChart" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Graphe Leads</a>
                        <a href="#stagesChart" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Graphe Stages</a>
                        <a href="#compagnesChart" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Graphe Compagne</a>
                        <a href="#productsChart" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Graphe Produits</a>
                        <a href="#productLeadsChart" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Graphe Produits Demandé</a>
                        <a href="#emailsChart" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Graphe E-Mail</a>
                    </div>
                </div>

                </div>
            </nav>

            @php
            $user_role = auth()->user()->role;
        @endphp

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-5" id="chartContainer" data-user-role="{{ $user_role }}">
            @foreach([
                ['title' => 'Graphique d\'utilisateurs', 'id' => 'userChart'],
                ['title' => 'Graphique des roles', 'id' => 'userRoleChart'],
                ['title' => 'Graphique des leads', 'id' => 'leadChart'],
                ['title' => 'Graphique des stages des leads', 'id' => 'stagesChart'],
                ['title' => 'Graphique des compagnes marketing', 'id' => 'compagnesChart'],
                ['title' => 'Graphique des produits', 'id' => 'productsChart'],
                ['title' => 'Graphique des produits selon la demande', 'id' => 'productLeadsChart'],
                ['title' => 'Graphique des emails', 'id' => 'emailsChart'],
            ] as $chart)
<<<<<<< HEAD
                <div class="bg-blue-200 rounded-lg shadow-md chart-item" data-chart-id="{{ $chart['id'] }}">
=======
<<<<<<< HEAD
                <div class="bg-blue-200 rounded-lg shadow-md chart-item" data-chart-id="{{ $chart['id'] }}">
=======
                <div class="bg-white rounded-lg shadow-md chart-item" data-chart-id="{{ $chart['id'] }}">
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                    <h2 class="text-lg font-semibold text-center py-4">{{ $chart['title'] }}</h2>
                    <div class="h-72">
                        <canvas id="{{ $chart['id'] }}" class="w-full h-full"></canvas>
                    </div>
                </div>
            @endforeach
        </div>

            <div class="box-container" id="Statistiques">
                @if(auth()->check() && auth()->user()->role === 'admin')
                    <div class="box">
                        <div class="text">
                            <h2 class="topic-heading">{{ DB::table('users')->count() }}</h2>
                            <h2 class="topic">Utilisateurs</h2>
                        </div>
                        <img src="images/users.png" alt="Utilisateurs">
                    </div>
                @endif

                @foreach([
                    ['title' => 'Opportunitées', 'count' => DB::table('opportunites')->count(), 'image' => 'opportunites.png'],
                    ['title' => 'Les types des Leads', 'count' => DB::table('lead_types')->count(), 'image' => 'typeslead.png'],
                    ['title' => 'Les Stages d\'une opportunitée', 'count' => DB::table('stages')->count(), 'image' => 'stages.png'],
                    ['title' => 'Les sources des leads', 'count' => DB::table('lead_sources')->count(), 'image' => 'sources.png'],
                    ['title' => 'Leads', 'count' => DB::table('leads')->count(), 'image' => 'leads.png'],
                    ['title' => 'Compagnes Marketinges', 'count' => DB::table('compagnes')->count(), 'image' => 'compagnes.png'],
                    ['title' => 'Produits', 'count' => DB::table('products')->count(), 'image' => 'produits.png'],
                    ['title' => 'Workflows', 'count' => DB::table('workflows')->count(), 'image' => 'workflow.png'],
                ] as $box)
                <div class="box">
                    <div class="text">
                        <h2 class="topic-heading">{{ $box['count'] }}</h2>
                        <h2 class="topic">{{ $box['title'] }}</h2>
                    </div>
                    <img src="images/{{ $box['image'] }}" alt="{{ $box['title'] }}">
                </div>
                @endforeach
            </div>


            @php
    $user_role = auth()->user()->role;
@endphp

<div class="report-container" id="userSection" data-user-role="{{ $user_role }}">
    <div class="report-header">
        <h1 class="recent-Articles text-xl font-semibold">Liste des Utilisateurs Non Archivés</h1>
        <div class="bg-white p-4 rounded-lg">
            <div class="relative bg-inherit">
                <input type="search" id="userSearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                <label for="userSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
            </div>
        </div>
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

<div class="report-container" id="userSectionarchiver" data-user-role="{{ $user_role }}">
    <div class="report-header">
        <h1 class="recent-Articles text-xl font-semibold">Liste des Utilisateurs Archivés</h1>
        <div class="bg-white p-4 rounded-lg">
            <div class="relative bg-inherit">
                <input type="search" id="archivedUserSearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                <label for="archivedUserSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
            </div>
        </div>
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

            <div class="report-container" id="productSection">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold">Liste des Produits</h1>


                    <div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
                            <input type="search" id="productSearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                            <label for="productSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>

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





            <div class="report-container" id="opportunitySection">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold">Liste des Opportunités</h1>


                    <div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
                            <input type="search" id="opportunitySearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                            <label for="opportunitySearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>


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


            <div class="report-container" id="leadSection">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold ">Liste des leads</h1>


                    <div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
                            <input type="search" id="leadSearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                            <label for="leadSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>


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


            <div class="report-container" id="workflowSection">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold">Liste des Workflows</h1>



                    <div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
                            <input type="search" id="workflowSearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                            <label for="workflowSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>


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

            <div class="report-container" id="compagneSection">
                <div class="report-header">
                    <h1 class="recent-Articles text-xl font-semibold ">Liste des Compagnes</h1>


                    <div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
                            <input type="search" id="compagneSearchInput" name="username" class=" peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                            <label for="compagneSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>




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
