<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $email->subject }}</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .container {
            background-color: #f3f4f6; /* Light gray background */
            max-width: 600px; /* Max width of the card */
            margin: 0 auto; /* Center the card horizontally */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Subtle shadow for a 3D effect */
            overflow: hidden; /* Ensure content stays within the container */
        }

        .logo-section, .subject-section, .text-section, .info-section, .button-section, .footer-section {
            padding: 20px;
            text-align: center;
        }

        .logo-section {
            background-color: #ffffff; /* White background for logo */
        }

        .subject-section {
            background-color: #2563eb; /* Blue background for subject */
            color: white;
        }

        .text-section, .info-section {
            background-color: #ffffff; /* White background for text and info */
        }

        .info-section ul {
            text-align: left;
        }

        .button-section {
            background-color: #ffffff; /* White background for button */
        }

        .button {
            background-color: #2563eb; /* Blue background */
            color: white; /* White text */
            padding: 10px 20px; /* Padding */
            text-decoration: none; /* Remove underline */
            border-radius: 5px; /* Rounded corners */
            display: inline-block; /* Make it inline-block */
            margin-top: 20px; /* Margin on top */
        }

        .button:hover {
            background-color: #1d4ed8; /* Darker blue on hover */
        }

        .footer-section {
            background-color: #e5e7eb; /* Slightly darker gray for the footer */
            text-align: center;
            border-top: 1px solid #d1d5db; /* Subtle top border */
        }

        .footer-section p {
            color: #6b7280; /* Gray text */
            font-size: 0.875rem; /* Small text */
        }

        .attachment-section {
            padding: 20px;
            background-color: #ffffff; /* White background for attachments */
            text-align: center;
        }
    </style>
</head>
<body style="background-color: #f9fafb; padding: 20px; font-family: Arial, sans-serif;">

    <div class="container">
        <!-- Logo Section -->
        <div class="logo-section">
            <img src="{{ asset('/images/logotoudja.png') }}" alt="logo" class="logo h-44 w-56">
        </div>

        <!-- Subject Section -->
        <div class="subject-section">
            <h2 class="text-3xl font-bold tracking-wide">{{ $email->subject }}</h2>
        </div>

        <!-- Text Section -->
        <div class="text-section">
            <p class="text-lg leading-loose mt-4">{{ $email->body }}</p>
        </div>

        <!-- Company Information Section -->
        <div class="info-section mt-8 p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold mb-4">Informations sur l'entreprise :</h3>
            <ul class="list-disc list-inside text-gray-700">
                <li>Nom de l'entreprise : SARL SPC GB</li>
                <li>Équipe : Toudja</li>
                <!-- Add other company information here -->
            </ul>

            <h3 class="text-xl font-semibold mt-6 mb-4">Contactez-nous pour plus d'informations :</h3>
            @if ($email->template)
            <ul class="list-disc list-inside text-gray-700">
                <li>Mob : {{ $email->template->mobile }}</li>
                <li>Téléphone : {{ $email->template->telephone }}</li>
                <li>Site Web : <a href="http://www.toudja.dz" class="text-blue-500 hover:underline">{{ $email->template->web }}</a></li>
                <li>Email : <a href="mailto:info@toudja.dz" class="text-blue-500 hover:underline">{{ $email->template->email }}</a></li>
                <li>Adresse : {{ $email->template->adresse }}</li>
            </ul>
            @endif
        </div>

        <!-- Button Section -->
        <div class="button-section">
            <a href="http://www.toudja.dz" class="button mb-3">Visitez notre site</a>
        </div>

        <!-- Footer Section -->
        <div class="footer-section">
            <p>&copy; SARL SPC GB groupe Toudja. Tous droits réservés.</p>
        </div>


    </div>

</body>
</html>
