<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function index()
    {
        $data = Message::where('trash', false)->latest()->get();
        $star = Message::where('star', true)->where('trash', false)->latest()->get();
        $trash = Message::where('trash', true)->latest()->get();

        return view('back.pages.message.index', [
            "page" => "message",
            "datas" => $data,
            "stars" => $star,
            "trash" => $trash,
        ]);
    }

    public function read($id = null)
    {
        DB::beginTransaction();

        try {
            $data = Message::find($id);
            $data->read = true;
            $data->update();

            DB::commit();

            return view('back.pages.message.read', [
                "page" => "message",
                "data" => $data
            ]);

        } catch (\Throwable $th) {
            abort(404);
        }
    }

    public function star($id = null)
    {
        DB::beginTransaction();

        try {
            $data = Message::find($id);
            $data->star = $data->star == false ? true : false;
            $data->update();

            DB::commit();

            return redirect()->route('message');

        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred: $message"
            ]);
        }
    }

    public function trash($id = null)
    {
        DB::beginTransaction();

        try {
            $data = Message::find($id);
            $data->trash = true;
            $data->update();

            DB::commit();

            return redirect()->route('message');

        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred: $message"
            ]);
        }
    }
}
