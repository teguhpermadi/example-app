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

    <!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Launch demo modal
  </button>
  
  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          ...
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary">Save changes</button>
        </div>
      </div>
    </div>
  </div>
</div>
