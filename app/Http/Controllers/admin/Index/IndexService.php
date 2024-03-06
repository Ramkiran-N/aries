<?php

namespace App\Http\Controllers\admin\Index;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\admin\Index\IndexRepository;

class IndexService
{
    protected $repository;
    public function __construct(IndexRepository $repository)
    {
        $this->repository = $repository;
    }
    public function addQuestion($request)
    {
        $validator = Validator::make($request->all(),[
            'question'=>'required',
            'option_1'=>'required',
            'option_2'=>'required',
            'option_3'=>'required',
            'option_4'=>'required',
            'correct_answer'=>'required'
        ]);
        if($validator->fails()){
            return ['msg'=>$validator->messages(),'status'=>403];
        }else{
            $data = $request->all();
            unset($data['_token']);
            $res = $this->repository->storeQuestion($data);
            if($res){
                return ['msg'=>'Successfully stored!','status'=>200];
            }
            
        }
    }
}
