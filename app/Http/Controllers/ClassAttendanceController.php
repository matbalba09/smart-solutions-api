<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClassAttendanceRequest;
use App\Http\Requests\UpdateClassAttendanceRequest;
use App\Models\ClassAttendance;
use App\Repositories\Interface\IClassAttendanceRepository;
use App\Response;
use Illuminate\Http\Request;

class ClassAttendanceController extends Controller
{
    private IClassAttendanceRepository $classAttendanceRepository;

    public function __construct(IClassAttendanceRepository $classAttendanceRepository)
    {
        $this->classAttendanceRepository = $classAttendanceRepository;
    }

    public function index()
    {
        $classAttendance = $this->classAttendanceRepository->getAllClassAttendance();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_CLASS_ATTENDANCE,
            'count' => ClassAttendance::count(),
            'data' => $classAttendance,
        ];

        return response()->json($response, $response['code']);
    }

    public function getClassAttendanceById($id)
    {
        $classAttendance = $this->classAttendanceRepository->getClassAttendanceById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_CLASS_ATTENDANCE,
            'data' => $classAttendance,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateClassAttendanceRequest $request)
    {
        $classAttendance = $this->classAttendanceRepository->createClassAttendance(
            $request->course_code,
            $request->title,
            $request->name_of_faculty,
            $request->date_time,
            $request->room_or_venue,
        );

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_CLASS_ATTENDANCE,
            'data' => $classAttendance,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateClassAttendanceRequest $request, $id)
    {
        $classAttendance = $this->classAttendanceRepository->updateClassAttendance($request,$id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_CLASS_ATTENDANCE,
            'data' => $classAttendance,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->classAttendanceRepository->deleteClassAttendance($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_CLASS_ATTENDANCE,
        ];

        return response()->json($response, $response['code']);
    }
}
