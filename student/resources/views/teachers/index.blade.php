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
                            <h3 class="mb-0">Teachers</h3>
                        </div>
                        <div class="col text-right">
                            <!-- <a href="{{ route('teachers.create') }}" class="btn btn-primary">
                                create teacher
                            </a> -->
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    @if($teachers->isEmpty())
                    <div class="no-data">No data</div>
                    @else
                    <table class="table align-items-center table-flush">
                        <thead class="thead-light">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($teachers as $teacher)
                            <tr>
                                <td>
                                    {{ $teacher->name }}
                                </td>


                                <td>
                                    <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>

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