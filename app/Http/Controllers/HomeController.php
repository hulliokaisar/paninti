<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $response = Http::withOptions(['verify' => false])->get('https://www.themealdb.com/api/json/v1/1/categories.php');
            $data = $response->json();
            $categories = $data['categories'];
        } catch (\Exception $e) {
            // Handle the error if the request fails
            $error = $e->getMessage();
            return view('home', ['categories' => [], 'meals' => [], 'error' => $error]);
        }

        // Add default category "Beef"
        $categories[] = ['idCategory' => 'beef', 'strCategory' => 'Beef', 'strCategoryThumb' => ''];

        return view('home', ['categories' => $categories, 'meals' => [], 'error' => null]);
    }

    public function filter(Request $request)
    {
        $category = $request->input('category');

        if ($category) {
            try {
                $response = Http::withOptions(['verify' => false])->get('https://www.themealdb.com/api/json/v1/1/filter.php', ['c' => $category]);
                $data = $response->json();

                $meals = [];
                foreach ($data['meals'] as $meal) {
                    $meals[] = [
                        'id' => $meal['idMeal'],
                        'name' => $meal['strMeal'],
                        'image' => $meal['strMealThumb']
                    ];
                }

                return view('home', ['categories' => $this->getCategories(), 'meals' => $meals, 'error' => null]);
            } catch (\Exception $e) {
                // Handle the error if the request fails
                $error = $e->getMessage();
                return view('home', ['categories' => [], 'meals' => [], 'error' => $error]);
            }
        } else {
            return redirect('/meals');
        }
    }

    private function getCategories()
    {
        try {
            $response = Http::withOptions(['verify' => false])->get('https://www.themealdb.com/api/json/v1/1/categories.php');
            $data = $response->json();
            $categories = $data['categories'];
        } catch (\Exception $e) {
            // Handle the error if the request fails
            $categories = [];
        }

        return $categories;
    }
}
