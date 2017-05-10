<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SchoolDay;
use App\Absence;
use App\Student;

class CalendarController extends Controller
{
    public function index(){
    	return view('calendars.index');
    }

    public function saveCalendar(Request $request){
    	$iniSemestre = json_decode($request->iniSemestre, TRUE);
    	$diaEscolar = json_decode($request->diaEscolar, TRUE);
    	$sabadoLetivo = json_decode($request->sabadoLetivo, TRUE);
    	
    	SchoolDay::whereIn('date', $iniSemestre)->where('type', 'LIMITE_SEMESTRE_LETIVO')->delete();
    	foreach ($iniSemestre as $key => $value) {
    		$schoolDay = new SchoolDay();
    		$schoolDay->description = 'INICIO OU FIM DO SEMESTRE LETIVO';
    		$schoolDay->type = 'LIMITE_SEMESTRE_LETIVO';
    		$schoolDay->date = $value;
    		$schoolDay->save();
    	}

    	SchoolDay::whereIn('date', $diaEscolar)->where('type', 'DIA_ESCOLAR')->delete();
    	foreach ($diaEscolar as $key => $value) {
    		$schoolDay = new SchoolDay();
    		$schoolDay->description = 'DIA ESCOLAR';
    		$schoolDay->type = 'DIA_ESCOLAR';
    		$schoolDay->date = $value;
    		$schoolDay->save();
    	}

    	SchoolDay::whereIn('date', $sabadoLetivo)->where('type', 'SABADO_LETIVO')->delete();
    	foreach ($sabadoLetivo as $key => $value) {
    		$schoolDay = new SchoolDay();
    		$schoolDay->description = 'SABADO LETIVO';
    		$schoolDay->type = 'SABADO_LETIVO';
    		$schoolDay->date = $value;
    		$schoolDay->save();
    	}

    }

    public function studentAbsenceIndex($id = NULL){
        if($id != NULL){
            $student = Student::find($id);
            return view('calendars.student_absences', compact('student'));    
        }
    	return view('calendars.student_absences');
    }

    public function saveStudentAbsence(Request $request){
        $faltas['faltasNJ'] = json_decode($request->faltasNJ, TRUE);
        $faltas['atestadosMedicos'] = json_decode($request->atestadosMedicos, TRUE);
        $faltas['faltasJ'] = json_decode($request->faltasJ, TRUE);

        $faltas['paralisacao'] = json_decode($request->paralisacao, TRUE);
        $faltas['greve'] = json_decode($request->greve, TRUE);
        $faltas['intemperie'] = json_decode($request->intemperie, TRUE);
        
        $types = [
            'faltasNJ' => 'F',
            'atestadosMedicos' => 'A',
            'faltasJ' => 'J',
            'paralisacao' => 'P',
            'greve' => 'G',
            'intemperie' => 'I',
        ];        
        foreach ($faltas as $key => $value) {
            Absence::whereIn('date', $value)->where('student_id', $request->student_id)->delete();
            foreach ($value as $k => $v) {
                $absence = new Absence();
                $absence->type = $types[$key];                
                $absence->date = $v;
                $absence->student_id = $request->student_id;
                $absence->save();
            }

        }


    }
    
}
