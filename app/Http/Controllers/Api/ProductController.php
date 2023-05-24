<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SearchProductRequest;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class ProductController extends Controller
{
    public function index(SearchProductRequest $request): JsonResponse
    {
        $products = Product::when($request->filled('search'), function ($query) use ($request) {
            $query->where('description', 'like', '%'.$request->string('search').'%');
        })->paginate();

        return response()->json($products);
    }
}
