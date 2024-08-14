<?php

    namespace App\Http\Controllers;

    use App\Http\Controllers\Controller;
    use Illuminate\Http\Request;
    use Illuminate\Support\Facades\DB;
    use Illuminate\Support\Facades\Validator;

    class ContactController extends Controller {
        public function list(Request $request) {
            $query = DB::table('contacts');

            if ($request->has('search')) {
                $search = $request->input('search');
                $query->where('name', 'LIKE', "%{$search}%")
                    ->orWhere('email', 'LIKE', "%{$search}%");
            }

            if ($request->has('sort')) {
                $sort = $request->input('sort');
                $query->orderBy($sort, $request->input('direction', 'asc'));
            }

            $contacts = $query->get();
            return view('index', compact('contacts'));
        }

        function store(Request $request) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|unique:contacts,email'
            ]);

            if ($validator->fails()) {
                return redirect('/contacts/create')
                    ->withErrors($validator)
                    ->withInput();
            }

            DB::table('contacts')->insert([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ]);

            $result = DB::table('contacts')->where('email', $request->email)->get();
            return redirect('/contacts/create')->with([
                'success' => 'Contact created successfully.',
                'id' => $result[0]->id,
                'name' => $result[0]->name,
                'email' => $result[0]->email,
                'phone' => $result[0]->phone,
                'address' => $result[0]->address,
                'created' => $result[0]->created_at,
            ]);
        }

        function getUser($id) {
            $users = DB::table('contacts')->where('id', $id)->get();

            if (count($users) == 0) {
                return redirect('/contacts');
            }

            return view('show', compact('users'));
        }

        function editUser($id) {
            $users = DB::table('contacts')->where('id', $id)->get();

            if (count($users) == 0) {
                return redirect('/contacts');
            }

            return view('edit', compact('users'));
        }

        public function updateUser(Request $request, $id) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|email|unique:contacts,email,' . $id,
            ]);

            if ($validator->fails()) {
                return redirect('/contacts/' . $id . '/edit')
                    ->withErrors($validator)
                    ->withInput();
            }

            DB::table('contacts')->where('id', $id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->address
            ]);

            $result = DB::table('contacts')->where('id', $id)->first();
            return redirect('/contacts/' . $id . '/edit')->with([
                'success' => 'Contact updated successfully.',
                'id' => $result->id,
                'name' => $result->name,
                'email' => $result->email,
                'phone' => $result->phone,
                'address' => $result->address,
                'updated' => $result->updated_at,
            ]);
        }

        function delete($id) {
            DB::table('contacts')->where('id', $id)->delete();
            return redirect('/contacts')->with(([
                'success' => 'Contact deleted successfully.',
            ]));
        }
    }
