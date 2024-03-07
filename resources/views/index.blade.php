@extends('./layout')
@section('content')
    
<div class=" container  my-5">
    <a href="{{route('admin.index')}}" class="text-decoration-none text-light btn btn-primary">Add Question</a>
    <a href="{{route('user.index')}}" class="text-decoration-none text-light btn btn-primary">Exam</a>
    <a href="{{route('user.results')}}" class="text-decoration-none text-light btn btn-primary">Results</a>
</div>
@endsection