<?php

    namespace App\Http\Controllers;

    use App\Product;
    use Illuminate\Http\Request;

    class ProductController extends Controller
    {
        public function index()
        {
            return response()->json(Product::all(),200);
        }

        public function show($id)
        {
            $data['product'] = Product::with('category')->find($id);
            return response()->json($data,200);
        }
    }
