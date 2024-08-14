<x-layout>
    <div class="flex items-center justify-between p-5">
        <h1 class=" font-bold text-3xl">All Contacts</h1>
        <div class="flex items-center gap-5">

            <div class="join border-2 border-black-100 ">
                <span class="join-item btn bg-white hover:bg-white border-0 cursor-default">Sort By: </span>
                <a href="{{ route('listContacts', ['sort' => 'name', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}"
                   class="join-item btn">Name</a>
                <a href="{{ route('listContacts', ['sort' => 'created_at', 'direction' => request('direction') === 'asc' ? 'desc' : 'asc']) }}"
                   class="join-item btn">Date</a>
            </div>


            <form action="{{ route('listContacts') }}" method="GET" class="relative w-96">
                <input type="search" name="search" placeholder="Search by name or email..."
                       class="block p-2.5 w-full z-20 text-sm text-gray-900 bg-gray-50 rounded-lg border border-s-gray-50"
                       value="{{ request('search') }}" required/>
                <button type="submit"
                        class="absolute top-0 end-0 p-2.5 px-4 text-sm font-medium h-full text-white bg-blue-700 rounded-e-lg border border-blue-700">
                    <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                         viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                              stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                    <span class="sr-only">Search</span>
                </button>
            </form>
        </div>
    </div>
    <div class="overflow-x-auto">
        <table class="table text-center">
            <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Address</th>
                <th>Updated At</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($contacts as $contact)
                <tr>
                    <td class="font-bold">{{$contact->name}}</td>
                    <td> {{$contact->email}}</td>
                    <td> {{$contact->phone}}</td>
                    <td> {{$contact->address}}</td>
                    <td> {{$contact->updated_at}}</td>
                    <td> {{$contact->created_at}}</td>
                    <td class="space-x-2">
                        <a href="/contacts/{{$contact->id}}" class="link link-info">View</a>
                        <a href="/contacts/{{$contact->id}}/edit" class="link link-info">Edit</a>
                        <form action="/contacts/{{$contact->id}}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button class="link link-error">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        @if(session('success'))
            <p class="text-center text-error mt-5">{{session('success')}}</p>
        @endif
    </div>
</x-layout>
