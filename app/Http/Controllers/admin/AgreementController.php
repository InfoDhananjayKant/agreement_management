<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Agreement;
use Illuminate\Http\Request;
use App\Models\RentAgreement;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\returnSelf;

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
        
        $url = url()->previous();
        
        $parseUrl = parse_url($url);

        if(isset($parseUrl['query'])){
            parse_str($parseUrl['query'],$queryParams);

            if(isset($queryParams['form_choice'])){
                $form_choice = $queryParams['form_choice'];
            }else{
                $form_choice = null;
            }  
        }else{
            $form_choice = null;
        }

        if($form_choice == null){
            return 'something went wrong';
        }elseif($form_choice == '1'){
        
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
        $this->addInAgreement($rent,1);

        $pdf = PDF::loadView('pdf.rentagreement',compact('rent'));

        return $pdf->stream('Agreement.pdf');
    }elseif($form_choice == '2'){
        
    }elseif($form_choice == '3'){
        return "This is Registry deed";
    }elseif($form_choice == '4'){
        return "This is Builders Registry";
    }elseif($form_choice == '5'){
        return "This is ATS";
    }
    }

    function showAgreementList(){

        if(Auth::user()->hasRole('super admin')){
            $agreements['data'] = Agreement::all();
            return view('admin.agreementlist')->with($agreements);
        }
        else{
            $agreements['data'] = Agreement::all()->where('created_by', Auth::user()->id);
            return view('admin.agreementlist')->with($agreements);
        }

    }


    function addInAgreement($data,$type){
        $agreement = new Agreement();
        $agreement->type = $type;
        $agreement->party_name = $data->tenant_name;
        $agreement-> table_id = $data->id;
        $agreement->date = date('y-m-d');
        $agreement->created_by = Auth::user()->id;
        $agreement->save();
    }
}
