<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class TestimoniController extends Controller
{
    public function index()
    {
        return view('back.pages.testimoni.index', [
            "page" => "testimoni"
        ]);
    }

    public function list_testimoni(Request $request)
    {
        $data = Testimoni::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("photo", function($data) {
                $photo = '<img src='.$data->photo.' width="200">';

                return $photo;
            })
            ->editColumn("action", function($data) {
                $urlDelete = route("delete-testimoni", ["id" => $data->id]);
                $html = '<button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteTestimoni(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action", "photo"])
            ->make(true);
    }

    public function save_testimoni(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            $id = Uuid::uuid4()->getHex();

            $file = $request->file('photo');

            if ($file->extension() != "jpg" && $file->extension() != "png" && $file->extension() != "jpeg") {
                throw new \Exception("File Extension tidak didukung");
            }

            $filename = rand(10000, 99999).date('YmdHi').".".$file->extension();
            $file->move(public_path('back/assets/images/testimoni/'), $filename);

            $photo = "back/assets/images/testimoni/".$filename;

            $set = [
                "id" => $id,
                "photo" => $photo
            ];

            $detect = Testimoni::create($set);
            if (!$detect->save()) {
                throw new \Exception("Failed to save data");
            }

            DB::commit();

            return response()->json([
                'alert' => 1,
                'message' => "Insert data successfully"
            ]);

        } catch (\Throwable $th) {
            DB::rollBack();
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred in saving data: $message"
            ]);
        }
    }

    public function delete_testimoni($id = null)
    {
        $data = Testimoni::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
            if (File::exists($data->photo)) {
                File::delete($data->photo);
            }

            if (!$data->delete()) {
                throw new \Exception("Failed to delete data");
            }

            return response()->json([
                'alert' => 1,
                'message' => "Delete data successfully"
            ]);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred: $message"
            ]);
        }
    }
}
