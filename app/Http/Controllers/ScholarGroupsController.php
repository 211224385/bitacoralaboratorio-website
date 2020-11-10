<?php

namespace App\Http\Controllers;

use App\Models\Career;
use App\Models\ScholarGroup;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ScholarGroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scholargroups = scholargroup::all();

        return view('scholargroups.index', compact('scholargroups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $careers=Career::pluck('label' ,'id');

        return view('scholargroups.create', compact('careers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $data=request()->validate([
        'grade' => 'required',
        'start' => 'required',
        'end' => 'required',
        'career_id' => ['required',]
    ]);


      ScholarGroup::create($data);

        return redirect()->route('scholargroups.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(scholargroup $scholargroup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit(scholargroup $scholargroup)
    {
        $careers=Career::pluck('label' ,'id');
        $students=User::where('role_id', User::STUDENT)->pluck('code', 'id');
        return view('scholargroups.edit', compact('scholargroup', 'careers', 'students'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, scholargroup $scholargroup)

    {
        $data=request()->validate([
        'grade' => 'required',
        'start' => 'required',
        'end' => 'required',
        'career_id' => ['required',]

    ]);

   
        $scholargroup->update ($data);
         return redirect()->route('scholargroups.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Career  $career
     * @return \Illuminate\Http\Response
     */
    
    public function destroy(scholargroup $scholargroup)
{
                
        $scholargroup->delete();

        return redirect()->route('scholargroups.index');
    }  

    public function storeStudent(ScholarGroup $scholarGroup)
    {
        $student=User::find(request('student_id'));

        $student->scholar_group_id=$scholarGroup->id;

        $student->save();

        return redirect ()->back();


    }

     public function destroyStudent(ScholarGroup $scholarGroup)
    {
        $student=User::find(request('student_id'));

        $student->scholar_group_id=null;

        $student->save();

        return redirect ()->back();


    }
}
