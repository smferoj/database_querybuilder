<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PersonController extends Controller
{
    public function index(){
    //    $total_perosn =  DB::table('persons')->count();
    //    echo($total_perosn . "<br>");
  
    //    $total_salary = DB::table('persons')->sum('salary');
    //    echo($total_salary. "<br>");

    //    $total_perosn =  DB::table('persons')->avg('salary');
    //    echo($total_perosn . "<br>");

    //    $total_perosn =  DB::table('persons')->max('age');
    //    echo($total_perosn . "<br>");

    //    $total_perosn =  DB::table('persons')->min('age');
    //    echo($total_perosn . "<br>");

    //  =============group By with count========

    //    $count =  DB::table('persons')
    //            ->select('country', DB::raw('COUNT(*) as total_count'))
    //            ->groupBy('country')
    //            ->get(); 

    //         foreach($count as $item){
    //             $country = $item->country;
    //             $count = $item->total_count;
    //             echo 'Country: '.$country.'<br>';
    //             echo 'Total Persons: '.$count.'<br>';
    //         }


    //    $count =  DB::table('persons')
    //            ->select('country', DB::raw('COUNT(*) as total_count'),
    //             DB::raw('AVG(age) as avg_age'),
    //             DB::raw('MAX(salary) as max_salary'),
                
    //             )
    //            ->groupBy('country')
    //            ->get(); 

    //         foreach($count as $item){
    //             $country = $item->country;
    //             $count = $item->total_count;
    //             $avg_age = $item->avg_age;
    //             $max_salary = $item->max_salary;
    //             echo 'Country: '.$country.'<br>';
    //             echo 'Total Persons: '.$count.'<br>';
    //             echo 'Agerage age: '.$avg_age.'<br>';
    //             echo 'Max Salary: '.$max_salary.'<br>';
    //         }

             

    // ==========sort=========

    // $all_data = DB::table('persons')->orderBy('country','asc')->get();

    // foreach($all_data as $item){
    //     echo $item->name.'-';
    //     echo $item->age.'-';
    //     echo $item->salary.'-';
    //     echo $item->country.'<br>';
    // }

    // =============wherein============


    // $all_data = DB::table('persons')
    // ->whereIn('id',[1,2])
    // ->get();

    // foreach($all_data as $item){
    //     echo $item->id.'-';
    //     echo $item->name.'-';
    //     echo $item->age.'-';
    //     echo $item->salary.'-';
    //     echo $item->country.'<br>';
    // }

    // ============pluck======
    // $pluck = DB::table('persons')
    // ->pluck('name');
    // echo '<pre>';
    // print_r($pluck);
        
    // ============where not in=====

    // $all_data = DB::table('persons')
    // ->whereNot('country','India')
    // ->get();

    // foreach($all_data as $item){
    //     echo $item->id.'-';
    //     echo $item->name.'-';
    //     echo $item->age.'-';
    //     echo $item->salary.'-';
    //     echo $item->country.'<br>';
    // }

    // $all_data = DB::table('persons')
    // ->whereNotIn('country',['India','Bd'])
    // ->get();

    // foreach($all_data as $item){
    //     echo $item->id.'-';
    //     echo $item->name.'-';
    //     echo $item->age.'-';
    //     echo $item->salary.'-';
    //     echo $item->country.'<br>';
    // }

    //==========where between  and where not between======
  $all_data = DB::table('persons')
    ->whereBetween('age',['30','50'])
    ->get();

    foreach($all_data as $item){
        echo $item->id.'-';
        echo $item->name.'-';
        echo $item->age.'-';
        echo $item->salary.'-';
        echo $item->country.'<br>';
    }



    }
}
