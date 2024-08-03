<?php
namespace App\Modules\Users\Controllers;
use App\Http\Controllers\Controller;
use App\Models\User;
use App\Modules\Users\Repositories\UserInterface;

class UserController extends Controller
{
    public function index(UserInterface $userInterface){
        $user = $userInterface->getAllUsers();
        return view('users::index',compact('user'));
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
