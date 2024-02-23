<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
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

    public function login(Request $request)
    {
        // if ($request->filled('fp_users')) {
        //     $user = User::where('fp_users', $request->fp_users)->first();
        // } elseif ($request->filled('email')) {
        //     $user = User::where('email', $request->email)->first();
        // } else {
        //     $user = null; // No valid input provided
        // }

        // if ($user) {
        //     // User found, check password if 'email' is provided
        //     if ($request->filled('email') && !Hash::check($request->password, $user->password)) {
        //         $response = [
        //             'code' => Response::HTTP_NOT_FOUND,
        //             'status' => Response::FAIL,
        //             'message' => Response::INVALID_CREDENTIAL,
        //         ];
        //     } else {
        //         $response = [
        //             'code' => Response::HTTP_SUCCESS,
        //             'status' => Response::SUCCESS,
        //             'message' => Response::SUCCESSFULLY_LOGGED_IN,
        //         ];
        //     }
        // } else {
        //     // User not found
        //     $response = [
        //         'code' => Response::HTTP_NOT_FOUND,
        //         'status' => Response::FAIL,
        //         'message' => Response::USER_NOT_FOUND,
        //     ];
        // }
    
        // return response()->json($response, $response['code']);
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

        if ($existingUser){
            $response = [
                'code' => Response::HTTP_CONFLICT,
                'status' => Response::FAIL,
                'message' => Response::INVALID_EMAIL,
            ];
        }

        $user = User::create([
            'name' => $request->name,
            'fp_users' => $request->fp_users,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_REGISTERED_USER,
            'user' => $user,
        ];

        return response()->json($response, $response['code']);
    }
}