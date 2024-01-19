<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Repositories\AnnualLeaveRepository;
use App\Http\Requests\CreateAnnualLeaveRequest;


class AnnualLeaveController extends Controller
{
    protected $annualLeaveRepository;

    public function __construct(AnnualLeaveRepository $annualLeaveRepository)
    {
        $this->annualLeaveRepository = $annualLeaveRepository;
    }

    /**
     * Create a new annual leave.
     *
     * @return \Illuminate\Http\Response
     */
    public function createAnnualLeave(CreateAnnualLeaveRequest $request)
    {
        $data = $request->validated();
        
        $annualLeave = $this->annualLeaveRepository->createAnnualLeave($data);

        return response()->json(['data' =>$annualLeave], Response::HTTP_CREATED);
    }

    /**
     * Get a specific annual leave.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAnnualLeave($id)
    {
        $annualLeave = $this->annualLeaveRepository->getAnnualLeaveById($id);

        return response()->json(['data' =>$annualLeave], Response::HTTP_OK);
    }

    /**
     * Get all annual leaves.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllAnnualLeaves()
    {
        $annualLeaves = $this->annualLeaveRepository->getAllAnnualLeaves();

        return response()->json(['data' =>$annualLeaves], Response::HTTP_OK);
    }
}
