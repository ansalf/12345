<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boards;

class BoardsController extends Controller
{
    // view
    function boards()
    {
        return Boards::all();
    }


    //    add
    function add(Request $req)
    {
        $boards = new Boards;
        $boards->creator_id = $req->input("Creator_Id");
        $boards->name = $req->input("Name");
        $boards->save();
        return $req->input;
    }

    //    get
    function get($id)
    {
        return Boards::find($id);
    }



    //    update
    function update(Request $req, $id)
    {
        $boards = Boards::find($id);
        $boards->creator_id = $req->input("Creator_Id");
        $boards->name = $req->input("Name");
        $boards->save();
        return $req->input;
    }
}
