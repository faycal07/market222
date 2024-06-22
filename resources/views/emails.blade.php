<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"content="width=device-width initial-scale=1.0">

<title>Liste Emails</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
    @vite('resources/css/app.css')
    <link rel="icon" href="{{asset('images/logotoudja.png')}}" type="image/x-icon"/>

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

            @if (session('userError') || $errors->has('user'))
            <script defer>
                document.addEventListener("DOMContentLoaded", function() {
                    var userForm = document.getElementById('user-form');
                    if (userForm) {
                        userForm.classList.remove('hidden');
                        userForm.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            </script>
        @endif

        @if (session('templateError') || $errors->any())
            <script defer>
                document.addEventListener("DOMContentLoaded", function() {
                    var templateForm = document.getElementById('template-form');
                    if (templateForm) {
                        templateForm.classList.remove('hidden');
                        templateForm.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            </script>
        @endif

            @if (session('success'))
            <div class="bg-green-200 text-green-800 p-4 mb-4 message success auto-dismiss">{{ session('success') }}</div>
            @endif


                <nav class="bg-nav p-2 shadow-md mb-5 rounded-2xl">
                    <div class="container mx-auto flex flex-wrap items-center justify-between">
                        <button class="text-white inline-flex p-3 hover:bg-gray-700 rounded-2xl lg:hidden ml-auto" id="nav-toggle">

                            <img src="{{asset('/images/menutel.png')}}" alt="menu" class="w-6 h-6">
                        </button>



                    <div class="hidden w-full lg:flex md:flex-col md:flex-grow md:w-auto px-3" id="nav-contenttt" >
                        <div class="md:inline-flex md:flex-wrap md:flex-row md:items-stretch md:w-auto w-full items-start flex flex-col md:h-auto space-x-0">
                            <a href="#emailSection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">E-Mails</a>
                            <a href="#templateSection" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Templates</a>
                            <a href="#user-form" onclick="scrollToForm()" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Créer E-Mails</a>
                            <a href="#template-form" onclick="scrollToFormm()" class="hover:bg-sky-200 hover:text-gray-800 hover:scale-110 transform transition duration-200 lg:inline-flex lg:w-auto w-full px-3 py-2 rounded text-white">Créer Templates</a>

                        </div>
                    </div>

                </div>
            </nav>

			<div class="box-container">

				<div class="box box1">
					<div class="text">
                        @php
                         $user_id = auth()->id();
                    $nbremails= DB::table('emails')->where('user_id', $user_id)->count();
                     @endphp
						<h2 class="topic-heading">{{$nbremails}}</h2>
						<h2 class="topic">Emails</h2>
					</div>

					<img src= "/images/email.png"
						alt="Views">
				</div>

				<div class="box box2">
					<div class="text">
                        @php
                        $user_id = auth()->id();
                        $nbrtemplates= DB::table('templates')->where('user_id', $user_id)->count();
                        @endphp
						<h2 class="topic-heading">{{$nbrtemplates}}</h2>
						<h2 class="topic">Templates</h2>
					</div>

					<img src= "/images/template.png"
						alt="templates">
				</div>
			</div>





			<div class="report-container min-w-full" id="emailSection" >
                <div class="report-header">
                    <h1 class="recent-Articles">Liste des Emails</h1>

                    <div class="bg-white p-4 rounded-lg">
                        <div class="relative bg-inherit">
                            <input type="search" id="emailSearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                            <label for="emailSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
                        </div>
                    </div>

                    <span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">
                        <a href="#user-form" onclick="scrollToForm()">Composer un email</a>
                    </span>
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
                    <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
                        <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">ID</th>
                                <th scope="col" class="px-6 py-3">Destination</th>
                                <th scope="col" class="px-6 py-3">Sujet</th>
                                <th scope="col" class="px-6 py-3">Text</th>
                                <th scope="col" class="px-6 py-3">Attachment</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="emailTableBody">
                            @php
                                $user_id = auth()->id();
                                $emails = DB::table('emails')->where('user_id', $user_id)->get();
                            @endphp
                            @foreach($emails as $email)
                                <tr class="email-item border-b even:bg-slate-300 odd:bg-slate-400">
                                    <td class="px-6 py-1">{{ $email->id }}</td>
                                    <td class="px-6 py-1">{{ $email->to }}</td>
                                    <td class="px-6 py-1">{{ $email->subject }}</td>
                                    <td class="px-6 py-1">{{ $email->body }}</td>
                                    <td class="px-6 py-1">
                                        @if($email->attachments)
                                            @php
                                                $attachmentPath = str_replace('public/', '', $email->attachments);
                                                $attachmentUrl = asset('storage/' . $attachmentPath);
                                                $extension = pathinfo($attachmentUrl, PATHINFO_EXTENSION);
                                                $imageExtensions = ['jpg', 'jpeg', 'png'];
                                                $pdfExtensions = ['pdf'];
                                                $docExtensions = ['doc', 'docx', 'xls', 'xlsx'];
                                            @endphp

                                            @if(in_array($extension, $imageExtensions))
                                                <img src="{{ $attachmentUrl }}" alt="Attachment" style="max-width: 100px; max-height: 100px;">
                                            @elseif(in_array($extension, $pdfExtensions))
                                                <embed src="{{ $attachmentUrl }}" type="application/pdf" width="100%" height="500px" />
                                            @elseif(in_array($extension, $docExtensions))
                                                <iframe src="https://docs.google.com/gview?url={{ $attachmentUrl }}&embedded=true" width="100%" height="500px"></iframe>
                                            @else
                                                <a href="{{ $attachmentUrl }}" target="_blank">View Attachment</a>
                                            @endif
                                        @else
                                            No attachment
                                        @endif
                                    </td>
                                    <td class="px-6 py-1">
                                        <button type="button" class="delete-email-button inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-red-900 hover:text-slate-400" data-action="{{ route('email.delete', ['id' => $email->id]) }}">
                                            <img src="/images/supprimer.png" alt="supprimer">
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

           <!-- Modal de confirmation pour les Emails -->
<div id="deleteEmailModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 max-w-md p-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Confirmation de suppression</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer cet email ? Cette action est irréversible.</p>
        <div class="mt-4 flex justify-end space-x-4">
            <button id="cancelEmailButton" class="cancel-button px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Annuler</button>
            <form id="deleteEmailForm" method="POST" class="delete-form inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
            </form>
        </div>
    </div>
</div>
<div class="report-container min-w-full" id="templateSection">
    <div class="report-header">
        <h1 class="recent-Articles">Liste des Templates</h1>

        <div class="bg-white p-4 rounded-lg me-6">
            <div class="relative bg-inherit">
                <input type="search" id="templateSearchInput" name="username" class="peer bg-transparent h-8 w-52 md:w-72 rounded-lg text-gray-900 placeholder-transparent ring-2 px-2 ring-gray-500 focus:ring-sky-600 focus:outline-none focus:border-rose-600" placeholder="Rechercher"/>
                <label for="templateSearchInput" class="absolute cursor-text left-2 -top-3 text-sm text-gray-500 bg-white px-1 peer-placeholder-shown:text-center peer-placeholder-shown:text-gray-500 peer-placeholder-shown:top-2 peer-focus:-top-3 peer-focus:text-sky-600 peer-focus:text-sm transition-all">Rechercher</label>
            </div>
        </div>

        <span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">
            <a href="#template-form" onclick="scrollToFormm()">Créer template</a>
        </span>
    </div>

    <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
        <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
            <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
                <tr>
                    <th scope="col" class="px-6 py-3">ID</th>
                    <th scope="col" class="px-6 py-3">Nom</th>
                    <th scope="col" class="px-6 py-3">Sujet</th>
                    <th scope="col" class="px-6 py-3">Mobile</th>
                    <th scope="col" class="px-6 py-3">Web</th>
                    <th scope="col" class="px-6 py-3">E-mail</th>
                    <th scope="col" class="px-6 py-3">Téléphone</th>
                    <th scope="col" class="px-6 py-3">Adresse</th>
                    <th scope="col" class="px-6 py-3">Logo</th>
                    <th scope="col" class="px-6 py-3">Actions</th>
                </tr>
            </thead>
            <tbody id="templateTableBody">
                @php
                    $user_id = auth()->id();
                    $templates = DB::table('templates')->where('user_id', $user_id)->get();
                @endphp
                @foreach($templates as $template)
                    <tr class="template-item border-b even:bg-slate-300 odd:bg-slate-400">
                        <td class="px-6 py-1">{{ $template->id }}</td>
                        <td class="px-6 py-1">{{ $template->nom }}</td>
                        <td class="px-6 py-1">{{ $template->subject }}</td>
                        <td class="px-6 py-1">{{ $template->mobile }}</td>
                        <td class="px-6 py-1">{{ $template->web }}</td>
                        <td class="px-6 py-1">{{ $template->email }}</td>
                        <td class="px-6 py-1">{{ $template->telephone }}</td>
                        <td class="px-6 py-1">{{ $template->adresse }}</td>
                        <td class="px-3 py-1"><img src="{{ Storage::url($template->logo) }}" alt="Logo" class="h-20 w-20"></td>
                        <td class="ps-3 py-1">
                            <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-red-900 hover:text-slate-400">
                                <button type="button" class="delete-template-button" data-action="{{ route('templates.destroy', ['id' => $template->id]) }}">
                                    <img src="/images/supprimer.png" alt="supprimer">
                                </button>
                            </span>
                            <span class="inline-flex rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                <a href="{{ route('templates.edit', ['id' => $template->id]) }}">
                                    <img src="/images/editer.png" alt="editer">
                                </a>
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>


           <!-- Modal de confirmation pour les Templates -->
<div id="deleteTemplateModal" tabindex="-1" aria-hidden="true" class="fixed inset-0 flex items-center justify-center bg-black bg-opacity-50 hidden">
    <div class="bg-white rounded-lg shadow dark:bg-gray-800 max-w-md p-6">
        <h2 class="text-lg font-semibold text-gray-800 dark:text-white">Confirmation de suppression</h2>
        <p class="mt-2 text-gray-600 dark:text-gray-400">Êtes-vous sûr de vouloir supprimer ce template ? Cette action est irréversible.</p>
        <div class="mt-4 flex justify-end space-x-4">
            <button id="cancelTemplateButton" class="cancel-button px-4 py-2 bg-gray-200 text-gray-800 rounded hover:bg-gray-300 dark:bg-gray-700 dark:text-gray-300 dark:hover:bg-gray-600">Annuler</button>
            <form id="deleteTemplateForm" method="POST" class="delete-form inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">Supprimer</button>
            </form>
        </div>
    </div>
</div>







       <div id="user-form" class="report-container mt-5 pt-8 px-3 {{ $errors->has('user') ? '' : 'hidden' }}">
			<div class="form-container max-w-lg mx-auto">
				<h1 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Composer un Email</h1>


                <form action="{{ route('email.save') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="flex flex-col">
                      <label for="to" class="text-sm font-medium mb-1">À :</label>
                      <input type="email" id="to" name="to" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                      @error('to')
                      <div class="text-red-500 text-sm">
                          {{$message}}
                      </div>

                      @enderror
                    </div>

                    <div class="flex flex-col">
                      <label for="subject" class="text-sm font-medium mb-1">Objet :</label>
                      <input type="text" id="subject" name="subject" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                      @error('subject')
                      <div class="text-red-500 text-sm">
                          {{$message}}
                      </div>

                      @enderror
                    </div>

                    <div class="flex flex-col">
                      <label for="body" class="text-sm font-medium mb-1">Message :</label>
                      <textarea id="body" name="body" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light"></textarea>
                      @error('body')
                      <div class="text-red-500 text-sm">
                                        {{$message}}
                                    </div>

                                    @enderror
                    </div>

                    <div class="flex flex-col">
                      <label for="attachments" class="text-sm font-medium mb-1">Pièce jointe :</label>
                      <input type="file" id="attachments" name="attachments"class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                      @error('attachments')
                      <div>
                          {{$message}}
                      </div>

                      @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="template_id" class="text-sm font-medium mb-1">Template :</label>
                        <select id="template_id" name="template_id"class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                            @php
                            $templates = DB::table('templates')->get();
                            @endphp
                            <option value="">Sélectionner un template</option>
                          @foreach($templates as $template)
                          <option value="{{$template->id}}">{{$template->nom}}</option>
                          @endforeach

                        </select>
                        @error('template_id')
                        <div>
                            {{$message}}
                        </div>

                        @enderror
                      </div>


     <!-- Boutons de soumission -->
     <div class="text-center">
        <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Envoyer</button>
        <a href="#" onclick="scrollToStart()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>

    </div>
                  </form>
			</div>
		</div>



        <div id="template-form" class="report-container mt-5 pt-8 px-3 {{ $errors->any() ? '' : 'hidden' }}">
            <div class="form-container max-w-lg mx-auto">
                <h1 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Creer un template</h1>

                <form action="{{ route('templates.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf
                    <div class="flex flex-col">
                        <label for="nom" class="text-sm font-medium mb-1">Nom du template :</label>
                        <input type="text" id="nom" name="nom" value="{{ old('nom') }}" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('nom')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="subject" class="text-sm font-medium mb-1">Objet du template :</label>
                        <input type="text" id="subject" name="subject" value="{{ old('subject') }}" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('subject')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="mobile" class="text-sm font-medium mb-1">Contenu mobile du template :</label>
                        <input type="text" id="mobile" name="mobile" value="{{ old('mobile') }}" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('mobile')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="web" class="text-sm font-medium mb-1">Contenu web du template :</label>
                        <input type="text" id="web" name="web" value="{{ old('web') }}" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('web')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="email" class="text-sm font-medium mb-1">E-mail :</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('email')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="telephone" class="text-sm font-medium mb-1">Contenu téléphone du template :</label>
                        <input type="text" id="telephone" name="telephone" value="{{ old('telephone') }}" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('telephone')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="adresse" class="text-sm font-medium mb-1">Contenu adresse du template :</label>
                        <input type="text" id="adresse" name="adresse" value="{{ old('adresse') }}" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('adresse')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label for="logo" class="text-sm font-medium mb-1">Logo du template :</label>
                        <input type="file" id="logo" name="logo" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                        @error('logo')
                        <div class="text-red-500 text-sm">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>

                    <div class="text-center">
                        <button type="submit" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2 ">Créer</button>
                        <a href="#" onclick="scrollToStartt()" class="text-white bg-gradient-to-br from-red-400 to-purple-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Annuler</a>
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
        document.getElementById('emailSearchInput').addEventListener('input', function() {
    searchItems('emailSearchInput', 'emailTableBody', 'email-item');
});

document.getElementById('templateSearchInput').addEventListener('input', function() {
    searchItems('templateSearchInput', 'templateTableBody', 'template-item');
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
    document.addEventListener("DOMContentLoaded", function() {
        function handleDeleteButtons(buttons, modal, cancelButton, form) {
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const actionUrl = this.getAttribute('data-action');
                    form.action = actionUrl;
                    modal.classList.remove('hidden');
                });
            });

            cancelButton.addEventListener('click', function() {
                modal.classList.add('hidden');
            });
        }

        // Gestion des modals de suppression pour les emails
        const deleteEmailButtons = document.querySelectorAll('.delete-email-button');
        const deleteEmailModal = document.getElementById('deleteEmailModal');
        const cancelEmailButton = document.getElementById('cancelEmailButton');
        const deleteEmailForm = document.getElementById('deleteEmailForm');
        handleDeleteButtons(deleteEmailButtons, deleteEmailModal, cancelEmailButton, deleteEmailForm);

        // Gestion des modals de suppression pour les templates
        const deleteTemplateButtons = document.querySelectorAll('.delete-template-button');
        const deleteTemplateModal = document.getElementById('deleteTemplateModal');
        const cancelTemplateButton = document.getElementById('cancelTemplateButton');
        const deleteTemplateForm = document.getElementById('deleteTemplateForm');
        handleDeleteButtons(deleteTemplateButtons, deleteTemplateModal, cancelTemplateButton, deleteTemplateForm);
    });
</script>



	<script src="{{ asset('js/index.js')}}"></script>
</body>
</html>
