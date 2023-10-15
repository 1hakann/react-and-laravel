<?php

namespace App\Http\Controllers;

use App\Models\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $expenses = Expense::all();
        return response()->json($expenses);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);

        $expense = Expense::create($request->all());

        return response()->json(['message'=> 'expense created', 'expense' => $expense]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Expense $expense)
    {
        return $expense;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Expense $expense)
    {
        $request->validate([
            'name' => 'required',
            'amount' => 'required',
            'description' => 'required'
        ]);
        $expense->name = $request->name();
        $expense->amount = $request->amount();
        $expense->description = $request->description();
        $expense->save();

        return response()->json([
            'message' => 'expense updated!',
            'expense' => $expense
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        return response()->json(['message' => 'expense deleted']);
    }
}
