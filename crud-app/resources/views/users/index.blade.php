<x-layout>
    <x-slot:title>
        Users
    </x-slot:title>
    <div class="container">
        <h2>Users</h2>
        <button type="button" class="btn btn-primary my-2" onclick="window.location.href='/users/create';">
            Add a User
        </button>
        <ul class="list-group">
            @foreach ($users as $user)
                <li class="list-group-item d-flex justify-content-between align-items-start">
                    <div class="ms-2 me-auto">
                        <div class="fw-bold">{{ $user->name }}</div>
                        {{ $user->email }}
                    </div>
                    <span class="badge">
                        <button type="submit" class="btn btn-primary mx-1"
                            onclick="window.location.href='/users/{{ $user->id }}/edit'">Edit User</button>
                        <form class="d-inline" action="users/{{ $user->id }}" method="POST">
                            @csrf
                            <!-- {{ csrf_field() }} -->
                            <input type="hidden" name="_method" value="DELETE">
                            <button type="submit" class="btn btn-danger"
                                onclick="return confirm('Really delete?');">Delete
                                User</button>
                        </form>
                    </span>
                </li>
            @endforeach
        </ul>
        {{ $users->links() }}
    </div>
</x-layout>
