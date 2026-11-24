
@extends('layouts.app')

@section('title', 'Plant Reports')

@section('content')

<div class="page-header">
    <h1>Plant Reports</h1>
</div>

<div style="display:grid; grid-template-columns:repeat(auto-fit,minmax(200px,1fr)); gap:18px; margin-bottom:25px;">

    <div class="panel">
        <h3>Total Plants</h3>
        <h1 style="color:#315c3b;">{{ $totalPlants }}</h1>
    </div>

    <div class="panel">
        <h3>In Stock</h3>
        <h1 style="color:green;">{{ $inStock }}</h1>
    </div>

    <div class="panel">
        <h3>Out of Stock</h3>
        <h1 style="color:#b84343;">{{ $outOfStock }}</h1>
    </div>

</div>

<div class="panel" style="margin-bottom:20px;">

    <h3 style="color:#315c3b; margin-bottom:15px;">Filter Plant Records</h3>

    <form method="GET" action="{{ route('reports.plants') }}" style="display:flex; gap:15px; flex-wrap:wrap; align-items:end;">

        <div style="flex:1; min-width:180px;">
            <label>Category</label>
            <select name="category">
                <option value="">All Categories</option>
                @foreach($categories as $category)
                    <option value="{{ $category }}" {{ request('category') == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
        </div>

        <div style="flex:1; min-width:180px;">
            <label>Stock Status</label>
            <select name="stock_status">
                <option value="">All Status</option>
                <option value="in_stock" {{ request('stock_status') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out_of_stock" {{ request('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
        </div>

        <button type="submit" class="btn">Apply Filter</button>
        <a href="{{ route('reports.plants') }}" class="btn btn-secondary">Reset</a>

    </form>

</div>

<div style="margin-bottom:20px; display:flex; gap:10px; flex-wrap:wrap;">

    <a href="{{ route('reports.plants.print', request()->query()) }}" target="_blank" class="btn">
        Print / Save as PDF
    </a>

    <a href="{{ route('reports.plants.excel', request()->query()) }}" class="btn">
        Export to Excel
    </a>

</div>

<div class="panel">

    <h2 style="color:#315c3b;">Plant Inventory Report</h2>

    <p>Total Records: {{ $plants->count() }}</p>

    <table>
        <thead>
            <tr>
                <th>Plant Name</th>
                <th>Category</th>
                <th>Unit Price</th>
                <th>Description</th>
                <th>Stock Status</th>
            </tr>
        </thead>

        <tbody>
            @forelse($plants as $plant)
                <tr>
                    <td>{{ $plant->plant_name }}</td>
                    <td>{{ ucfirst($plant->category) }}</td>
                    <td>PHP {{ number_format($plant->unit_price, 2) }}</td>
                    <td>{{ $plant->description }}</td>
                    <td>
                        @if($plant->stock_status == 'in_stock')
                            <span class="status in-stock">In Stock</span>
                        @else
                            <span class="status out-stock">Out of Stock</span>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align:center;">
                        No plant records found.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>

@endsection
