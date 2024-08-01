<?php

namespace App\Http\Controllers;

use App\Models\Package;
use App\Traits\ImageTrait;
use Illuminate\Http\Request;

class TestController extends Controller
{
    use ImageTrait;
    public function index()
    {

        dd($this->imageUplad("test.jog"));
    }

    public function testORM()
    {
        $data = Package::with('user')->cursorPaginate(15);

        return view('test.test',compact('data'));

        // $packages = Package::all();
        $packages = Package::with('user')->get();

        $startTime = microtime(true);

        foreach($packages as $p){
            echo $p->user->name ." ";
        }

        $endTime = microtime(true);

        $executionTime = $endTime - $startTime;

        dd($executionTime);
        /*
            I-10.635540962219
            I-11.349447011948
            I-10.495640993118
        */

        /*
            II-
            II-
            II-
        */


    }
}
