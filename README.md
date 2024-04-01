

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






   
php artisan optimize
php artisan config:clear
php artisan cache:clear
php artisan serve