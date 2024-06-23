// Sélectionne les éléments du DOM
let menuIcon = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");
let main = document.querySelector(".main");

// Ajoute un écouteur d'événement pour le clic sur l'icône du menu
menuIcon.addEventListener("click", () => {
  // Alterne la classe 'navclose' pour afficher ou masquer le menu de navigation
  nav.classList.toggle("navclose");

  // Ajuste la marge supérieure du contenu principal pour les écrans de petite taille
  if (window.innerWidth <= 1023) {
    if (nav.classList.contains("navclose")) {
      main.style.marginTop = "700px";
    } else {
      main.style.marginTop = "0px";
    }
  }
});

// JavaScript pour le menu déroulant
document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.getElementById('dropdown');
    const dropdownContent = dropdown.querySelector('.dropdown-content');

    // Ajoute un écouteur d'événement pour le clic sur l'icône du menu déroulant
    dropdown.querySelector('.dpicn').addEventListener('click', function() {
        dropdownContent.classList.toggle('show');
    });
});

// Obtenir l'élément bouton de menu
document.addEventListener("DOMContentLoaded", function() {
    const menuButton = document.getElementById("menu-button");
    const dropdownMenu = document.getElementById("dropdown-menu");

    // Alterner le menu déroulant
    menuButton.addEventListener("click", function() {
        const expanded = this.getAttribute("aria-expanded") === "true" || false;
        this.setAttribute("aria-expanded", !expanded);
        dropdownMenu.classList.toggle("hidden");
    });

    // Fermer le menu déroulant en cliquant à l'extérieur
    document.addEventListener("click", function(event) {
        if (!dropdownMenu.contains(event.target) && event.target !== menuButton) {
            dropdownMenu.classList.add("hidden");
            menuButton.setAttribute("aria-expanded", "false");
        }
    });
});

// Fonction pour faire défiler jusqu'au formulaire d'utilisateur
function scrollToForm() {
    const formElement = document.getElementById('user-form');
    formElement.scrollIntoView({ behavior: 'smooth' });
    formElement.classList.remove('hidden');
}



// Fonction pour revenir au début et masquer le formulaire d'utilisateur
function scrollToStart() {
    document.getElementById('main').scrollIntoView({ behavior: 'smooth' });
    setTimeout(function() {
        document.getElementById('user-form').classList.add('hidden');
    }, 1000);
}

// Ajoute un écouteur d'événement pour la soumission du formulaire d'utilisateur
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('user-form').addEventListener('submit', function(event) {
        // Empêche le comportement par défaut de soumission du formulaire

        // Ajoute la classe 'hidden' après 1 seconde
        setTimeout(function() {
            document.getElementById('user-form').classList.add('hidden');
        }, 1000);
    });
});

// Fonction pour faire défiler jusqu'au formulaire de template
function scrollToFormm() {
    document.getElementById('template-form').scrollIntoView({ behavior: 'smooth' });
    document.getElementById('template-form').classList.remove('hidden');
}

// Fonction pour revenir au début et masquer le formulaire de template
function scrollToStartt() {
    document.getElementById('main').scrollIntoView({ behavior: 'smooth' });
    setTimeout(function() {
        document.getElementById('template-form').classList.add('hidden');
    }, 1000);
}

// Ajoute un écouteur d'événement pour la soumission du formulaire de template
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('template-form').addEventListener('submit', function(event) {
        // Empêche le comportement par défaut de soumission du formulaire

        // Ajoute la classe 'hidden' après 1 seconde
        setTimeout(function() {
            document.getElementById('template-form').classList.add('hidden');
        }, 1000);
    });
});

// Ajoute des classes aux options de navigation en fonction de l'URL actuelle
document.addEventListener("DOMContentLoaded", function() {
    var currentUrl = window.location.href;
    var navOptions = document.querySelectorAll('.nav-option');

    navOptions.forEach(function(option) {
        var link = option.querySelector('a');
        var route = link ? link.getAttribute('href') : null;
        if (route && currentUrl.includes(route)) {
            option.classList.add('option1');
        } else {
            option.classList.remove('option1');
        }
    });
});

// Fonction pour afficher les champs conditionnels en fonction de l'option sélectionnée
function showConditionalFields() {
    var selectedOption = document.getElementById("lead_options").value;
    var sourceIdField = document.getElementById("source-id-condition");
    var productField = document.getElementById("product-condition");
    var leadTypeField = document.getElementById("lead-type-id-condition");

    // Masquer tous les champs conditionnels au début
    sourceIdField.style.display = "none";
    productField.style.display = "none";
    leadTypeField.style.display = "none";

    // Afficher le champ correspondant à l'option sélectionnée
    if (selectedOption === "lead_sources") {
        sourceIdField.style.display = "block";
    } else if (selectedOption === "products") {
        productField.style.display = "block";
    } else if (selectedOption === "lead_types") {
        leadTypeField.style.display = "block";
    }
}

// Fonction pour configurer la recherche pour un tableau spécifique
function setupSearch(inputId, tableBodyId, rowClass) {
    document.getElementById(inputId).addEventListener('input', function() {
        searchItems(inputId, tableBodyId, rowClass);
    });
}

// Fonction pour rechercher des éléments dans un tableau
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

// Configurer la recherche pour chaque entrée
setupSearch('userSearchInput', 'userTableBody', 'user-item');
setupSearch('archivedUserSearchInput', 'archivedUserTableBody', 'archived-user-item');
setupSearch('productSearchInput', 'productTableBody', 'product-item');
setupSearch('opportunitySearchInput', 'opportunityTableBody', 'opportunity-item');
setupSearch('leadSearchInput', 'leadTableBody', 'lead-item');
setupSearch('workflowSearchInput', 'workflowTableBody', 'workflow-item');
setupSearch('compagneSearchInput', 'compagneTableBody', 'compagne-item');

// Ajoute un comportement de défilement fluide aux liens d'ancrage
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function(e) {
        e.preventDefault();
        document.querySelector(this.getAttribute('href')).scrollIntoView({
            behavior: 'smooth'
        });
    });
});

// Ajoute un écouteur d'événement pour le clic sur le bouton de navigation
const navToggle = document.getElementById('nav-toggle');
const navContent = document.getElementById('nav-contenttt');

navToggle.addEventListener('click', () => {
    navContent.classList.toggle('hidden');
});

// Masquer les graphiques et les sections utilisateur en fonction du rôle de l'utilisateur
document.addEventListener('DOMContentLoaded', function () {
    const userRole = document.getElementById('nav-contenttt').getAttribute('data-user-role');

    // Masquer les graphiques en fonction du rôle
    const chartItems = document.querySelectorAll('.chart-item');
    chartItems.forEach(item => {
        const chartId = item.getAttribute('data-chart-id');
        if (userRole === 'marketing' && (chartId === 'userChart' || chartId === 'userRoleChart')) {
            item.style.display = 'none';
        }
    });

    // Masquer les sections utilisateur en fonction du rôle
    const userSections = document.querySelectorAll('.report-container');
    userSections.forEach(section => {
        if (userRole === 'marketing' && section.id === 'userSection') {
            section.style.display = 'none';
        }
        if (userRole === 'marketing' && section.id === 'userSectionarchiver') {
            section.style.display = 'none';
        }
    });

    // Masquer les liens en fonction du rôle
    const navLinks = document.querySelectorAll('#nav-contenttt a');
    navLinks.forEach(link => {
        const href = link.getAttribute('href');
        if (userRole === 'marketing' && (href === '#userSection' || href === '#userSectionarchiver')) {
            link.style.display = 'none';
        }
    });
});
