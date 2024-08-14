<x-layout>
    <div>
        <form action="{{ route('createContact') }}" method="post" class="w-1/3 p-10">
            @csrf
            <label class="input input-bordered flex items-center gap-2 mb-3">
                Name :
                <input type="text" class="grow" name="name" value=" {{ old('name') }}" required/>
            </label>
            <label class="input input-bordered flex items-center gap-2 mb-3">
                Email :
                <input type="email" class="grow" name="email" value=" {{ old('email') }}" required/>
            </label>
            <label class="input input-bordered flex items-center gap-2 mb-3">
                Phone :
                <input type="text" class="grow" name="phone" value=" {{ old('phone') }}"/>
            </label>
            <label class="input input-bordered flex items-center gap-2 mb-3">
                Address :
                <input type="text" class="grow" name="address" value=" {{ old('address') }}"/>
            </label>
            <button class="btn btn-outline">Create</button>
        </form>

        @if(session('success'))
            <div class="overflow-x-auto">
                <p class="ps-5 text-success">{{session('success')}}</p>
                <table class="table text-center">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Created At</th>
                    </tr>
                    <tr>
                        <td>{{session('id')}}</td>
                        <td>{{session('name')}}</td>
                        <td>{{session('email')}}</td>
                        <td>{{session('phone')}}</td>
                        <td>{{session('address')}}</td>
                        <td>{{session('created')}}</td>
                    </tr>
                </table>
            </div>
        @endif

        @if($errors->any())
            @foreach($errors->all() as $error)
                <p class="text-center text-error mt-5 ps-5">{{$error}}</p>
            @endforeach
        @endif
    </div>
</x-layout>
