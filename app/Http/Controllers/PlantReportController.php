<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Plant;
use Illuminate\Support\Facades\Auth;

class PlantReportController extends Controller
{
    public function index(Request $request)
    {
        $query = Plant::where('user_id', Auth::id());

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->stock_status) {
            $query->where('stock_status', $request->stock_status);
        }

        $plants = $query->latest()->get();

        $categories = Plant::where('user_id', Auth::id())
            ->select('category')
            ->distinct()
            ->pluck('category');

        $totalPlants = Plant::where('user_id', Auth::id())->count();

        $inStock = Plant::where('user_id', Auth::id())
            ->where('stock_status', 'in_stock')
            ->count();

        $outOfStock = Plant::where('user_id', Auth::id())
            ->where('stock_status', 'out_of_stock')
            ->count();

        return view('reports.index', compact(
            'plants',
            'categories',
            'totalPlants',
            'inStock',
            'outOfStock'
        ));
    }

    public function print(Request $request)
    {
        $plants = $this->getFilteredPlants($request)->get();

        return view('reports.print', compact('plants'));
    }

    public function excel(Request $request)
    {
        $plants = $this->getFilteredPlants($request)->get();

        $filename = 'plant-report.csv';

        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => "attachment; filename=\"$filename\"",
        ];

        $callback = function () use ($plants) {
            $file = fopen('php://output', 'w');

            fputcsv($file, ['Plant Name', 'Category', 'Unit Price', 'Description', 'Stock Status']);

            foreach ($plants as $plant) {
                fputcsv($file, [
                    $plant->plant_name,
                    $plant->category,
                    $plant->unit_price,
                    $plant->description,
                    $plant->stock_status
                ]);
            }

            fclose($file);
        };

        return response()->stream($callback, 200, $headers);
    }

    private function getFilteredPlants(Request $request)
    {
        $query = Plant::where('user_id', Auth::id());

        if ($request->category) {
            $query->where('category', $request->category);
        }

        if ($request->stock_status) {
            $query->where('stock_status', $request->stock_status);
        }

        return $query->latest();
    }
}
