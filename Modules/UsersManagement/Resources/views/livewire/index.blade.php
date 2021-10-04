<div>
    {{-- livewire view --}}
    <table class="table table-hover">
        <thead>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if ($users)
                @foreach ($users as $user)
                <tr>
                    <td><img class="rounded-circle mr-3" src="{{ ($user->avatar == 'default.jpg') ? Avatar::create($user->name)->toBase64() : asset('storage/'.$user->avatar)}}" alt="" height="30px"><span class="text-primary">{{ $user->username }}</span></td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <button class="btn btn-info">Info</button>
                        <button class="btn btn-warning">Edit</button>
                        <button class="btn btn-danger">Disable</button>
                    </td>
                </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">Data Kosong</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>

@push('scripts-livewire')

@endpush