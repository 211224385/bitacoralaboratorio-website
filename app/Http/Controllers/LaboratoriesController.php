<?php

namespace App\Http\Controllers;

use App\Models\Laboratory;
use App\Models\User;
use App\Models\Workshop;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LaboratoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laboratories = laboratory::all();

        return view('laboratories.index', compact('laboratories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('laboratories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      request()->validate([
        'label' => 'required',

    ]);

      laboratory::create([  

       'label' => request('label'),

   ]);
        return redirect()->route('laboratories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(laboratory $laboratory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(laboratory $laboratory)
    {
        return view('laboratories.edit', compact('laboratory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, laboratory $laboratory)

    {

      request()->validate([
        'label' => 'required',

        ]);


        $laboratory->update([  

            'label' => request('label'),

        ]);

         return redirect()->route('laboratories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy(laboratory $laboratory)
    {
        $laboratory->delete();

        return redirect()->route('laboratories.index');
    }

    public function kiosk(laboratory $laboratory)
    {
        return view ('laboratories.kiosk', compact('laboratory'));
 
   }

   public function storeKiosk(laboratory $laboratory)
    {
        request()->validate([
        'code'=>['required', 'exists:users']
        ]);

        $minutes=0;

        if(request('duration') == '15m') {
            $minutes=15;
        } else if(request('duration') == '30m'){
            $minutes=30;
        } else if(request('duration') == '1h') {
            $minutes=60;
        } else if(request('duration') == '2h') {
             $minutes=120;
        } else if(request('duration') == '3h') {
             $minutes=180;
        }

        $student=User::where('code', request('code'))->first();

        Workshop::create([
        'checked_in_at'=> now(),
        'checked_out_at'=> now()->addMinutes($minutes),
        'user_id'=> $student->id,
        'administrator_id' => auth()->id(),
        'scholar_group_id' => $student->scholar_group_id,
        'laboratory_id' => $laboratory->id,



        ]);
        alert()->success('¡Bienvenido!');

        return redirect()->back();
        

   }

   public function reports (){
   $laboratories=Laboratory::pluck('label', 'id');

   if(!request()->all()){
    return view('laboratories.reports', compact('laboratories'));
   }
    
    $laboratoryVisits=Laboratory::when(request('laboratory_id'), function($query){
            return $query->where('id', request('laboratory_id'));
        })
    ->with(['workshops'=> function($query){
        return $query->whereBetween('checked_in_at', [Carbon::parse(request('start'))->startOfDay(),Carbon::parse(request('end'))->endOfDay()])
        
        ->with('career');


    }])->get();

   return view('laboratories.reports', compact('laboratories', 'laboratoryVisits'));
   }

}
