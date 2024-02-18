<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CreateGeneralPurposeRequest;
use App\Http\Requests\UpdateGeneralPurposeRequest;
use App\Models\GeneralPurpose;
use App\Repositories\Interface\IGeneralPurposeRepository;
use App\Response;
use Illuminate\Http\Request;

class GeneralPurposeController extends Controller
{
    private IGeneralPurposeRepository $generalPurposeRepository;

    public function __construct(IGeneralPurposeRepository $generalPurposeRepository)
    {
        $this->generalPurposeRepository = $generalPurposeRepository;
    }

    public function index()
    {
        //
        $generalPurposeRepository = $this->generalPurposeRepository->getGeneralPurpose();

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_GET_GENERAL_PURPOSE,
            'count' => GeneralPurpose::count(),
            'data' => $generalPurposeRepository,
        ];

        return response()->json($response, $response['code']);
    }

    public function create(CreateGeneralPurposeRequest $request)
    {
        //
        $generalPurpose = $this->generalPurposeRepository->createGeneralPurpose($request->name);

        $response = [
            'code' => Response::HTTP_SUCCESS_POST,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_CREATED_GENERAL_PURPOSE,
            'data' => $generalPurpose,
        ];

        return response()->json($response, $response['code']);
    }

    public function update(UpdateGeneralPurposeRequest $request, $id)
    {
        //
        $generalPurpose = $this->generalPurposeRepository->updateGeneralPurpose($request->name,$id);

        $response = [
            'code' => Response::HTTP_SUCCESS,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_UPDATED_GENERAL_PURPOSE,
            'data' => $generalPurpose,
        ];

        return response()->json($response, $response['code']);
    }

    public function delete($id)
    {
        //
        $this->generalPurposeRepository->deleteGeneralPurpose($id);

        $response = [
            'code' => Response::HTTP_SUCCESS_NO_RETURN,
            'status' => Response::SUCCESS,
            'message' => Response::SUCCESSFULLY_DELETED_GENERAL_PURPOSE,
        ];

        return response()->json($response, $response['code']);
    }
}
