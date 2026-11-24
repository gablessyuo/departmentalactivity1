
@extends('layouts.app')

@section('title', 'Plant Details')

@section('content')

<div class="page-header">
    <h1>Plant Details</h1>
    <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back to Inventory</a>
</div>

<div class="panel">
    <div class="detail-row">
        <strong>Plant Name:</strong>
        {{ $plant->plant_name }}
    </div>

    <div class="detail-row">
        <strong>Category:</strong>
        {{ ucfirst($plant->category) }}
    </div>

    <div class="detail-row">
        <strong>Unit Price:</strong>
        ₱{{ number_format($plant->unit_price, 2) }}
    </div>

    <div class="detail-row">
        <strong>Description:</strong>
        {{ $plant->description ?: 'No description provided.' }}
    </div>

    <div class="detail-row">
        <strong>Stock Status:</strong>
        @if($plant->stock_status == 'in_stock')
            <span class="status in-stock">In Stock</span>
        @else
            <span class="status out-stock">Out of Stock</span>
        @endif
    </div>

    <div class="detail-row">
        <strong>Added On:</strong>
        {{ $plant->created_at->format('F d, Y') }}
    </div>

    <br>

    <a href="{{ route('plants.edit', $plant->id) }}" class="btn">Edit Plant</a>
    <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back</a>
</div>

@endsection
