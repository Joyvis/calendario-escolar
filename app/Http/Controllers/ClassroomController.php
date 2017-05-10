<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\SchoolDay;
use DB;
class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $classrooms = Classroom::paginate(10);
        return view('classrooms.index', compact('classrooms'));   
    }

   /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('classrooms.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'year' => 'required'           
        ]);


        $classroom = new Classroom;

        $classroom->name = $request->input('name');
        $classroom->year = $request->input('year');                
        $classroom->save();        

        return redirect()->action('ClassroomController@index')->with('message', 'Turma cadastrado com sucesso!');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('classrooms.show', ['classroom' => Classroom::find($id)]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $classroom = Classroom::findOrFail($id);

        return view('classrooms.edit', compact('classroom'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required',            
        ]);

        $classroom = Classroom::find($id);

        $classroom->name = $request->input('name');
        $classroom->year = $request->input('year');

        $classroom->save();        

        return redirect()->action('ClassroomController@index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $classroom = Classroom::findOrFail($id);
        $classroom->delete();

        return redirect()->route('classroom.index')->with('message', 'Turma removido com sucesso!');
    }

    public function reportAbsences(Request $request){
        if(isset($request->month) && isset($request->classroom_id) ){
            $schoolDays = SchoolDay::where(DB::raw('YEAR(date)'), date('Y'))->where(DB::raw('MONTH(date)'), $request->month)->get();
            $classroom = Classroom::find($request->classroom_id);
            $month = $request->month;

            $months = [
                "" => 'SELECIONE UM MÊS',
                "1" => 'Janeiro',
                "2" => 'Fevereiro',
                "3" => 'Março',
                "4" => 'Abril',
                "5" => 'Maio',
                "6" => 'Junho',
                "7" => 'Julho',
                "8" => 'Agosto',
                "9" => 'Setembro',
                "10" => '>Outubro',
                "11" => '>Novembro',
                "12" => '>Dezembro',
            ];

            return view('classrooms.reports.absences', compact('schoolDays', 'classroom', 'month', 'months'));
        }
        return view('classrooms.reports.absences');
    }
}
