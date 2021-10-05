<div>
    {{-- livewire view --}}
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
            <tr>
                <td><img height="30px" src="{{ ($user->avatar == 'default.jpg') ? Avatar::create($user->name)->toBase64() : asset('storage/'.$user->avatar)}}" alt="" class="rounded-circle mr-3"><span class="text-primary">{{ $user->name }}</span></td>
                <td>{{ $user->username }}</td>
                <td>{{ $user->email }}</td>
                <td>
                    <button class="btn btn-info">Info</button>    
                    <button class="btn btn-warning">Edit</button>    
                    <button class="btn btn-danger">Delete</button>    
                </td>
            </tr>
            @endforeach

        </tbody>
    </table>
</div>
