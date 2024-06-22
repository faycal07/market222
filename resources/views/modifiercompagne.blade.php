<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Modifier Compagne</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    <link rel="stylesheet" href="{{ asset('css/formulaire.css') }}">
    @vite('resources/css/app.css')


</head>

<body>

    @include('navbar')

	<div class="main-container">
        @include('sidebar')
		<div class="main" >


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


      <div class="report-container mt-12 pt-8 px-3" id="user-form">
        <div class="form-container max-w-lg mx-auto">
          <h1 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Modifier Compagne</h1>

          <div class="form-container">

          <form action="{{ route('modifiercompagne', ['id' => $compagne->id]) }}" method="POST" enctype="multipart/form-data" class="max-w-lg mx-auto">
            @csrf
      @method('PUT')
            <!-- Titre de la compagne -->
            <div class="mb-5">
              <label for="compagne_title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Titre de la Compagne</label>
              <input type="text" id="compagne_title" name="compagne_title" placeholder="Titre de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ $compagne->title }}">
              @error('compagne_title')
              <div>
                  {{$message}}
              </div>

              @enderror
            </div>

            <!-- Slogan de la compagne -->
            <div class="mb-5">
              <label for="compagne_slogan" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Slogan de la Compagne</label>
              <input type="text"  id="compagne_slogan" name="compagne_slogan" placeholder="Slogan de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"value="{{ $compagne->slogan }}">
              @error('compagne_slogan')
              <div>
                  {{$message}}
              </div>

              @enderror
            </div>

            <!-- Texte de la compagne -->
            <div class="mb-5">
              <label for="text_compagne" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Texte de la Compagne</label>
              <textarea id="text_compagne" name="text_compagne" rows="4" placeholder="Texte de la Compagne" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">{{ $compagne->text_compagne }}</textarea>
              @error('text_compagne')
              <div>
                  {{$message}}
              </div>

              @enderror
            </div>

            <!-- Image de la compagne -->
            <div class="mb-5">
              <label for="compagne_image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Image</label>
              <input type="file" id="compagne_image" name="compagne_image" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
              @error('compagne_image')
              <div>
                  {{$message}}
              </div>

              @enderror
            </div>

            <!-- Date de création de la compagne -->
            <div class="mb-5">
              <label for="compagne_date_limite" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Date Limite</label>
              <input type="date" id="compagne_date_limite" name="compagne_date_limite" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" value="{{ $compagne->date_limite }}">
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
              <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Modifier</button>
              <a href="#" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>

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
