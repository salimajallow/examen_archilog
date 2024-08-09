<?php
namespace App\Modules\Users\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Users\Repositories\UserRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index(UserRepositoryInterface $userInterface){
        $user = $userInterface->getAllUsers();
        return view('user::index',compact('user'));
    }

    public function create(){

    }
    public function store(){

    }

    public function edit(){

    }

    public function update(){

    }


}
