@extends('./layout')
@section('content')
    
<div class="user container ">
    <div class="col-12 mt-5">
        <div class="row">
            <div class="col-3">Name</div>
            <div class="col-3">Email</div>
            <div class="col-3">Mark</div>
            <div class="col-3">Action</div>
        </div>
        <hr>
        @if($data['status']==200)
            <div class="row">
                @foreach($data['data'] as $item)
                <div class="col-3">
                    {{$item['name']}}
                </div>
                <div class="col-3">{{$item['email']}}</div>
                <div class="col-3">{{$item->result->total_mark}}</div>
                <div class="col-3"><a href="/user/result/{{$item['email']}}" class="btn btn-primary view">View</a></div>
                @endforeach
            </div>
        @endif
      
    </div>
</div>
  
@endsection