<?php

namespace App\Http\Controllers;

use App\Common\ApiResponseData;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Record;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Mockery\Exception;

class ApiController extends Controller
{
    //
    public function login(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input,
            [
                'email' => ['required', 'exists:users,email'],
                'password' => ['required', 'string'],
            ]);

        $responseData = new ApiResponseData($request);

        try {
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
        }
        catch (Exception $e){
            Log::info('$e : ' . $e->getMessage());
        }


        if(Auth::attempt(['email' => $input['email'], 'password' => $input['password']])){
            $user = Auth::user();
//            $success = array(
//                'user_id' =>  Auth::user()->id,
//            );
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

    public function log(Request $request){
        $input = $request->all();
        Log::info('API Log: ' . $input['log']);
        $responseData = new ApiResponseData($request);
        $responseData->message = "log";
        $responseData->status = self::SUCCESS;
        return response()->json($responseData);
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

        $validator = Validator::make($params,
            [
                'save_type' => ['required', 'integer', 'min:1', 'max:2'],
                'symptom_type' => ['required', 'integer', 'min:1', 'max:6'],
            ]);

        $responseData = new ApiResponseData($request);

        if ($validator->fails()) {
            $responseData->status = self::ERROR;
            $errors = $validator->errors();
            if ($errors->has('user_id')) {
                $responseData->message =  self::ERR_INVALID_USER_ID;
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

        $saveType = $request->get('save_type');
        $symptomType = $request->get('symptom_type');
        $title = $request->get('title');
        $content = $request->get('content');
        $data = [
            'user_id' => Auth::user()->id,
            'save_type' => $saveType,
            'symptom_type' => $symptomType
        ];
        $record_id = Record::create($data)->id;
        if((isset($title) && $title !== null) || (isset($content) && $content !== null)){
            Comment::create([
                'title' => $title,
                'content' => $content,
                'record_id' => $record_id
            ]);
        }

        for($i = 1; $i < 6; $i++) {
            for($j = 1; $j < 9; $j++){
                if($request->hasFile('attach_'.$i.'_'.$j)) {
                    $key = 'attach_'.$i.'_'.$j;
                    //$photo = $request[$key]->store('image','public');
                    $file = $request[$key];
                    $extension = $file->getClientOriginalExtension(); // you can also use file name
                    $photo = uniqid('file_', true).'.'.$extension;
                    $path = public_path().'/image';
                    $uplaod = $file->move($path,$photo);
                    $path = '/public/image/' . $photo;
                    $data = [
                        'record_id' => $record_id,
                        'part_type' => $i,
                        'pos_id' => $j,
                        //'img_url'=>$photo?asset('storage')."/".$photo:null,
                        'img_url'=>$path,
                    ];
                    Image::create($data);
                }
            }

        }

        $responseData->message = "";
        $responseData->status = self::SUCCESS;
        return response()->json($responseData);
    }
}
