@extends('layouts.app')

@section('content')
@include('layouts.headers.cards')

<div class="container-fluid mt--7">

    <div class="row mt-5">
        <div class="col-xl-12 mb-5 mb-xl-0">
            <div class="card shadow">
                <div class="card-header border-0">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="mb-20">Students</h3>
                        </div>
                    </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('students.update',$student->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <div class="input-group input-group-alternative">
                            <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" value="{{$student->name}}" placeholder="{{ __('Name') }}" type="text" name="name" value="{{ old('name') }}" autofocus>
                        </div>
                    </div>


                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <div class="input-group input-group-alternative">
                            <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" value="{{$student->email}}" placeholder="{{ __('Email') }}" type="text" name="email" value="{{ old('email') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('age') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <div class="input-group input-group-alternative">
                            <input class="form-control{{ $errors->has('age') ? ' is-invalid' : '' }}" value="{{$student->age}}" placeholder="{{ __('Age') }}" type="text" name="age" value="{{ old('age') }}" autofocus>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('gender') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <div class="input-group" role="group" aria-label="Basic radio toggle button group">

                            <input type="radio" class="btn-check " name="gender" id="gender1" value="F" autocomplete="off" @if ($student->gender =='F') checked @endif>
                            <label for="gender1">Female</label>
                            <input type="radio" class="btn-check " name="gender" id="gender2" value="M" @if ($student->gender =='M') checked @endif autocomplete="off">
                            <label for="gender2">Male</label>


                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('teacher_id') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <div class="input-group input-group-alternative">
                            <select class="form-select col-md-12" aria-label="Default select example" name="teacher_id">
                                @foreach ($teachers as $teacher )
                                <option value="{{$teacher->id}}" @if ($student->teacher_id == $teacher->id) selected @endif>{{$teacher->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-primary my-4">{{ __('Submit') }}</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
</div>
</div>
@endsection

@push('js')
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.min.js"></script>
<script src="{{ asset('argon') }}/vendor/chart.js/dist/Chart.extension.js"></script>
@endpush