@extends('./layout')
@section('content')
    
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-6">
        <h3>Add Your Question</h3>
        <form class="mt-3" action="{{ route('addQuestion') }}" method="POST">
            @csrf
            <div class="form-group">
              <label>Question</label>
              <input type="text" class="form-control @error('question') is-invalid @enderror" name="question" value="{{ old('question') }}"  >
                @error('question')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label>Option 1</label>
              <input type="text" class="form-control @error('option_1') is-invalid @enderror" name='option_1' value="{{ old('option_1') }}" >
                @error('option_1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label>Option 2</label>
              <input type="text" class="form-control @error('option_2') is-invalid @enderror" value="{{ old('option_2') }}" name='option_2'>
                @error('option_2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label>Option 3</label>
              <input type="text" class="form-control @error('option_3') is-invalid @enderror" value="{{ old('option_3') }}" name='option_3'>
                @error('option_3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <div class="form-group">
              <label>Option 4</label>
              <input type="text" class="form-control @error('option_4') is-invalid @enderror" value="{{ old('option_4') }}" name='option_4'>
                @error('option_4')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{$message}}</strong>
                    </span>
                @enderror
            </div>
            <select class="mb-3 mt-3 form-control @error('correct_answer') is-invalid @enderror" value="{{ old('correct_answer') }}" name='correct_answer'>
                <option value="1">option 1</option>
                <option value="2">option 2</option>
                <option value="3">option 3</option>
                <option value="4">option 4</option>
            </select>
            @error('correct_answer')
                <span class="invalid-feedback" role="alert">
                    <strong>{{$message}}</strong>
                </span>
            @enderror
            
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
          @error('unknown')
            <div class="mx-5">
                <div class="alert alert-danger mt-3" role="alert">
                    {{ $message }}
                </div>
            </div>
            @enderror
            @if(session('success'))
            <div class="alert alert-success mt-3" role="alert">
                {{session('success')}}
            </div>
            @endif
    </div>
    
</div>
@endsection