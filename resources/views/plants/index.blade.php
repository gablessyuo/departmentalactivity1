
@extends('layouts.app')

@section('title', 'Plant Inventory')

@section('content')

<div class="page-header">
    <div>
        <h1>Plant Inventory</h1>
        <p>Manage the plants available in the nursery.</p>
    </div>

    <a href="{{ route('plants.create') }}" class="btn">+ Add New Plant</a>
</div>

@if(session('success'))
    <div class="message">{{ session('success') }}</div>
@endif

<div class="panel">
    @if($plants->count() > 0)
        <table>
            <thead>
                <tr>
                    <th>Plant Name</th>
                    <th>Category</th>
                    <th>Unit Price</th>
                    <th>Stock Status</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach($plants as $plant)
                    <tr>
                        <td>{{ $plant->plant_name }}</td>
                        <td>{{ ucfirst($plant->category) }}</td>
                        <td>₱{{ number_format($plant->unit_price, 2) }}</td>
                        <td>
                            @if($plant->stock_status == 'in_stock')
                                <span class="status in-stock">In Stock</span>
                            @else
                                <span class="status out-stock">Out of Stock</span>
                            @endif
                        </td>
                        <td>
                            <div class="actions">
                                <a href="{{ route('plants.show', $plant->id) }}" class="btn btn-small">View</a>
                                <a href="{{ route('plants.edit', $plant->id) }}" class="btn btn-small">Edit</a>

                                <form action="{{ route('plants.destroy', $plant->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this plant?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-small">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No plant records found. Click Add New Plant to get started.</p>
    @endif
</div>

@endsection
