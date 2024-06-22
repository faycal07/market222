<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="{{ asset('css/landing.css') }}" rel="stylesheet" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
<link rel="stylesheet" href="{{ asset('css/responsive.css') }}">
<link rel="stylesheet" href="{{ asset('css/fontawesome-free-6.5.2-web/css/all.min.css') }}">
    <title>Toudja Drinks</title>
    @vite('resources/css/app.css')
<<<<<<< HEAD
    <link rel="icon" href="{{asset('images/logotoudja.png')}}" type="image/x-icon"/>
=======
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19

  </head>
  <body>
<style>
.fade-in {
  opacity: 0;
  transition: opacity 1.25s ease-in-out;
}

.fade-in.active {
  opacity: 1;
}

</style>
    <nav class="relative container mx-auto p-3">
      <div class="flex items-center justify-between ">
        <div class="pt-2">
          <a href="/"><img src="/images/logotoudja.png" alt="logo" class="h-16 w-32"></a>
        </div>
        <div class="hidden md:flex space-x-2 lg:space-x-7">

          <a href="#produits" class="smooth-scroll hover:bg-yellow-300 text-white hover:text-sky-900 hover:scale-110 transform transition duration-200 px-1 py-1 rounded-lg font-bold">Produits</a>
          <a href="#propos" class="smooth-scroll hover:bg-yellow-300 text-white hover:text-sky-900 hover:scale-110 transform transition duration-200 px-1 py-1 rounded-lg font-bold">À Propos</a>
          <a href="#" class="smooth-scroll hover:bg-yellow-300 text-white hover:text-sky-900 hover:scale-110 transform transition duration-200 px-1 py-1 rounded-lg font-bold">Contactez-Nous</a>
          <a href="#" class="smooth-scroll hover:bg-yellow-300 text-white hover:text-sky-900 hover:scale-110 transform transition duration-200 px-1 py-1 rounded-lg font-bold">Communauté</a>
        </div>
        <a href="{{ route('login') }}" class="hidden p-3 px-6 bg-sky-500 rounded-full baseline text-white hover:bg-yellow-400 md:block hover:scale-110 transform transition duration-200 font-bold">Connexion</a>
        <!-- Hamburger icon -->
        <button id="menu-btn" class="block hamburger md:hidden focus:outline-none">
          <span class="hamburger-top"></span>
          <span class="hamburger-middle"></span>
          <span class="hamburger-bottom"></span>
        </button>
      </div>

      <!-- Mobile Menu -->
      <div class="md:hidden">
        <div id="menu" class="absolute flex-col items-center hidden self-end py-8 mt-10 space-y-6 font-bold text-slate-50 bg-slate-900 sm:w-auto sm:self-center left-6 right-6 drop-shadow-md">

          <a href="#produits" class="smooth-scroll">Produits</a>
          <a href="#propos" class="smooth-scroll">À Propos</a>
          <a href="#" class="smooth-scroll">Contactez-Nous</a>
          <a href="#" class="smooth-scroll">Communauté</a>
        </div>
      </div>
    </nav>

    <!-- Hero Section -->
    <section id="hero">
      <div class="container flex flex-col-reverse items-center  md:px-6 mx-auto mt-10 space-y-0 md:space-y-0 md:flex-row">
        <!-- Left Side -->
        <div class="flex flex-col mb-32 space-y-12 md:w-1/2">

          <h1 class="max-w-md text-3xl font-sans text-center md:text-5xl md:text-left items-center space-x-0 font-bold italic text-sky-100 text-stroke fade-in" id="userName"></h1>

          <p class="max-w-sm text-center md:text-left font-bold text-xl font-sans gradient-text fade-in">
            Découvrez nos boissons rafraîchissantes et naturelles, conçues pour réunir les gens et célébrer les moments de vie. Chaque gorgée est une invitation à la convivialité et au partage.
        </p>


          <div class="flex justify-center md:justify-start fade-in">
            <a href="{{ route('login') }}" class=" p-3 px-6 bg-sky-500 rounded-full baseline text-white hover:bg-yellow-400 hover:scale-110 transform transition duration-200 font-bold">Connexion</a>
          </div>
        </div>
        <!-- Right Side -->
        <div class="md:w-1/2">
          <!-- Image Placeholder -->
           {{-- <img src="{{ asset('images/p1.jpg') }}" alt="img" class="px-14" />  --}}
        </div>
      </div>
    </section>
    <section id="propos" class="fade-in">
      <div class="container flex flex-col px-8 mx-auto my-10 space-y-12 md:space-y-0 md:flex-row">
        <div class="flex flex-col px-16 space-y-12 md:h-1/2 fade-in">
          <h2 class="max-w-md text-4xl font-bold text-center md:text-left text-sky-950 italic">Qu'est-ce qui nous rend uniques ?</h2>
          <p class="max-w-md text-center text-sky-800 font-bold italic md:text-left bg-yellow-100 rounded-lg p-4 transition transform hover:shadow-xl hover:scale-105 duration-200">Chez Toudja, nous puisons notre inspiration dans la nature, en utilisant des ingrédients naturels soigneusement sélectionnés pour offrir des boissons de qualité inégalée. Avec un engagement envers la qualité et la durabilité, nous apportons fraîcheur et innovation dans chaque bouteille. Notre passion pour la création de boissons uniques se reflète dans chaque gorgée, vous invitant à découvrir une expérience gustative authentique et rafraîchissante.</p>
        </div>

        <div class="flex flex-col space-y-8 md:w-1/2 fade-in">
          <div class="flex flex-col space-y-3 md:space-y-0 md:space-w-6 md:flex-row md:bg-slate-300 p-5 rounded-3xl transition transform hover:shadow-xl hover:scale-105 duration-200">
            <div class="rounded-full bg-yellow-500 md:bg-transparent">
              <div class="flex items-center space-x-2 mx-3">
                <div class="px-4 py-2 text-white rounded-full md:py-1 bg-yellow-500">01</div>
                <h3 class="text-base font-bold md:mb-4 md:hidden">Suivi des progrès de l'entreprise</h3>
              </div>
            </div>
            <div>
              <h3 class="hidden mb-4 text-lg ml-1 font-bold md:block">Suivi des progrès de l'entreprise</h3>
              <p class="text-slate-800 font-bold italic">Nous assurons un suivi rigoureux de chaque étape de production pour garantir des produits d'une qualité exceptionnelle.</p>
            </div>
          </div>
          <div class="flex flex-col space-y-3 md:space-y-0 md:space-w-6 md:flex-row md:bg-slate-300 p-5 rounded-3xl transition transform hover:shadow-xl hover:scale-105 duration-200">
            <div class="rounded-full bg-yellow-500 md:bg-transparent">
              <div class="flex items-center space-x-2 mx-3">
                <div class="px-4 py-2 text-white rounded-full md:py-1 bg-yellow-500">02</div>
                <h3 class="text-base font-bold md:mb-4 md:hidden">Innovations constantes</h3>
              </div>
            </div>
            <div>
              <h3 class="hidden mb-4 text-lg ml-1 font-bold md:block">Innovations constantes</h3>
              <p class="text-slate-800 font-bold italic">Nous innovons constamment pour introduire de nouvelles saveurs et produits qui répondent aux attentes de nos consommateurs.</p>
            </div>
          </div>
          <div class="flex flex-col space-y-3 md:space-y-0 md:space-w-6 md:flex-row md:bg-slate-300 p-5 rounded-3xl transition transform hover:shadow-xl hover:scale-105 duration-200">
            <div class="rounded-full bg-yellow-500 md:bg-transparent">
              <div class="flex items-center space-x-2 mx-3">
                <div class="px-4 py-2 text-white rounded-full md:py-1 bg-yellow-500">03</div>
                <h3 class="text-base font-bold md:mb-4 md:hidden">Engagement envers la durabilité</h3>
              </div>
            </div>
            <div>
              <h3 class="hidden mb-4 text-lg ml-1 font-bold md:block">Engagement envers la durabilité</h3>
              <p class="text-slate-800 font-bold italic">Notre production respecte des normes strictes de durabilité pour minimiser notre impact environnemental tout en offrant des produits de haute qualité.</p>
            </div>
          </div>
        </div>
      </div>
    </section>


  <!-- Testimonials Section -->
  <section id="produits">
    <div class="fade-in max-w-6xl px-5 mx-auto mt-32 mb-40 text-center ">
      <h2 class="text-4xl font-bold text-center text-slate-900 pb-8">Nos Produits Populaires</h2>
      <div class="flex flex-col mt-24 md:flex-row md:space-x-6">
        <div class="flex flex-col items-center p-6 mt-28 md:mt-10 space-y-6 rounded-2xl bg-sky-700 md:w-1/3 transition transform hover:shadow-xl hover:scale-105 duration-200">
          <img src="images/p1.jpg" alt="img" class="w-40 h-40 -mt-28 rounded-3xl" />
          <h5 class="text-lg font-bold text-slate-800">Boisson d'Orange</h5>
          <p class="text-sm text-blue-100 font-semibold">"Plongez dans la fraîcheur exquise de notre boisson fruitée à l'orange, pressée à partir des meilleures oranges locales. Chaque gorgée est une explosion de saveurs naturelles et authentiques, parfaite pour revitaliser vos sens."</p>
        </div>
        <div class="flex flex-col items-center p-6 mt-28 md:mt-10 space-y-6 rounded-2xl bg-sky-700 md:w-1/3 transition transform hover:shadow-xl hover:scale-105 duration-200">
          <img src="images/p2.jpg" alt="img" class="w-40 -mt-28 h-40 rounded-3xl" />
          <h5 class="text-lg font-bold text-slate-800">Perfecto</h5>
          <p class="text-sm text-blue-100 font-semibold">"Laissez-vous séduire par Perfecto, notre boisson gazeuse irrésistible. Avec son goût unique et ses bulles délicates, elle vous offre une expérience gustative exceptionnelle et fidèle à la tradition des saveurs authentiques."</p>
        </div>
        <div class="flex flex-col items-center p-6 mt-28 md:mt-10 space-y-6 rounded-2xl bg-sky-700 md:w-1/3 transition transform hover:shadow-xl hover:scale-105 duration-200">
          <img src="images/p3.jpg" alt="img" class="w-40 -mt-28 h-40 rounded-3xl" />
          <h5 class="text-lg font-bold text-slate-800">Eau Minérale</h5>
          <p class="text-sm text-blue-100 font-semibold">"Découvrez l'originalité et la pureté de notre eau minérale Toudja. Riche en minéraux naturels, elle offre une hydratation optimale et une saveur authentique, fidèle à notre engagement pour la qualité et la durabilité."</p>
        </div>
      </div>
    </div>
  </section>



   <!-- CTA Section -->
   <section id="cta" class="bg-red-600">
    <div class="container flex flex-col items-center justify-between px-6 py-24 mx-auto space-y-12 md:flex-row md:space-y-0">
      <h2 class="text-5xl font-bold leading-tight text-center text-white md:text-4xl md:max-w-xl md:text-left fade-in">Essayez nos boissons dès aujourd'hui</h2>
      <div>
<<<<<<< HEAD
        <a href="#produits" class="p-3 px-6 pt-2 text-red-600 bg-yellow-400 rounded-full baseline hover:bg-yellow-300 shadow-2xl fade-in">Découvrez nos produits</a>
=======
        <a href="#" class="p-3 px-6 pt-2 text-red-600 bg-yellow-400 rounded-full baseline hover:bg-yellow-300 shadow-2xl fade-in">Découvrez nos produits</a>
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
      </div>
    </div>
  </section>


    <!-- Footer Section -->
    <footer class="bg-slate-900 m-0">
      <div class="container flex flex-col-reverse justify-between px-6 py-10 mx-auto space-y-8 md:flex-row md:space-y-0">
        <div class="flex flex-col-reverse items-center justify-between space-y-12 md:flex-col md:space-y-0 md:items-start fade-in">
          <div class="mx-auto my-6 text-center text-white md:hidden">Toudja &copy; 2024</div>
          <div>
            <a href="/"><img src="/images/logotoudja.png" alt="logo" class="h-16 w-32" /></a>
          </div>
          <div class="hidden text-white md:block">Toudja &copy; 2024</div>
        </div>
        <div class="flex justify-around space-x-28">
          <div class="flex flex-col space-y-3 text-white fade-in">
            <a href="#propos" class="smooth-scroll hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">À Propos</a>
            <a href="#produits" class="smooth-scroll hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Produits</a>
            <a href="#" class="smooth-scroll hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Contactez-Nous</a>

          </div>
<<<<<<< HEAD
          {{-- <div class="flex flex-col space-y-3 text-white fade-in">
            <a href="#" class="hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Assistance</a>
            <a href="#" class="hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Communauté</a>
            <a href="#" class="hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Politique de confidentialité</a>
          </div> --}}
=======
          <div class="flex flex-col space-y-3 text-white fade-in">
            <a href="#" class="hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Assistance</a>
            <a href="#" class="hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Communauté</a>
            <a href="#" class="hover:text-yellow-400 transition-transform duration-300 transform hover:scale-105">Politique de confidentialité</a>
          </div>
>>>>>>> a8a1fd77e23340091c1dcb3ad0a16664bab63d19
        </div>
        <div class="flex justify-around space-x-10 p-16 fade-in">
          <a href="https://www.facebook.com/toudja.dz/?locale=fr_FR" class="text-white hover:text-yellow-400 transition-transform duration-300 transform hover:scale-150"><i class="fa-brands fa-facebook fa-xl"></i></a>
          <a href="https://www.instagram.com/toudjaboissons/" class="text-white hover:text-yellow-400 transition-transform duration-300 transform hover:scale-150"><i class="fa-brands fa-instagram fa-xl"></i></a>
          <a href="https://x.com/toudja_" class="text-white hover:text-yellow-400 transition-transform duration-300 transform hover:scale-150"><i class="fa-brands fa-x-twitter fa-xl"></i></a>
        </div>
      </div>
    </footer>


    <script>

        const userName = "Réunissez tout le monde";

    document.addEventListener('DOMContentLoaded', function () {
      const userNameContainer = document.getElementById('userName');
      userNameContainer.textContent = '';
      userName.split('').forEach((letter, index) => {
        const span = document.createElement('span');
        span.classList.add('letter');
        span.textContent = letter === ' ' ? '\u00A0' : letter; // Ajout d'espaces insécables pour conserver les espaces
        userNameContainer.appendChild(span);
        setTimeout(() => {
          span.classList.add('show');
        }, index * 200);
      });
    });




    const btn = document.getElementById('menu-btn');
const nav = document.getElementById('menu');
const heroSection = document.getElementById('hero');

btn.addEventListener('click', () => {
    btn.classList.toggle('open');
    nav.classList.toggle('flex');
    nav.classList.toggle('hidden');

    if (nav.classList.contains('hidden')) {
        // If menu is hidden, remove margin from hero section
        heroSection.style.marginTop = '50px';
    } else {
        // If menu is shown, add margin to hero section
        heroSection.style.marginTop = '350px';
    }
});


    </script>
      <script>

  // Smooth scrolling functionality
  document.querySelectorAll('a.smooth-scroll').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();

                const targetId = this.getAttribute('href').substring(1);
                const targetElement = document.getElementById(targetId);

                window.scrollTo({
                    top: targetElement.offsetTop,
                    behavior: 'smooth'
                });
            });
        });



        // // Fonction pour vérifier si un élément est visible dans la fenêtre
        // function isElementInViewport(el) {
        //   const rect = el.getBoundingClientRect();
        //   return (
        //     rect.top >= 0 &&
        //     rect.left >= 0 &&
        //     rect.bottom <= (window.innerHeight || document.documentElement.clientHeight) &&
        //     rect.right <= (window.innerWidth || document.documentElement.clientWidth)
        //   );
        // }

        // // Fonction pour gérer les animations au défilement
        // function handleScrollAnimations() {
        //   const elements = document.querySelectorAll('.fade-in');
        //   elements.forEach(element => {
        //     if (isElementInViewport(element)) {
        //       element.classList.add('active');
        //     }
        //   });
        // }

        // // Écouteur d'événement pour gérer les animations au défilement lors du chargement initial et du défilement
        // document.addEventListener('DOMContentLoaded', handleScrollAnimations);
        // window.addEventListener('scroll', handleScrollAnimations);
        // Function to check if an element is in the viewport
        document.addEventListener('DOMContentLoaded', () => {
  const elements = document.querySelectorAll('.fade-in');

  const observerOptions = {
    root: null, // Use the viewport as the container
    rootMargin: '0px', // No margin around the root
    threshold: 0.1 // Trigger when 10% of the element is visible
  };

  const observer = new IntersectionObserver((entries, observer) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('active');
        observer.unobserve(entry.target); // Stop observing once the element is visible
      }
    });
  }, observerOptions);

  elements.forEach(element => {
    observer.observe(element);
  });
});
      </script>
  </body>
</html>
