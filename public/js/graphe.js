
//////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////

        // Créer le graphique des utilisateurs
        var ctxUser = document.getElementById('userChart').getContext('2d');
        var userChart = new Chart(ctxUser, {
            type: 'line',
            data: {
                labels: userChartLabels,
                datasets: [{
                    label: 'Utilisateurs',
                    data: userChartData,
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            }
        });
////////////////////////////////////////////////////////////////////////////////////
        // Créer le graphique des leads
        var ctxLead = document.getElementById('leadChart').getContext('2d');
        var leadChart = new Chart(ctxLead, {
            type: 'line',
            data: {
                labels: leadChartLabels,
                datasets: [{
                    label: 'Leads',
                    data: leadChartData,
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            }
        });


/////////////////////////////////////////////////////////////////////
// Créer le graphique des campagnes
var ctxCompagnes = document.getElementById('compagnesChart').getContext('2d');
var compagnesChart = new Chart(ctxCompagnes, {
    type: 'line',
    data: {
        labels: compagnesChartLabels,
        datasets: [{
            label: 'Campagnes',
            data: compagnesChartData,
            borderColor: 'rgba(255, 206, 86, 1)', // Couleur jaune
            borderWidth: 1
        }]
    }
});

 ////////////////////////////////////////////////////////////////////////////////

// Créer le graphique des produits
var ctxProducts = document.getElementById('productsChart').getContext('2d');
var productsChart = new Chart(ctxProducts, {
    type: 'line',
    data: {
        labels: productsChartLabels,
        datasets: [{
            label: 'Produits',
            data: productsChartData,
            borderColor: 'rgba(75, 192, 192, 1)', // Couleur turquoise
            borderWidth: 1
        }]
    }
});

 //////////////////////////////////////////////////////////////////////////////////

// Créer le diagramme en barres des rôles d'utilisateurs
var ctxUserRole = document.getElementById('userRoleChart').getContext('2d');
var userRoleChart = new Chart(ctxUserRole, {
    type: 'bar',
    data: {
        labels: userRoleChartLabels,
        datasets: [{
            label: 'Nombre d\'utilisateurs par rôle',
            data: userRoleChartData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)', // Couleur rouge avec une opacité réduite
                'rgba(54, 162, 235, 0.5)' // Couleur bleue avec une opacité réduite
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)', // Couleur rouge
                'rgba(54, 162, 235, 1)' // Couleur bleue
            ],
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true // Commencer l'axe y à zéro
            }
        }
    }
});


 ///////////////////////////////////////////////////////////////////////////////////////////

// Créer le diagramme en barres des stages
var ctxStages = document.getElementById('stagesChart').getContext('2d');
var stagesChart = new Chart(ctxStages, {
    type: 'bar',
    data: {
        labels: stagesChartLabels,
        datasets: [{
            label: 'Nombre de leads par stage',
            data: stagesChartData,
            backgroundColor: stagesChartBackgroundColor, // Utiliser les couleurs spécifiées
            borderWidth: 1
        }]
    },
    options: {
        scales: {
            y: {
                beginAtZero: true // Commencer l'axe y à zéro
            }
        }
    }
});

//////////////////////////////////////////////////////////////////////////////////
// Créer le diagramme en camembert des leads par produit
var ctxProductLeads = document.getElementById('productLeadsChart').getContext('2d');
var productLeadsChart = new Chart(ctxProductLeads, {
    type: 'doughnut', // Utiliser un diagramme en camembert
    data: {
        labels: productLeadsLabels,
        datasets: [{
            label: 'Pourcentage de leads par produit',
            data: productLeadsData,
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',  // Rouge transparent
                'rgba(54, 162, 235, 0.5)',   // Bleu transparent
                'rgba(255, 206, 86, 0.5)',   // Jaune transparent
                'rgba(75, 192, 192, 0.5)',   // Vert transparent
                'rgba(153, 102, 255, 0.5)',  // Violet transparent
                'rgba(255, 159, 64, 0.5)',   // Orange transparent
                'rgba(255, 0, 0, 0.5)',      // Rouge transparent
                'rgba(0, 255, 0, 0.5)',      // Vert transparent
                'rgba(0, 0, 255, 0.5)',      // Bleu transparent
                'rgba(255, 255, 0, 0.5)',    // Jaune transparent
                'rgba(255, 0, 255, 0.5)',    // Magenta transparent
                'rgba(0, 255, 255, 0.5)'     // Cyan transparent
            ],
            borderWidth: 1
        }]
    },
    options: {
        responsive: true, // Activer la réactivité
        maintainAspectRatio: false, // Ne pas conserver le ratio d'aspect
        // Ajoutez ici des options supplémentaires si nécessaire
    }
});


 // Créer le graphique en barres avec Chart.js
 var ctxEmailChart = document.getElementById('emailsChart').getContext('2d');
 var emailsChart = new Chart(ctxEmailChart, {
     type: 'bar',
     data: {
         labels: emailChartData.labels, // Labels des mois
         datasets: [{
             label: 'Nombre d\'emails par mois',
             data: emailChartData.data, // Données des emails par mois
             backgroundColor: 'rgba(54, 162, 235, 0.5)', // Couleur bleue avec une opacité réduite
             borderColor: 'rgba(54, 162, 235, 1)', // Couleur bleue
             borderWidth: 1
         }]
     },
     options: {
         scales: {
             y: {
                 beginAtZero: true // Commencer l'axe y à zéro
             }
         }
     }
 });
