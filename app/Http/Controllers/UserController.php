<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Image;
use App\Models\Record;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        if($request->hasFile('file')){
            $photo = $request->file->store('image','public');
        }
        if($photo == null) {
            $data = [
                'name' => $request->name,
                'email' => $request->email,
            ];
        }
        else{
            $data = [
                'name' => $request->name,
                'email' => $request->email,
                'avatar'=>$photo?asset('storage')."/".$photo:null,
            ];
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
    public function dateTable(Request $request){
        if(!isset($request->symptom_type)){
            $data = Record::with('comment')->where('user_id', Auth::user()->id)->where('save_type', 2)->get()->toArray();
            return view('users.date-table', ['data' => $data]);
        }

        $start_date = date('Y-m-d H:i:s', strtotime($request->start));
        $end_date = date('Y-m-d H:i:s', strtotime($request->end));
        $symptom_type = $request->symptom_type;
        $memo = $request->memo;
        if(isset($memo)){
            $data = Record::with('comment')->whereHas('comment',function ($query) use ($memo){
                $query->where('title','like', '%' . $memo . '%');})->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                ->where('user_id', Auth::user()->id)->where('symptom_type', $symptom_type)->where('save_type', 2)->get()->toArray();
        }
        else{
            $data = Record::with('comment')->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                ->where('user_id', Auth::user()->id)->where('symptom_type', $symptom_type)->where('save_type', 2)->get()->toArray();
        }

        return view('users.date-table', ['data' => $data]);
    }
    public function partList(){
        return view('users.part-list');
    }
    public function partTable(Request $request){
        $user_id = Auth::user()->id;
        if(!isset($request->symptom_type)){
            $data = Image::with('record')->whereHas('record',function ($query) use ($user_id){
                $query->where('save_type', 2)->where('user_id', $user_id);})
                ->get()->toArray();
            return view('users.part-table', ['data' => $data]);
        }
        if(isset($request->start)){
            $start_date = date('Y-m-d H:i:s', strtotime($request->start));
        }
        else{
            $start_date = '1950-01-01 00:00:00';
        }
        if(isset($request->end)){
            $end_date = date('Y-m-d H:i:s', strtotime($request->end));
        }
        else{
            $end_date = '2250-01-01 00:00:00';
        }

        $symptom_type = (int)($request->symptom_type);
        $part_type = (int)($request->part_type);
        $pos_id = (int)($request->pos_id);

        if($part_type === 1){
            $data = Image::with('record')->whereHas('record',function ($query) use ($symptom_type, $user_id){
                $query->where('symptom_type', $symptom_type)->where('save_type', 2)->where('user_id', $user_id);})
                ->where('part_type', 1)
                ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                ->get()->toArray();
        }
        else{
            $data = Image::with('record')->whereHas('record',function ($query) use ($symptom_type, $user_id){
                $query->where('symptom_type', $symptom_type)->where('save_type', 2)->where('user_id', $user_id);})
                ->where('part_type', $part_type)->where('pos_id', $pos_id)
                ->where('created_at', '>=', $start_date)->where('created_at', '<=', $end_date)
                ->get()->toArray();
        }
        return view('users.part-table', ['data' => $data]);
    }
}
