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
                <td><img src="{{ ($user->avatar == 'default.jpg') ? Avatar::create($user->name)->toBase64() : asset('storage/'.$user->avatar)}}"
                        alt="" class="rounded-circle mr-3 h-3"><span class="text-primary">{{ $user->name }}</span></td>
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
    <div
class="block text-sm text-left text-gray-600 bg-gray-500 bg-opacity-10 h-12 flex items-center p-4 rounded-md"
role="alert"
>
<svg
  xmlns="http://www.w3.org/2000/svg"
  fill="none"
  viewBox="0 0 24 24"
  class="w-6 h-6 mx-2 stroke-current"
>

  <path
    stroke-linecap="round"
    stroke-linejoin="round"
    stroke-width="2"
    d="M18.364 18.364A9 9 0 005.636 5.636m12.728 12.728A9 9 0 015.636 5.636m12.728 12.728L5.636 5.636"
  ></path>

</svg>
This is a default alert—check it out!
</div>
</div>
