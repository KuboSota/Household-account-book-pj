<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;


class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Expense::all();
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
        $item = new Expense;
        $item->expense = $request->expense;
        $item->contents = $request->contents;
        $item->save();

        return response()->json([
            'message' => 'Expense created successfully',
            'data' => $item
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        $item = Expense::where('id', $expense->id)->first();
        if ($item) {
            return response()->json([
                'message' => 'OK',
                'data' => $item
            ], 200);
        } else {
            return response()->json([
                'message' => 'Expense not found',
            ], 404);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {
        $item = Expense::where('id', $expense->id)->first();
        $item->expense = $request->expense;
        $item->contents = $request->contents;
        $item->save();
        if ($item) {
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
     * @param  \App\Models\Expense  $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $item = Expense::where('id', $expense->id)->delete();
        if ($item) {
            return response()->json([
                'message' => 'Expense deleted successfully',
            ], 200);
        } else {
            return response()->json([
                'message' => 'Expense not found',
            ], 404);
        }
    }
}
