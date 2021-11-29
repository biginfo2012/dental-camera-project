<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    //
    //public $symptoms = ['', '구강질환', '심미개선', '골격/배열', '재치료/재성형', '어린이 구강', '기타'];
    public function profile(){
        $user = Auth::user();
        return view('users.profile', ['user' => $user]);

    }
    public function modify(Request $request){
        $photo = null;
        $path = null;
        if($request->hasFile('file')){
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension(); // you can also use file name
            $photo = time().'.'.$extension;
            $path = public_path().'/image';
            $uplaod = $file->move($path,$photo);
            $path = '/public/image/' . $photo;
            //$photo = $request->file->store('image','public');
        }
        if($photo == null) {
            if(isset($request->password)){
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password)
                ];
            }
            else{
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                ];
            }
        }
        else{
            if(isset($request->password)){
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    //'avatar'=>$photo?asset('storage')."/".$photo:null,
                    'avatar'=>$path,
                    'password' => Hash::make($request->password)
                ];
            }
            else{
                $data = [
                    'name' => $request->name,
                    'email' => $request->email,
                    //'avatar'=>$photo?asset('storage')."/".$photo:null,
                    'avatar'=>$path,
                ];
            }

        }
        User::where('id', $request->id)->update($data);
        return response()->json([
            'status' => true
        ]);

    }
    public function dateList(){
        return view('users.date-list');
    }
    public function dateDetail($id){
        $record = Record::with('comment')->with('image')->where('id', $id)->get()->first()->toArray();
        return view('users.date-detail', ['record' => $record]);
    }
    public function recordDelete($id){
        Record::where('id', $id)->delete();
        Comment::where('record_id', $id)->delete();
        Image::where('record_id',  $id)->delete();
        return response()->json([
            'status' => true
        ]);
    }
    public function imgDelete($id){
        Image::where('id', $id)->delete();
        return response()->json([
            'status' => true
        ]);
    }
    public function dateTable(Request $request){

        if(!isset($request->start)){
            $start_date = '1900-01-01 00:00:00';
        }
        else{
            $start_date = date('Y-m-d H:i:s', strtotime($request->start));
        }
        if(!isset($request->end)){
            $end_date = '2200-01-01 00:00:00';
        }
        else{
            $end_date = date('Y-m-d', strtotime($request->end)) . ' 23:59:59';
        }
        $symptom_type = $request->symptom_type;
        $memo = $request->memo;
        if(isset($memo)){
            if(isset($symptom_type)){
                $data = Record::with('comment')->whereHas('comment',function ($query) use ($memo){
                    $query->where('title','like', '%' . $memo . '%');})->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                    ->where('user_id', Auth::user()->id)->where('symptom_type', $symptom_type)->get()->toArray();
            }
            else{
                $data = Record::with('comment')->whereHas('comment',function ($query) use ($memo){
                    $query->where('title','like', '%' . $memo . '%');})->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                    ->where('user_id', Auth::user()->id)->get()->toArray();
            }
        }
        else{
            if(isset($symptom_type)){
                $data = Record::with('comment')->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                    ->where('user_id', Auth::user()->id)->where('symptom_type', $symptom_type)->get()->toArray();
            }
            else{
                $data = Record::with('comment')->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                    ->where('user_id', Auth::user()->id)->get()->toArray();
            }
        }

        //print_r($data);
        return view('users.date-table', ['data' => $data]);
    }
    public function partList(){
        return view('users.part-list');
    }
    public function partTable(Request $request){
        $user_id = Auth::user()->id;

        if(isset($request->start)){
            $start_date = date('Y-m-d H:i:s', strtotime($request->start));
        }
        else{
            $start_date = '1950-01-01 00:00:00';
        }
        if(isset($request->end)){
            $end_date = date('Y-m-d', strtotime($request->end)) . ' 23:59:59';
        }
        else{
            $end_date = '2250-01-01 00:00:00';
        }

        $symptom_type = $request->symptom_type;
        if(isset($request->part_type))
            $part_type = (int)$request->part_type;
        $pos_id = $request->pos_id;
        if(isset($symptom_type)){
            if(isset($part_type)){
                if($part_type === 1){
                    $data = Image::with('record')->whereHas('record',function ($query) use ($symptom_type, $user_id){
                        $query->where('symptom_type', $symptom_type)->where('user_id', $user_id);})
                        ->where('part_type', 1)
                        ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                        ->get()->toArray();
                }
                else{
                    if(isset($pos_id)){
                        $data = Image::with('record')->whereHas('record',function ($query) use ($symptom_type, $user_id){
                            $query->where('symptom_type', $symptom_type)->where('user_id', $user_id);})
                            ->where('part_type', $part_type)->where('pos_id', $pos_id)
                            ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                            ->get()->toArray();
                    }
                    else{
                        $data = Image::with('record')->whereHas('record',function ($query) use ($symptom_type, $user_id){
                            $query->where('symptom_type', $symptom_type)->where('user_id', $user_id);})
                            ->where('part_type', $part_type)
                            ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                            ->get()->toArray();
                    }

                }
            }
            else{
                $data = Image::with('record')->whereHas('record',function ($query) use ($symptom_type, $user_id){
                    $query->where('symptom_type', $symptom_type)->where('user_id', $user_id);})
                    ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                    ->get()->toArray();
            }
        }
        else{
            if(isset($part_type)){
                if($part_type === 1){
                    $data = Image::with('record')->whereHas('record',function ($query) use ($user_id){
                        $query->where('user_id', $user_id);})
                        ->where('part_type', 1)
                        ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                        ->get()->toArray();
                }
                else{
                    if(isset($pos_id)){
                        $data = Image::with('record')->whereHas('record',function ($query) use ($user_id){
                            $query->where('user_id', $user_id);})
                            ->where('part_type', $part_type)->where('pos_id', $pos_id)
                            ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                            ->get()->toArray();
                    }
                    else{
                        $data = Image::with('record')->whereHas('record',function ($query) use ($user_id){
                            $query->where('user_id', $user_id);})
                            ->where('part_type', $part_type)
                            ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                            ->get()->toArray();
                    }

                }
            }
            else{
                $data = Image::with('record')->whereHas('record',function ($query) use ($user_id){
                    $query->where('user_id', $user_id);})
                    ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                    ->get()->toArray();
            }
        }

        return view('users.part-table', ['data' => $data]);
    }
}
