<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Novosti;
use App\Models\NovostiGalerija;
use App\Models\Sazivi;
use App\Models\SazivClanovi;
use App\Models\SazivStavke;
use App\Models\SazivStavkeDatoteke;
use App\Models\Dokumenti;
use App\Models\DokumentiDatoteke;
use App\Models\Sponzori;
use DB;

class ApiController extends Controller
{
    
    public function novosti()
    {
       return Novosti::all();
    }

    public function pagNovosti()
    {
        return Novosti::latest()->paginate(16);
    }

    public function dohvatiPagKategoriju(Request $request)
    {
        $kategorije = ['službeno','sport','zabava','edukacija','kultura','ostalo'];

        if(!in_array($request->id,$kategorije))
        {
            abort(404);
        }  
        return Novosti::where('vrsta','=',$request->id)->latest()->paginate(16);
    }
    
    public function dohvatiNovost(Request $request)
    {
        return Novosti::findOrFail($request->id);
    }

    /*public function novosti_galerija()
    {
        return NovostiGalerija::all();
    }*/
    
    public function dohvatiSlikuIzGalerije(Request $request)
    {
        Novosti::findOrFail($request->id);
        return NovostiGalerija::where('id_novosti',$request->id)->get();
    }

    public function sazivi()
    {
        return Sazivi::all();
    }

    public function dohvatiSveStavkeSaziva()
    {
        return SazivStavke::all();
    }

    public function dohvatiSazivClanove()
    {
        return SazivClanovi::all();
    }

    public function dohvatiSazivStavkeDatoteke()
    {
        return SazivStavkeDatoteke::all();
    }

    public function dohvatiSaziv(Request $request)
    {
        return Sazivi::findOrFail($request->id);
    }

    public function dohvatiTrenutniSaziv()
    {
        return Sazivi::where('trenutni_saziv',1)->first();
    }

    public function dohvatiClanoveSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);
        return SazivClanovi::where('id_saziva',$request->id)->orderByRaw('uloga,opis ASC')->get();
    }

    public function dohvatiStavkeSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);
        return SazivStavke::where('id_saziva',$request->id)->get();
    }

    public function dohvatiStavkuSaziva(Request $request,$id,$id_datoteke)
    {
        Sazivi::findOrFail($id);
        return SazivStavke::where('id',$id_datoteke)->first();
    }

    public function dohvatiDatotekeSaziva(Request $request)
    {
        return SazivStavkeDatoteke::where('id_saziva',$request->id)->get();
    }
    
    public function dohvatiDatotekeStavkeSaziva(Request $request,$id,$id_datoteke)
    {
        Sazivi::findOrFail($id);
        SazivStavke::findOrFail($id_datoteke);
        return SazivStavkeDatoteke::where('id_stavke_saziva',$id_datoteke)->get();
    }

    public function dohvatiSveDatotekeStavkiSaziva(Request $request,$id,$id_datoteke)
    {
        Sazivi::findOrFail($id);
        return SazivStavkeDatoteke::where('id_saziva',$id)->get();
    }

    public function dohvatiDokumente()
    {
        return Dokumenti::all();
    }

    public function dohvatiDokument(Request $request)
    {
        return Dokumenti::findOrFail($request->id);
    }

    public function dohvatiPrikazaneDokumente()
    {
        return Dokumenti::where('prikazano',1)->get();
    }

    public function dohvatiDatotekeDokumenta(Request $request)
    {
        Dokumenti::findOrFail($request->id);
        return DokumentiDatoteke::where('id_dokumenta',$request->id)->get();
    }

    public function dohvatiPrikazaneDatoteke()
    {
        $sve = DB::table('dokumenti')->join('dokumenti_datoteke','dokumenti.id','=','dokumenti_datoteke.id_dokumenta')
        ->where('prikazano',1)->get();
        return $sve;
    }

    public function dohvatiSponzore()
    {
        return Sponzori::all();
    }

}


