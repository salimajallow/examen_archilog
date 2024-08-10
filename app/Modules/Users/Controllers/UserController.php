<?php
namespace App\Modules\Users\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Users\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function index(UserRepositoryInterface $userInterface){
        $users = $userInterface->getAllUsers();
        //dd($users);
        return view('user::index',compact('users'));
    }

    public function create(){
        return view('user::create');
    }
    public function store(Request $request, UserRepositoryInterface $userInterface){
        $data = $request->only(['first_name', 'last_name', 'telephone', 'type', 'email', 'password']);
        $data['password'] = bcrypt($data['password']); // Encrypt the password
        $userInterface->createUser($data);
        return redirect()->route('users.index');

    }



    public function edit(User $user){
        return view('user::edit',compact('user'));
    }

    public function update(Request $request,User $user,UserRepositoryInterface $userRepository){
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'telephone' => 'required',
            'type' => 'nullable',
            'email' => 'nullable',
            'password' => 'nullable',
            'confirm_password' => 'nullable|same:password'
            ]);
            $data = $request->only(['first_name', 'last_name', 'telephone', 'type','email','password']);
            if (!empty(request('password'))) {
                $data['password'] = bcrypt($data['password']);
            }else{
                unset($data['password']);
            }

            $userRepository->updateUser($user->id,$data);
            return redirect()->route('users.index');

    }


}
