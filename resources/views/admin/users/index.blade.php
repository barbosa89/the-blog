@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <h1>Users</h1>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $user)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
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
                                                    href="{{ route('admin.users.edit', $user) }}">
                                                    Edit
                                                </a>
                                            </li>
                                        </ul>
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
                {{ $users->links() }}
            </div>
        </div>
    </div>
@endsection
