<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\Http\Response;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function Search($name)
    {
          $customers= new User;
          $customers=User::select("fname", "lname")
          ->orWhere(DB::raw("concat(fname, ' ', lname)"), 'LIKE', "%".$name."%")
          ->get();
    //$searchName =  User::where('fname','LIKE','%'.$name.'%')
    //               ->orWhere('lname','LIKE')->get(); //we have to change $name to $fname and concate $lname
    
    if(count($customers))
    {
        return Response([
            'data' => $customers
        ]);
    }
    else
    {
        return Response(['meassage' => "No Data Found"],404);
    }
  
    }
}
