<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use App\Repositories\Interface\IUserRepository;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->getAllUsers();

        if ($users->isEmpty()) {
            $response = [
                'code' => Response::HTTP_NOT_FOUND,
                'status' => Response::FAIL,
                'message' => Response::USER_NOT_FOUND,
            ];
        }

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_USERS,
            'count' => User::count(),
            'data' => $users,
        ];

        return response()->json($response, $response['code']);
    }

    public function login(Request $request)
    {
        if ($request->has('fp_users')) {
            $user = User::where('fp_users', $request->fp_users)->first();
            if (!$user) {
                $response = [
                    'code' => Response::HTTP_NOT_FOUND,
                    'status' => Response::FAIL,
                    'message' => Response::USER_NOT_FOUND,
                ];
            } else {
                $response = [
                    'code' => Response::HTTP_SUCCESS,
                    'status' => Response::SUCCESS,
                    'message' => Response::SUCCESSFULLY_LOGGED_IN,
                ];
            }
        } else if ($request->has('email')) {
            $user = User::where('email', $request->email)->first();

            if ($user) {
                if (!Hash::check($request->password, $user->password)) {
                    $response = [
                        'code' => Response::HTTP_NOT_FOUND,
                        'status' => Response::FAIL,
                        'message' => Response::INVALID_CREDENTIAL,
                    ];
                } else {
                    $response = [
                        'code' => Response::HTTP_SUCCESS,
                        'status' => Response::SUCCESS,
                        'message' => Response::SUCCESSFULLY_LOGGED_IN,
                    ];
                }
            } else {
                $response = [
                    'code' => Response::HTTP_NOT_FOUND,
                    'status' => Response::FAIL,
                    'message' => Response::USER_NOT_FOUND,
                ];
            }
        } else {
            $response = [
                'code' => Response::HTTP_NOT_PROCESSABLE,
                'status' => Response::FAIL,
                'message' => Response::INCORRECT_LOGIN_INPUT,
            ];
        }
        return response()->json($response, $response['code']);
    }

    public function register(Request $request)
    {
        $existingUser = $this->userRepository->getUserByEmail($request->email);

        if ($existingUser) {
            $response = [
                'code' => Response::HTTP_CONFLICT,
                'status' => Response::FAIL,
                'message' => Response::INVALID_EMAIL,
            ];
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_REGISTERED_USER,
            'user' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function registerUserFp(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->registerUserFp($request->fp_user, $id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_REGISTERED_USER_FINGER_PRINT,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function getUserFpByUserId($id)
    {
        $user = $this->userRepository->getUserFpByUserId($id);

        if (!$user) {
            $response = [
                'code' => Response::HTTP_NOT_FOUND,
                'status' => Response::FAIL,
                'message' => Response::USER_NOT_FOUND,
            ];
        }

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_USER_FINGER_PRINT,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function getUserByName($name)
    {
        $users = $this->userRepository->getUserByName($name);

        if ($users->isEmpty()) {
            $response = [
                'code' => Response::HTTP_NOT_FOUND,
                'status' => Response::FAIL,
                'message' => Response::USER_NOT_FOUND,
            ];
        }

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_USERS,
            'data' => $users,
        ];

        return response()->json($response, $response['code']);
    }
}