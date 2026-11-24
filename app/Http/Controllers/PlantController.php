<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('plants.index', compact('plants'));
    }

    public function create()
    {
        return view('plants.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'plant_name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'unit_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'stock_status' => 'required|in:in_stock,out_of_stock',
        ]);

        Plant::create([
            'user_id' => Auth::id(),
            'plant_name' => $request->plant_name,
            'category' => $request->category,
            'unit_price' => $request->unit_price,
            'description' => $request->description,
            'stock_status' => $request->stock_status,
        ]);

        return redirect()->route('plants.index')
            ->with('success', 'Plant added successfully.');
    }

    public function show(Plant $plant)
    {
        $this->authorizePlant($plant);

        return view('plants.show', compact('plant'));
    }

    public function edit(Plant $plant)
    {
        $this->authorizePlant($plant);

        return view('plants.edit', compact('plant'));
    }

    public function update(Request $request, Plant $plant)
    {
        $this->authorizePlant($plant);

        $request->validate([
            'plant_name' => 'required|string|max:255',
            'category' => 'required|string|max:100',
            'unit_price' => 'required|numeric|min:0',
            'description' => 'nullable|string',
            'stock_status' => 'required|in:in_stock,out_of_stock',
        ]);

        $plant->update($request->only([
            'plant_name',
            'category',
            'unit_price',
            'description',
            'stock_status',
        ]));

        return redirect()->route('plants.index')
            ->with('success', 'Plant updated successfully.');
    }

    public function destroy(Plant $plant)
    {
        $this->authorizePlant($plant);

        $plant->delete();

        return redirect()->route('plants.index')
            ->with('success', 'Plant deleted successfully.');
    }

    private function authorizePlant(Plant $plant)
    {
        abort_unless($plant->user_id === Auth::id(), 403);
    }
}
