<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>

    <style>
        .card-registration .select-input.form-control[readonly]:not([disabled]) {
            font-size: 1rem;
            line-height: 2.15;
            padding-left: .75em;
            padding-right: .75em;
        }

        .card-registration .select-arrow {
            top: 13px;
        }
    </style>
</head>

<body style="">
    <div class="" style="background-image: url({{ asset('template/assets/img/img4 (1).webp') }});">
        <section class="h-75 " style="background-image: url('{{ asset('template/assets/img/img4 (1).webp') }}');">
            <div class="container py-1 h-100">
                <div class="row d-flex justify-content-center align-items-center h-100">
                    <div class="col">
                        <div class="card card-registration my-4">
                            <div class="row g-0">
                                <div class="col-xl-6 d-none d-xl-block">
                                    <img src="{{ asset('template/assets/img/img4.webp') }}" alt="Sample photo"
                                        class="img-fluid"
                                        style="border-top-left-radius: .25rem; border-bottom-left-radius: .25rem;" />
                                </div>
                                <div class="col-xl-6">
                                    <div class="card-body p-md-5 text-black">
                                        <h3 class="mb-5 text-uppercase">Registration form</h3>
                                        @include('partials.alerts')
                                        <form action="{{ route('admin.student.create') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" id="f_name" name="f_name"
                                                            class="form-control form-control-lg @error('f_name') is-invalid @enderror" placeholder="Enter First Name" />
                                                        <label class="form-label" for="f_name">First name</label>
                                                        <p class="text-danger">@error('f_name') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" id="l_name" name="l_name"
                                                            class="form-control form-control-lg @error('l_name') is-invalid @enderror" placeholder="Enter Last Name"  />
                                                        <label class="form-label" for="l_name">Last name</label>
                                                        <p class="text-danger"> @error('l_name') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="email" name="email"
                                                            class="form-control form-control-lg @error('email') is-invalid @enderror" placeholder="Enter email"  />
                                                        <label class="form-label" for="email">Email ID</label>
                                                        <p class="text-danger">@error('email') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline">
                                                        <input type="text" id="phone_no" name="phone_no"
                                                            class="form-control form-control-lg @error('phone_no') is-invalid @enderror" placeholder="Enter phone no" />
                                                        <label class="form-label" for="phone_no">Phone No</label>
                                                        <p class="text-danger">@error('phone_no') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="cnic" name="cnic"
                                                            class="form-control form-control-lg @error('cnic') is-invalid @enderror" placeholder="Enter cnic"/>
                                                        <label class="form-label" for="cnic">CNIC</label>
                                                        <p class="text-danger"> @error('cnic') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline mb-4">
                                                        <input type="date" id="dob" name="dob"
                                                            class="form-control form-control-lg @error('dob') is-invalid @enderror" placeholder="Enter dob"/>
                                                        <label class="form-label" for="dob">DOB</label>
                                                        <p class="text-danger"> @error('dob') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline mb-4">
                                                        <input type="text" id="state" name="state"
                                                            class="form-control form-control-lg @error('state') is-invalid @enderror" placeholder="Enter state"/>
                                                        <label class="form-label" for="state">State</label>
                                                        <p class="text-danger">@error('state') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6 mb-4">
                                                    <div class="form-outline mb-4">
                                                        <input type="test" id="city" name="city"
                                                            class="form-control form-control-lg @error('city') is-invalid @enderror" placeholder="Enter city"/>
                                                        <label class="form-label" for="city">City</label>
                                                        <p class="text-danger">@error('city') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-outline mb-4">
                                                        <select name="gender" id="gender"
                                                            class="form-select form-select-lg @error('gender') is-invalid @enderror">
                                                            <option value="">Select Gender</option>
                                                            <option value="male">Male</option>
                                                            <option value="female">Female</option>
                                                        </select>
                                                        <label class="form-label" for="gender">Gender</label>
                                                        <p class="text-danger">@error('gender') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-outline mb-4">
                                                        <input type="file" id="picture"
                                                            name="picture"
                                                            class="form-control form-control-lg @error('picture') is-invalid @enderror" />
                                                        <label class="form-label" for="picture">Profile
                                                            Picture</label>
                                                            <p class="text-danger">@error('picture') {{ $message }} @enderror</p>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-outline mb-4">
                                                <input type="text" id="address" name="address"
                                                    class="form-control form-control-lg @error('address') is-invalid @enderror" placeholder="Enter address"/>
                                                <label class="form-label" for="address">Address</label>
                                                <p class="text-danger"> @error('address') {{ $message }} @enderror</p>
                                            </div>
                                            <div>
                                                <p>Already have an acount? <a href="{{ route('login') }}">Login</a></p>
                                            </div>
                                            <div class="d-flex justify-content-end pt-3">
                                                {{-- <button type="button" class="btn btn-light btn-lg">Reset all</button> --}}
                                                <button type="submit" class="btn btn-warning btn-lg ms-2">Submit
                                                    form</button>
                                            </div>
                                        </form>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>

</html>
