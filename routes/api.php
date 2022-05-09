<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Api\LoginController;
use App\Models\Product;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Route;

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

Route::get('/home', function (Request $request) {
    return response()->json([
        'text' => 'Thien am ben bo vu tru'
    ], 200);
});















Route::get('/product', function (Request $request) {
    $output_result = array();
    $products = Product::latest()->paginate(10);

    foreach($products as $product)
    {
        array_push($output_result, array(
            "title" => $product->title,
            "sell_value" => $product->sell_value
        ));
    }

    return response()->json($output_result, 200);
});

Route::post('login', [LoginController::class, 'login']);

Route::get('newsapi', function() {
    $output_result = array();
    $xml = simplexml_load_file("https://vnexpress.net/rss/tin-noi-bat.rss") or die("feed not loading");
    foreach($xml->channel->item as $article) {
        $CDATA = $article->description;
        preg_match('/(?<=<\/br>).*/', $CDATA, $description);
        preg_match('/<img [^>]*src="([^"]+)"/', $CDATA, $img_url);
        array_push($output_result, array(
            "title" => reset($article->title),
            "thumbnail" => $img_url[1] ?? "",
            "link" => reset($article->link),
            "pub_day" => reset($article->pubDate),
            "description" => $description[0] ?? "",
        ));
    }
    return response()->json($output_result, Response::HTTP_OK);
});

Route::prefix('/address')->name('address.')->group(function () {
    Route::get("/provinces", [AddressController::class, "provinces"])->name('provinces');
    Route::get("/districts/{id}", [AddressController::class, "districts"])->name('districts');
    Route::get("/wards/{id}", [AddressController::class, "wards"])->name('wards');
    Route::get("/user-address/{id}",[AddressController::class, "getUserAddress"]);
    Route::put('/update/{id}', [AddressController::class, "saveAddress"])->name('update');
});