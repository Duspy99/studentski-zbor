<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\ApiController;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('novosti/novost/{id}',[ApiController::class,'dohvatiNovost']);
Route::get('novosti/{id}',[ApiController::class,'dohvatiPagKategoriju']);
Route::get('novosti',[ApiController::class,'novosti']);
Route::get('novosti-galerija',[ApiController::class,'novosti_galerija']);
Route::get('novosti-galerija/{id}',[ApiController::class,'dohvatiSlikuIzGalerije']);

Route::get('sazivi',[ApiController::class,'sazivi']);
Route::get('sazivi/trenutni-saziv',[ApiController::class,'dohvatiTrenutniSaziv']);
Route::get('sazivi/stavke',[ApiController::class,'dohvatiSveStavkeSaziva']);
Route::get('sazivi/stavke/datoteke',[ApiController::class,'dohvatiSazivStavkeDatoteke']);
Route::get('sazivi/clanovi',[ApiController::class,'dohvatiSazivClanove']);

Route::get('sazivi/{id}',[ApiController::class,'dohvatiSaziv']);
Route::get('sazivi/{id}/clanovi',[ApiController::class,'dohvatiClanoveSaziva']);
Route::get('sazivi/{id}/stavke/datoteke',[ApiController::class,'dohvatiDatotekeSaziva']);


Route::get('sazivi/{id}/stavke',[ApiController::class,'dohvatiStavkeSaziva']);
Route::get('sazivi/{id}/stavke/{id_datoteke}',[ApiController::class,'dohvatiStavkuSaziva']);

Route::get('sazivi/{id}/stavke/{id_datoteke}/datoteke',[ApiController::class,'dohvatiDatotekeStavkeSaziva']);
Route::get('sazivi/{id}/stavke/{id_datoteke}/sveDatoteke',[ApiController::class,'dohvatiSveDatotekeStavkiSaziva']);

Route::get('dokumenti',[ApiController::class,'dohvatiDokumente']);
Route::get('dokumenti/prikazani-dokumenti',[ApiController::class,'dohvatiPrikazaneDokumente']);
Route::get('dokumenti/prikazane-datoteke',[ApiController::class,'dohvatiPrikazaneDatoteke']);
Route::get('dokumenti/{id}',[ApiController::class,'dohvatiDokument']);
Route::get('dokumenti/{id}/datoteke',[ApiController::class,'dohvatiDatotekeDokumenta']);

Route::get('sponzori',[ApiController::class,'dohvatiSponzore']);

//Route::get('arhiva',[ApiController::class,'dohvatiArhivu']);

Route::apiResources(['pagNovosti' => 'ApiController@pagNovosti']);
Route::get('pagNovosti',[ApiController::class,'pagNovosti']);


