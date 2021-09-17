<?php

namespace App\Http\Controllers;

use App\Common\ApiResponseData;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class ApiController extends Controller
{
    //
    public function login(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,
            [
                'email' => ['required', 'exists:t_staff,email'],
                'password' => ['required', 'string'],
            ]);

        $responseData = new ApiResponseData($request);

        if ($validator->fails()) {
            $responseData->status = self::ERROR;
            $errors = $validator->errors();
            if ($errors->has('email')) {
                $responseData->message =  self::ERR_INVALID_USER_EMAIL;
            }
            else {
                $responseData->message =  self::ERR_INVALID_PASSWORD;
            }
            return response()->json($responseData);
        }

        if(Auth::attempt(['email' => $input['email'], 'password' => $input['password'], 'is_active' => 1])){
            $user = Auth::user();
            $success = array(
                'token' =>  $user->createToken(config('app.name'))-> accessToken,
            );
            $responseData->result = $success;
            $responseData->message = "success";
            $responseData->status = self::SUCCESS;
            return response()->json($responseData);
        } else{
            $responseData->status = self::ERROR;
            $responseData->message = self::ERR_INVALID_PASSWORD;
            return response()->json($responseData);
        }
    }

    public function logout (Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        $responseData = new ApiResponseData($request);
        $responseData->message = "logout";
        $responseData->status = self::SUCCESS;
        return response()->json($responseData);
    }
    public function saveRecord(Request $request)
    {
        $params = $request->all();
        //TODO doc change
        if(isset($params["shift_list"])){
            $params["shift_list"] = json_decode($params["shift_list"], true);
        }
        $validator = Validator::make($params,
            [
                'shift_list' => ['required', 'array'],
                'shift_list.*.shift_id' => ['required', 'exists:t_shift,id'],
                'shift_list.*.arrive_time' => ['nullable', 'required_with:shift_list.*.leave_time,shift_list.*.break_s_time,shift_list.*.night_break_s_time', 'integer', 'min:0', 'max:2400'],
                'shift_list.*.leave_time' => ['nullable', 'integer', 'gte:shift_list.*.arrive_time', 'min:0', 'max:2400'],
                'shift_list.*.break_s_time' => ['nullable', 'integer', 'gte:shift_list.*.arrive_time', 'min:0', 'max:2400'],
                'shift_list.*.break_time' => ['nullable', 'required_with:shift_list.*.break_time', 'integer', 'min:0', 'max:2400'],
                'shift_list.*.night_break_s_time' => ['nullable', 'integer', 'gte:shift_list.*.arrive_time', 'min:0', 'max:2400'],
                'shift_list.*.night_break_time' => ['nullable', 'required_with:shift_list.*.night_break_s_time', 'integer', 'min:0', 'max:2400'],
                'shift_list.*.alt_date' => ['nullable', 'date_format:Y-m-d'],
            ]);

        $responseData = new ApiResponseData($request);

        if ($validator->fails()) {
            $responseData->status = self::ERROR;
            $errors = $validator->errors();
            if ($errors->has('shift_list')) {
                $responseData->message =  self::ERR_INVALID_SHIFT_LIST;
            }
            else{
                try {

                }
                catch (\Exception $e) {
                    $responseData->message =  self::ERR_INVALID_UNKNOWN;
                }
            }
            //TODO
            //$responseData->status = self::ERROR;
            //$responseData->message = implode(" ",$validator->messages()->all());
            return response()->json($responseData);
        }

        $responseData->message = __("common.response.success");
        $responseData->status = self::SUCCESS;
        return response()->json($responseData);
    }
}
