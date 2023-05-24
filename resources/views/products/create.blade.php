@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <h1>Create product</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-dark" href="{{ route('admin.products.index') }}">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('admin.products.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="description" class="form-label">Description</label>
                        <input
                            type="text"
                            class="form-control"
                            id="description"
                            name="description"
                            aria-describedby="Description"
                            value="{{ old('description') }}">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Price</label>
                        <input
                            type="number"
                            class="form-control"
                            id="price"
                            name="price"
                            min="1"
                            max="4294967295"
                            value="{{ old('price') }}">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
@endsection
