

1. Insert query
  DB::table('students')->insert([
            'name'=>'feroj',
             'email'=>'feroj@gmail.com',
            'age'=>'45',
         ]);

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
## data exists check 

$exists = DB::table('students')->where('id',10)->exists();
if($exists){
    $data = DB::table('students')->where('id', 10)->first();
    dd($data);
}else{
    echo 'The data not exists';
}

2. Show data

   $all_data = DB::table('students')->get();
   echo '<pre>';
   print_r($all_data);
<!-- Show All Data -->
$all_data = DB::table('students')->get();
  foreach ($all_data as $data) {
    echo $data->name.'<br>';
    echo $data->email.'<br>';
    echo $data->age.'<br>';
  }
## see data using condition
 $all_data = DB::table('students')->where('age','>', 40)->get();
  foreach ($all_data as $data) {
    echo $data->name.'<br>';
    echo $data->email.'<br>';
    echo $data->age.'<br>';
  }
## see data for a range (and)
 $all_data = DB::table('students')->where('age','>', 40)->where('age','<', 25)->get();
## see data for a range (or)
 $all_data = DB::table('students')->where('age', 40)->orWhere('age', 45)->get();

## single data
 $single_data = DB::table('students')->where('id',1)->first();
   echo $single_data->name.'<br>';
   echo $single_data->email.'<br>';
   echo $single_data->age;
  
## single data(alternative)
 $single_data = DB::table('students')->find(3);
   echo $single_data->name.'<br>';
   echo $single_data->email.'<br>';
   echo $single_data->age;
  

<!-- update data -->

  public function update(){

    $data =[
        'name'=>'updatedSM',
        'age'=>18,
    ];
    DB::table('students')->where('id', 1)->update($data);
   }


<!-- delete Data -->

public function delete(){
    DB::table('students')->where('id', 1)->delete();
   }

## join two table (students and fees)

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


## Aggregation 

  $total_perosn =  DB::table('persons')->count();
       echo($total_perosn . "<br>");
  
       $total_salary = DB::table('persons')->sum('salary');
       echo($total_salary. "<br>");

       $total_perosn =  DB::table('persons')->avg('salary');
       echo($total_perosn . "<br>");

       $total_perosn =  DB::table('persons')->max('age');
       echo($total_perosn . "<br>");
       
       $total_perosn =  DB::table('persons')->min('age');
       echo($total_perosn . "<br>");

  ## group by with count
  $count =  DB::table('persons')
               ->select('country', DB::raw('COUNT(*) as total_count'))
               ->groupBy('country')
               ->get(); 

            foreach($count as $item){
                $country = $item->country;
                $count = $item->total_count;
                echo 'Country: '.$country.'<br>';
                echo 'Total Persons: '.$count.'<br>';
            }

## Multiple Aggregates 
$count =  DB::table('persons')
               ->select('country', DB::raw('COUNT(*) as total_count'),
                DB::raw('AVG(age) as avg_age'),
                DB::raw('MAX(salary) as max_salary'),
                
                )
               ->groupBy('country')
               ->get(); 

            foreach($count as $item){
                $country = $item->country;
                $count = $item->total_count;
                $avg_age = $item->avg_age;
                $max_salary = $item->max_salary;
                echo 'Country: '.$country.'<br>';
                echo 'Total Persons: '.$count.'<br>';
                echo 'Agerage age: '.$avg_age.'<br>';
                echo 'Max Salary: '.$max_salary.'<br>';
            }


 ## sort 
 $all_data = DB::table('persons')->orderBy('country','asc')->get();

    foreach($all_data as $item){
        echo $item->name.'-';
        echo $item->age.'-';
        echo $item->salary.'-';
        echo $item->country.'<br>';
    }

## wherein
all_data = DB::table('persons')
    ->whereIn('id',[1,2])
    ->get();

    foreach($all_data as $item){
        echo $item->id.'-';
        echo $item->name.'-';
        echo $item->age.'-';
        echo $item->salary.'-';
        echo $item->country.'<br>';
    }

## pluck 

$pluck = DB::table('persons')
    ->pluck('name');
    echo '<pre>';
    print_r($pluck);


## wherenot and #wherenotin
 $all_data = DB::table('persons')
    ->whereNot('country','India')
    ->get();

    foreach($all_data as $item){
        echo $item->id.'-';
        echo $item->name.'-';
        echo $item->age.'-';
        echo $item->salary.'-';
        echo $item->country.'<br>';
    }

## where not in
 $all_data = DB::table('persons')
    ->whereNotIn('country',['India','Bd'])
    ->get();

    foreach($all_data as $item){
        echo $item->id.'-';
        echo $item->name.'-';
        echo $item->age.'-';
        echo $item->salary.'-';
        echo $item->country.'<br>';
    }
## where between

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
$all_data = DB::table('persons')
    ->whereNotBetween('age',['30','50'])
    ->get();

    foreach($all_data as $item){
        echo $item->id.'-';
        echo $item->name.'-';
        echo $item->age.'-';
        echo $item->salary.'-';
        echo $item->country.'<br>';
    }





 




php artisan optimize
php artisan config:clear
php artisan cache:clear
php artisan serve