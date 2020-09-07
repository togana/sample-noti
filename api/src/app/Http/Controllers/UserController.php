<?php

namespace App\Http\Controllers;

use App\User;
use App\Http\Requests\LoginUser;
use App\Http\Requests\StoreUser;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /** @var User  */
    private $userModel;

    /**
     * SupporterController constructor.
     * @param User $userModel
     */
    public function __construct(User $userModel)
    {
        $this->userModel = $userModel;
    }

    public function store(StoreUser $request)
    {
        $params = $request->all();

        $user = $this->userModel->create($params);

        return response()->json([
            "user" => [
                "email" => $user->email,
                "name" => $user->name,
                "token" => $user->createToken('current')->plainTextToken,
            ]
        ], Response::HTTP_CREATED);
    }

    public function login(LoginUser $request)
    {
        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials)) {
            throw new AuthenticationException();
        }

        /** @var User */
        $user = Auth::user();
        return response()->json([
            "user" => [
                "email" => $user->email,
                "name" => $user->name,
                "token" => $user->upsertToken('current')->plainTextToken,
            ]
        ]);
    }

    public function show(Request $request)
    {
        $user = $request->user();

        return response()->json([
            "user" => [
                "email" => $user->email,
                "name" => $user->name,
            ]
        ]);
    }
}
