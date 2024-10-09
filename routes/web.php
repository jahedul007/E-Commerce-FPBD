<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


Route::get('/', [HomeController::class,'index'])->name('home');
Route::get('redirect', [HomeController::class,'redirect'])->middleware('auth','verified');
Route::get('/product_details/{id}', [HomeController::class,'product_details'])->name('home.product_details');
Route::post('/add_cart/{id}', [HomeController::class,'add_cart'])->name('home.add_cart');
Route::get('/show_cart', [HomeController::class,'show_cart'])->name('home.show_cart');
Route::delete('/remove_cart/{id}', [HomeController::class,'remove_cart'])->name('home.remove_cart');
Route::post('/cash_order', [HomeController::class,'cash_order'])->name('home.cash_order');

Route::get('/show_order', [HomeController::class,'show_order'])->name('home.show_order');
Route::get('/cancel_order/{id}', [HomeController::class,'cancel_order'])->name('home.cancel_order');

// Comment
Route::post('/add_comment', [HomeController::class,'add_comment'])->name('home.addComment');
Route::post('/reply', [HomeController::class,'reply'])->name('home.reply');


// Search
Route::get('/product_search', [HomeController::class,'product_search'])->name('home.productSearch');
Route::get('/search_product', [HomeController::class,'search_product'])->name('home.searchProduct');

// all product
Route::get('/all_product', [HomeController::class,'all_product'])->name('home.allProduct');
// Route::get('/couple_product', [HomeController::class,'couple_product'])->name('home.coupleProduct');



Route::get('/getProductByCategory/{category}', [HomeController::class,'getProductByCategory'])->name('home.getProductByCategory');


// Category Product

Route::get('/menBracelet', [HomeController::class, 'menBracelet'])->name('home.menBracelet');
Route::get('/menRing', [HomeController::class, 'menRing'])->name('home.menRing');
Route::get('/menLocket', [HomeController::class, 'menLocket'])->name('home.menLocket');
Route::get('/menWatch', [HomeController::class, 'menWatch'])->name('home.menWatch');


Route::get('/girlRing', [HomeController::class, 'girlRing'])->name('home.girlRing');
Route::get('/girlLocket', [HomeController::class, 'girlLocket'])->name('home.girlLocket');
Route::get('/girlFullSet', [HomeController::class, 'girlFullSet'])->name('home.girlFullSet');
Route::get('/girlWatch', [HomeController::class, 'girlWatch'])->name('home.girlWatch');
Route::get('/girlAnklet', [HomeController::class, 'girlAnklet'])->name('home.girlAnklet');
Route::get('/girlEarring', [HomeController::class, 'girlEarring'])->name('home.girlEarring');


Route::get('/coupleRing', [HomeController::class, 'coupleRing'])->name('home.coupleRing');
Route::get('/coupleLocket', [HomeController::class, 'coupleLocket'])->name('home.coupleLocket');
Route::get('/coupleBracelet', [HomeController::class, 'coupleBracelet'])->name('home.coupleBracelet');



Route::get('/mensProduct', [HomeController::class, 'mensProduct'])->name('home.mensProduct');
Route::get('/girlsProduct', [HomeController::class, 'girlsProduct'])->name('home.girlsProduct');
Route::get('/coupleProduct', [HomeController::class, 'coupleProduct'])->name('home.coupleProduct');


// Slider part

Route::get('/slider', [HomeController::class, 'slider'])->name('home.slider');
Route::get('/reviewSlider', [HomeController::class, 'reviewSlider'])->name('home.reviewSlider');


Route::get('/furniture', [HomeController::class,'furniture'])->name('home.furniture');
Route::get('/furnitureTable', [HomeController::class,'furnitureTable'])->name('home.furnitureTable');
Route::get('/furnitureBed', [HomeController::class,'furnitureBed'])->name('home.furnitureBed');
Route::get('/furnitureAlmirah', [HomeController::class,'furnitureAlmirah'])->name('home.furnitureAlmirah');
Route::get('/furnitureStool', [HomeController::class,'furnitureStool'])->name('home.furnitureStool');
Route::get('/furnitureBookShelf', [HomeController::class,'furnitureBookShelf'])->name('home.furnitureBookShelf');
Route::get('/furnitureChair', [HomeController::class,'furnitureChair'])->name('home.furnitureChair');
Route::get('/furnitureCarftDecor', [HomeController::class,'furnitureCarftDecor'])->name('home.furnitureCarftDecor');
Route::get('/furnitureShowcase', [HomeController::class,'furnitureShowcase'])->name('home.furnitureShowcase');
Route::get('/furnitureWardrobe', [HomeController::class,'furnitureWardrobe'])->name('home.furnitureWardrobe');
Route::get('/furnitureOvenRack', [HomeController::class,'furnitureOvenRack'])->name('home.furnitureOvenRack');
Route::get('/furnitureRockingChair', [HomeController::class,'furnitureRockingChair'])->name('home.furnitureRockingChair');
Route::get('/furnitureTeaTable', [HomeController::class,'furnitureTeaTable'])->name('home.furnitureTeaTable');
Route::get('/furnitureAlna', [HomeController::class,'furnitureAlna'])->name('home.furnitureAlna');
Route::get('/furnitureDressingTable', [HomeController::class,'furnitureDressingTable'])->name('home.furnitureDressingTable');
Route::get('/furnitureTvTrolley', [HomeController::class,'furnitureTvTrolley'])->name('home.furnitureTvTrolley');
Route::get('/furnitureSofaSet', [HomeController::class,'furnitureSofaSet'])->name('home.furnitureSofaSet');
Route::get('/furnitureShowRack', [HomeController::class,'furnitureShowRack'])->name('home.furnitureShowRack');
Route::get('/furnitureDivan', [HomeController::class,'furnitureDivan'])->name('home.furnitureDivan');
Route::get('/furnitureKitchenCabinet', [HomeController::class,'furnitureKitchenCabinet'])->name('home.furnitureKitchenCabinet');
Route::get('/furnitureParts', [HomeController::class,'furnitureParts'])->name('home.furnitureParts');



Route::get('/others', [HomeController::class,'others'])->name('home.others');







Route::get('/view_category', [AdminController::class,'view_category'])->name('admin.category');
Route::post('/add_category', [AdminController::class,'add_category'])->name('admin.addCategory');
Route::delete('/delete_category/{id}', [AdminController::class,'destroy'])->name('admin.deleteCategory');

Route::get('/view_product', [AdminController::class,'view_product'])->name('admin.viewProduct');
Route::post('/add_product', [AdminController::class,'add_product'])->name('admin.addProduct');
Route::get('/add_product/image/{id}', [AdminController::class,'multiImage'])->name('admin.multiImage');
Route::post('/save-multiple-image', [AdminController::class, 'saveMultipleImage'])->name('admin.saveMultipleImage');



Route::get('/add_products/image/{id}', [AdminController::class,'anotherMultiImage'])->name('admin.anotherMultiImage');
Route::post('/save-another-multiple-image', [AdminController::class, 'saveAnotherMultipleImage'])->name('admin.saveAnotherMultipleImage');



Route::get('/add_review_product/image/{id}', [AdminController::class,'reviewMultiImage'])->name('admin.reviewMultiImage');
Route::post('/save-review-multiple-image', [AdminController::class, 'saveReviewMultipleImage'])->name('admin.saveReviewMultipleImage');



Route::get('/show_product', [AdminController::class,'show_product'])->name('admin.showProduct');
Route::get('/edit_product/{id}', [AdminController::class,'edit_product'])->name('admin.editProduct');
Route::put('/update_products/{id}', [AdminController::class, 'update_product'])->name('admin.updateProduct');
Route::delete('/delete_product/{id}', [AdminController::class,'delete_product'])->name('admin.deleteProduct');

Route::get('/order', [AdminController::class,'order'])->name('admin.order');
Route::post('/order', [AdminController::class,'cash_order'])->name('admin.cash_order');
Route::get('/ontheway/{id}', [AdminController::class,'ontheway'])->name('admin.ontheway');
Route::get('/delivered/{id}', [AdminController::class,'delivered'])->name('admin.delivered');
Route::get('/print_pdf/{id}', [AdminController::class,'print_pdf'])->name('admin.pdf');

Route::get('/email_info/{id}', [AdminController::class,'email_info'])->name('admin.emailInfo');
Route::post('/send_user_email/{id}', [AdminController::class,'send_user_email'])->name('admin.sendUserEmail');

Route::get('/search', [AdminController::class,'search'])->name('admin.search');



Route::get('/slider', [AdminController::class,'slider'])->name('admin.slider');
Route::get('/addSlider',[AdminController::class,'addSlider'])->name('admin.addSlider');
Route::post('/storeSlider',[AdminController::class,'storeSlider'])->name('admin.storeSlider');
Route::delete('/slider/{id}/delete',[AdminController::class,'destroySlider'])->name('admin.destroySlider');

Route::get('/reviewSlider', [AdminController::class,'reviewSlider'])->name('admin.reviewSlider');
Route::get('/addReviewSlider',[AdminController::class,'addReviewSlider'])->name('admin.addReviewSlider');
Route::post('/storeReviewSlider',[AdminController::class,'storeReviewSlider'])->name('admin.storeReviewSlider');
Route::delete('/reviewSlider/{id}/delete',[AdminController::class,'destroyReviewSlider'])->name('admin.destroyReviewSlider');





Route::get('location-set',[AdminController::class,'location'])->name('admin.location');
Route::post('location-set',[AdminController::class,'storeLocation'])->name('storeLocation');
Route::delete('location-set/{id}/delete/',[AdminController::class,'deleteLocation'])->name('deleteLocation');



Route::get('/get-thanas', [AdminController::class, 'getThanas']);

