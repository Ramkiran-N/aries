<?php

namespace App\Http\Controllers\user\Index;

use App\Http\Controllers\admin\Index\IndexRepository as AdminIndexRepository;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\user\Index\IndexRepository;
use Illuminate\Support\Facades\Log;

class IndexService
{
    protected $repository,$AdminIndexRepository;
    public function __construct(IndexRepository $repository,AdminIndexRepository $AdminIndexRepository)
    {
        $this->repository = $repository;
        $this->AdminIndexRepository = $AdminIndexRepository;
    }
    public function register($request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
        ],[
            'email.unique' => 'The :attribute has already attended exam'
        ]);
        if($validator->fails()){
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            $data = $request->all();
            unset($data['_token']);
            $res = $this->repository->register($data);
            if($res){
                return ['msg'=>'Successfully stored!','status'=>200];
            }
            
        }
    }
    public function fetchQuestions()
    {
        return $this->AdminIndexRepository->getQuestions();
    }
    public function submitAnswer($request)
    {
        $rules = [];
        $data = [];
        foreach ($request->all() as $key => $value) {
            if (strpos($key, 'question_') !== false) {
                $data[]=$key;
                $rules[$key] = 'required';
            }
        }
        $validator = Validator::make($request->all(),$rules);
        if($validator->fails()){
            return ['msg'=>$validator->messages()->first(),'status'=>403];
        }else{
            $answers = [];
            $correct_answers = 0;
            // dd($data);
           foreach($data as $item){
                $questionKey = explode("_", $item);
                $id = $questionKey[1];
                $answers[$id]=$request->$item;
                $ans = $this->AdminIndexRepository->getAnswers($id);
                if ($request->$item == $ans->correct_answer) {
                    $correct_answers++;
                } 
                
           }
           
           $result['answers'] = json_encode($answers);
           $userData = $this->repository->getUserWithEmail($request->email);
           $result['user_id'] = $userData->id;
           $result['total_mark'] = $correct_answers;
         
           $saveResult = $this->repository->saveResult($result);
           return ['msg'=>$request->email,'status'=>200];
        }
    }
    public function result($email)
    {
        $res = $this->repository->getResult($email);
        $data = json_decode($res->result['answers']);
        $final = [];
        $correct_answers = 0;
        foreach($data as $key => $value) {
            $ans = $this->AdminIndexRepository->getAnswers($key);
            $correctAnswerProperty = 'option_' . $ans->correct_answer;
            $userAnswerProperty = 'option_' . $value;
            $final[$key]['question'] = $ans->question;
            $final[$key]['correct_answer'] = $ans->$correctAnswerProperty;
            $final[$key]['user_answer'] = $ans->$userAnswerProperty;
            if ($ans->$correctAnswerProperty == $ans->$userAnswerProperty) {
                $final[$key]['status'] = true;
                $correct_answers++;
            } else {
                $final[$key]['status'] = false;
            }
        }
        return ['status'=>200,'data'=>$final,'correctAnswers'=>$correct_answers];
    }
    public function results()
    {
        $res = $this->repository->getResults();
        if($res){
            return ['status'=>200,'data'=>$res];
        }else{
            return['stauts'=>500];
        }
    }
}
