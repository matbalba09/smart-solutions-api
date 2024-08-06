<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\Admin;
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
            $admin = Admin::where('fp_user', $request->fp_user)->first();
            if (!$admin) {
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
                    'data' => $admin
                ];
            }
        } else if ($request->has('username')) {
            $admin = Admin::where('username', $request->username)->first();
            if ($admin) {
                if (!Hash::check($request->password, $admin->password)) {
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
                        'data' => $admin
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
            'gender' => $request->gender,
            'mobile_number' => $request->mobile_number,
            'branch' => $request->branch,
            'user_type' => $request->user_type,
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

    public function getAllUserByDepartment($department)
    {
        $users = $this->userRepository->getAllUserByDepartment($department);

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

    public function getAllUserByYearLevel($year_level)
    {
        $users = $this->userRepository->getAllUserByYearLevel($year_level);

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

    public function getUserBySrCode($sr_code)
    {
        $user = $this->userRepository->getUserBySrCode($sr_code);

        if ($user == null) {
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
            'message' => Response::SUCCESSFULLY_GET_USER,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function getAllUserFpUsers()
    {
        $users = $this->userRepository->getAllUserFpUsers();
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
            'message' => Response::SUCCESSFULLY_GET_ALL_USER_FINGER_PRINTS,
            'count' => User::count(),
            'data' => $users,
        ];

        return response()->json($response, $response['code']);
    }

    public function updateUser(UpdateUserRequest $request, $id)
    {
        $user = $this->userRepository->updateUser($request,$id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_USER,
            'data' => $user,
        ];

        return response()->json($response, $response['code']);
    }

    public function updateAdmin(AdminRequest $request, $id)
    {
        $admin = $this->userRepository->updateAdmin($request,$id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_ADMIN,
            'data' => $admin,
        ];

        return response()->json($response, $response['code']);
    }
}