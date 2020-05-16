<?php

use Illuminate\Support\Facades\Route;

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
Route::get('/', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index');

Route::resource('item-mgmt', 'ItemController');
Route::post('item-mgmt/search', 'ItemController@search')->name('item-mgmt.search');
Route::get('item-mgmt/remove/{id}', 'ItemController@remove')->name('item-mgmt.remove');

Route::resource('pcm-mgmt', 'PcmController');
Route::post('pcm-mgmt/search', 'PcmController@search')->name('pcm-mgmt.search');
Route::get('pcm-mgmt/remove/{id}', 'PcmController@remove')->name('pcm-mgmt.remove');
Route::get('pcm-mgmt/showData/{id}', 'PcmController@showData')->name('pcm-mgmt.showData');

Route::resource('report', 'ReportController');
Route::post('report/search', 'ReportController@search')->name('report.search');
Route::post('report', 'ReportController@exportExcel')->name('report.excel');
Route::post('report/pdf', 'ReportController@exportPDF')->name('report.pdf');

Route::resource('stock-mgmt', 'StockController');
Route::post('stock-mgmt/search', 'StockController@search')->name('stock-mgmt.search');
Route::get('stock-mgmt/remove/{id}', 'StockController@remove')->name('stock-mgmt.remove');
Route::get('stock-mgmt/showData/{id}', 'StockController@showData')->name('stock-mgmt.showData');


Route::resource('item-receiv-mgmt', 'ReceiveItemController');
Route::post('item-receiv-mgmt/search', 'ReceiveItemController@search')->name('item-receiv-mgmt.search');

Route::resource('item-consume-mgmt', 'ConsumeItemController');
Route::post('item-consume-mgmt/search', 'ConsumeItemController@search')->name('item-consume-mgmt.search');


Route::resource('item-acdocu-mgmt', 'AcDocumentController');
Route::get('item-acdocu-mgmt/Download/{id}', 'AcDocumentController@Download')->name('item-acdocu-mgmt.Download');
Route::get('item-acdocu-mgmt/remove/{id}', 'AcDocumentController@remove')->name('item-acdocu-mgmt.remove');


Route::resource('entry-rect-mgmt', 'EntryRectController');
Route::post('entry-rect-mgmt/search', 'EntryRectController@search')->name('entry-rect-mgmt.search');
Route::get('entry-rect-mgmt/remove/{id}', 'EntryRectController@remove')->name('entry-rect-mgmt.remove');



