<?php

namespace App\Http\Controllers;

use App\Models\Ability;
use App\Models\Message;
use App\Models\Package;
use App\Models\Projects;
use App\Models\Testimoni;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;

class FrontController extends Controller
{
    public function index()
    {
        return view('index', [
            "user" => User::first(),
            "ability" => Ability::get(),
            "projects" => Projects::get(),
            "testimoni" => Testimoni::get(),
            "package" => Package::get()
        ]);
    }

    public function message(Request $request)
    {
        DB::beginTransaction();

        try {
            $set = [
                "id" => Uuid::uuid4()->getHex(),
                "name" => $request->name,
                "whatsapp" => $request->whatsapp,
                "needed" => $request->needed,
                "model" => $request->model,
                "floor" => $request->floor,
                "message" => $request->message,
                "read" => false,
            ];

            $data = Message::create($set);

            if (!$data->save()) {
                throw new \Exception("Gagal mengirim pesan");
            }

            DB::commit();

            return response()->json([
                'alert' => 1,
                'message' => "Berhasil mengirim pesan"
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "Terjadi kesalahan: $message"
            ]);
        }
    }
}
