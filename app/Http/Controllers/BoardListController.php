<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Board_list;

class BoardListController extends Controller
{

    // view
   function board_List()
   {
    return Board_List::all();
   }


//    add
   function add(Request $req)
   {
       $board_list = new Board_List;
       $board_list->board_id=$req->input("Board_id");
       $board_list->order=$req->input("Order");
       $board_list->name=$req->input("Name");
       $board_list-> save();
       return $req->input;
   }

    //    get
       function get($id)
       {
           return Board_List::find($id);
       }



    //    update
       function update(Request $req, $id)
       {
        $board_List = Board_List::find($id);
        $board_List->board_id=$req->input("Board_id");
        $board_List->order=$req->input("Order");
        $board_List->name=$req->input("Name");
        $board_List-> save();
        return $req->input;
       }

   }
