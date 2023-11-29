<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    public function index()
    {
        return view('back.pages.profile.index', [
            "page" => "Profile"
        ]);
    }

    public function save_profile(Request $request)
    {
        DB::beginTransaction();

        try {
            $data = User::find(Auth::user()->id);
            $data->name = $request->name;
            $data->username = $request->username;
            $data->phone = $request->phone;
            $data->address = $request->address;

            if ($request->file('photo')) {
                $file = $request->file('photo');
                $filename = rand(10000, 99999).date('YmdHi').".".$file->getClientOriginalName();
                $file->move(public_path('back/assets/images/user/'), $filename);

                $oldPhoto = public_path($data->photo);
                if (File::exists($oldPhoto)) {
                    File::delete($oldPhoto);
                }

                $data->photo = "back/assets/images/user/".$filename;
            }

            if (!$data->update()) {
                throw new \Exception("Failed to update data");
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

    public function change_pass(Request $request)
    {
        try {
            $data = User::find(Auth::user()->id);

            if (!Hash::check($request->current_password, $data->password)) {
                throw new \Exception("current password entered is incorrect");
            }

            if ($request->new_password != $request->retype) {
                throw new \Exception("The new password does not match");
            }

            $data->password = Hash::make($request->new_password);

            if (!$data->update()) {
                throw new \Exception("Failed to update data");
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

}
