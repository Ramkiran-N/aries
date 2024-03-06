@extends('./layout')
@section('content')
    
<div class="result container  my-5">
    <h6>Total Question {{count($data['data'])}}</h6>
    <h6>Correct Answers {{$data['correctAnswers']}}</h6>
    <div class="mt-5">
        @foreach($data['data'] as $item)
        <div class="mt-3">
            <h6>Question : {{$item['question']}}</h6>
            <span>Correct Answer : {{$item['correct_answer']}}</span><br>
            <span>Your Answer : {{$item['user_answer']}}</span><br>
            <span>Status : {{$item['status']?'True':'False'}}</span>
        </div>
        @endforeach
        
    </div>
</div>
@endsection