<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    public function create(){
        // DB::table('students')->insert([
        //     'name'=>'feroj',
        //     'email'=>'feroj@gmail.com',
        //     'age'=>'45',
        // ]);
        DB::table('students')->insert([
            [
            'name'=>'user-1',
            'email'=>'user-1@gmail.com',
            'age'=>'42',
           ],
            [
            'name'=>'user-2',
            'email'=>'user-2@gmail.com',
            'age'=>'45',
            ],
    ]);
    }
}
