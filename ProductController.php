<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a list of products based on a selected theme.
     * Theme may be passed via query string: /products?theme=Books
     * Defaults to Gadgets.
     */
    public function index(Request $request)
    {
        // allowed themes (case-insensitive)
        $themes = ['gadgets','books','movies','anime','restaurants'];

        // get theme from query or default
        $theme = strtolower($request->query('theme', 'gadgets'));

        if (!in_array($theme, $themes)) {
            $theme = 'gadgets';
        }

        // product arrays for each theme
        $productsByTheme = [
            'gadgets' => [
                ['name' => 'Smartphone X200', 'price' => '₱25,000','description'=>'6.5" display, 128GB'],
                ['name' => 'Wireless Earbuds Pro', 'price' => '₱5,500','description'=>'Noise cancelling'],
                ['name' => 'Smartwatch Series 5', 'price' => '₱8,200','description'=>'Heart rate monitoring'],
            ],
            'books' => [
                ['name' => 'The Silent Sea', 'author'=>'A. Santos','price' => '₱450','description'=>'Mystery novel'],
                ['name' => 'Learning PHP', 'author'=>'J. Reyes','price' => '₱650','description'=>'Programming guide'],
                ['name' => 'Tales of the North', 'author'=>'M. Cruz','price' => '₱320','description'=>'Short stories'],
            ],
            'movies' => [
                ['name' => 'Midnight Run', 'year'=>2019,'genre'=>'Drama'],
                ['name' => 'Skyline Chase', 'year'=>2021,'genre'=>'Action'],
                ['name' => 'Ocean Whispers', 'year'=>2018,'genre'=>'Documentary'],
            ],
            'anime' => [
                ['name' => 'Star Blade', 'season'=>'S2','episodes'=>24],
                ['name' => 'Moonlight Academy', 'season'=>'S1','episodes'=>12],
                ['name' => 'Neo Samurai', 'season'=>'S3','episodes'=>26],
            ],
            'restaurants' => [
                ['name' => 'Kory\'s Kitchen', 'cuisine'=>'Filipino','price_range'=>'₱150-₱400'],
                ['name' => 'Sushi Harbor', 'cuisine'=>'Japanese','price_range'=>'₱300-₱700'],
                ['name' => 'La Trattoria', 'cuisine'=>'Italian','price_range'=>'₱250-₱600'],
            ],
        ];

        $products = $productsByTheme[$theme] ?? [];

        // pass theme name capitalized for display
        return view('products.index', [
            'theme' => ucfirst($theme),
            'products' => $products,
        ]);
    }
}
