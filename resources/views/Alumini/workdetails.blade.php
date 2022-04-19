<!DOCTYPE html>
<html lang="en-US">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>

    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Alumini Management System</title>


    <link rel="stylesheet" href="../css/bootstrap.min.css" />

    <link rel="stylesheet" href="../vendors/themefy_icon/themify-icons.css" />

    <link rel="stylesheet" href="../vendors/swiper_slider/css/swiper.min.css" />

    <link rel="stylesheet" href="../vendors/select2/css/select2.min.css" />

    <link rel="stylesheet" href="../vendors/niceselect/css/nice-select.css" />

    <link rel="stylesheet" href="../vendors/owl_carousel/css/owl.carousel.css" />

    <link rel="stylesheet" href="../vendors/gijgo/gijgo.min.css" />

    <link rel="stylesheet" href="../vendors/font_awesome/css/all.min.css" />
    <link rel="stylesheet" href="../vendors/tagsinput/tagsinput.css" />

    <link rel="stylesheet" href="../vendors/datatable/css/jquery.dataTables.min.css" />
    <link rel="stylesheet" href="../vendors/datatable/css/responsive.dataTables.min.css" />
    <link rel="stylesheet" href="../vendors/datatable/css/buttons.dataTables.min.css" />

    <link rel="stylesheet" href="../vendors/text_editor/summernote-bs4.css" />

    <link rel="stylesheet" href="../vendors/morris/morris.css">

    <link rel="stylesheet" href="../vendors/material_icon/material-icons.css" />

    <link rel="stylesheet" href="../css/metisMenu.css">

    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="../css/colors/default.css" id="colorSkinCSS">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="../vendors\font_awesome\css\all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/09a05bb41f.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>

<body class="crm_body_bg">

    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a href="/alumini/dashboard"><img src="../img/logo.png" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="">
                <a href="/alumini/dashboard" aria-expanded="false">
                    <img src="../img/menu-icon/1.svg" alt="">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="/alumini/project" aria-expanded="false">
                    <i class="fa-solid fa-list"></i>
                    <span>Project Details</span>
                </a>
            </li>
            <li class="mm-active">
                <a href="#" aria-expanded="false">
                    <i class="fa-solid fa-id-card"></i>
                    <span>Work Details</span>
                </a>
            </li>
            <li class="">
                <a href="/alumini/requestlist" aria-expanded="false">
                    <i class="fa-solid fa-list-alt"></i>
                    <span>Request List</span>
                </a>
            </li>
        </ul>
    </nav>


    <section class="main_content dashboard_part">

        <div class="container-fluid no-gutters">
            <div class="row">
                <div class="col-lg-12 p-0">
                    <div class="header_iner d-flex justify-content-between align-items-center">
                        <div class="sidebar_icon d-lg-none">
                            <i class="ti-menu"></i>
                        </div>
                        <div class="serach_field-area">
                            <div class="main-title">
                                <h2 class="mb_7">Alumini Management System</h2>
                            </div>
                        </div>
                        <div class="header_right d-flex justify-content-between align-items-center">
                            <div class="profile_info">
                                @if ($profile->profilePicture != null)
                                    <img src="{{ asset('../img/alumini/' . $profile->profilePicture) }}">
                                @else
                                    <img src="../img/profile.png" alt="#">
                                @endif
                                <div class="profile_info_iner">
                                    <p>Alumini</p>
                                    <h5>{{ $profile->name }}</h5>
                                    <div class="profile_info_details">
                                        <a href="/alumini/profile">My Profile <i class="ti-user"></i></a>
                                        <form class="modal-content-logout" id="logout-form"
                                            action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                            <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Log Out <i
                                                    class="ti-shift-left"></i></a>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="main_content_iner ">
            <div class="container-fluid p-0">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Job vacancy Details</h3>
                                </div>
                                <div class="main-title" style="float: right;">
                                    <h3><a href="#open-modal-editactive"><i class="fa-solid fa-edit" id="editprojectdetails"></i></a></h3>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th scope="col">Job Title</th>
                                        <th scope="col">Company</th>
                                        <th scope="col">Company's Website</th>
                                        <th scope="col">Experience</th>
                                        <th scope="col">Vacancies</th>
                                        <th scope="col">Referal Id</th>
                                        <th scope="col">Edit</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($jobData) != null)
                                        @foreach ( $jobData as $data)
                                            <tr>
                                                <td>{{ $data -> position }}</td>
                                                <td>{{ $data -> company }}</td>
                                                <td>{{ $data -> website }}</td>
                                                <td>{{ $data -> experiance }}</td>
                                                <td>{{ $data -> vacancies }}</td>
                                                <td>{{ $data -> referal }}</td>
                                                <td><a href="#open-modal-update-{{ $data -> jobsId }}"><i class="fa-solid fa-edit"
                                                            id="update"></i></a></td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>No Data Available</td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="footer_part">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="footer_iner text-center">
                            <p>2022 Designed and Developed under<i class="ti-heart"></i><a
                                    href="https://www.nxtgio.com/" target="_blank">
                                    nxtGIO Technologies LLP</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<!-- pop up modal -->
<form method="Post" action={{ url('addjobvacancy') }} enctype="multipart/form-data">
@csrf
    <div id="open-modal-editactive" class="modal-window-pro">
        <div>
            <a href="#modal-close-edit" title="Close" class="modal-close-pro"> &times;</a>
            <div class="input-field-pop">
                <div class="white_box mb_30">
                    <div class="box_header ">
                        <div class="main-title">
                            <h3 class="mb-0">Enter Job Vacancy Details</h3>
                        </div>
                    </div>
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th>Job Title</th>
                                <td><input type="text" class="form-control" id="title" name="title" style="border: none;" placeholder="Enter Here..."></td>
                            </tr>
                            <tr>
                                <th>Company</th>
                                <td><input type="text" class="form-control" id="company" name="company" style="border: none;" placeholder="Enter Here..."></td>
                            </tr>
                            <tr>
                                <th>Company's Website</th>
                                <td><input type="text" class="form-control" id="website" name="website" style="border: none;" placeholder="Enter Here..."></td>
                            </tr>
                            <tr>
                                <th>Experience</th>
                                <td><input type="text" class="form-control" id="experience" name="experience" style="border: none;" placeholder="Enter Here..."></td>
                            </tr>
                            <tr>
                                <th>Vacancies</th>
                                <td><input type="text" class="form-control" id="vacancies" name="vacancies" style="border: none;" placeholder="Enter Here..."></td>
                            </tr>
                            <tr>
                                <th>Referal Id</th>
                                <td><input type="text" class="form-control" id="referal" name="referal" style="border: none;" placeholder="Enter Here..."></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <button type="submit" class="btn btn-outline-primary">Save</button>
            </div>
        </div>
    </div>
</form>


<form method="Post" action={{ url('addjobvacancy') }} enctype="multipart/form-data">
    @csrf
    @foreach ( $jobData as $data)
        <div id="open-modal-update-{{ $data -> jobsId }}" class="modal-window-pro">
            <div>
                <a href="#modal-close-edit" title="Close" class="modal-close-pro"> &times;</a>
                <div class="input-field-pop">
                    <div class="white_box mb_30">
                        <div class="box_header ">
                            <div class="main-title">
                                <h3 class="mb-0">Update Work Details</h3>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <input type="hidden" name="id" id="id" value="{{ $data -> jobsId }}">
                            <tbody>
                                <tr>
                                    <th>Job Title</th>
                                    <td><input type="text" class="form-control"id="title" name="title" style="border: none;" value="{{ $data -> position }}"></td>
                                </tr>
                                <tr>
                                    <th>Company</th>
                                    <td><input type="text" class="form-control" id="company" name="company" style="border: none;" value="{{ $data -> company }}"></td>
                                </tr>
                                <tr>
                                    <th>Company's Website</th>
                                    <td><input type="text" class="form-control" id="website" name="website" style="border: none;" value="{{ $data -> website }}"></td>
                                </tr>
                                <tr>
                                    <th>Experience</th>
                                    <td><input type="text" class="form-control" id="experience" name="experience" style="border: none;" value="{{ $data -> experiance }}"></td>
                                </tr>
                                <tr>
                                    <th>Vacancies</th>
                                    <td><input type="text" class="form-control" id="vacancies" name="vacancies" style="border: none;" value="{{ $data -> vacancies }}"></td>
                                </tr>
                                <tr>
                                    <th>Referal Id</th>
                                    <td><input type="text" class="form-control" id="referal" name="referal" style="border: none;" value="{{ $data -> referal }}"></td>
                                </tr>
                            </tbody>
                        </table>
                            <button type="submit" class="btn btn-primary">Update</button></a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</form>



    <script src="../js/jquery-3.4.1.min.js"></script>

    <script src="../js/popper.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/metisMenu.js"></script>

    <script src="../vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="../vendors/count_up/jquery.counterup.min.js"></script>

    <script src="../vendors/swiper_slider/js/swiper.min.js"></script>

    <script src="../vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="../vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="../vendors/gijgo/gijgo.min.js"></script>

    <script src="../vendors/tagsinput/tagsinput.js"></script>

    <script src="../vendors/text_editor/summernote-bs4.js"></script>

    <script src="../js/custom.js"></script>
    <script>
        @if ($errors->all() ? 'has-error' : '')
            @foreach ($errors->all() as $error)
                swal({
                title: "Failed to Update Profile Picture",
                icon: "warning",
                button: "Done",
                });
            @endforeach
        @endif
    </script>
    <script>
        @if (session('status'))
            swal({
            title: ' {{ session('status') }}',
            icon: "success",
            button: "Done",
            });
        @endif
    </script>
</body>

</html>
