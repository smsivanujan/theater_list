@extends('layouts.app')

@section('styles')

@endsection

@section('content')

<!-- PAGE-HEADER -->
<div class="page-header">
    <div class="ms-auto pageheader-btn">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="javascript:void(0);">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">List of Operation</li>
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
                    <h3 class="card-title">Theater List of Operation</h3>
                </div>
                <div class="col-lg-6 text-end">
                    <button type="button" title="Add" id="btn-add" class="modal-effect btn btn-primary-gradient btn-pill" data-bs-effect="effect-sign" data-bs-toggle="modal" data-bs-target="#modal_"><i class="fe fe-plus me-2"></i>Add</button>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered text-nowrap border-bottom operationList-table" id="file-datatable">
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>No</th>
                                <th>Category</th>
                                <th>Surgery Date</th>
                                <th>Surgery</th>
                                <th>PHN</th>
                                <th>Full Name</th>
                                <th>B.H.T</th>
                                <th>Ward</th>
                                <th>Diagnosis</th>
                                <th>Age</th>
                                <th>Sex</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($operationList as $row)
                            <tr>
                                <td>
                                    <a class="btn btn-blue edit" title="Edit"
                                        data-id="{{ $row->id }}"
                                        data-category="{{ $row->category }}"
                                        data-surgery_date="{{ $row->surgery_date }}"
                                        data-patientID="{{ $row->patientID }}"
                                        data-surgery="{{ $row->surgery_id }}"
                                        data-prefix="{{ $row->patientPersonalTitle }}"
                                        data-full_name="{{ $row->patientName }}"
                                        data-age="{{ $row->age }}"
                                        data-gender="{{ $row->patientSex }}"
                                        data-ward="{{ $row->ward }}"
                                        data-BHTClinicFileNo="{{ $row->BHTClinicFileNo }}"
                                        data-diagnosis="{{ $row->diagnosis }}">
                                        <i style="color:rgb(226, 210, 210);cursor: pointer" class="fa fa-edit"></i>
                                    </a>
                                </td>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->category }}</td>
                                <td>{{ $row->surgery_date }}</td>
                                <td>{{ $row->surgery_name }}</td>
                                <td>{{ $row->patientID }}</td>
                                <td>{{ $row->patientName }}</td>
                                <td>{{ $row->BHTClinicFileNo }}</td>
                                <td>{{ $row->ward }}</td>
                                <td>{{ $row->diagnosis }}</td>
                                <td>{{ $row->age }}</td>
                                <td>{{ $row->patientSex }}</td>
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
<div class="modal fade" id="modal_">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content modal-content-demo">
            <div class="modal-header">
                <h6 class="modal-title" id="createFormModal">Theater List of Operation</h6>
                <button aria-label="Close" class="btn-close" data-bs-dismiss="modal"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="d-flex justify-content-center mb-4">
                <div class="form-group text-center">
                    <label class="form-label" for="search-box">Patient</label>
                    <form id="search-form" action="{{ route('patient.search') }}" method="GET">
                        <div class="input-group">
                            <input type="text" class="form-control" name="id_patient" id="id_patient" hidden>
                            <input type="text" class="form-control" id="search-box" name="search-term" placeholder="Search for...">
                            <button type="button" id="search-button" class="input-group-text btn btn-primary text-white">Search!</button>
                        </div>
                    </form>
                    <label for="">Search with PHN/NIC/Passport/BHT/Phone Number(Handphone or Landline)</label>
                    <div id="search-result" class="mt-3 text-red"></div>
                </div>
            </div>
            <div class="modal-body text-start">
                <form action="{{ route('operationList.save') }}" method="POST" class="needs-validation" novalidate>
                    @csrf
                    <input type="text" class="form-control" name="id" id="id" hidden>

                    <div class="row mb-3 bg-info">
                        <h3 class="card-title text-center">Personal Info</h3>
                        <table class="table table-borderless">
                            <tbody>
                                <tr>
                                    <td><strong>PHN:</strong><br><input type="text" class="form-control" id="patient" name="patient" readonly></td>
                                    <td><strong>BHT:</strong><br><input type="text" class="form-control" id="BHTClinicFileNo" readonly></td>
                                    <td><strong>Gender:</strong><br><input type="text" class="form-control" id="gender" readonly></td>
                                </tr>
                                <tr>
                                    <td><strong>Full Name:</strong><br><input type="text" class="form-control" id="full_name" readonly></td>
                                    <td><strong>Ward:</strong><br><input type="text" class="form-control" id="ward" readonly></td>
                                    <td><strong>Age:</strong><br><input type="text" class="form-control" id="age" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-6">
                            <label for="category">Surgery Category<span class="required text-red">*</span></label>
                            <select class="form-select" id="category" name="category" required>
                                <option selected disabled value="">Choose...</option>
                                <option Value="Routine Local">Routine Local</option>
                                <option Value="Routine General">Routine General</option>
                                <option Value="Casuality Local">Casuality Local</option>
                                <option Value="Casuality General">Casuality General</option>
                            </select>
                            <div class="invalid-feedback">Please select a surgery category.</div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="surgery_date">Surgery Date<span class="required text-red">*</span></label>
                            <input type="date" class="form-control" id="surgery_date" name="surgery_date" required>
                            <div class="invalid-feedback">Please enter the surgery date.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label for="surgery">Surgery Type<span class="required text-red">*</span></label>
                            <select class="form-control select2-show-search form-select" data-placeholder="Choose Surgery" name="surgery" id="surgery" required>
                                <option label="Choose"></option>
                                @foreach ($surgeries as $item)
                                <option value="{{ $item->id }}" {{ old('surgery_id') == $item->id ? 'selected' : '' }}>
                                    {{ $item->surgery_name }}
                                </option>
                                @endforeach
                            </select>
                            <div class="invalid-feedback">Please select the surgery.</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="form-group col-md-12">
                            <label for="diagnosis">Diagnosis</label>
                            <textarea class="form-control mb-2" id="diagnosis" name="diagnosis" rows="3"></textarea>
                        </div>
                    </div>

                    <div class="text-end">
                        <button type="reset" id="reset" class="btn btn-danger-gradient btn-pill">Reset</button>
                        <button type="submit" class="btn btn-primary-gradient btn-pill" id="submitButton">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')

<script>
    document.getElementById('search-button').addEventListener('click', function() {
        var searchTerm = document.getElementById('search-box').value;

        fetch('{{ route("patient.search") }}?search-term=' + encodeURIComponent(searchTerm))
            .then(response => response.json())
            .then(data => {
                var resultContainer = document.getElementById('search-result');
                if (data.message) {
                    resultContainer.textContent = data.message;

                    $("#id").val(0);
                    $("#category").val('').trigger('change');
                    $("#patient").val('');
                    $("#surgery").val('').trigger('change');
                    $("#surgery_date").val('');
                    // $("#prefix").val('');
                    $("#full_name").val('');
                    $("#gender").val('');
                    $("#age").val('');
                    $("#ward").val('');
                    $("#BHTClinicFileNo").val('');
                    $("#diagnosis").val('');
                } else {
                    resultContainer.textContent='';
                }
            })
            .catch(error => {
                console.error('Error:', error.message);
            });
    });
</script>

<script>
    function calculateAge(dateOfBirth) {
        var dob = new Date(dateOfBirth);
        var today = new Date();
        var age = today.getFullYear() - dob.getFullYear();
        var monthDiff = today.getMonth() - dob.getMonth();
        if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
            age--;
        }
        return age;
    }

    $('#search-button').click(function() {
        var searchTerm = $('#search-box').val();
        $.ajax({
            url: "{{ route('patient.search') }}",
            method: 'GET',
            data: {
                'search-term': searchTerm
            },
            success: function(response) {
                if (response) {
                    $('#id_patient').val(response.patientID);
                    $('#patient').val(response.patientID);
                    // $('#prefix').text(response.patientPersonalTitle);
                    // $('#full_name').val(response.patientName);
                    var fullname = response.patientPersonalTitle + ' ' + response.patientName;
                    $('#full_name').val(fullname);
                    $('#gender').val(response.patientSex);
                    var age = calculateAge(response.patientDateofbirth);
                    $('#age').val(age);
                    $('#ward').val(response.ward);
                    $('#BHTClinicFileNo').val(response.BHTClinicFileNo);
                } else {
                    alert('No patient found.');
                }
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    });
</script>

<script>
    $(document).ready(function() {
        // show modal on backend validation error
        if (!@json($errors -> isEmpty())) {
            $('#modal_').modal('show');
            var id = $('#id').val();
            if (id == 0) {
                $('#createFormModal').html('Create Operation List');
            } else {
                $('#createFormModal').html('Update Operation List');
            }
        }

        // create new record
        $('#btn-add').click(function() {
            document.querySelector('#search-form').querySelectorAll('input, button').forEach(function(element) {
                element.disabled = false;
            });
            $("#id").val(0);
            $("#category").val('').trigger('change');
            $("#patient").val('');
            $("#surgery").val('').trigger('change');
            $("#surgery_date").val('');
            // $("#prefix").text('');
            $("#full_name").val('');
            $("#gender").val('');
            $("#age").val('');
            $("#ward").val('');
            $("#BHTClinicFileNo").val('');
            $("#diagnosis").val('');
            $('#createFormModal').html('Create Operation List');
            $('p').html('');
            $('#modal_').modal('show');
        });

        // edit record
        $('.operationList-table').on('click', '.edit', function() {
            document.querySelector('#search-form').querySelectorAll('input, button').forEach(function(element) {
                element.disabled = true;
            });
            $("#id").val($(this).attr('data-id'));
            $("#category").val($(this).attr('data-category'));
            $("#patient").val($(this).attr('data-patientID'));
            $("#surgery").val($(this).attr('data-surgery')).trigger('change');
            $("#surgery_date").val($(this).attr('data-surgery_date'));

            // $("#prefix").text($(this).attr('data-prefix'));
            // $("#full_name").val($(this).attr('data-full_name'));
            var prefix = $(this).attr('data-prefix');
            var name = $(this).attr('data-full_name');
            $("#full_name").val(prefix + ' ' + name);

            $("#gender").val($(this).attr('data-gender'));
            $("#age").val($(this).attr('data-age'));
            $("#ward").val($(this).attr('data-ward'));
            $("#BHTClinicFileNo").val($(this).attr('data-BHTClinicFileNo'));
            $("#diagnosis").val($(this).attr('data-diagnosis')).trigger('change');
            $('#createFormModal').html('Update Operation List');
            $('p').html('');
            $('#modal_').modal('show');
        });
    });
</script>


@endsection