<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Package;
use App\Models\SubPackage;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Ramsey\Uuid\Uuid;
use Yajra\DataTables\Facades\DataTables;

class PackageController extends Controller
{
    public function index()
    {
        return view('back.pages.package.index', [
            "page" => "package"
        ]);
    }

    public function list_package(Request $request)
    {
        $data = Package::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("best", function($data) {
                $html = $data->best == true ? "Best Seller" : "Biasa";

                return $html;
            })
            ->editColumn("sub", function($data) {
                $html = "";
                foreach ($data->sub as $sub) {
                    $html .= "- $sub->sub <br>";
                }

                return $html;
            })
            ->editColumn("action", function($data) {
                $urlDelete = route("delete-package", ["id" => $data->id]);
                $urlList = route("sub-package", ["id" => $data->id]);
                $html = '<button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deletePackage(\''.$urlDelete.'\')">
                    Delete
                </button>
                <a href="'.$urlList.'" class="btn bg-success btn-rounded btn-sm my-o">List Paket</a>';

                return $html;
            })
            ->rawColumns(["action", "sub"])
            ->make(true);
    }

    public function save_package(Request $request, $id = null)
    {
        DB::beginTransaction();

        try {
            if ($id == null) {
                $id = Uuid::uuid4()->getHex();
            }

            $set = [
                "id" => $id,
                "title" => $request->title,
                "price" => $request->price,
                "best" => $request->best == "on" ? true : false,
            ];

            $detect = Package::find($id);
            if (!$detect) {
                $detect = Package::create($set);
                if (!$detect->save()) {
                    throw new \Exception("Failed to save data");
                }

            } else {
                unset($set["id"]);
                if (!$detect->update($set)) {
                    throw new \Exception("Failed to update data");
                }
            }

            DB::commit();

            return response()->json([
                'alert' => 1,
                'message' => "Update data successfully"
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

    public function show_package($id = null)
    {
        $data = Package::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
            return response()->json([
                'alert' => 1,
                'data' => $data
            ]);
        } catch (\Throwable $th) {
            $message = $th->getMessage();
            return response()->json([
                'alert' => 0,
                'message' => "An error occurred: $message"
            ]);
        }
    }

    public function delete_package($id = null)
    {
        $data = Package::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
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

    public function sub_package($id = null)
    {
        return view('back.pages.package.list', [
            "page" => "package",
            "id_package" => $id
        ]);
    }

    public function list_sub_package(Request $request, $id = null)
    {
        $data = SubPackage::where('id_package', $id)->latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->editColumn("action", function($data) {
                $urlDelete = route("delete-sub-package", ["id" => $data->id]);
                $html = '<button class="btn bg-danger-light btn-rounded btn-sm my-0" onclick="deleteSubPackage(\''.$urlDelete.'\')">
                    Delete
                </button>';

                return $html;
            })
            ->rawColumns(["action"])
            ->make(true);
    }

    public function save_sub_package(Request $request, $id_package = null)
    {
        DB::beginTransaction();

        try {
            $id = Uuid::uuid4()->getHex();
            $set = [
                "id" => $id,
                "id_package" => $id_package,
                "sub" => $request->sub
            ];

            $detect = SubPackage::create($set);
            if (!$detect->save()) {
                throw new \Exception("Failed to save data");
            }

            DB::commit();

            return response()->json([
                'alert' => 1,
                'message' => "Update data successfully"
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

    public function delete_sub_package($id = null)
    {
        $data = SubPackage::find($id);
        if ($data == null || $id == null) {
            abort(404);
        }

        try {
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
