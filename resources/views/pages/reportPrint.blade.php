@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Print Theater List</li>
        </ol>
    </div>
</div>
<!-- PAGE-HEADER END -->

<!-- Row -->
<div class="row row-sm">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header border-bottom">
                <div class="col-lg-6">
                    <h3 class="card-title">List of Operation</h3>
                </div>
            </div>
            <div class="card-body">

                <div class="row">
                    <form action="{{ route('reportPrint.index') }}" method="GET" class="row m-0 pt-3">
                        <div class="form-group col-md-4">
                            <label for="category">Surgery Category <span class="required text-red">*</span></label>
                            <select class="form-select" name="category" required>
                                <option selected disabled value="">Choose...</option>
                                <option Value="Routin Local" {{$category == 'Routin Local' ? 'selected':''}}>Routin Local</option>
                                <option Value="Routin General" {{$category == 'Routin General' ? 'selected':''}}>Routin General</option>
                                <option Value="Casuiality Local" {{$category == 'Casuiality Local' ? 'selected':''}}>Casuiality Local</option>
                                <option Value="Casuiality General" {{$category == 'Casuiality General' ? 'selected':''}}>Casuiality General</option>
                            </select>
                            <div class="invalid-feedback">Please select a surgery category.</div>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="full_name">Surgery Date <span class="required text-red">*</span></label>
                            <input type="date" class="form-control" id="surgery_date" name="surgery_date" value="{{$surgeryDate}}" placeholder="Enter Surgery Date" required>
                            <div class="invalid-feedback">Please Enter the Surgery Date.</div>
                        </div>
                        <div class="form-group col-md-4" style="margin-top:24px">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </form>
                </div>

                <hr>

                <div class="row">
                    <form action="{{ route('reportPrint.print') }}" method="POST" target="_blank" class="row m-0 pt-3">
                        @csrf
                        <div class="form-group col-md-4">
                            <label for="consultant">Consultant <span class="required text-red">*</span></label>
                            <select class="form-select" name="consultant" required>
                                <option selected disabled value="">Choose...</option>
                                <option value="Dr.K.Guruparan">Dr.K.Guruparan</option>
                                <option value="Dr.S.Raguraman">Dr.S.Raguraman</option>
                                <option value="Dr.K.Muhunthan">Dr.K.Muhunthan</option>
                                <option value="Dr.G.Bavani">Dr.G.Bavani</option>
                            </select>
                            <div class="invalid-feedback">Please select a consultant.</div>
                        </div>
                        <div class="form-group col-md-4" style="margin-top:28px">
                            <input type="hidden" name="operationList" value="{{ json_encode($operationList) }}">
                            <input type="hidden" name="surgeryDate" value="{{ $surgeryDate }}">
                            {{--<input type="hidden" name="consultant" value="{{ $consultant }}">--}}
                            <input type="hidden" name="category" value="{{ $category }}">
                            <button type="submit" class="btn btn-primary">Print</button>
                        </div>
                    </form>
                </div>

                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom operationList-table" id="responsive-datatable">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Category</th>
                                <th>Surgery Date</th>
                                <th>Surgery</th>
                                <th>PHN</th>
                                <th>Full Name</th>
                                <th>B.H.T</th>
                                <th>Ward</th>
                                <th>Dr</th>
                                <th>Age</th>
                                <th>Sex</th>
                                <th>Diagnosis</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operationList as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->category }}</td>
                                <td>{{ $row->surgery_date }}</td>
                                <td>{{ $row->surgery_name }}</td>
                                <td>{{ $row->patientID }}</td>
                                <td>{{ $row->patientName }}</td>
                                <td>{{ $row->BHTClinicFileNo }}</td>
                                <td>{{ $row->ward }}</td>
                                <td>{{ $row->age }}</td>
                                <td>{{ $row->patientSex }}</td>
                                <td>{{ $row->diagnosis }}</td>
                                <td>{{ $row->status }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Row -->
@endsection

{{-- modal section --}}
@section('modal')

@endsection

@section('scripts')

@endsection