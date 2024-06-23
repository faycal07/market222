<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Liste Compagnes</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @vite('resources/css/app.css')

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
    <style>
        [x-cloak] {
            display: none !important;
        }
    </style>
<<<<<<< HEAD
=======
=======
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
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

            @if (session('test'))
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
            <div class="bg-red-200 text-red-800 p-4 mb-4 message error auto-dismiss">
                {{ session('test') }}
            </div>
            @endif
<<<<<<< HEAD
=======
=======
    <div class="bg-red-200 text-red-800 p-4 mb-4 message error auto-dismiss">
        {{ session('test') }}
    </div>
@endif
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e

            @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 mb-4 message success auto-dismiss">{{ session('success') }}</div>
            @endif

            <div class="box-container">
<<<<<<< HEAD

                <div class="box box1">
                    <div class="text">

=======

                <div class="box box1">
                    <div class="text">

<<<<<<< HEAD
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                        @php
                        $user_id = auth()->id();
                        $nbrcompagnes = DB::table('compagnes')->where('user_id', $user_id)->count();
                        @endphp
                        <h2 class="topic-heading">{{ $nbrcompagnes }}</h2>
                        <h2 class="topic">Compagnes</h2>
                    </div>
<<<<<<< HEAD

                    <img src="/images/compagnes.png" alt="Views">
                </div>
            </div>

            <div class="report-container min-w-full">
=======

                    <img src="/images/compagnes.png" alt="Views">
                </div>
            </div>

            <div class="report-container min-w-full">
=======
				<div class="box box1">
					<div class="text">

                      @php
                      $user_id = auth()->id();
                      $nbrcompagens= DB::table('compagnes')->where('user_id', $user_id)->count();
                      @endphp
						<h2 class="topic-heading">{{$nbrcompagens}}</h2>
						<h2 class="topic">Compagnes</h2>
					</div>

					<img src= "/images/compagnes.png"
						alt="Views">
				</div>
			</div>





			<div class="report-container min-w-full">
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                <div class="report-header">
                    <h1 class="recent-Articles">Liste des Compagnes</h1>

                    <div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
<<<<<<< HEAD
                            <input type="search" id="compagneSearchInput" name="username" class="me-16 peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher" />
=======
<<<<<<< HEAD
                            <input type="search" id="compagneSearchInput" name="username" class="me-16 peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher" />
=======
                            <input type="search" id="compagneSearchInput" name="username" class=" me-16 peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                            <label for="compagneSearchInput" onkeyup="searchLeads()" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>

                    <span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">
                        <a href="{{ route('compagnes.index') }}#user-form" onclick="scrollToForm()">Créer Compagne</a>
                    </span>

                </div>
                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                    <div x-data="{ openModal: false }">
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
                                @foreach ($compagnes as $compagne)
                                <tr class="compagne-item border-b even:bg-slate-300 odd:bg-slate-400">
                                    <td class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-cyan-800">{{ $compagne->id }}</td>
                                    <td class="px-6 py-1">{{ $compagne->title }}</td>
                                    <td class="px-6 py-1">{{ $compagne->text_compagne }}</td>
                                    <td class="px-6 py-1">{{ $compagne->slogan }}</td>
                                    <td class="px-6 py-1">
                                        <ol>
                                            @foreach ($compagne->leads as $lead)
                                            <li>{{ $lead->nom }}</li>
                                            @endforeach
                                        </ol>
                                    </td>
                                    <td class="px-6 py-1">{{ $compagne->date_limite }}</td>

                                    <td class="px-3 py-1">
                                        <!-- Modal toggle -->
                                        <button @click="openModal = true" class="inline-flex hover:text-white font-medium rounded-lg text-sm px-5 py-2.5 text-center" type="button">
                                            Voir l'image
                                        </button>

                                        <!-- Main modal -->
                                        <div x-show="openModal" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" class="z-50 fixed inset-0 flex items-center justify-center" x-cloak>
                                            <div class="fixed inset-0 bg-black opacity-50" @click="openModal = false"></div>
                                            <div class="relative p-4 w-full max-w-xl max-h-full">
                                                <!-- Modal content -->
                                                <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                                    <!-- Modal header -->
                                                    <div class="flex items-center justify-between p-3 md:p-5 border-b rounded-t dark:border-gray-600 h-6">
                                                        <a @click="openModal = false" type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white">
                                                            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                                                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                                            </svg>
                                                            <span class="sr-only">Close modal</span>
                                                        </a>
                                                    </div>
                                                    <!-- Modal body -->
                                                    <div class="p-2 md:p-0 space-y-2">
                                                        <img src="{{ Storage::url($compagne->image) }}" alt="{{ $compagne->title }}" class="h-full w-full object-contain">
                                                    </div>
                                                    <!-- Modal footer -->
                                                    <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600 h-5">
                                                        <button @click="openModal = false" type="button" class="py-1 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Fermer</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>

                                    <td class="px-6 py-1">
                                        <div class="grid grid-cols-1 sm:grid-cols-1 lg:flex lg:space-x-4 gap-y-4">
                                            <a href="{{ route('modifiercompagne.index', ['id' => $compagne->id]) }}" class="ml-4 text-blue-900 hover:text-blue-700 transform hover:scale-110 transition duration-200">
                                                <i class="fa-solid fa-pen-to-square fa-2xl"></i>
                                            </a>

                                            <button onclick="openDeleteModal('{{ route('deletecompagne', ['id' => $compagne->id]) }}')" class="text-red-700 hover:text-red-500 transform hover:scale-110 transition duration-200">
                                                <i class="fa-solid fa-trash-can fa-2xl"></i>
                                            </button>

                                            <a href="{{ route('email.envoyer', ['id' => $compagne->id]) }}" class="ml-4 text-slate-950 hover:text-sky-800 transform hover:scale-110 transition duration-200">
                                                <i class="fa-solid fa-envelope-open-text fa-2xl"></i>
                                            </a>

                                            <a href="{{ route('sms.envoyer', ['id' => $compagne->id]) }}" class="ml-4 text-slate-950 hover:text-sky-800 transform hover:scale-110 transition duration-200">
                                                <i class="fa-solid fa-comment-sms fa-2xl"></i>
                                            </a>

                                            <a href="{{ route('compagnes.share', ['id' => $compagne->id]) }}" class="ml-4 text-slate-950 hover:text-sky-800 transform hover:scale-110 transition duration-200">
                                                <i class="fa-solid fa-share-nodes fa-2xl"></i>
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
<<<<<<< HEAD
=======
=======
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
                            @foreach ($compagnes as $compagne)
                            <tr class="compagne-item border-b even:bg-slate-300 odd:bg-slate-400">
                                <td class="px-6 py-1 font-medium text-gray-900 whitespace-nowrap dark:text-cyan-800">{{ $compagne->id }}</td>
                                <td class="px-6 py-1">{{ $compagne->title }}</td>
                                <td class="px-6 py-1">{{ $compagne->text_compagne }}</td>
                                <td class="px-6 py-1">{{ $compagne->slogan }}</td>
                                <td class="px-6 py-1">
                                    <ol>
                                        @foreach ($compagne->leads as $lead)
                                        <li>{{ $lead->nom }}</li>
                                        @endforeach
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
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
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

                    <form action="{{ route('creercompagne') }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
                        @csrf

                        <!-- Titre de la compagne -->
                        <div class="mb-5">
                            <label for="compagne_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Titre de la Compagne</label>
                            <input type="text" id="compagne_title" name="compagne_title" required placeholder="Titre de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            @error('compagne_title')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Slogan de la compagne -->
                        <div class="mb-5">
                            <label for="compagne_slogan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Slogan de la Compagne</label>
                            <input type="text" id="compagne_slogan" name="compagne_slogan" required placeholder="Slogan de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            @error('compagne_slogan')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Texte de la compagne -->
                        <div class="mb-5">
                            <label for="text_compagne" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Texte de la Compagne</label>
                            <textarea id="text_compagne" name="text_compagne" required rows="4" placeholder="Texte de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></textarea>
                            @error('text_compagne')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Image de la compagne -->
                        <div class="mb-5">
                            <label for="compagne_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Image</label>
                            <input type="file" id="compagne_image" name="compagne_image" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            @error('compagne_image')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <!-- Date de création de la compagne -->
                        <div class="mb-5">
                            <label for="compagne_date_limite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Date Limite</label>
                            <input type="date" id="compagne_date_limite" required name="compagne_date_limite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            @error('compagne_date_limite')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

<<<<<<< HEAD
=======
<<<<<<< HEAD
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e
                        <!-- Champs pour le choix des leads -->
                        <div class="mb-5">
                            <label for="lead_options" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Choisir les Leads</label>
                            <select id="lead_options" name="lead_option" onchange="showConditionalFields()" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                <option>selectionner</option>
                                <option value="lead_sources">Lead Sources</option>
                                <option value="products">Produits</option>
                                <option value="lead_types">Types de Leads</option>
                                <option value="all_leads">Tous les Leads</option>
                            </select>
                            @error('lead_option')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>
<<<<<<< HEAD

                        <!-- Champs conditionnels en fonction de l'option sélectionnée -->
                        <div class="mb-5 conditional-field" id="source-id-condition" style="display: none;">
                            <label for="source_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner la source de lead</label>
                            <select id="source_id" name="source_id" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                @php
                                $sources = DB::table('lead_sources')->get();
                                @endphp
                                @foreach($sources as $source)
                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                                @endforeach
                            </select>
                            @error('source_id')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-5 conditional-field" id="product-condition" style="display: none;">
                            <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner le produit</label>
                            <select id="product_id" name="product_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                @php
                                $products = DB::table('products')->get();
                                @endphp
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5 conditional-field" id="lead-type-id-condition" style="display: none;">
                            <label for="lead_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner le type de lead</label>
                            <select id="lead_type_id" name="lead_type_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                @php
                                $types = DB::table('lead_types')->get();
                                @endphp
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" id="compagne_leads" name="compagne_leads" value=''>
                        <!-- Boutons de soumission -->
                        <div class="text-center">
                            <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Créer</button>
                            <a href="#" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
=======

                        <!-- Champs conditionnels en fonction de l'option sélectionnée -->
                        <div class="mb-5 conditional-field" id="source-id-condition" style="display: none;">
                            <label for="source_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner la source de lead</label>
                            <select id="source_id" name="source_id" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                @php
                                $sources = DB::table('lead_sources')->get();
                                @endphp
                                @foreach($sources as $source)
                                <option value="{{ $source->id }}">{{ $source->name }}</option>
                                @endforeach
                            </select>
                            @error('source_id')
                            <div>
                                {{ $message }}
                            </div>
                            @enderror
                        </div>

                        <div class="mb-5 conditional-field" id="product-condition" style="display: none;">
                            <label for="product_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner le produit</label>
                            <select id="product_id" name="product_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                @php
                                $products = DB::table('products')->get();
                                @endphp
                                @foreach($products as $product)
                                <option value="{{ $product->id }}">{{ $product->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-5 conditional-field" id="lead-type-id-condition" style="display: none;">
                            <label for="lead_type_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner le type de lead</label>
                            <select id="lead_type_id" name="lead_type_id" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                @php
                                $types = DB::table('lead_types')->get();
                                @endphp
                                @foreach($types as $type)
                                <option value="{{ $type->id }}">{{ $type->nom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <input type="hidden" id="compagne_leads" name="compagne_leads" value=''>
                        <!-- Boutons de soumission -->
                        <div class="text-center">
                            <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Créer</button>
                            <a href="#" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
=======
					<!-- Titre de la compagne -->
					<div class="mb-5">
						<label for="compagne_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Titre de la Compagne</label>
						<input type="text" id="compagne_title" name="compagne_title"   required placeholder="Titre de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('compagne_title')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
					</div>

					<!-- Slogan de la compagne -->
					<div class="mb-5">
						<label for="compagne_slogan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Slogan de la Compagne</label>
						<input type="text" id="compagne_slogan" name="compagne_slogan"  required  placeholder="Slogan de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
						@error('compagne_slogan')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
					</div>

					<!-- Texte de la compagne -->
					<div class="mb-5">
						<label for="text_compagne" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Texte de la Compagne</label>
						<textarea id="text_compagne" name="text_compagne"   required rows="4" placeholder="Texte de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></textarea>
						@error('text_compagne')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
					</div>

					<!-- Image de la compagne -->
					<div class="mb-5">
						<label for="compagne_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Image</label>
						<input type="file" id="compagne_image" name="compagne_image"  required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
						@error('compagne_image')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
					</div>

					<!-- Date de création de la compagne -->
					<div class="mb-5">
						<label for="compagne_date_limite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Date Limite</label>
						<input type="date" id="compagne_date_limite"   required name="compagne_date_limite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('compagne_date_limite')
                        <div>
                            {{$message}}
                        </div>

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
                        @error('lead_option')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
					</div>

					<!-- Champs conditionnels en fonction de l'option sélectionnée -->

					<div class="mb-5 conditional-field" id="source-id-condition" style="display: none;">
						<label for="source_id" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Sélectionner la source de lead</label>
						<select id="source_id" name="source_id"   required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
							@php
							//
							$sources = DB::table('lead_sources')->get();
							@endphp
							@foreach($sources as $source)
							<option value="{{$source->id}}">{{$source->name}}</option>
							@endforeach
						</select>
                        @error('source_id')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
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
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
>>>>>>> e87245b674945d1c900369974ce08a2c3b35d22e

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
