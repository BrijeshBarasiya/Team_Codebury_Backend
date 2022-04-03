<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Facade\FlareClient\Http\Response;

class SearchController extends Controller
{
    public function Search($name)
    {
    
    $searchName =  User::where('name','LIKE','%'.$name.'%')->get(); //we have to change $name to $fname and concate $lname
    if(count($searchName))
    {
        return Response([
            'data' => $searchName
        ]);
    }
    else
    {
        return Response(['meassage' => "No Data Found"],404);
    }
  
    }
}
