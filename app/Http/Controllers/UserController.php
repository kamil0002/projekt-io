<?php

namespace App\Http\Controllers;

use App\Http\Requests\UpdateUserRequest;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{


    /**
     * Display form to edit user.
     *
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = User::find($id);


        return view('admin.user-edit',[
            'user' => $user
        ]);

    }
    public function userRents($id)
    {
        $user = User::find($id);
        $returned = $user->rents()->has('return')->get();
        $notReturned = $user->rents()->whereDoesntHave('return')->get();

        return view('user.rents',[
            'user' => $user,
            'returned' =>  $returned,
            'notreturned' => $notReturned

        ]);
    }




    public function userEdit($id)
    {
        $user = User::find($id);
        return view('user.user',[
            'user' => $user
        ]);
    }

    public function indexSearch(Request $request) {
        $search = $request->search;
        return view('admin.users', [
            'users' => User::where('surname','like','%'.$search.'%')->orWhere('name','like','%'.$search.'%')->get()
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.users',[
            'users' => User::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\UpdateUserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateUserRequest $request,$id): RedirectResponse
    {

        $user = User::find($id);
        $user->update([
            'password' => Hash::make($request->get('password')),
            'name' => $request->get('name'),
            'role' => $user->role,
            'email' => $request->get('email'),
            'pesel' => $request->get('pesel'),
            'surname' => $request->get('surname'),
            'address' => $request->get('address'),
            'phone' => $request->get('phone'),
        ]);

        return redirect()
            ->back()
            ->with('status', __('Dane użytkownika zostały zaktualizowane.'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        return redirect()
        ->back()
        ->with('status', __('Użytkownik został usunięty.'));
    }

}
