@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <h1>Product # {{ $product->id }}</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-dark" href="{{ route('admin.products.index') }}">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $product->description }}</h5>
                        <p class="card-text">
                            Price: {{ $product->price }}
                        </p>
                        <a href="{{ route('admin.products.edit', $product) }}" class="card-link">Edit</a>
                        <a
                            href="#"
                            class="card-link"
                            data-bs-toggle="modal"
                            data-bs-target="#destroyModal{{ $product->id }}">
                            Delete
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <x-destroy-modal
            :id="$product->id"
            :route="route('admin.products.destroy', $product)">
        </x-destroy-modal>
    </div>
@endsection
