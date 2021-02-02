<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class RegisterController extends Controller
{
    public function post(Request $request)
    {
        $now = Carbon::now();
        $hashed_password = Hash::make($request->password);
        // $param = [
        //     "name" => $request->name,
        //     "email" => $request->email,
        //     "password" => $hashed_password,
        //     "created_at" => $now,
        //     "update_at" => $now
        // ];
        // DB::table('users')->insert($param);
        $item = new User;
        $item->name = $request->name;
        $item->email = $request->email;
        $item->password = $hashed_password;
        $item->timestamps = false;
        // $item->created_at = $now;
        // $item->update_at = $now;
        $item->save();

        return response()->json([
            'message' => 'User created successfully',
            'data' => $item
        ], 200);
    }
}
