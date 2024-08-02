<x-layout>
    <div>
        <a href="/contacts/create">Create New Contact</a>

        <form action="{{ route('listContacts') }}" method="GET">
            <input type="text" name="search" placeholder="Search by name or email" value="{{ request('search') }}">
            <button type="submit">Search</button>
        </form>

        <table>
            <tr>
                <th>
                    <a href="{{ route('listContacts', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">Name</a>
                </th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>
                    <a href="{{ route('listContacts', ['sort' => 'created_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}">Created
                        At</a>
                </th>
                <th>Actions</th>
            </tr>
            @foreach ($contacts as $contact)
                <tr>
                    <td> {{$contact->name}}</td>
                    <td> {{$contact->email}}</td>
                    <td> {{$contact->phone}}</td>
                    <td> {{$contact->address}}</td>
                    <td> {{$contact->created_at}}</td>
                    <td>
                        <a href="/contacts/{{$contact->id}}">View</a>
                        <a href="/contacts/{{$contact->id}}/edit">Edit</a>
                        <form action="/contacts/{{$contact->id}}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button>Delete</button>
                        </form>
                    </td>
                    @endforeach
                </tr>
        </table>
        @if(session('success'))
            <p>{{session('success')}}</p>
        @endif
    </div>
</x-layout>
