<?php

namespace App\Http\Controllers;

use App\Models\Lead;
use App\Models\User;
use App\Models\Email;
use App\Models\Stage;
use App\Models\Product;
use App\Models\Compagne;
use Illuminate\Http\Request;

class ChartController extends Controller
{
    public function dashboard()
    {
        $userChart = $this->userChart();
        $leadChart = $this->leadChart();
        $compagnesChart = $this->compagnesChart();
        $productsChart= $this->productsChart();
        $userRoleChart= $this->userRoleChart();
        $stagesChart= $this->stagesChart();
        $productLeads= $this->productLeads();
        $emailsChart= $this->emailsChart();

        return view('menu', compact('userChart', 'leadChart','compagnesChart','productsChart','userRoleChart','stagesChart','productLeads','emailsChart'));
    }

    private function userChart()
    {
        $users = User::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;

            foreach ($users as $user) {
                if ($user->month == $i) {
                    $count = $user->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($data, $count);
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }

    private function leadChart()
    {
        $leads = Lead::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
            ->whereYear('created_at', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;

            foreach ($leads as $lead) {
                if ($lead->month == $i) {
                    $count = $lead->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($data, $count);
        }

        return [
            'labels' => $labels,
            'data' => $data,
        ];
    }


    public function compagnesChart()
    {
        $compagnes = Compagne::selectRaw('MONTH(date_limite) as month, COUNT(*) as count')
            ->whereYear('date_limite', date('Y'))
            ->groupBy('month')
            ->orderBy('month')
            ->get();

        $labels = [];
        $data = [];

        for ($i = 1; $i <= 12; $i++) {
            $month = date('F', mktime(0, 0, 0, $i, 1));
            $count = 0;

            foreach ($compagnes as $compagne) {
                if ($compagne->month == $i) {
                    $count = $compagne->count;
                    break;
                }
            }

            array_push($labels, $month);
            array_push($data, $count);
        }

        return [
            'labels' => $labels,
            'data' => $data, // Utiliser 'data' au lieu de 'datasets' pour correspondre à la structure utilisée dans le JavaScript
        ];
    }

    public function productsChart()
{
    $products = Product::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $labels = [];
    $data = [];

    for ($i = 1; $i <= 12; $i++) {
        $month = date('F', mktime(0, 0, 0, $i, 1));
        $count = 0;

        foreach ($products as $product) {
            if ($product->month == $i) {
                $count = $product->count;
                break;
            }
        }

        array_push($labels, $month);
        array_push($data, $count);
    }

    return [
        'labels' => $labels,
        'data' => $data,
    ];
}



public function userRoleChart()
{
    $adminCount = User::where('role', 'admin')->count();
    $marketingCount = User::where('role', 'marketing')->count();

    return [
        'labels' => ['admin', 'marketing'],
        'data' => [$adminCount, $marketingCount],
    ];
}
public function stagesChart()
{
    // Récupérer tous les stages
    $stages = Stage::all();

    // Initialiser les tableaux pour les labels et les datasets
    $labels = [];
    $data = [];
    $backgroundColor = [];

    // Parcourir les stages
    foreach ($stages as $stage) {
        // Compter le nombre de leads pour ce stage
        $leadCount = Lead::where('stage_id', $stage->id)->count();

        // Ajouter le nom du stage au label
        $labels[] = $stage->nom;

        // Définir la couleur en fonction du code du stage
        if ($stage->code === 'won') {
            $backgroundColor[] = 'rgba(0, 255, 0, 0.5)'; // Vert pour le stage "won"
        } elseif ($stage->code === 'lost') {
            $backgroundColor[] = 'rgba(255, 0, 0, 0.5)'; // Rouge pour le stage "lost"
        } else {
            // Générer une couleur aléatoire pour les autres stages
            $backgroundColor[] = $this->generateRandomColor();
        }

        // Ajouter le nombre de leads au tableau de données
        $data[] = $leadCount;
    }

    return [
        'labels' => $labels,
        'data' => $data,
        'backgroundColor' => $backgroundColor,
    ];
}


// Méthode pour générer des couleurs aléatoires
private function generateRandomColors($count)
{
    $colors = [];
    for ($i = 0; $i < $count; $i++) {
        $colors[] = 'rgba(' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ', ' . mt_rand(0, 255) . ', 0.5)';
    }
    return $colors;
}




private function generateRandomColor()
{
    // Générer des valeurs aléatoires pour les composants de couleur RGB
    $red = mt_rand(0, 255);
    $green = mt_rand(0, 255);
    $blue = mt_rand(0, 255);

    // Construire la couleur au format RGBA
    $color = "rgba($red, $green, $blue, 0.5)";

    return $color;
}


public function productLeads()
{
    // Récupérer tous les produits
    $products = Product::all();

    // Initialiser les tableaux pour les labels (noms de produits) et les données (pourcentages)
    $labels = [];
    $data = [];

    // Calculer le nombre total de leads
    $totalLeads = Lead::count();

    // Parcourir tous les produits
    foreach ($products as $product) {
        // Compter le nombre de leads associés à ce produit
        $leadCount = $product->leads()->count();

        // Calculer le pourcentage de ce produit par rapport au total
        $percentage = ($totalLeads > 0) ? ($leadCount / $totalLeads) * 100 : 0;

        // Ajouter le nom du produit au label et le pourcentage aux données
        $labels[] = $product->nom;
        $data[] = $percentage;
    }

    return [
        'labels' => $labels,
        'data' => $data,
    ];
}


public function emailsChart()
{
    $emails = Email::selectRaw('MONTH(created_at) as month, COUNT(*) as count')
        ->whereYear('created_at', date('Y'))
        ->groupBy('month')
        ->orderBy('month')
        ->get();

    $labels = [];
    $data = [];

    for ($i = 1; $i <= 12; $i++) {
        $month = date('F', mktime(0, 0, 0, $i, 1));
        $count = 0;

        foreach ($emails as $email) {
            if ($email->month == $i) {
                $count = $email->count;
                break;
            }
        }

        array_push($labels, $month);
        array_push($data, $count);
    }

    return [
        'labels' => $labels,
        'data' => $data,
    ];
}



}


