<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cards;

class CardsController extends Controller
{
    // view
    function cards()
    {
        return Cards::all();
    }


    //    add
    function add(Request $req)
    {
        $cards = new Cards;
        $cards->list_id = $req->input("list_id");
        $cards->order = $req->input("Order");
        $cards->task = $req->input("Task");
        $cards->save();
        return $req->input;
    }

    //    get
    function get($id)
    {
        return Cards::find($id);
    }



    //    update
    function update(Request $req, $id)
    {
        $cards = Cards::find($id);
        $cards->list_id = $req->input("list_id");
        $cards->order = $req->input("Order");
        $cards->task = $req->input("Task");
        $cards->save();
        return $req->input;
    }
}

