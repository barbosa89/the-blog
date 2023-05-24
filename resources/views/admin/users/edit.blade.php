@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row mb-4">
            <div class="col-6">
                <h1>Edit user #{{ $user->id }}</h1>
            </div>
            <div class="col-6 text-end">
                <a class="btn btn-dark" href="{{ route('admin.users.index') }}">Back</a>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <form action="{{ route('admin.users.update', $user) }}" method="POST">
                    @csrf
                    @method('PATCH')

                    @foreach ($permissions->chunk(4) as $chunked)
                        <div class="row mb-4">
                            @foreach ($chunked as $group => $permissions)
                                <div class="col-3">
                                    <h4>{{ trans($group . '.titles.module') }}</h4>
                                    @foreach($permissions as $permission)
                                        <div class="form-check">
                                            <input class="form-check-input"
                                                type="checkbox"
                                                name="permissions[]"
                                                value="{{ $permission->id }}"
                                                @checked($user->permissions->contains($permission))>
                                            <label class="form-check-label" for="flexCheckDefault">
                                                {{ trans($group . '.actions.' . explode('.', $permission->name)[1]) }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            @endforeach
                        </div>
                    @endforeach

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>
@endsection
