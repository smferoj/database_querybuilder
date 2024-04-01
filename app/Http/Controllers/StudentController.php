<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller


{


    // index
   public function index(){
//    $all_data = DB::table('students')->get();
//    echo '<pre>';
//    print_r($all_data);

//=======all data=========
//    $all_data = DB::table('students')->get();
//   foreach ($all_data as $data) {
//     echo $data->name.'<br>';
//     echo $data->email.'<br>';
//     echo $data->age.'<br>';
//   }

  //============where condition======
//    $all_data = DB::table('students')->where('age','=', 45)->get();
//    $all_data = DB::table('students')->where('age','>', 40)->get();
//   foreach ($all_data as $data) {
//     echo $data->name.'<br>';
//     echo $data->email.'<br>';
//     echo $data->age.'<br>';
//   }

  //single data 
//    $single_data = DB::table('students')->where('id',1)->first();
//    echo $single_data->name.'<br>';
//    echo $single_data->email.'<br>';
//    echo $single_data->age;

   // see data existing

   $exists = DB::table('students')->where('id',10)->exists();
if($exists){
    $data = DB::table('students')->where('id', 10)->first();
    dd($data);
}else{
    echo 'The data not exists';
}

   }
    // create 
    // public function create(){
        // ========single data insert====
        // DB::table('students')->insert([
        //     'name'=>'feroj',
        //     'email'=>'feroj@gmail.com',
        //     'age'=>'45',
        // ]);

        // =============multile data inset =======
    //     DB::table('students')->insert([
    //         [
    //         'name'=>'user-1',
    //         'email'=>'user-1@gmail.com',
    //         'age'=>'42',
    //        ],
    //         [
    //         'name'=>'user-2',
    //         'email'=>'user-2@gmail.com',
    //         'age'=>'45',
    //         ],
    // ]);
    // }

    
    
    
    // update

//    public function update(){

//     $data =[
//         'name'=>'updatedSM',
//         'age'=>18,
//     ];
//     DB::table('students')->where('id', 1)->update($data);
//    }

// delete 

// public function delete(){
//     DB::table('students')->where('id', 1)->delete();
//    }
  

// join

public function join(){
   $result = DB::table('students')
    ->join('fees', 'students.id', '=', 'fees.student_id')
    ->select('fees.*', 'students.name', 'students.age')
    ->get();
    // dd($result);
    foreach($result as $item){
        echo $item->name.'<br>';
        echo $item->age.'<br>';
        echo $item->fee_amount.'<br>';
    }
}


    }