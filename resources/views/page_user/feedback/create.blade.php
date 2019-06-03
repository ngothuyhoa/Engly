@extends('layouts.app')

@section('content')
<div class="wrapper fadeInDown">
    @if (count($errors) >0)
         <ul>
             @foreach($errors->all() as $error)
                 <li class="text-danger"> {{ $error }}</li>
             @endforeach
         </ul>
     @endif

     @if (session('status'))
         <ul>
             <li class="text-danger"> {{ session('status') }}</li>
         </ul>
     @endif


    <div id="formContent" style="background: white; padding: 10px; max-width: 600px;">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header"><h4>Feedback</h4></div>

                        <div class="card-body">
                            <form method="POST" action="{{ route('feedback_store', Auth::user()->id) }}">
                                @csrf
                                <div class="form-group row custom" >
                                    <div class="col-md-12">
                                        <div class="input-group mb-3">
                                            <textarea placeholder="Nhập nội dung phản hồi" style="height: 100px" name="feedback" class="form-control{{ $errors->has('feedback') ? ' is-invalid' : '' }}"></textarea>
                                            @if ($errors->has('feedback'))
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $errors->first('feedback') }}</strong>
                                                </span>
                                            @endif
                                        </div>
                                    </div>
                                </div> 
                                <hr>
                                <div class="form-group row mb-0">
                                    <div class="col-md-2 offset-md-4">
                                        <button type="submit" class="btn btn-primary">
                                            Gửi
                                        </button>
                                    </div>
                                    <div class="col-md-2">
                                        <a class="btn btn-danger" href="{{ URL::previous() }}">Go Back</a>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

