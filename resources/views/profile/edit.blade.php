
<x-app-layout>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6 m-8">

            <div class="p-4 sm:p-8 bg-white dark:bg-sky-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <span class="font-medium text-base text-gray-100"> Modifier l'e-mail et le nom d'Utilisateur  <span id="userName" class="text-xl text-yellow-300"></span></span>
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-sky-700 shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <span class="font-medium text-base text-gray-100"> Modifier le mot de passe   <span id="userName" class="text-xl text-yellow-300"></span></span>
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white dark:bg-sky-700 shadow sm:rounded-lg">


                <div class="max-w-xl">

<span class="font-medium text-base text-gray-100">  Supprimer votre compte  <span id="userName" class="text-xl text-yellow-300"></span></span>
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
