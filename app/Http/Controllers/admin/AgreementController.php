<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\RentAgreement;
use Barryvdh\DomPDF\Facade\Pdf;

class AgreementController extends Controller
{
    //
    function agreementform(Request $request){
        if($request->form_choice == '1'){
            return view('form.rentagreement');
        }elseif($request->form_choice == '2'){
            return "This is Commercial agreement";
        }elseif($request->form_choice == '3'){
            return "This is Registry Deed";
        }elseif($request->form_choice == '4'){
            return "This is Builder registry";
        }elseif($request->form_choice == '5'){
            return "This is ATS form";
        }else{
            return "Invaild Input";
        }

    }

    function saveAgreement(Request $request){
        $request->validate([
            'name' => 'required|String|max:255',
            'flatno' => 'required|max:255',
            'locality' => 'required|max:255',
            'city' => 'required|String|max:255',
            'district' => 'required|String|max:255',
            'state' => 'required|String|max:255',
        ]);

        $rent = new RentAgreement();

        $rent->tenant_name = $request->name;
        $rent->flat_no = $request->flatno;
        $rent->locality = $request->locality;
        $rent->city = $request->city;
        $rent->district = $request->district;
        $rent->state = $request->state;

        
        $rent->save();

        $pdf = PDF::loadView('pdf.rentagreement',compact('rent'));

        return $pdf->stream('Agreement.pdf');
        
    }
}
