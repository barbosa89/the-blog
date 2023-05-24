@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <h1>Products</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-dark" href="{{ route('admin.products.create') }}">Create</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Description</th>
                            <th scope="col">Price</th>
                            <th scope="col">Date</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->price }}</td>
                                <td>{{ $product->created_at }}</td>
                                <td>
                                    <div class="dropdown">
                                        <button
                                            class="btn btn-ligth dropdown-toggle custom-dropdown-toggle"
                                            type="button"
                                            id="dropdownMenuButton{{ $loop->iteration }}"
                                            data-bs-toggle="dropdown"
                                            aria-expanded="false">
                                            <em class="bi bi-three-dots" style="font-size: 1.5rem;"></em>
                                        </button>

                                        <ul
                                            class="dropdown-menu"
                                            aria-labelledby="dropdownMenuButton{{ $loop->iteration }}">
                                            <li>
                                                <a
                                                    class="dropdown-item"
                                                    href="{{ route('admin.products.show', $product) }}">
                                                    Show
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    class="dropdown-item"
                                                    href="{{ route('admin.products.edit', $product) }}">
                                                    Edit
                                                </a>
                                            </li>
                                            <li>
                                                <a
                                                    href="#"
                                                    class="dropdown-item"
                                                    data-bs-toggle="modal"
                                                    data-bs-target="#destroyModal{{ $loop->iteration }}">
                                                    Delete
                                                </a>
                                            </li>
                                        </ul>
                                        <x-destroy-modal
                                            :id="$loop->iteration"
                                            :route="route('admin.products.destroy', $product)">
                                        </x-destroy-modal>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="row mb-4">
            <div class="col">
                {{ $products->links() }}
            </div>
        </div>
    </div>
@endsection
