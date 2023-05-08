@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('vendor-style')
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-checkboxes-jquery/datatables.checkboxes.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.css') }}" />
    <!-- Row Group CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-rowgroup-bs5/rowgroup.bootstrap5.css') }}">
    <!-- Form Validation -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
@endsection

@section('vendor-script')
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <!-- Flat Picker -->
@endsection

{{-- @section('page-script')
    <script src="{{ asset('assets/js/tables-datatables-basic.js') }}"></script>
@endsection --}}

@section('content')
    <h4 class="fw-bold py-3 mb-4">
        <span class="fw-bold">Student Records </span>
    </h4>

    <!-- DataTable with Buttons -->
    <div class="card">
        <div class="card-datatable table-responsive pt-0">
            <table class="datatables-basic table">
                <thead>
                    <tr>
                        <th>Profile Image</th>
                        <th>Name</th>
                        <th>Roll</th>
                        <th>ID</th>
                        <th>Department</th>
                        <th>Semester</th>
                    </tr>
                </thead>
                <tbody>

                    @foreach ($list as $single)
                        <tr>
                            <td>
                                <div class="avatar-wrapper">
                                    <div class="avatar me-2">
                                        <img src="{{ '/student-images/' . $single->file }}" alt="{{ $single->full_name }}"
                                            class="rounded-circle">
                                    </div>
                                </div>

                            </td>
                            <td>

                                <a href="{{ route('single-details', $single->id) }}">{{ $single->full_name }}</a>

                            </td>
                            <td>{{ $single->roll }}</td>
                            <td>{{ $single->student_id }}</td>
                            <td>{{ $single->department }}</td>
                            <td>{{ $single->semester }}</td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>
    </div>

    {{ $list->links('vendor.pagination.bootstrap-5') }}

    <!--/ DataTable with Buttons -->



@endsection
