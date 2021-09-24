<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;

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

Route::get('/', 'WebsiteController@index');
Route::get('products_list', 'WebsiteController@products');
Route::get('packages_list', 'WebsiteController@packages');
Route::get('bookstore_list', 'WebsiteController@bookstore');

Auth::routes();

Route::resource('products', 'ProductController');
Route::resource('sections', 'SectionPackageController');
Route::resource('packages', 'PackageController');
Route::resource('page', 'PageController');

