<?php

namespace App\Http\Controllers;

use App\Http\Traits\TraitMercadoPago;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    use TraitMercadoPago;

    public function index()
    {
        $products = Product::all();

        return view('home', [
            'products' => $products
        ]);
    }

    public function detail($id)
    {
       $product = Product::find($id);
       $preference = $this->makePreference($product);

       return view('detail', [
           'preference' => $preference,
           'product' => $product
       ]);
    }
}
