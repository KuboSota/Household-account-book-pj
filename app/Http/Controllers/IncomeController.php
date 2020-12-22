<?php

namespace App\Http\Controllers;

use App\Models\income;
use Illuminate\Http\Request;


class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Income::all();
        return response()->json([
            'message' => 'Ok',
            'data' => $items
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new Income;
        $item->income = $request->income;
        $item->contents = $request->contents;
        $item->save();

        return response()->json([
            'message' => 'Income created successfully',
            'data' =>$item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function show(income $income)
    {
        $item = Income::where('id', $income->id)->first();
        if ($item) {
            return response()->json([
                'message' => 'OK',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Income not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Income  $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {
        $item = Income::where('id', $income->id)->first();
        $item->income = $request->income;
        $item->contents = $request->contents;
        $item->save();
        if($item) {
            return response()->json([
                'message' => 'Update successfully'
            ], 200);
        } else {
            return response()->json([
                'message' => 'Not found'
            ], 404);
        }

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\income  $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(income $income)
    {
        $item = Income::where('id', $income->id)->delete();
        if($item) {
            return response()->json([
                'message' => 'Income deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Income not found',
            ], 404);
        }
    }
}
