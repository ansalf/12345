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
        $boards->board_id = $req->input("Board_List");
        $boards->order = $req->input("Order");
        $boards->task = $req->input("Task");
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
            $boards->board_id = $req->input("Board_List");
            $boards->order = $req->input("Order");
            $boards->task = $req->input("Task");
            $boards->save();
            return $req->input;
        }
    }

