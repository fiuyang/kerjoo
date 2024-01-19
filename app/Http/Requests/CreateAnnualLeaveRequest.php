<?php

namespace App\Http\Requests;

use App\AnnualLeave;
use Illuminate\Http\Response;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class CreateAnnualLeaveRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'user_id' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'approval_date' => 'nullable|date',
            'reason' => 'required|string|max:125',
            'status' => 'required', Rule::in([AnnualLeave::STATUS_SUBMITTED, AnnualLeave::STATUS_APPROVED, AnnualLeave::STATUS_REJECTED]),
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            "errors" => $validator->getMessageBag()
        ], Response::HTTP_BAD_REQUEST));
    }

}
