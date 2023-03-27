@php
    $configData = Helper::appClasses();
@endphp

@extends('layouts/layoutMaster')

@section('title', 'Home')

@section('content')
    <div class="container">
        <div class="card my-4">
            <h5 class="card-header text-center text-decoration-underline">Student Database</h5>
            <form class="card-body" action="{{ route('form-store') }}" method="POST">
                @csrf

                @if (session()->has('success'))
                    {{ session()->get('success') }}
                @endif

                @if ($errors->any())
                    @foreach ($errors->all() as $message)
                        <span class="input-error">{{ $message }}</span>
                    @endforeach
                @endif

                <h6>Student Info</h6>
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label" for="multicol-full-name">Full Name</label>
                        <input type="text" id="multicol-full-name" class="form-control" placeholder="Abdullah"
                            name="full_name" />
                        @error('full_name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-roll">Roll</label>
                        <input type="number" id="multicol-roll" class="form-control" placeholder="124282" name="roll" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-student-id">Student ID</label>
                        <input type="number" id="multicol-student-id" class="form-control" placeholder="124282"
                            name="student_id" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-birthdate">Birth Date</label>
                        <input type="text" id="multicol-birthdate" class="form-control dob-picker"
                            placeholder="YYYY-MM-DD" name="dob" />
                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="multicol-father's-name">Father's Name</label>
                        <input type="text" id="multicol-father's-name" class="form-control"
                            placeholder="Abdullah ibn Musa" name="fathers_name" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-mother's-name">Mother's Name</label>
                        <input type="text" id="multicol-mother's-name" class="form-control" placeholder="Amena Khatun"
                            name="mothers_name" />
                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="multicol-depertment">Depertment</label>

                        <select id="multicol-depertment" class="form-select" name="department">

                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>
                            <option value="computer-technology">Computer Technology</option>

                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-semester">Semester</label>

                        <select id="multicol-semester" class="form-select" name="semester">

                            <option value="1st">1st Semester</option>
                            <option value="2nd">2nd Semester</option>
                            <option value="3rd">3rd Semester</option>
                            <option value="4th">4th Semester</option>
                            <option value="5th">5th Semester</option>
                            <option value="6th">6th Semester</option>
                            <option value="7th">7th Semester</option>
                            <option value="8th">8th Semester</option>

                        </select>
                    </div>


                    <div class="col-md-6">
                        <label class="form-label" for="multicol-blood-group">Blood Group</label>

                        <select id="multicol-semester" class="form-select" name="blood">

                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>

                        </select>



                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-country">Country</label>
                        <select id="multicol-country" class="select2 form-select" data-allow-clear="true"
                            name="country"\>
                            <option value="">Select</option>
                            <option value="Australia">Australia</option>
                            <option value="Bangladesh">Bangladesh</option>
                            <option value="Belarus">Belarus</option>
                            <option value="Brazil">Brazil</option>
                            <option value="Canada">Canada</option>
                            <option value="China">China</option>
                            <option value="France">France</option>
                            <option value="Germany">Germany</option>
                            <option value="India">India</option>
                            <option value="Indonesia">Indonesia</option>
                            <option value="Israel">Israel</option>
                            <option value="Italy">Italy</option>
                            <option value="Japan">Japan</option>
                            <option value="Korea">Korea, Republic of</option>
                            <option value="Mexico">Mexico</option>
                            <option value="Philippines">Philippines</option>
                            <option value="Russia">Russian Federation</option>
                            <option value="South Africa">South Africa</option>
                            <option value="Thailand">Thailand</option>
                            <option value="Turkey">Turkey</option>
                            <option value="Ukraine">Ukraine</option>
                            <option value="United Arab Emirates">United Arab Emirates</option>
                            <option value="United Kingdom">United Kingdom</option>
                            <option value="United States">United States</option>
                        </select>
                    </div>

                    <div class="col-md-6 select2-primary">
                        <label class="form-label" for="multicol-language">Language</label>
                        <select id="multicol-language" class="select2 form-select" name="language[]" multiple>
                            <option value="en" selected>English</option>
                            <option value="fr" selected>French</option>
                            <option value="de">German</option>
                            <option value="pt">Portuguese</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-phone">Phone No</label>
                        <input type="text" id="multicol-phone" class="form-control phone-mask"
                            placeholder="+880 17* **** **98" aria-label="658 799 8941" name="phone" />
                    </div>

                    <div class="col-md-6">
                        <label class="form-label" for="multicol-email">Email Address</label>
                        <input type="email" id="multicol-email" class="form-control phone-mask"
                            placeholder="example@gmail.com" name="email" />
                    </div>

                    <div class="col-md-6">
                        <div class="col mt-2">
                            <div class="form-check form-check-inline">
                                <input name="gender" class="form-check-input" type="radio" value="male"
                                    id="male" checked="" />
                                <label class="form-check-label" for="male">Male</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input name="gender" class="form-check-input" type="radio" value="female"
                                    id="female" />
                                <label class="form-check-label" for="female">Female</label>
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6 p-4">
                        <small class="text-light fw-semibold">Hobby</small>
                        <br>
                        <div class="form-check mt-3 form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Gardening" id="defaultCheck1"
                                name="hobby[]">
                            <label class="form-check-label" for="defaultCheck1">
                                Gardening
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Singing" id="defaultCheck2"
                                name="hobby[]">
                            <label class="form-check-label" for="defaultCheck2">
                                Singing
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Dancing" id="defaultCheck3"
                                name="hobby[]">
                            <label class="form-check-label" for="defaultCheck3">
                                Dancing
                            </label>
                        </div>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" value="Travelling" id="disabledCheck1"
                                name="hobby[]">
                            <label class="form-check-label" for="disabledCheck1">
                                Travelling
                            </label>
                        </div>


                    </div>
                </div>


                <div class="pt-4">
                    <button type="submit" class="btn btn-primary me-sm-3 me-1">Submit</button>
                    <button type="reset" class="btn btn-label-secondary">Cancel</button>
                </div>

            </form>
        </div>




    @endsection
