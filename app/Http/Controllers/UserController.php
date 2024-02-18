<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
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

        $user = User::create([
            'name' => $request->name,
            'fp_users' => $request->fp_users,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_USER,
            'user' => $user,
        ];

        return response()->json($response, $response['code']);
    }
}