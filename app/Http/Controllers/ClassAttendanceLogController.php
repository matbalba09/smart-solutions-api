<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateClassAttendanceLogRequest;
use App\Http\Requests\UpdateClassAttendanceLogRequest;
use App\Models\ClassAttendanceLog;
use App\Repositories\Interface\IClassAttendanceLogRepository;
use App\Response;
use Illuminate\Http\Request;

class ClassAttendanceLogController extends Controller
{
    private IClassAttendanceLogRepository $classAttendanceLogRepository;

    public function __construct(IClassAttendanceLogRepository $classAttendanceLogRepository)
    {
        $this->classAttendanceLogRepository = $classAttendanceLogRepository;
    }

    public function index()
    {
        $classAttendanceLog = $this->classAttendanceLogRepository->getAllClassAttendanceLog();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_CLASS_ATTENDANCE_LOG,
            'count' => ClassAttendanceLog::count(),
            'data' => $classAttendanceLog,
        ];

        return response()->json($response, $response['code']);
    }

    public function getClassAttendanceLogById($id)
    {
        $classAttendanceLog = $this->classAttendanceLogRepository->getClassAttendanceLogById($id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_CLASS_ATTENDANCE_LOG,
            'data' => $classAttendanceLog,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateClassAttendanceLogRequest $request)
    {
        $classAttendanceLog = $this->classAttendanceLogRepository->createClassAttendanceLog(
            $request->name,
            $request->class_attendance_id
        );

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_CLASS_ATTENDANCE_LOG,
            'data' => $classAttendanceLog,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateClassAttendanceLogRequest $request, $id)
    {
        $classAttendanceLog = $this->classAttendanceLogRepository->updateClassAttendanceLog(
            $request->name,
            $request->class_attendance_id,
            $id
        );

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_CLASS_ATTENDANCE_LOG,
            'data' => $classAttendanceLog,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        $this->classAttendanceLogRepository->deleteClassAttendanceLog($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_CLASS_ATTENDANCE_LOG,
        ];

        return response()->json($response, $response['code']);
    }

    public function getAllByClassAttendanceId($class_attendance_id)
    {
        $classAttendanceLog = $this->classAttendanceLogRepository->getAllClassAttendanceLogByClassAttendanceId($class_attendance_id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_ALL_CLASS_ATTENDANCE_LOG,
            'count' => ClassAttendanceLog::count(),
            'data' => $classAttendanceLog,
        ];

        return response()->json($response, $response['code']);
    }
}
