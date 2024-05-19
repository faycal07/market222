let menuicn = document.querySelector(".menuicn");
let nav = document.querySelector(".navcontainer");

menuicn.addEventListener("click", () => {
	nav.classList.toggle("navclose");
})
// JavaScript for Dropdown
document.addEventListener('DOMContentLoaded', function() {
    const dropdown = document.getElementById('dropdown');
    const dropdownContent = dropdown.querySelector('.dropdown-content');

    dropdown.querySelector('.dpicn').addEventListener('click', function() {
        dropdownContent.classList.toggle('show');
    });
});

// Get the button element
document.addEventListener("DOMContentLoaded", function() {
      const menuButton = document.getElementById("menu-button");
      const dropdownMenu = document.getElementById("dropdown-menu");

      // Toggle dropdown menu
      menuButton.addEventListener("click", function() {
        const expanded = this.getAttribute("aria-expanded") === "true" || false;
        this.setAttribute("aria-expanded", !expanded);
        dropdownMenu.classList.toggle("hidden");
      });

      // Close dropdown menu when clicking outside
      document.addEventListener("click", function(event) {
        if (!dropdownMenu.contains(event.target) && event.target !== menuButton) {
          dropdownMenu.classList.add("hidden");
          menuButton.setAttribute("aria-expanded", "false");
        }
      });
    });

	function scrollToForm() {
        document.getElementById('user-form').scrollIntoView({ behavior: 'smooth' });
		document.getElementById('user-form').classList.remove('hidden');

    }
	function scrollToStart() {
    document.getElementById('main').scrollIntoView({ behavior: 'smooth' });
	setTimeout(function() {
            document.getElementById('user-form').classList.add('hidden');
        }, 1000);
}

	document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('user-form').addEventListener('submit', function(event) {
        // Prevent the default form submission behavior


        // Set a timeout to add the 'hidden' class after 1 second
        setTimeout(function() {
            document.getElementById('user-form').classList.add('hidden');
        }, 1000);
    });

});






function scrollToFormm() {
    document.getElementById('template-form').scrollIntoView({ behavior: 'smooth' });
    document.getElementById('template-form').classList.remove('hidden');
}
function scrollToStartt() {
document.getElementById('main').scrollIntoView({ behavior: 'smooth' });
setTimeout(function() {
        document.getElementById('template-form').classList.add('hidden');
    }, 1000);
}

document.addEventListener('DOMContentLoaded', function() {
document.getElementById('template-form').addEventListener('submit', function(event) {
    // Prevent the default form submission behavior


    // Set a timeout to add the 'hidden' class after 1 second
    setTimeout(function() {
        document.getElementById('template-form').classList.add('hidden');
    }, 1000);
});

});


// document.addEventListener("DOMContentLoaded", function() {
//     var currentUrl = window.location.href;
//     console.log("Current URL:", currentUrl);

//     var navOptions = document.querySelectorAll('.nav-option');

//     navOptions.forEach(function(option, index) {
//         var link = option.querySelector('a');
//         var linkUrl = link ? link.getAttribute('href') : null;
//         console.log("Link URL:", linkUrl);

//         if (linkUrl && linkUrl === currentUrl) {
//             option.classList.add('option1');
//             console.log("Adding option1 class to:", option);
//         } else {
//             option.classList.remove('option1');
//             console.log("Removing option1 class from:", option);
//         }
//     });

//     if (currentUrl.includes("modifieruser")) {
//         document.querySelector('.nav-option:nth-child(2)').classList.add('option1');
//         console.log("Adding option1 class to user modifier option");
//     } else if (currentUrl.includes("modifieropportunite")) {
//         document.querySelector('.nav-option:nth-child(3)').classList.add('option1');
//         console.log("Adding option1 class to opportunite modifier option");
//     } else if (currentUrl.includes("modifierlead")) {
//         document.querySelector('.nav-option:nth-child(4)').classList.add('option1');
//         console.log("Adding option1 class to lead modifier option");
//     }

// });
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









/////////////
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

////////////////////////////////////////////////////////////////


    function setupSearch(inputId, tableBodyId, rowClass) {
        document.getElementById(inputId).addEventListener('input', function() {
            searchItems(inputId, tableBodyId, rowClass);
        });
    }

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

    // Setup search for each input
    setupSearch('userSearchInput', 'userTableBody', 'user-item');
    setupSearch('archivedUserSearchInput', 'archivedUserTableBody', 'archived-user-item');
    setupSearch('productSearchInput', 'productTableBody', 'product-item');
    setupSearch('opportunitySearchInput', 'opportunityTableBody', 'opportunity-item');
    setupSearch('leadSearchInput', 'leadTableBody', 'lead-item');
    setupSearch('workflowSearchInput', 'workflowTableBody', 'workflow-item');
    setupSearch('compagneSearchInput', 'compagneTableBody', 'compagne-item');





