<?php

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

Route::get('/login', function () {
    return view('welcome');
});

Auth::routes();


Route::get('statistiques','ChartController@index');
Route::get('/', 'ChartController@index');



Route::resource('profil', 'ProfilController');
Route::resource('user', 'UserController');
Route::resource('user_profil', 'User_profilController');
Route::get('/changePassword','User_profilController@showChangePasswordForm');
Route::post('/changePassword','User_profilController@changePassword')->name('changePassword');



Route::delete('user/{id}','UserController@destroy');


Route::get('commission/{id}/createPPU','CommissionController@createPPU');
Route::get('commission/{id}/createPPU','ProjetController@commissionPPU');
Route::get('commission/{id}/storePPU','CommissionController@storePPU');

Route::get('commission/{id}/createPPR','CommissionController@createPPR');
Route::get('commission/{id}/createPPR','ProjetController@commissionPPR');
Route::get('commission/{id}/storePPR','CommissionController@storePPR');

Route::get('commission/{id}/createGPU','CommissionController@createGPU');
Route::get('commission/{id}/createGPU','ProjetController@commissionGPU');
Route::get('commission/{id}/storeGPU','CommissionController@storeGPU');

Route::get('commission/{id}/createGPR','CommissionController@createGPR');
Route::get('commission/{id}/createGPR','ProjetController@commissionGPR');
Route::get('commission/{id}/storeGPR','CommissionController@storeGPR');

Route::get('commission/{id}/createADHOC','CommissionController@createADHOC');
Route::get('commission/{id}/createADHOC','ProjetController@commissionADHOC');
Route::get('commission/{id}/storeADHOC','CommissionController@storeADHOC');

Route::get('commission/{id}/createDERO','CommissionController@createDERO');
Route::get('commission/{id}/createDERO','ProjetController@commissionDERO');
Route::get('commission/{id}/storeDERO','CommissionController@storeDERO');

Route::get('commission/{id}/createtraite','CommissionController@createtraite');
Route::get('commission/{id}/createtraite','ProjetController@commissiontraite');
Route::get('commission/{id}/storetraite','CommissionController@storetraite');



Route::get('commission/{id}/create','CommissionController@create');
Route::get('commission/{id}/commission','ProjetController@commission');
Route::get('commission/{id}','CommissionController@store');

Route::get('commission','CommissionController@index');
Route::get('commission/{id}/traite','CommissionController@traite');
Route::get('commission/{id}/non_traite','CommissionController@nontraite');





Route::get('dossier','ProjetController@index');

Route::get('dossier/supp','ProjetController@supp');
Route::get('dossier/{id}/restaure','ProjetController@restaure');

Route::get('dossier/create','Type_projetController@create');
Route::get('register','ProfilController@register');


Route::post('dossier','ProjetController@store');
Route::post('dossier/corbeille','ProjetController@corbeille');
Route::get('dossier/{id}/edit','ProjetController@edit');
Route::get('dossier/{id}/editPPU','ProjetController@editPPU');
Route::get('dossier/{id}/editPPR','ProjetController@editPPR');
Route::get('dossier/{id}/editGPU','ProjetController@editGPU');
Route::get('dossier/{id}/editGPR','ProjetController@editGPR');
Route::get('dossier/{id}/editADH','ProjetController@editADH');
Route::get('dossier/{id}/editDER','ProjetController@editDER');

Route::put('dossier/{id}','ProjetController@update');
Route::put('dossier/{id}/PPR','ProjetController@updatePPR');
Route::put('dossier/{id}/GPU','ProjetController@updateGPU');
Route::put('dossier/{id}/GPR','ProjetController@updateGPR');
Route::put('dossier/{id}/PPU','ProjetController@updatePPU');
Route::put('dossier/{id}/ADH','ProjetController@updateADH');
Route::put('dossier/{id}/DER','ProjetController@updateDER');


Route::get('historique/{id}/edit','HistoriqueController@edit');

Route::put('historique/{id}/up','HistoriqueController@update');

Route::delete('historique/{id}','HistoriqueController@destroy');

Route::delete('dossier/{id}','ProjetController@destroy');

Route::get('historique/{id}/capt','ProjetController@capt');


Route::get('historique/{id}','HistoriqueController@create');

Route::get('dossier/{id}/pdf','ProjetController@pdf');

Route::get('dossier/PPU','ProjetController@PPU');

Route::get('dossier/GPU','ProjetController@GPU');

Route::get('dossier/PPR','ProjetController@PPR');

Route::get('dossier/GPR','ProjetController@GPR');

Route::get('dossier/ADHOC','ProjetController@ADHOC');

Route::get('dossier/derogation','ProjetController@derogation');

Route::get('historique/{id}/view','HistoriqueController@view');

Route::get('dossier/{id}/details','ProjetController@details');

Route::get('dossier/createPPU','ProjetController@createPPU');

Route::post('dossier/storePPU','ProjetController@storePPU');

Route::get('dossier/createGPU','ProjetController@createGPU');

Route::post('dossier/storeGPU','ProjetController@storeGPU');

Route::get('dossier/createPPR','ProjetController@createPPR');

Route::post('dossier/storePPR','ProjetController@storePPR');

Route::get('dossier/createGPR','ProjetController@createGPR');

Route::post('dossier/storeGPR','ProjetController@storeGPR');

Route::get('dossier/createADHOC','ProjetController@createADHOC');

Route::post('dossier/storeADHOC','ProjetController@storeADHOC');

Route::get('dossier/createDEROGATION','ProjetController@createDEROGATION');

Route::post('dossier/storeDEROGATION','ProjetController@storeDEROGATION');

Route::get('historique/{id}/PPR','HistoriqueController@createPPR');

Route::get('historique/{id}/GPR','HistoriqueController@createGPR');

Route::get('historique/{id}/PPU','HistoriqueController@createPPU');

Route::get('historique/{id}/GPU','HistoriqueController@createGPU');

Route::get('historique/{id}/PPR','HistoriqueController@createPPR');

Route::get('historique/{id}/ADHOC','HistoriqueController@createADHOC');

Route::get('historique/{id}/DEROGATION','HistoriqueController@createDEROGATION');

Route::get('historique/{id}/captADHOC','ProjetController@captADHOC');

Route::get('historique/{id}/captDEROGATION','ProjetController@captDEROGATION');

Route::get('historique/{id}/captGPR','ProjetController@captGPR');

Route::get('historique/{id}/captPPU','ProjetController@captPPU');

Route::get('historique/{id}/captGPU','ProjetController@captGPU');

Route::get('historique/{id}/captPPU','ProjetController@captPPU');

//----------------------Routes PDF-------------//
Route::get('view-pdf/', ['as'=>'view-pdf','uses'=>'ProjetController@viewPDF_tous']);
Route::get('download-pdf/', ['as'=>'download-pdf','uses'=>'ProjetController@downloadPDF_tous']);
Route::get('view-pdf-ppu/', ['as'=>'view-pdf-ppu','uses'=>'ProjetController@viewPDF_ppu']);
Route::get('view-pdf-ppr/', ['as'=>'view-pdf-ppr','uses'=>'ProjetController@viewPDF_ppr']);
Route::get('view-pdf-gpr/', ['as'=>'view-pdf-gpr','uses'=>'ProjetController@viewPDF_gpr']);
Route::get('view-pdf-gpu/', ['as'=>'view-pdf-gpu','uses'=>'ProjetController@viewPDF_gpu']);
Route::get('view-pdf-ADHOC/', ['as'=>'view-pdf-ADHOC','uses'=>'ProjetController@viewPDF_ADHOC']);
Route::get('view-pdf-Derogation/', ['as'=>'view-pdf-Derogation','uses'=>'ProjetController@viewPDF_Derogation']);

//----------------------Routes Excel-------------//
Route::get('downloadExcelSearch/{type}', 'ProjetController@downloadExcelSearch');
Route::get('downloadExcelSearchPPU/{type}', 'ProjetController@downloadExcelSearchPPU');
Route::get('downloadExcelSearchGPU/{type}', 'ProjetController@downloadExcelSearchGPU');
Route::get('downloadExcelSearchPPR/{type}', 'ProjetController@downloadExcelSearchPPR');
Route::get('downloadExcelSearchGPR/{type}', 'ProjetController@downloadExcelSearchGPR');
Route::get('downloadExcelSearchADHOC/{type}', 'ProjetController@downloadExcelSearchADHOC');
Route::get('downloadExcelSearchDerogation/{type}', 'ProjetController@downloadExcelSearchDerogation');
//----------------Routes Search -------//
Route::get('cases','ProjetController@searchAll');
Route::get('casesPPU','ProjetController@searchPPU');
Route::get('casesGPU','ProjetController@searchGPU');
Route::get('casesPPR','ProjetController@searchPPR');
Route::get('casesGPR','ProjetController@searchGPR');
Route::get('casesADHOC','ProjetController@searchADHOC');
Route::get('casesDerogation','ProjetController@searchDerogation');

//-------------Import Excel -----------//
Route::post('importExcel', 'ProjetController@importExcel');
Route::post('importExcelGPU', 'ProjetController@importExcelGPU');
Route::post('importExcelPPR', 'ProjetController@importExcelPPR');
Route::post('importExcelGPR', 'ProjetController@importExcelGPR');
Route::post('importExcelADHOC', 'ProjetController@importExcelADHOC');
Route::post('importExcelDERO', 'ProjetController@importExcelDERO');
//----------------Routes Services rendus----------------//
//---Fiche de taxe PPU---//
Route::get('ficheDeTaxe/{id}/captPPU','ProjetController@captPPU2');
Route::get('ficheDeTaxe/{id}/captPPU2','ProjetController@captPPU22');
Route::get('ficheDeTaxe/{id}/captPPU3','ProjetController@captPPU222');
Route::put('projetPPR/{id}','ProjetController@update2');
Route::put('projetPPR2/{id}','ProjetController@update22');
Route::put('projetPPR3/{id}','ProjetController@update222');
Route::get('projetPPR/{id}/pdf2','ProjetController@pdf2');
//---Fiche de taxe PPU---//
Route::get('ficheDeTaxe/{id}/captGPU','ProjetController@captGPU2');
Route::get('ficheDeTaxe/{id}/captGPU2','ProjetController@captGPU22');
Route::get('ficheDeTaxe/{id}/captGPU3','ProjetController@captGPU222');
Route::put('projetGPU/{id}','ProjetController@update3');
Route::put('projetGPU2/{id}','ProjetController@update33');
Route::put('projetGPU3/{id}','ProjetController@update333');
Route::get('projetGPU/{id}/pdf_GPU_FicheTaxe','ProjetController@pdf_GPU_FicheTaxe');
//---Note de calcul PPU---//
Route::get('projetPPR/{id}/pdf3','ProjetController@viewPDF_1');
//----Versement PPU -----//
Route::get('Versement/{id}/captPPU','ProjetController@captPPU4');
Route::put('Versement/{id}','ProjetController@valider_versement');
Route::get('Versement/{id}/captPPU_pdf','ProjetController@captPPU_pdf');
//----Versement PPU -----//
Route::get('Versement/{id}/captGPU','ProjetController@captGPU4');
Route::put('VersementGPU/{id}','ProjetController@valider_versementGPU');
//----Payement PPU -----//
Route::put('Payement/{id}','ProjetController@valider_payement');
//----Facture-----//
Route::get('Facture/{id}/captPPU_pdf','ProjetController@captPPU_pdf2');
//---Page Services rendus ---//
Route::get('ServiceRendu','ProjetController@all_service');
Route::post('/daterange/fetch_data', 'ProjetController@fetch_data')->name('ServiceRendu.all_service');
Route::get('view-pdf-SR/', ['as'=>'view-pdf-SR','uses'=>'ProjetController@viewPDF_SR']);



