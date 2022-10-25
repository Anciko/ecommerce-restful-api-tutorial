<?php

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Resources\ProductResource;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route::get('/products', function () {
//     $products = Product::all();

//     $data = new ProductResource(Product::find(1)); // single data
//     $product_resource = ProductResource::collection($products); // multi data
//     return response()->json([
//         'products' => $product_resource
//     ]);
// });


Route::apiResource('/products', ProductController::class);
Route::group(['prefix' => 'products'], function () {
    Route::apiResource('/{product}/reviews', ReviewController::class);
});