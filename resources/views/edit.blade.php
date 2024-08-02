<x-layout>
    <div>
        <form action="{{ route('updateContact', $users[0]->id) }}" method="post">
            @csrf
            @method('PUT')
            <div>
                <label for="name">Name</label>
                <input type="text" name="name" id="name" value="{{ old("name", $users[0]->name ?? "") }}" required>
            </div>
            <div>
                <label for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ old("email", $users[0]->email ?? "") }}" required>
            </div>
            <div>
                <label for="phone">Phone</label>
                <input type="text" name="phone" id="phone" value="{{ old("phone", $users[0]->phone ?? "") }}">
            </div>
            <div>
                <label for="address">Address</label>
                <input type="text" name="address" id="address" value="{{ old("address", $users[0]->address ?? "") }}">
            </div>
            <button type="submit">Submit</button>
        </form>

        @if(session('success'))
            <p>{{session('success')}}</p> <br>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Updated At</th>
                </tr>
                <tr>
                    <td>{{session('id')}}</td>
                    <td>{{session('name')}}</td>
                    <td>{{session('email')}}</td>
                    <td>{{session('phone')}}</td>
                    <td>{{session('address')}}</td>
                    <td>{{session('updated')}}</td>
                </tr>
            </table>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        @endif
    </div>
</x-layout>
