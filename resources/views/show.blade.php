<x-layout>
    <div class="overflow-x-auto">
        <table class="table text-center">
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
            @foreach ($users as $user)
                <tr>
                    <td class="font-bold">{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>
                    <td>{{$user->address}}</td>
                    <td>{{$user->created_at}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td class="space-x-2">
                        <a href="/contacts/{{$user->id}}/edit" class="link link-info">Edit</a>
                        <form action="/contacts/{{$user->id}}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="link link-error">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>

        @if(session('success'))
            <p class="text-center text-error mt-5">{{session('success')}}</p>
        @endif
    </div>
</x-layout>
