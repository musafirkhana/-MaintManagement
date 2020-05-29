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
Route::get('/getchart_data', 'DashboardController@getMonthlyData');
Route::get('/getdonate_data', 'DashboardController@getYearSumData');
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
Route::post('entry-rect-mgmt/storeaircraft', 'EntryRectController@storeaircraft')->name('entry-rect-mgmt.storeaircraft');
Route::post('entry-rect-mgmt/storeEnType', 'EntryRectController@storeEnType')->name('entry-rect-mgmt.storeEnType');

Route::resource('ac-flghrs-mgmt', 'FlgHrsController');
Route::get('ac-flghrs-mgmt/search', 'FlgHrsController@search')->name('ac-flghrs-mgmt.search');

Route::resource('tbo-tso-mgmt', 'TboTsoController');
Route::get('tbo-tso-mgmt/search', 'TboTsoController@search')->name('tbo-tso-mgmt.search');

Route::resource('acschedule-insp-mgmt', 'AcheduleInspacController');
Route::get('acschedule-insp-mgmt/search', 'AcheduleInspacController@search')->name('acschedule-insp-mgmt.search');

Route::resource('engschedule-insp-mgmt', 'EngScheduleInspController');
Route::get('engschedule-insp-mgmt/search', 'EngScheduleInspController@search')->name('engschedule-insp-mgmt.search');

Route::resource('letter-mgmt', 'LetterController');
Route::get('letter-mgmt/search', 'LetterController@search')->name('letter-mgmt.search');

