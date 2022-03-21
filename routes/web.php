<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Business\MutliLang;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();



Route::get('/routes', function () {
    $routeCollection = Route::getRoutes();

    echo "<table style='width:100%'>";
    echo "<tr>";
    echo "<td width='10%'><h4>HTTP Method</h4></td>";
    echo "<td width='10%'><h4>Route</h4></td>";
    echo "<td width='10%'><h4>Name</h4></td>";
    echo "<td width='70%'><h4>Corresponding Action</h4></td>";
    echo "</tr>";
    foreach ($routeCollection as $value) {
        echo "<tr>";
        echo "<td>" . $value->methods()[0] . "</td>";
        echo "<td>" . $value->uri() . "</td>";
        echo "<td>" . $value->getName() . "</td>";
        echo "<td>" . $value->getActionName() . "</td>";
        echo "</tr>";
    }
    echo "</table>";
});



Route::get('lang/change', [\App\Http\Controllers\Web\LangController::class,'change'])->name('changeLang');
Route::get('/',[App\Http\Controllers\Web\HomeController::class,'index'])->name('index');
Route::get('/search',[App\Http\Controllers\Web\SearchController::class,'search'])->name('search');
Route::prefix('/blog')->name('blog.')->group(__DIR__ . '/web/blog.php');
Route::prefix('/category')->name('category.')->group(__DIR__ . '/web/category.php');
Route::prefix('/contact')->name('contact.')->group(__DIR__ . '/web/contact.php');
Route::prefix('/subscribe')->name('subscribe.')->group(__DIR__ . '/web/subscribe.php');
Route::prefix('/contact')->name('contact.')->group(__DIR__ . '/web/contact.php');



