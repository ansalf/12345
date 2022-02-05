<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Boards;
use Illuminate\Support\Facades\Validator;

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

        // Buat validasi
        $validate = Validator::make($req->all(), [
            "creator_id" => ["required"],
            "name" => ["required"]
        ]);

        // Cek Jika validasi error/field kurang/tidak diisi
        if ($validate->fails()) {

            // Response jika validasi gagal
            return response()->json([
                "status" => "failed",
                "message" => "Invalid field"
            ]);
        }

        // Ambil data user dari passingan middleware tadi udh
        // nama field harus sesuai dgn yg ditentukan dimiddleware
        // disini contoh yg bsa create board cuma creator, admin sm member gabisa, contoh aja ini
        $user = $req->user_data;

        // Auth Multi Level
        // Ini contoh dasar aja, nanti bsa diterapin ke middleware, gini aja udah okeee
        if ($user->role == "creator") {

            // Jika role user yg login adalah creator, maka lakukan create board
            /**
             * Header: response status: 200
             * Body: message: create board success
             */

            $boards = new Boards;
            $boards->creator_id = $req->input("Creator_Id");
            $boards->name = $req->input("Name");
            $boards->save();

            // yg awal gimana?, yg awal sblm di benerno, jd semua cm nambah validator sama response aja kan?
            // iya betul, cma nambah validasi, response, sama auth multi levelkee siapp


            // response jika berhasil create board
            return response()->json([
                "status" => "success",
                "message" => "create board success"
            ]);
        } else {

            // Response jika user yg login tidak memiliki akses untuk create board
            /**
             * Header: response status: 401
             * Body: message: unauthorized user 
             * */

            return response()->json([
                "status" => "gagal/sukses",
                "pesan" => "Data berhasil/gagal diinputkan"
            ]);
        }

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
