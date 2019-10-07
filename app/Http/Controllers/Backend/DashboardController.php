<?php

namespace App\Http\Controllers\Backend;

use App\Article;
use App\Categorie;
use App\Http\Controllers\Controller;
use App\Tag;
use ConsoleTVs\Charts\Classes\Chartjs\Chart as ChartJs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index() {

        $testChart = $this->testChart();

        $articleCreationChart = $this->updatedArticles();

        $articleCategorieChart = $this->articlePerCategorie();

        $tagsPerItemChart = $this->tagsPerItem();

        return view('backend.dashboard', compact('testChart', 'articleCreationChart', 'articleCategorieChart', 'tagsPerItemChart'));
    }

    public function testChart() {

        $testChart = new ChartJs();
        $testChart->labels(['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange']);
        $testChart->dataset('testSet', 'bar', [15, 4, 10, 8 , 2, 5])->options([
            'backgroundColor' => [
                'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            'borderColor' => [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
        ]);

        return $testChart;
    }

    public function updatedArticles() {

        $today_articles = Article::whereDate('updated_at', today())->count();
        $yesterday_articles = Article::whereDate('updated_at', today()->subDays(1))->count();
        $articles_2_days_ago = Article::whereDate('updated_at', today()->subDays(2))->count();

        $articleCreationChart = new ChartJs();
        $articleCreationChart->labels(['2 days ago', 'yesterday', 'today']);
        $articleCreationChart->dataset('articles updatet at', 'line', [$articles_2_days_ago, $yesterday_articles, $today_articles]);

        return $articleCreationChart;
    }

    public function articlePerCategorie() {

        $labels = Categorie::select('name')->orderBy('id')->pluck('name');

        $colors =[];
        foreach($labels as $item) {
            $colors[] = '#' . str_pad(dechex(rand(0x000000, 0xFFFFFF)), 6, 0, STR_PAD_LEFT);
        }

        $articleCount = Categorie::withCount('articles')->get();
        $dataArticle = [];
        foreach ($articleCount as $item) {
            $dataArticle[] = $item->articles_count;
        }

        $chart = new ChartJs();
        $chart->labels($labels);
        $chart->dataset('Article per Categorie', 'bar', $dataArticle)->backgroundColor($colors);

        return $chart;
    }

    public function tagsPerItem() {

        $labels = Tag::select('name')->orderBy('id')->pluck('name');

        $articleCount = Tag::withCount('articles')->get();
        $dataArticle = [];
        foreach ($articleCount as $item) {
            $dataArticle[] = $item->articles_count;
        }
        $categorieCount = Tag::withCount('categories')->get();
        $dataCategorie = [];
        foreach ($categorieCount as $item) {
            $dataCategorie[] = $item->categories_count;
        }

        $manufacturerCount = Tag::withCount('manufacturers')->get();
        $dataManufacturer = [];
        foreach ($manufacturerCount as $item) {
            $dataManufacturer[] = $item->manufacturers_count;
        }

        $chart = new ChartJs();
        $chart->labels($labels);
        $chart->dataset('Article Tags', 'bar', $dataArticle)->backgroundColor('#FF0000');
        $chart->dataset('Categorie Tags', 'bar', $dataCategorie)->backgroundColor('#00FF00');
        $chart->dataset('Manufacturer Tags', 'bar', $dataManufacturer)->backgroundColor('#0000FF');

        return $chart;
    }

}
