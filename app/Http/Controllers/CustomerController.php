<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CustomerController extends Controller
{
    public function customer_show()
    {
        $product_type = Product::get();
        return view('customer', compact('product_type'));
    }

    public function customer_vote()
    {
        return view('customer-vote');
    }

    public function customer_popularity()
    {
        return view('customer_popularity');
    }
}
