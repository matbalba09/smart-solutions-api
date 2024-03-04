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

    public function getUserById($id)
    {
        $user = $this->userRepository->getUserById($id);

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
            'message' => Response::SUCCESSFULLY_GET_USER,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function login(Request $request)
    {
        if ($request->has('fp_user')) {
            $user = User::where('fp_user', $request->fp_user)->first();
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
        $existingUserEmail = $this->userRepository->getUserByEmail($request->email);
        $existingUserSrCode = $this->userRepository->getUserBySrCode($request->sr_code);

        if ($existingUserEmail) {
            $response = [
                'code' => Response::HTTP_CONFLICT,
                'status' => Response::FAIL,
                'message' => Response::INVALID_EMAIL,
            ];
            return response()->json($response, $response['code']);
        } elseif ($existingUserSrCode) {
            $response = [
                'code' => Response::HTTP_CONFLICT,
                'status' => Response::FAIL,
                'message' => Response::INVALID_SR_CODE,
            ];
            return response()->json($response, $response['code']);
        }

        $user = User::create([
            'name' => $request->name,
            'sr_code' => $request->sr_code,
            'year_level' => $request->year_level,
            'department' => $request->department,
            'gsuite_email' => $request->email,
            'password' => $request->password
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
            'user' => $user,
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
            return response()->json($response, $response['code']);
        }

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_USER_FINGER_PRINT,
            'data' => $user->fp_user,
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
            return response()->json($response, $response['code']);
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
