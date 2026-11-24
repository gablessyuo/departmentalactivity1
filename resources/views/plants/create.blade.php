
@extends('layouts.app')

@section('title', 'Add Plant')

@section('content')

<div class="page-header">
    <h1>Add New Plant</h1>
    <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back to Inventory</a>
</div>

<div class="panel">
    <form action="{{ route('plants.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label>Plant Name</label>
            <input type="text" name="plant_name" value="{{ old('plant_name') }}" placeholder="Enter plant name">
            @error('plant_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category">
                <option value="">Select Category</option>
                @foreach(['ornamental', 'flowering', 'succulent', 'herb'] as $category)
                    <option value="{{ $category }}" {{ old('category') == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
            @error('category') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Unit Price (₱)</label>
            <input type="number" name="unit_price" step="0.01" min="0" value="{{ old('unit_price') }}" placeholder="Enter price">
            @error('unit_price') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description" placeholder="Enter plant description">{{ old('description') }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Stock Status</label>
            <select name="stock_status">
                <option value="in_stock" {{ old('stock_status', 'in_stock') == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out_of_stock" {{ old('stock_status') == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
            @error('stock_status') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Save Plant</button>
        <a href="{{ route('plants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
