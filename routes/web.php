<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MainController;

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


Route::prefix('admin')->middleware('auth.admin')->group(function () {
    Route::get('/',[AdminController::class,'index'])->name('admin.index');
    //novosti-get
    Route::get('/novosti',[AdminController::class,'adminNovosti'])->name('admin.novosti');
    Route::get('/novosti/izbrisi-novost/{id}',[AdminController::class,'izbrisiNovost'])->name('admin.izbrisi-novost');
    Route::get('novosti/dodaj-novost',[AdminController::class,'dodajNovost'])->name('admin.dodaj-novost');
    Route::post('novosti/spremi-novost',[AdminController::class,'spremiNovost'])->name('admin.spremi-novost');
    //sazivi
    Route::get('/sazivi',[AdminController::class,'adminSazivi'])->name('admin.sazivi');
    Route::get('/sazivi/izbrisi-saziv/{id}',[AdminController::class,'izbrisiSaziv'])->name('admin.izbrisi-saziv');
    Route::get('/sazivi/trenutni-saziv/{id}',[AdminController::class,'trenutniSaziv'])->name('admin.trenutni-saziv');

    Route::get('sazivi/dodaj-saziv',[AdminController::class,'dodajSaziv'])->name('admin.dodaj-saziv');
    Route::post('sazivi/spremi-saziv',[AdminController::class,'spremiSaziv'])->name('admin.spremi-saziv');
    //sazivi/clanovi
    Route::get('/sazivi/{id}/clanovi',[AdminController::class,'clanoviSaziva'])->name('admin.clanovi-saziva');
    Route::get('/sazivi/dodaj-clana-saziva/{id}',[AdminController::class,'dodajClanaSaziva'])->name('admin.dodaj-clana-saziva');
    Route::post('/sazivi/spremi-clana-saziva',[AdminController::class,'spremiClanaSaziva'])->name('admin.spremi-clana-saziva');
    Route::get('/sazivi/izbrisi-clana-saziva/{id}',[AdminController::class,'izbrisiClanaSaziva'])->name('admin.izbrisi-clana-saziva');

    //sazivi/stavke
    Route::get('/sazivi/{id}/stavke',[AdminController::class,'stavkeSaziva'])->name('admin.stavke-saziva');
    Route::get('/sazivi/dodaj-stavku-saziva/{id}',[AdminController::class,'dodajStavkuSaziva'])->name('admin.dodaj-stavku-saziva');
    Route::post('/sazivi/spremi-stavku-saziva',[AdminController::class,'spremiStavkuSaziva'])->name('admin.spremi-stavku-saziva');
    Route::get('/sazivi/izbrisi-stavku-saziva/{id}',[AdminController::class,'izbrisiStavkuSaziva'])->name('admin.izbrisi-stavku-saziva');

    //sazivi/stavke/datoteke
    Route::get('/sazivi/{id}/stavke/{id_datoteke}/datoteke',[AdminController::class,'datotekeStavkiSaziva'])->name('admin.datoteke-stavki-saziva');
    Route::get('/sazivi/{id}/stavke/{id_datoteke}/datoteke/dodaj-datoteke-stavki-saziva',[AdminController::class,'dodajDatotekeStavkiSaziva'])->name('admin.dodaj-datoteke-stavki-saziva');
    Route::post('/sazivi/stavke/datoteke/spremi-datoteke-stavki-saziva',[AdminController::class,'spremiDatotekeStavkiSaziva'])->name('admin.spremi-datoteke-stavki-saziva');
    Route::get('/sazivi/stavke/datoteke/izbrisi-datoteku-stavke-saziva/{id}',[AdminController::class,'izbrisiDatotekuStavkeSaziva'])->name('admin.izbrisi-datoteku-stavke-saziva');
    //dokumenti

    Route::get('/dokumenti',[AdminController::class,'adminDokumenti'])->name('admin.dokumenti');
    Route::get('dokumenti/dodaj-dokument',[AdminController::class,'dodajDokument'])->name('admin.dodaj-dokument');
    Route::post('dokumenti/spremi-dokument',[AdminController::class,'spremiDokument'])->name('admin.spremi-dokument');
    Route::get('/dokumenti/izbrisi-dokument/{id}',[AdminController::class,'izbrisiDokument'])->name('admin.izbrisi-dokument');
    Route::get('/dokumenti/prikazi-dokument/{id}',[AdminController::class,'prikaziDokument'])->name('admin.prikazi-dokument');

    //dokumenti/datoteke

    Route::get('/dokumenti/{id}/datoteke',[AdminController::class,'datotekeDokumenta'])->name('admin.datoteke-dokumenta');
    Route::get('/dokumenti/dodaj-datoteku-dokumenta/{id}',[AdminController::class,'dodajDatotekuDokumenta'])->name('admin.dodaj-datoteku-dokumenta');
    Route::post('dokumenti/spremi-datoteku-dokumenta',[AdminController::class,'spremiDatotekuDokumenta'])->name('admin.spremi-datoteku-dokumenta');
    Route::get('/dokumenti/izbrisi-datoteku-dokumenta/{id}',[AdminController::class,'izbrisiDatotekuDokumenta'])->name('admin.izbrisi-datoteku-dokumenta');

    //sponzori

    Route::get('/sponzori',[AdminController::class,'adminSponzori'])->name('admin.sponzori');
    Route::get('/sponzori/dodaj-sponzora',[AdminController::class,'dodajSponzora'])->name('admin.dodaj-sponzora');
    Route::post('/sponzori/spremi-sponzora',[AdminController::class,'spremiSponzora'])->name('admin.spremi-sponzora');
    Route::get('/sponzori/izbrisi-sponzora/{id}',[AdminController::class,'izbrisiSponzora'])->name('admin.izbrisi-sponzora');
    
});

Route::get('/file/download/{id}',[MainController::class,'preuzmiDatoteku'])->name('preuzmi-datoteku');
Route::get('/dokument/download/{id}',[MainController::class,'preuzmiDokument'])->name('preuzmi-dokument');
Route::post('/send-email',[MainController::class,'sendEmail'])->name('send-email');
Route::get('/{any}',function(){
    return view('spa');
})->where('any','.*');