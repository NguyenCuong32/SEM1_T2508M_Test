<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class apiController extends Controller
{
    public function api(Request $request)
    {
        $type = $request->input("type");

        if ($type == "get_list") {
            $data = [];
            foreach (DB::table("item_sale")->get() as $row) {
                $data[] = [
                    "id" => $row->id,
                    "code" => $row->item_code,
                    "name" => $row->item_name,
                    "quantity" => $row->quantity,
                    "expried_date" => $row->expried_date,
                    "note" => $row->note,
                    "created_at" => $row->created_at,
                ];
            }

            return response()->json([
                "status" => "success",
                "data" => $data
            ]);
        }

        if ($type == "add-new") {
            $item_code = $request->input("item_code");
            $item_name = $request->input("item_name");
            $quantity = $request->input("quantity");
            $expried_date = $request->input("expried_date");
            $note = $request->input("note");

            if (empty($item_code) || empty($item_name) || empty($quantity) || empty($expried_date)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Empty data"
                ]);
            }

            if (!is_numeric($quantity)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Invalid quantity"
                ]);
            }

            if (!preg_match('/^[a-zA-Z0-9_-]+$/', $item_code)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Codes must not contain special characters."
                ]);
            }

            $check = DB::Table("item_sale")->where("item_code", $item_code)->first();
            if ($check) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Item sale already existed."
                ]);
            }

            DB::Table("item_sale")->insert([
                "item_code" => $item_code,
                "item_name" => $item_name,
                "quantity" => $quantity,
                "expried_date" => $expried_date,
                "note" => $note,
                "created_at" => now(),
            ]);

            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "redirect" => "/"
            ]);
        }

        if ($type == "get_item") {
            $id = $request->input("id");

            $check = DB::table("item_sale")->where("id", $id)->first();

            if (!$check) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Item sale not existed.",
                    "redirect" => "/"
                ]);
            }

            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "data" => [
                    "code" => $check->item_code,
                    "name" => $check->item_name,
                    "quantity" => $check->quantity,
                    "expried_date" => $check->expried_date,
                    "note" => $check->note,
                    "created_at" => $check->created_at,
                ]
            ]);
        }

        if ($type == "update-new") {
            $id = $request->input("id");
            $item_code = $request->input("item_code");
            $item_name = $request->input("item_name");
            $quantity = $request->input("quantity");
            $expried_date = $request->input("expried_date");
            $note = $request->input("note");

            if (empty($id) || empty($item_code) || empty($item_name) || empty($quantity) || empty($expried_date)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Empty data"
                ]);
            }

            if (!is_numeric($quantity)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Invalid quantity"
                ]);
            }

            if (!preg_match('/^[a-zA-Z0-9_-]+$/', $item_code)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Codes must not contain special characters."
                ]);
            }

            $check = DB::Table("item_sale")->where("id", $id)->first();
            if (!$check) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Item sale not existed."
                ]);
            }

            DB::Table("item_sale")->where("id", $id)->update([
                "item_code" => $item_code,
                "item_name" => $item_name,
                "quantity" => $quantity,
                "expried_date" => $expried_date,
                "note" => $note,
                "updated_at" => now(),
            ]);

            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "redirect" => "/edit/".$id
            ]);
        }

        if ($type == "del_item") {
            $id = $request->input("id");

            if (empty($id)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Empty data"
                ]);
            }

            if (!is_numeric($id)) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Invalid data"
                ]);
            }

            $check = DB::Table("item_sale")->where("id", $id)->first();
            if (!$check) {
                return response()->json([
                    "status" => "error",
                    "msg" => "Item sale not existed."
                ]);
            }

            DB::Table("item_sale")->delete($id);

            return response()->json([
                "status" => "success",
                "msg" => "Success",
                "redirect" => "/"
            ]);
        }

        return response()->json([
            "status" => "error",
            "msg" => "Error"
        ]);
    }
}
