<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible"
		content="IE=edge">
	<meta name="viewport"
		content="width=device-width,
				initial-scale=1.0">
	<title>Liste Utilisateur</title>
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
                         $nombreUtilisateursarchive = DB::table('users')->where('archiver', 'oui')->count();
                        @endphp

						<h2 class="topic-heading">{{$nombreUtilisateursarchive}}</h2>
						<h2 class="topic">Utilisateurs Archivés</h2>
					</div>

					<img src="images/archiver.png"
						alt="likes">
				</div>

				<div class="box box3">
					<div class="text">
                        @php
                        $nombreUtilisateursmarketing = DB::table('users')->where('role', 'marketing')->count();
                       @endphp
						<h2 class="topic-heading">{{$nombreUtilisateursmarketing}}</h2>
						<h2 class="topic">Utilisateurs Marketing</h2>
					</div>

					<img src="images/usermarketing.png"
						alt="comments">
				</div>

			</div>


			<div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Utilisateurs</h1>
                    <span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">
                        <a href="{{ route('users.index') }}#user-form" onclick="scrollToForm()">Créer Utilisateur</a>
                    </span>
                    <input type="text" id="userSearchInput" placeholder="Rechercher utilisateurs..." class="mt-3 px-3 py-2 border rounded-md">
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
                    <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
                        <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <th scope="col" class="px-6 py-3">Nom</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Role</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="userTableBody">
                            @foreach($users as $user)
                                @if ($user->archiver == 'non')
                                    <tr class="user-item border-b even:bg-slate-300 odd:bg-slate-400">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-cyan-800">{{ $user->id }}</td>
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">{{ $user->role }}</td>
                                        <td class="ps-6 py-0 my-0 mx-10">
                                            <span class="inline-flex rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                                <a href="{{ route('modifieruser.index', ['id' => $user->id]) }}">
                                                    <img src="/images/editer.png" alt="editer">
                                                </a>
                                            </span>
                                            <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-red-900 hover:text-slate-400">
                                                <form action="{{ route('archiveruser', $user->id) }}" method="POST" class="mb-6">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit">
                                                        <img src="/images/archiver1.png" alt="archiver">
                                                    </button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>


			<div class="report-container">
                <div class="report-header">
                    <h1 class="recent-Articles">Liste des Utilisateurs Archivés</h1>
                    <span class="inline-block bg-sky-900 rounded-full mt-3 px-3 py-1 text-sm font-semibold text-slate-100 mr-2 mb-2 hover:bg-sky-300 hover:text-slate-800">
                        <a href="{{ route('users.index') }}#user-form" onclick="scrollToForm()">Créer Utilisateur</a>

                    </span>
                    <input type="text" id="archivedUserSearchInput" placeholder="Rechercher utilisateurs archivés..." class="mt-3 px-3 py-2 border rounded-md">
                </div>

                <div class="relative overflow-x-auto shadow-md sm:rounded-lg my-5">
                    <table class="w-full text-sm text-left rtl:text-right text-slate-800 dark:text-slate-800">
                        <thead class="text-xs text-gray-200 uppercase bg-gray-50 dark:bg-cyan-900 dark:text-gray-200">
                            <tr>
                                <th scope="col" class="px-6 py-3">Id</th>
                                <th scope="col" class="px-6 py-3">Nom</th>
                                <th scope="col" class="px-6 py-3">Email</th>
                                <th scope="col" class="px-6 py-3">Role</th>
                                <th scope="col" class="px-6 py-3">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="archivedUserTableBody">
                            @foreach($users as $user)
                                @if ($user->archiver == 'oui')
                                    <tr class="archived-user-item border-b even:bg-slate-300 odd:bg-slate-400">
                                        <td class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-cyan-800">{{ $user->id }}</td>
                                        <td class="px-6 py-4">{{ $user->name }}</td>
                                        <td class="px-6 py-4">{{ $user->email }}</td>
                                        <td class="px-6 py-4">{{ $user->role }}</td>
                                        <td class="ps-6 py-0 my-0 mx-10">
                                            <span class="inline-flex rounded-md px-1 py-1 w-8 h-8 hover:bg-sky-900 hover:text-slate-400">
                                                <a href="{{ route('modifieruser.index', ['id' => $user->id]) }}">
                                                    <img src="/images/editer.png" alt="editer">
                                                </a>
                                            </span>
                                            <span class="inline-block rounded-md px-1 py-1 w-8 h-8 hover:bg-red-900 hover:text-slate-400">
                                                <form action="{{ route('dearchiveruser', $user->id) }}" method="POST" class="mb-6">
                                                    @csrf
                                                    @method('PUT')
                                                    <button type="submit">
                                                        <img src="/images/archiver1.png" alt="archiver">
                                                    </button>
                                                </form>
                                            </span>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>








			<div  id="user-form" class="report-container mt-5 pt-8 px-3 hidden">

				<div class="form-container max-w-lg mx-auto ">

						<h2 class="max-w-lg text-3xl font-semibold leading-normal text-gray-700 dark:text-slate-500 text-center py-3">Créer Utilisateur</h2>
						<form action="{{ route('creeruser') }}" method="POST" class="user-form" id="user-form1">
                            @csrf
                            <div class="form-group mb-5">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Nom d'utilisateur:</label>
                                <input type="text" id="name" name="name" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Nom d'utilisateur">
                            @error('name')
                            <div>
                                {{$message}}
                            </div>

                            @enderror
                            </div>

                            <div class="form-group mb-5">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Email:</label>
                                <input type="email" id="email" name="email" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Email">
                                @error('email')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                            </div>

                            <div class="form-group mb-5">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Mot de passe:</label>
                                <input type="password" id="password" name="password" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Mot de passe">
                                @error('password')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                                </div>
                            <div class="form-group mb-5">
                                <label for="password_confirmation" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Confirmer le mot de passe:</label>
                                <input type="password" id="password_confirmation" name="password_confirmation" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light" placeholder="Confirmer le mot de passe">
                                @error('password_confirmation')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                                </div>
                            <div class="form-group mb-5">
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-slate-500">Rôle:</label>
                                <select id="role" name="role" required class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-sky-900 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500 dark:shadow-sm-light">
                                    <option value="admin">Admin</option>
                                    <option value="marketing">Marketing</option>
                                    <!-- Ajoutez d'autres options de rôle selon vos besoins -->
                                </select>
                                @error('role')
                                <div>
                                    {{$message}}
                                </div>

                                @enderror
                                </div>
                            <div class="flex items-center justify-center h-16">
                                <button type="submit" id="submit-button" class="text-white bg-gradient-to-br from-green-400 to-blue-600 hover:bg-gradient-to-bl focus:ring-4 focus:outline-none focus:ring-green-200 dark:focus:ring-green-800 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">Créer</button>
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
        document.getElementById('userSearchInput').addEventListener('input', function() {
    searchUsers('userSearchInput', 'userTableBody', 'user-item');
});

document.getElementById('archivedUserSearchInput').addEventListener('input', function() {
    searchUsers('archivedUserSearchInput', 'archivedUserTableBody', 'archived-user-item');
});

function searchUsers(inputId, tableBodyId, rowClass) {
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

	<script src="{{ asset('js/index.js')}}"></script>
</body>
</html>
