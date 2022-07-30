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
                            <h3 class="mb-0">Exam</h3>
                        </div>
                        <div class="col text-right">
                            <a href="{{ route('exams.create') }}" class="btn btn-primary">
                                Enter exam details
                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @if(count($th) ==0)
                    <div class="no-data">No data</div>
                    @else

                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                @foreach ($th as $thead)
                                <th scope="col">{{$thead}}</th>
                                @endforeach
                                <th scope="col">Actions</th>

                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tdata as $k => $e)
                            <tr scope="col">
                                @foreach ($e as $km)
                                <td>{{$km}}</td>

                                @endforeach
                                <td>
                                    <form action="{{ route('exams.destroy',$e['id']) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('exams.edit',$e['id']) }}">Edit</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif

                </div>
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