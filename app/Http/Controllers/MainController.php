<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Novosti;
use App\Models\NovostiGalerija;
use App\Models\Sazivi;
use App\Models\SazivClanovi;
use App\Models\SazivStavke;
use App\Models\SazivStavkeDatoteke;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use \App\Mail\SendMail;
use DB;
class MainController extends Controller
{
    public function index()
    {
        return view('spa');
    }
    public function preuzmiDatoteku(Request $request)
    {
        $stavka_saziva = SazivStavkeDatoteke::findOrFail($request->id);
        if(Storage::disk()->exists($stavka_saziva->path_datoteke)){
            return response()->file('storage/'.$stavka_saziva->path_datoteke);
        }
        abort('403','Datoteka koju ste željeli preuzeti je nedostupna ili izbrisana');
    }

    public function preuzmiDokument(Request $request)
    {
        $dokumenti = DB::table('dokumenti')->join('dokumenti_datoteke','dokumenti.id','=','dokumenti_datoteke.id_dokumenta')
        ->where('prikazano',1)->where('dokumenti_datoteke.id',$request->id)->first();
        if($dokumenti){
            if(Storage::disk()->exists($dokumenti->path_datoteke)){
                return response()->file('storage/'.$dokumenti->path_datoteke);
            }else{
                abort('403','Datoteka koju ste željeli preuzeti je nedostupna ili izbrisana');
            } 
        }
        abort('404');
    }

    public function sendEmail(Request $request)
    {
        $emailContent = $request->validate([
            'ime' => 'required',
            'email' => 'required|email',
            'svrha' => 'required',
            'pitanje' => 'required'
        ]);

        if($emailContent){
            Mail::to("zbortest111@gmail.com")->send(new SendMail($emailContent));
            echo "<script>setTimeout(function(){ window.location.href = './kontakt'; }, 3000);</script>";
            // echo 'Uspješno ste poslali email vraćamo vas za 3 sekunde';
            echo '
                <div style="margin-top: 80px;text-align: center;">
                    <img style="width: 100px;height:100px;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/7/73/Flat_tick_icon.svg/768px-Flat_tick_icon.svg.png">
                    <h1 style="font-family: Arial;">Uspješno poslano!</h1>
                    <p style="font-family: Arial;">Uskoro Vas vraćamo nazad!</p>
                </div>
            ';
        }
    }

}
