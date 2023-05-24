<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GaleriController extends Controller
{
    public function show($id)
{
    try {
        $response = Http::withOptions(['verify' => false])->get('https://www.themealdb.com/api/json/v1/1/lookup.php', ['i' => $id]);
        $data = $response->json();
        $meal = $data['meals'][0];
        $name = $meal['strMeal'];
        $image = $meal['strMealThumb'];
        $description = $meal['strInstructions'];
        // Translate the description to Bahasa Indonesia if needed
        $description = $this->translateToIndonesian($description);
    } catch (\Exception $e) {
        // Handle the error if the request fails
        $name = '';
        $image = '';
        $description = '';
    }

    return view('galeri', ['name' => $name, 'image' => $image, 'description' => $description]);
}

private function translateToIndonesian($text)
{
    // You can use a translation service or translation library to translate the text to Bahasa Indonesia.
    // Here, we will simply replace some common English words with their Indonesian counterparts.
    $translations = [
        'Instructions' => 'Petunjuk',
        'Ingredients' => 'Bahan-bahan',
        // Add more translations as needed
    ];

    foreach ($translations as $englishWord => $indonesianWord) {
        $text = str_replace($englishWord, $indonesianWord, $text);
    }

    return $text;
}


}
