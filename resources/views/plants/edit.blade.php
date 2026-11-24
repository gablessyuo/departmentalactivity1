
@extends('layouts.app')

@section('title', 'Edit Plant')

@section('content')

<div class="page-header">
    <h1>Edit Plant</h1>
    <a href="{{ route('plants.index') }}" class="btn btn-secondary">Back to Inventory</a>
</div>

<div class="panel">
    <form action="{{ route('plants.update', $plant->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label>Plant Name</label>
            <input type="text" name="plant_name" value="{{ old('plant_name', $plant->plant_name) }}">
            @error('plant_name') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Category</label>
            <select name="category">
                @foreach(['ornamental', 'flowering', 'succulent', 'herb'] as $category)
                    <option value="{{ $category }}" {{ old('category', $plant->category) == $category ? 'selected' : '' }}>
                        {{ ucfirst($category) }}
                    </option>
                @endforeach
            </select>
            @error('category') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Unit Price (₱)</label>
            <input type="number" name="unit_price" step="0.01" min="0" value="{{ old('unit_price', $plant->unit_price) }}">
            @error('unit_price') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Description</label>
            <textarea name="description">{{ old('description', $plant->description) }}</textarea>
            @error('description') <div class="error">{{ $message }}</div> @enderror
        </div>

        <div class="form-group">
            <label>Stock Status</label>
            <select name="stock_status">
                <option value="in_stock" {{ old('stock_status', $plant->stock_status) == 'in_stock' ? 'selected' : '' }}>In Stock</option>
                <option value="out_of_stock" {{ old('stock_status', $plant->stock_status) == 'out_of_stock' ? 'selected' : '' }}>Out of Stock</option>
            </select>
            @error('stock_status') <div class="error">{{ $message }}</div> @enderror
        </div>

        <button type="submit" class="btn">Update Plant</button>
        <a href="{{ route('plants.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>

@endsection
