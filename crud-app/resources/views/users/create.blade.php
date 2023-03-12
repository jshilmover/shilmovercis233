@extends('dashboard')

@section('content')
    <div class="container mt-4">

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{ $user ? '/users/' . $user->id : '/users' }}" method="POST">
            @csrf
            <!-- {{ csrf_field() }} -->
            @if (strlen($user->name) > 0)
                <input type="hidden" name="_method" value="PUT">
            @endif
            <div class="mb-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" name='name'
                    value="{{ old('name') ?? $user->name }}" aria-describedby="name">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email:</label>
                <div class="input-group mb-3">
                    <input type="text" class="form-control" id="email" name="email" aria-label="Email"
                        value="{{ old('email') ?? $user->email }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@stop
