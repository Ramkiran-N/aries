@extends('./layout')
@section('content')
    
<div class="user container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-6">
    <form class="mt-3"  method="POST" id='examForm'>
        @csrf
        <h3>Register</h3>
        <div class="form-group">
          <label>Name</label>
          <input type="text" class="form-control" name="name">
        </div>
        <div class="form-group">
          <label>Email</label>
          <input type="email" class="form-control" name="email">
        </div>
        <button type="button" id='register' class="btn btn-primary my-2">Register</button>
        @if(!$questions->isEmpty())
        <div class="inner d-none">
            @foreach ($questions as $item)
            <div class="questions my-2">
                <h6>{{$item->question}}</h6>
                <input type="text" name="question_{{$item->id}}" id="question_{{$item->id}}" hidden>
                <div class="options my-1">
                    <div class="d-flex my-1">
                        <input type="radio" name="option_{{$item->id}}" class="option_radio"data-question="{{$item->id}}" value="1">
                        <label class="ms-2">{{$item->option_1}}</label>
                    </div>
                    <div class="d-flex my-1">
                        <input type="radio" name="option_{{$item->id}}" class="option_radio"data-question="{{$item->id}}" value="2">
                        <label class="ms-2">{{$item->option_2}}</label>
                    </div>
                    <div class="d-flex my-1">
                        <input type="radio" name="option_{{$item->id}}" class="option_radio"data-question="{{$item->id}}" value="3">
                        <label class="ms-2">{{$item->option_3}}</label>
                    </div>
                    <div class="d-flex my-1">
                        <input type="radio" name="option_{{$item->id}}" class="option_radio"data-question="{{$item->id}}" value="4">
                        <label class="ms-2">{{$item->option_4}}</label>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        @endif
        <input type="submit" value="Submit" class="btn btn-primary my-2 d-none">
    </form>
</div>
@endsection