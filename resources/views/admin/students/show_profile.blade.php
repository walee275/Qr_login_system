<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
    <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
    <link href="{{ asset('template/css/custom.css') }}" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
    <style>
        audio,
        canvas,
        embed,
        iframe,
        img,
        object,
        svg,
        video,
        g,
        rect {
            display: inline !important;
            /* vertical-align: end; */
        }
    </style>
</head>

<body>
    <div class="main-content">
        <!-- Top navbar -->
        <nav class="navbar navbar-top navbar-expand-md navbar-dark" id="navbar-main">
            <div class="container-fluid">
                <!-- Brand -->
                <a class="h4 mb-0 text-white text-uppercase d-none d-lg-inline-block" href="#">Employee
                    Profile</a>
                {{-- <!-- Form -->
        <form class="navbar-search navbar-search-dark form-inline mr-3 d-none d-md-flex ml-lg-auto">
          <div class="form-group mb-0">
            <div class="input-group input-group-alternative">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input disabled class="form-control" placeholder="Search" type="text">
            </div>
          </div>
        </form> --}}
                <!-- User -->
                <ul class="navbar-nav align-items-center d-none d-md-flex">
                    <li class="nav-item dropdown">
                      <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                          <span class="avatar avatar-sm rounded-circle">
                            <img alt="Image placeholder" src="{{ asset('student_uploads/'.$student->profile_picture)  }}">
                          </span>
                          <div class="media-body ml-2 d-none d-lg-block">
                            <span class="mb-0 text-sm  font-weight-bold">{{ $student->name }}</span>
                          </div>
                        </div>
                      </a>
                    </li>
                  </ul>
            </div>
        </nav>
        <!-- Header -->
        <div class="header pb-8 pt-5 pt-lg-8 d-flex align-items-center" style="min-height: 300px; ">
            <!-- Mask -->
            <span class="mask bg-gradient-default opacity-8"></span>

        </div>
        <!-- Page content -->
        <div class="container-fluid mt--7">
            <div class="row">
                <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                    <div class="card card-profile shadow">
                        <div class="row justify-content-center">
                            <div class="col-lg-3 order-lg-2">
                                <div class="card-profile-image">
                                    <a href="#">
                                        <img src="{{ asset('student_uploads/' . $student->profile_picture) }}"
                                            class="rounded-circle">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">
                            <div class="d-flex justify-content-between">
                                <a href="#" class=""></a>
                                <a href="#" class=""></a>
                            </div>
                        </div>
                        <div class="card-body pt-0 pt-md-4">
                            <div class="row mb-5">
                                {{-- <div class="col">
                  <div class="card-profile-stats d-flex justify-content-center mt-md-5">
                    <div>
                      <span class="heading">22</span>
                      <span class="description">Friends</span>
                    </div>
                    <div>
                      <span class="heading">10</span>
                      <span class="description">Photos</span>
                    </div>
                    <div>
                      <span class="heading">89</span>
                      <span class="description">Comments</span>
                    </div>
                  </div>
                </div> --}}
                            </div>
                            <div class="text-center " style="margin-top: 4rem !important;">
                                <h3>
                                    {{ $student->name }} <br><span class="font-weight-light"> {{ $student->dob }}</span>
                                </h3>
                                <div class="h5 font-weight-300 mb-4">
                                    <i class="ni location_pin mr-2"></i>{{ $student->address }}
                                </div>
                                <div class="h5" >
                                    <i class="ni business_briefcase-24 mr-2"></i>@php
                                        if ($student->company && $student->company->name != null && $student->company->name != '') {
                                            echo $student->company->name;
                                        } else {
                                            echo "It's Complicated";
                                        }
                                    @endphp
                                </div>
                                <div>
                                    <i class="ni education_hat mr-2"></i>University of Computer Science
                                </div>
                                <div>
                                    <a href="{{ route('logout') }}" class="mt-3 dropdown-item">
                                        <span>Logout</span>
                                    </a>
                                </div>
                                <hr class="my-4">
                                <p>Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes,
                                    performs and records all of his own music.</p>
                                {{-- <button href="#" class="mb-2 border-0 " id="see_qr">See Your Qr</button> --}}
                                <div id="qr" class="mt-5 text-center">
                                    {{ QrCode::size(150)->generate($student->qr_code) }} </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-8 order-xl-1">
                    <div class="card bg-secondary shadow">
                        <div class="card-header bg-white border-0">
                            <div class="row align-items-center">
                                <div class="col-8">
                                    <h3 class="mb-0">My account</h3>
                                </div>
                                <div class="col-4 text-right">
                                    <a href="#!" class=""></a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form>
                                <h6 class="heading-small text-muted mb-4">User information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label"
                                                    for="input-username">Username</label>
                                                <input disabled type="text" id="input-username"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Username" value="{{ $student->name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-email">Email
                                                    address</label>
                                                <input disabled type="email" id="input-email"
                                                    class="form-control form-control-alternative"
                                                    placeholder="{{ $student->email }}">
                                            </div>
                                        </div>
                                    </div>
                                    @php
                                        $full_name = explode(' ', $student->name);
                                        $first_name = $full_name[0];
                                        $last_name = $full_name[1];
                                        //   dd($first_name)
                                    @endphp
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-first-name">First
                                                    name</label>
                                                <input disabled type="text" id="input-first-name"
                                                    class="form-control form-control-alternative"
                                                    placeholder="First name" value="{{ $first_name }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-last-name">Last
                                                    name</label>
                                                <input disabled type="text" id="input-last-name"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Last name" value="{{ $last_name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Address -->
                                <h6 class="heading-small text-muted mb-4">Contact information</h6>
                                <div class="pl-lg-4">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-address">Address</label>
                                                <input disabled id="input-address"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Home Address" value=" {{ $student->address }} "
                                                    type="text">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-city">City</label>
                                                <input disabled type="text" id="input-city"
                                                    class="form-control form-control-alternative" placeholder="City"
                                                    value="{{ $student->city }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group focused">
                                                <label class="form-control-label" for="input-country">State</label>
                                                <input disabled type="text" id="input-country"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Country" value="{{ $student->state }}">
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Postal
                                                    code</label>
                                                <input disabled type="number" id="input-postal-code"
                                                    class="form-control form-control-alternative"
                                                    placeholder="Postal code" value="25000">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr class="my-4">
                                <!-- Description -->
                                <h6 class="heading-small text-muted mb-4">About me</h6>
                                <div class="pl-lg-4">
                                    <div class="form-group focused">
                                        <label>About Me</label>
                                        <textarea disabled rows="4" class="form-control form-control-alternative" placeholder="A few words about you ...">Lorem ipsum dolor sit amet consectetur adipisicing elit. Reprehenderit sit minus sed at voluptatum ea vel tenetur eligendi voluptate fugit! Debitis at, error mollitia consequatur distinctio excepturi illo officia fuga.</textarea>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <footer class="footer">
        <div class="row align-items-center justify-content-xl-between">
            <div class="col-xl-6 m-auto text-center">
                <div class="copyright">
                    {{-- <p> <a href="https://www.creative-tim.com/product/argon-dashboard" target="_blank">Argon Dashboard</a> by Creative Tim</p> --}}
                </div>
            </div>
        </div>
    </footer>

    <script>
        // const qrbtn = document.getElementById('see_qr');
        // const qrElement = document.getElementById('qr');

        // qrbtn.addEventListener('click', function(e) {
        //     e.preventDefault();
        //     // Show the QR code element
        //     qrElement.classList.remove('d-none');

        // });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
    </script>
    <script src="{{ asset('template/js/scripts.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
    <script src="{{ asset('template/js/datatables-simple-demo.js') }}"></script>
</body>



</html>
