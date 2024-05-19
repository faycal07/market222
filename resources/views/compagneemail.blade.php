<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modèle de Compagne Marketing par Email pour une Boisson</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body style="background-color: #f9fafb; padding: 20px; font-family: Arial, sans-serif;">

    <div class="container max-w-screen-md mx-auto bg-gray-100 rounded-lg shadow-md">
        @if(isset($compagne))
            <!-- Logo Section -->
            <div class="logo-section bg-white p-6 text-center">
                <img src="{{ asset('/images/logotoudja.png') }}" alt="logo" class="mx-auto h-24 sm:h-32 lg:h-44 w-auto">
            </div>

            <!-- Subject Section -->
            <div class="subject-section bg-blue-600 py-6 text-center text-white">
                <h2 class="text-3xl font-bold tracking-wide">{{ $compagne->title }}</h2>
            </div>

            <!-- Image Section -->
            <div class="text-section py-6">
                @if(isset($imageContent))
                    <img src="{{ $message->embedData($imageContent, 'image.jpg', $mime) }}" alt="Image de la Boisson" class="mx-auto h-auto w-full rounded-lg shadow-md">
                @else
                    <p class="text-gray-700 text-center">Image non disponible</p>
                @endif
                <p class="text-lg leading-loose mt-4 text-gray-700 text-center">{{ $compagne->slogan }}</p>
            </div>

            <!-- Text Section -->
            <div class="text-section py-6 bg-white">
                <p class="text-lg leading-loose text-gray-700">{{ $compagne->text_compagne }}</p>
            </div>

            <!-- Company Information Section -->
            <div class="info-section py-6 px-4 bg-white rounded-lg shadow-md">
                <h3 class="text-xl font-semibold mb-4">Contactez-nous pour plus d'informations :</h3>
                <ul class="list-disc list-inside text-gray-700 text-left">
                    <li>Mob : +213(0)667 601 271</li>
                    <li>Site Web : <a href="http://www.toudja.dz" class="text-blue-500 hover:underline">www.toudja.dz</a></li>
                    <li>Email : <a href="mailto:info@toudja.dz" class="text-blue-500 hover:underline">info@toudja.dz</a></li>
                    <li>Téléphone : +213 34 81 03 14 / +213 34 81 03 14</li>
                    <li>Fax : +213 34 81 03 18</li>
                    <li>Adresse : Route de concessions Z.I-Béjaia-Algérie, BP N°252 TER-LIBERTE BEJAIA-ALGERIE</li>
                </ul>
                <p class="text-lg leading-loose text-gray-700 mt-4">Cordialement,<br />L'équipe Toudja</p>
            </div>

            <!-- Footer Section -->
            <div class="footer-section py-6 px-4 bg-gray-200 text-center rounded-b-lg">
                <p class="text-gray-600">&copy; SARL SPC GB groupe Toudja. Tous droits réservés.</p>
            </div>
        @else
            <p class="text-gray-700 text-center">La compagne n'est pas définie.</p>
        @endif
    </div>

</body>
</html>