<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board_Members;

class BoardMemberController extends Controller
{

    // view
    function board_Members()
    {
        return Board_Members::all();
    }


    //    add
    function add(Request $req)
    {
        $board_Members = new Board_Members;
        $board_Members->board_id = $req->input("board_Members");
        $board_Members->user_id = $req->input("user_id");
        $board_Members->save();
        return $req->input;
    }

    //    get
    function get($id)
    {
        return Board_Members::find($id);
    }



    //    update
    function update(Request $req, $id)
    {
        $board_Members = Board_Members::find($id);
        $board_Members->board_id = $req->input("board_Members");
        $board_Members->user_id = $req->input("user_id");
        $board_Members->save();
        return $req->input;
    }
}
