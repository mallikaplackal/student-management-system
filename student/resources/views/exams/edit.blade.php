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
                            <h3 class="mb-20">Exams</h3>
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


                <form action="{{ route('exams.store') }}" method="POST">
                    @csrf
                    <div class="form-group{{ $errors->has('student_id') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <label class="col-md-4" for="student_id"> Student</label>
                        <div class="input-group input-group-alternative">
                            <select class="form-select col-md-12" name="student_id" aria-label="Default select example">
                                <option value="" selected>Select students</option>
                                @foreach ($students as $student)
                                <option value="{{$student->id}}" @if ($student->id == $student_id) selected @endif>{{$student->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('term_id') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <label class="col-md-4" for="term_id">Select Term</label>
                        <div class="input-group input-group-alternative">
                            <select class="form-select col-md-12" name="term_id" aria-label="Default select example ">
                                @foreach ($terms as $term)
                                <option value="{{$term->id}}" @if ($term->id == $term_id) selected @endif >{{$term->name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    @foreach ($subjects as $subject)
                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }} mb-3 col-md-6">
                        <label class="col-md-4" for="sub_{{$subject->id}}"> {{$subject->name}}</label>
                        <div class="input-group input-group-alternative">

                            <input type="text" name="sub_{{$subject->id}}" class="form-control" placeholder="enter mark" />
                        </div>
                    </div>
                    @endforeach
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