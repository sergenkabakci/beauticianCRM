<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Events;
use App\Models\Locations;
use App\Models\Event_categories;
use DB;
use Auth;
use Validator;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function index(Request $request) 
    {
		if($request->input()) {
			$json = [];
        
             $veri = Events::whereDate('events.baslangic_tarihi', '>=', $request->start)
                       ->whereDate('events.bitis_tarihi',   '<=', $request->end)
                       ->where('events.tenant_id', Auth::user()->tenant_id)
                       ->join('event_categories', 'events.kategori_id', '=', 'event_categories.id')
                        ->select(
                            'events.baslangic_tarihi',
                            'events.bitis_tarihi',
                            'events.baslik',
                            'events.aciklama',
                            'events.id',
                            'events.kategori_id',
                            'event_categories.color',
                            'event_categories.name'
                        )
                       ->get();
            if($veri){
                foreach($veri as $row){
                    $json[] =array(
                        //'title' => Carbon::createFromFormat('Y-m-d H:i:s',  $row['baslangic_tarihi'])->format('H:i') ." - ".$row['baslik'],
                        'title' => $row['baslik'],
                        'description' => $row['aciklama'],
                        'start' => $row['baslangic_tarihi'],
                        'end'   => $row['bitis_tarihi'],
                        'id'    => $row['id'],
                        'className'    => $row['kategori_id'],
                        'calendar'    => $row['color'],
                        'name'    => $row['name'],
                        
                        'k_id'    => $row['kategori_id'],
                        'allDay' => 0
                    );
                }
            }
  //{ id: 1, url: "", title: "Design Review", start: date, end: nextDay, allDay: !1, extendedProps: { calendar: "Business" } },
             return response()->json($json);
        }
		
		$data['lokasyonlar'] = Locations::where('tenant_id', Auth::user()->tenant_id)->where('status',1)->get();
		$data['kategoriler'] = Event_categories::where('tenant_id', Auth::user()->tenant_id)->where('status',1)->orderBy('order', 'asc')->get();
		
        return view('events.index',compact('data'));
    }
	
	
	public function save(Request $request)
    {
 
        switch ($request->action) {
           case 'add':
              $event = Events::create([
                  'baslik' => $request->eventTitle,
                  'baslangic_tarihi' => Carbon::createFromFormat('d.m.Y H:i', $request->eventStartDate)->format('Y-m-d H:i'), 
                  'bitis_tarihi' => Carbon::createFromFormat('d.m.Y H:i', $request->eventEndDate)->format('Y-m-d H:i'),
                  'aciklama' => $request->eventDescription,
                  'user_id' => Auth::user()->id,
                  'lokasyon_id' => $request->eventLocation,
                  'kategori_id' => $request->eventLabel,
                  'tenant_id' => Auth::user()->tenant_id,
              ]);
 
              return redirect('events/')->with('success','Randevu Eklendi!');
             break;
  
           case 'update':
              $event = Events::find($request->id)->update([
                  'baslik' => $request->title,
                  'baslangic_tarihi' => $request->start,
                  'bitis_tarihi' => $request->end,
              ]);
 
              return response()->json($event);
             break;
  
           case 'delete':
              $event = Events::find($request->id)->delete();
  
              return response()->json($event);
             break;
             
           default:
             # code...
             break;
        }
    }
}
