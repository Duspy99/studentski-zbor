<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Novosti;
use App\Models\NovostiGalerija;
use App\Models\Sazivi;
use App\Models\SazivClanovi;
use App\Models\SazivStavke;
use App\Models\SazivStavkeDatoteke;
use App\Models\Dokumenti;
use App\Models\DokumentiDatoteke;
use App\Models\Sponzori;
use Session;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.admin');
    }

    public function index()
    {
        return view('admin.index');
    }

    //novosti

    public function adminNovosti()
    {
        return view('admin.novosti');
    }

    public function dodajNovost()
    {
        return view('admin.dodaj-novost');
    }

    public function spremiNovost(Request $request)
    {
        $validated = $request->validate([
            'naslov' => 'required',
            'sadrzaj' => 'required',
            'vrsta' => 'required',
        ]);

        $novost = new Novosti;
        $novost->naslov = $request->naslov;
        $novost->sadrzaj = $request->sadrzaj;
        $novost->vrsta = $request->vrsta;
    
        if($request->hasFile('naslovna_slika'))
        {
            $slika = $request->file('naslovna_slika');
            $ime_slike = time().'.'.$slika->getClientOriginalName();
            $path_slike = Storage::putFileAs('novosti/naslovne',$slika,$ime_slike);

            $novost->ime_slike = $ime_slike;
            $novost->path_slike = $path_slike;

        }
        $novost->save();
        if($request->hasFile('galerija_slike'))
        {
            foreach($request->galerija_slike as $slika)
            {
                $novosti_galerija = new NovostiGalerija;
                $ime_slike = time().'.'.$slika->getClientOriginalName();
                $path_slike = Storage::putFileAs('novosti/galerija',$slika,$ime_slike);
                $novosti_galerija->ime_slike = $ime_slike;
                $novosti_galerija->path_slike = $path_slike;
                $novosti_galerija->id_novosti = $novost->id;
                $novosti_galerija->save();
            }
        }
        return redirect()->route('admin.novosti');
    }

    public function izbrisiNovost(Request $request)
    {
        
        $novost = Novosti::findOrFail($request->id);
        $galerija_slike = NovostiGalerija::where('id_novosti',$novost->id)->get();
        if($galerija_slike)
        {
            foreach($galerija_slike as $slika)
            {
                Storage::delete($slika->path_slike);  
            }
        }
        Storage::delete($novost->path_slike);  
        Novosti::destroy($novost->id);
        return back();
    }

    //sazivi

    public function adminSazivi()
    {
        return view('admin.sazivi');
    }

    public function dodajSaziv()
    {
        return view('admin.dodaj-saziv');
    }

    public function spremiSaziv(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required',
        ]);

        $saziv = new Sazivi;
        $saziv->naziv = $request->naziv;

        if($request->trenutni_saziv == "on")
        {
            Sazivi::where('trenutni_saziv',1)->update(['trenutni_saziv' => 0]);
            $saziv->trenutni_saziv = 1;
        }
        $saziv->save();

        return redirect()->route('admin.sazivi');
    }


    public function izbrisiSaziv(Request $request)
    {
        $saziv = Sazivi::findOrFail($request->id);
        $stavke_saziva = SazivStavke::where('id_saziva',$request->id)->get();

        if($stavke_saziva)
        {
            foreach($stavke_saziva as $stavka_saziva)
            {
                $saziv_stavke_datoteke = SazivStavkeDatoteke::where('id_stavke_saziva',$stavka_saziva->id)->get();
                foreach($saziv_stavke_datoteke as $datoteka){
                    Storage::delete($datoteka->path_datoteke);
                }
            }
        }
        Sazivi::destroy($saziv->id);
        return back();
    }

    public function trenutniSaziv(Request $request)
    {
        $saziv = Sazivi::findOrFail($request->id);
        Sazivi::where('trenutni_saziv',1)->update(['trenutni_saziv' => 0]);
        $saziv->update(['trenutni_saziv' => 1]);
        return back();
    }

    //sazivi/clanovi

    public function clanoviSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);
        return view('admin.clanovi-saziva',['id' => $request->id]);
    }

    public function dodajClanaSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);
        return view('admin.dodaj-clana-saziva',['id' => $request->id]);
    }

    public function spremiClanaSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);

        $validated = $request->validate([
            'ime' => 'required',
            'uloga' => 'required',
        ]);

        $clanovi_saziva = new SazivClanovi;
        $clanovi_saziva->ime = $request->ime;
        $clanovi_saziva->opis = $request->opis;
        $clanovi_saziva->email = $request->email;
        $clanovi_saziva->telefon = $request->telefon;
        $clanovi_saziva->uloga = $request->uloga;
        $clanovi_saziva->id_saziva = $request->id;
        $clanovi_saziva->save();
        Session::flash('message', 'This is a message!');
        return redirect()->route('admin.dodaj-clana-saziva',['id' => $request->id])->with('poruka', 'Uspješno!');

    }

    public function izbrisiClanaSaziva(Request $request)
    {
        SazivClanovi::findOrFail($request->id);
        SazivClanovi::destroy($request->id);
        return back();
    }

    //sazivi/stavke

    public function stavkeSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);
        return view('admin.stavke-saziva',['id' => $request->id]);
    }

    public function dodajStavkuSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);
        return view('admin.dodaj-stavku-saziva',['id' => $request->id]);
    }

    public function spremiStavkuSaziva(Request $request)
    {
        Sazivi::findOrFail($request->id);
        $validated = $request->validate([
            'naziv' => 'required',
        ]);

        $stavka_saziva = new SazivStavke;
        $stavka_saziva->naziv = $request->naziv;
        $stavka_saziva->sadrzaj = $request->sadrzaj;
        $stavka_saziva->id_saziva = $request->id;
        $stavka_saziva->save();
        return redirect()->route('admin.stavke-saziva',['id' => $request->id]);
    }

    public function izbrisiStavkuSaziva(Request $request)
    {
        $stavka_saziva = SazivStavke::findOrFail($request->id);
        $saziv_stavke_datoteke = SazivStavkeDatoteke::where('id_stavke_saziva',$request->id)->get();
        foreach($saziv_stavke_datoteke as $datoteka){
            Storage::delete($datoteka->path_datoteke);
        }
        SazivStavke::destroy($request->id);
        return back();
    }

    public function datotekeStavkiSaziva($id,$id_datoteke)
    {
        Sazivi::findOrFail($id);
        SazivStavke::findOrFail($id_datoteke);
        return view('admin.datoteke-stavki-saziva', ['id' => $id,'id_datoteke' => $id_datoteke]);
    }

    public function dodajDatotekeStavkiSaziva($id,$id_datoteke)
    {
        Sazivi::findOrFail($id);
        SazivStavke::findOrFail($id_datoteke);
        return view('admin.dodaj-datoteke-stavki-saziva', ['id' => $id,'id_datoteke' => $id_datoteke]);

    }

    public function spremiDatotekeStavkiSaziva(Request $request)
    {
        $id_saziva = $request->id;
        if($request->hasFile('dokumenti'))
        {
            foreach($request->dokumenti as $dokument)
            {
                $dokumenti_datoteke = new SazivStavkeDatoteke;
                $ime_dokumenta = time().'.'.$dokument->getClientOriginalName();
                $path_dokumenta = Storage::putFileAs('sazivi/stavke/datoteke',$dokument,$ime_dokumenta);
                $dokumenti_datoteke->ime_datoteke = $ime_dokumenta;
                $dokumenti_datoteke->path_datoteke = $path_dokumenta;
                $dokumenti_datoteke->id_stavke_saziva = $request->id_datoteke;
                $dokumenti_datoteke->id_saziva = $id_saziva;
                $dokumenti_datoteke->save();
            }
        }
        return redirect()->route('admin.datoteke-stavki-saziva', ['id' => $request->id,'id_datoteke' => $request->id_datoteke]);
    }

    public function izbrisiDatotekuStavkeSaziva(Request $request)
    {
        $datoteka_stavke_saziva = SazivStavkeDatoteke::findOrFail($request->id);
        Storage::delete($datoteka_stavke_saziva->path_datoteke);
        SazivStavkeDatoteke::destroy($request->id);
        return back(); 
    }

//dokumenti
    public function adminDokumenti()
    {
        return view('admin.dokumenti');
    }

    public function dodajDokument()
    {
        return view('admin.dodaj-dokument');
    }

    public function spremiDokument(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required',
        ]);

        $dokument = new Dokumenti;
        $dokument->naziv = $request->naziv;
        $dokument->opis = $request->opis;

        if($request->prikazano == "on"){
            $dokument->prikazano = 1;
        }

        $dokument->save();

        return redirect()->route('admin.dokumenti'); 
    }

    public function izbrisiDokument(Request $request)
    {
        $dokument = Dokumenti::findOrFail($request->id);
        $datoteke = DokumentiDatoteke::where('id_dokumenta',$request->id)->get();
        if($datoteke)
        {
            foreach($datoteke as $datoteka)
            {
                Storage::delete($datoteka->path_datoteke);  
            }
        }
        Dokumenti::destroy($dokument->id);
        return back();
    }

    public function datotekeDokumenta(Request $request)
    {
        Dokumenti::findOrFail($request->id);
        return view('admin.datoteke-dokumenta',['id' => $request->id]);
    }

    public function dodajDatotekuDokumenta(Request $request)
    {
        Dokumenti::findOrFail($request->id);
        return view('admin.dodaj-datoteku-dokumenta',['id' => $request->id]); 
    }

    public function spremiDatotekuDokumenta(Request $request)
    {
        if($request->hasFile('dokumenti'))
        {
            foreach($request->dokumenti as $dokument)
            {
                $dokumenti_datoteke = new DokumentiDatoteke;
                $ime_dokumenta = time().'.'.$dokument->getClientOriginalName();
                $path_dokumenta = Storage::putFileAs('dokumenti/datoteke',$dokument,$ime_dokumenta);
                $dokumenti_datoteke->ime_datoteke = $ime_dokumenta;
                $dokumenti_datoteke->path_datoteke = $path_dokumenta;
                $dokumenti_datoteke->id_dokumenta = $request->id;
                $dokumenti_datoteke->save();
            }
        }
        return redirect()->route('admin.datoteke-dokumenta',['id' => $request->id]);
    }
   
    public function izbrisiDatotekuDokumenta(Request $request)
    {
        $dokumenti_datoteke = DokumentiDatoteke::findOrFail($request->id);
        Storage::delete($dokumenti_datoteke->path_datoteke);
        DokumentiDatoteke::destroy($request->id);
        return back();
    }

    public function prikaziDokument(Request $request)
    {
        $dokument = Dokumenti::findOrFail($request->id);

        if($dokument->prikazano == 0){
            $dokument->update(['prikazano' => 1]);
        }else{
            $dokument->update(['prikazano' => 0]);
        }
        return back();
    }

    public function adminSponzori()
    {
        return view('admin.sponzori');
    }

    public function dodajSponzora()
    {
        return view('admin.dodaj-sponzora');
    }

    public function spremiSponzora(Request $request)
    {
        $validated = $request->validate([
            'naziv' => 'required',
            'slika' => 'required'
        ]);

        $sponzor = new Sponzori;
        $sponzor->naziv = $request->naziv;
    
        if($request->hasFile('slika'))
        {
            $slika = $request->file('slika');
            $ime_slike = time().'.'.$slika->getClientOriginalName();
            $path_slike = Storage::putFileAs('sponzori',$slika,$ime_slike);
            $sponzor->ime_slike = $ime_slike;
            $sponzor->path_slike = $path_slike;
        }

        $sponzor->save();

        return redirect()->route('admin.sponzori');
    }

    public function izbrisiSponzora(Request $request)
    {
        $sponzor = Sponzori::findOrFail($request->id);
        Storage::delete($sponzor->path_slike);  
        Sponzori::destroy($sponzor->id);
        return back();
    }
}
