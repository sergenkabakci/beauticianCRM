<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patients;
use DataTables;
use DB;
use Auth;
use Validator;
use Carbon\Carbon;

class PatientsController extends Controller
{
	public function index(Request $request){
		$data['standart'] = Patients::where('tenant_id', Auth::user()->tenant_id)->where("grup","Standart")->count();
		$data['tanidik'] = Patients::where('tenant_id', Auth::user()->tenant_id)->where("grup","Tanıdık")->count();
		$data['vip'] = Patients::where('tenant_id', Auth::user()->tenant_id)->where("grup","VIP")->count();
		$data['total'] =  $data['standart'] + $data['tanidik'] + $data['vip'];
		
		
		return view('patients.list',compact('data'));
    }
	
	public function datatables(Request $request){
		if($request->ajax()) {
			$data = Patients::select(DB::raw('CONCAT(ad, \' \', soyad) as full_name, grup,telefon,email,cinsiyet,id'))->where('tenant_id', Auth::user()->tenant_id)->get();
			 //822a0f46-8dcf-4c9b-93b9-e3002d7f8fe8

			return Datatables::of($data)
					->addIndexColumn()
					->addColumn('action', function($row){
	 
						   $btn = '<a href="'.url('patient/'.$row['id']).'" class="edit btn btn-primary btn-sm">Görüntüle</a>';
	   
							return $btn;
					})
					->rawColumns(['action'])
					->make(true);
		}
	}
	
	public function store(Request $request){
		
		$validator = Validator::make($request->all(), [
			'name' => 'required|max:255',
			'lastname' => 'required||max:255',
			'email' => 'email|max:255',
			'phone' => 'required|max:255',
			'cinsiyet' => 'required|max:255',
			'grup' => 'required|max:255'
		]);

		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withInput();
		}
		
		$patient = Patients::create(
			[
				'ad' => $request->post('name'),
				'soyad' => $request->post('lastname'),
				'email' => $request->post('email'),
				'telefon' => $request->post('full_number'),
				'tcno' => $request->post('tcno'),
				'grup' => $request->post('grup'),
				'cinsiyet' => $request->post('cinsiyet'),
				'adres' => $request->post('adres'),
				'tenant_id'	=>	Auth::user()->tenant_id,
				'user_id'	=>	Auth::user()->id
			]
		);
		
		return redirect('patient/'.$patient->id)->with('success','Hasta Eklendi!');
		
		
		//dd($request);
	}
	
	public function patient(string  $uuid){
		
		$patient = Patients::where("id",$uuid)->where('tenant_id',Auth::user()->tenant_id)->first();
		
		
		
		if(!$patient){
			abort(404);
		}
		/* foreach ($patient as $patient) {
			print_r($patient);
		} */
		return view('patients.view',compact("patient"));
		
	}
	
	
	
}
