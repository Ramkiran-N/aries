<?php

namespace App\Http\Controllers\User\Index;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\user\Index\IndexService;
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
        $questions = $this->service->fetchQuestions();
        return view('user.index',['questions'=>$questions]);
    }
    public function register(Request $request)
    {
        $res = $this->service->register($request);
        return response()->json($res);
    }
    public function submitAnswer(Request $request)
    {
        $res = $this->service->submitAnswer($request);
        return response()->json($res);
    }
    public function result($email)
    {
        $res = $this->service->result(session()->get($email));
        return view('user.result',['data'=>$res]);
    }
}
