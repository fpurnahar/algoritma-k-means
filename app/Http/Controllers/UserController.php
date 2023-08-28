<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $get_user = User::join('role', 'role.id', 'users.role_id')
            ->select(
                'role.id as role_id',
                'role.name as role_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                'users.email_verified_at as user_verified',
                'users.created_at as user_created',
                'users.password as user_updated'
            )
            ->paginate(10);
        return view('pages.user.list-user', compact('get_user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        if ($request->ajax()) {
            if ($request->search == null) {
                $filter = User::join('role', 'role.id', 'users.role_id')
                    ->select(
                        'role.id as role_id',
                        'role.name as role_name',
                        'users.id as user_id',
                        'users.name as user_name',
                        'users.email as user_email',
                        'users.email_verified_at as user_verified',
                        'users.created_at as user_created',
                        'users.updated_at as user_updated'
                    )
                    ->paginate(10);
            } else {
                $filter =
                    User::join('role', 'role.id', 'users.role_id')
                    ->select(
                        'role.id as role_id',
                        'role.name as role_name',
                        'users.id as user_id',
                        'users.name as user_name',
                        'users.email as user_email',
                        'users.email_verified_at as user_verified',
                        'users.created_at as user_created',
                        'users.updated_at as user_updated'
                    )
                    ->where('user_name', 'LIKE', '%' . $request->search . "%")
                    ->paginate(10);
            }

            if ($filter) {
                return response($filter);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function profile(Request $request, $id)
    {
        $profile = User::join('role', 'role.id', 'users.role_id')
            ->select(
                'role.id as role_id',
                'role.name as role_name',
                'users.id as user_id',
                'users.name as user_name',
                'users.email as user_email',
                'users.email_verified_at as user_verified',
                'users.image_path as user_image_path',
                'users.created_at as user_created',
                'users.updated_at as user_updated',
                'users.password as user_password'
            )->findOrFail($id);
        return view('auth.profile', compact('profile'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $user_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'require|min5|max:50',
            'role_id' => 'require|int|max:3',
            'email' => 'require|email|max:50',
            'email_verified_at' => 'require|date',
            'password' => 'require',
            'image_path' => 'require|mimes:jpg,jpeg,png,svg',
        ]);
        $edit_user = User::findOrfail($id);
        $edit_user->name = $request->user_name;
        $edit_user->role_id = $request->role_id;
        $edit_user->email = $request->user_email;
        $edit_user->email_verified_at = $request->user_verified;
        if ($edit_user->password == $request->password) {
            $edit_user->password = $edit_user->password;
        } else {
            if ($request->password == $request->password_confirmation) {
                $edit_user->password = Hash::make($request->user_password);
            } else {
                return back()->with('info', 'The password confirmation does not match !');
            }
        }
        if ($request->hasFile('user_image_path')) {
            $oldImage = public_path() . $edit_user->image_path;
            if (file_exists($oldImage)) {
                unlink($oldImage);
            }
            $words = preg_split('/(?=[A-Z])/', $request->user_name);
            $words =  strtolower(implode('_', $words));
            $update_profile = $request->user_image_path;
            $filename = $words . '.' . $update_profile->getClientOriginalExtension();
            $destinationPath = public_path() . '/admin_lte/dist/img/profile/' . $words;
            $update_profile->move($destinationPath, $filename);
            $edit_user->image_path = '/admin_lte/dist/img/profile/' . $words . '/' . $filename;
        }

        // $edit_user->image_path = $request->user_image_path;
        $edit_user->save();
        return back()->with('success', 'Berhasil Update Profile !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id ==  1) {
            return back()->with('info', 'User Admin tidak boleh di hapus !!!');
        } else {
            User::destroy($id);
            return back()->with('success', 'Data Users Berhasil Hapus !');
        }
    }
}
