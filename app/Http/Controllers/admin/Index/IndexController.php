<?php

namespace App\Http\Controllers\admin\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\admin\Index\IndexService;
use Illuminate\Support\Facades\Log;

class IndexController extends Controller
{
    protected $service;
    public function __construct(IndexService $service)
    {
        $this->service = $service;
    }
    public function index()
    {
        return view('admin.index');
    }
    public function addQuestion(Request $request)
    {
        try {
            $res = $this->service->addQuestion($request);
            if($res['status'] != 200){
                return redirect()->back()->withErrors($res['msg'])->withInput();
            }else{
                return redirect()->back()->withSuccess($res['msg']);
            }
        } catch (\Throwable $th) {
            Log::info($th);
            return redirect()->back()->withErrors(['unknown'=>'Sorry,Something went wrong!'])->withInput();
        }
        // $validator = Validator::make($request->all(),[
        //     'question'=>'required',
        //     'option_1'=>'required',
        //     'option_2'=>'required',
        //     'option_3'=>'required',
        //     'option_4'=>'required',
        //     'correct_answer'=>'required'
        // ]);
        // if($validator->fails()){
        //     // return ['msg'=>$validator->messages(),'status'=>403];
        //     return redirect()->back()->withErrors($validator->messages())->withInput();
        // }
    }
}
