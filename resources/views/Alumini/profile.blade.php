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
    <link rel="stylesheet" href="../https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="vendors\font_awesome\css\all.min.css" rel="stylesheet">
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
            <li class="">
                <a href="/alumini/workdetails" aria-expanded="false">
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
                                    <p>Alumini </p>
                                    <h5>{{ $profile->name }}</h5>
                                    <div class="profile_info_details">
                                        <a href="#">My Profile <i class="ti-user"></i></a>
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Profile</h3>
                                </div>

                                <div class="main-title" style="float: right;">
                                    <h3><a href="#open-modal-editactive"><i class="fa-solid fa-edit" id="editprofiledetails"></i></a></h3>
                                </div>
                            </div>
                            <div class="profile-card-4">
                                <div class="profile-img">
                                @if ($profile->profilePicture != null)
                                    <img src="{{ asset('../img/alumini/' . $profile->profilePicture) }}">
                                @else
                                    <img src="../img/profile.png" alt="#">
                                @endif
                                </div>
                                <div class="profile-content">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-8">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>{{ $profile->name }}</td>
                                            <td>{{ $profile->email }}</td>
                                            <td>{{ $profile->phone }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="white_box mb_30">
                                    <div class="box_header ">
                                        <div class="main-title">
                                            <h3 class="mb-0">Job Details</h3>
                                        </div>

                                        <div class="main-title" style="float: right;">
                                            <h3><a href="#open-modal-editactivejob"><i class="fa-solid fa-edit" id="editjobdetails"></i></a></h3>
                                        </div>
                                    </div>
                                    <div class="QA_section">
                                        <div class="QA_table mb_30">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Company Name</th>
                                                        <th scope="col">Designation</th>
                                                        <th scope="col">Experiance</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if($jobDetails != null)
                                                        <tr>
                                                            <td>{{ $jobDetails->companyName }}</td>
                                                            <td>{{ $jobDetails->jobDesignation }}</td>
                                                            <td>{{ $jobDetails->jobExperiance }}</td>
                                                        </tr>
                                                    @else
                                                        <tr>
                                                            <td></td>
                                                            <td>No Data Available</td>
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

                        <form id="quickForm" method="POST" action={{ url('addprofile') }} enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div id="open-modal-editactive" class="modal-window-pro">
                                <div>
                                    <a href="#modal-close-edit" title="Close" class="modal-close-pro"> &times;</a>
                                    <div class="input-field-pop">
                                        <div class="white_box mb_30">
                                            <div class="col-lg-12">
                                                <div class="white_box mb_30">
                                                    <div class="box_header ">
                                                        <div class="main-title">
                                                            <h3 class="mb-0">Update Profile</h3>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="aluminiEmail">Email address</label>
                                                            <input type="email" class="form-control" id="aluminiEmail" name="aluminiEmail" value="{{ $profile->email }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="aluminiPhone">Phone Number</label>
                                                            <input type="phone" class="form-control" id="aluminiPhone" name="aluminiPhone" value="{{ $profile->phone }}">
                                                        </div>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <label for="inputGroupFile04">Profile Picture</label>
                                                                <input type="file" id="profilePicture  @error('profilePicture') is-invalid @enderror" name="profilePicture">
                                                                @error('profilePicture')
                                                                    <span class="invalid-feedback" role="alert">
                                                                        <strong>{{ $message }}</strong>
                                                                    </span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>

                        <form id="quickForm" method="POST" action={{ url('addjob') }} enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div id="open-modal-editactivejob" class="modal-window-pro">
                                <div>
                                    <a href="#modal-close-edit" title="Close" class="modal-close-pro"> &times;</a>
                                    <div class="input-field-pop">
                                        <div class="white_box mb_30">
                                            <div class="col-lg-12">
                                                <div class="white_box mb_30">
                                                    <div class="box_header ">
                                                        <div class="main-title">
                                                            <h3 class="mb-0">Update Job</h3>
                                                        </div>
                                                    </div>
                                                        <div class="form-group">
                                                            <label for="aluminiCompany">Company</label>
                                                            <input type="text" class="form-control" id="Company" name="Company" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="aluminiDesignation">Designation</label>
                                                            <input type="text" class="form-control" id="Designation" name="Designation" value="">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="aluminiExperiance">Experience</label>
                                                            <input type="text" class="form-control" id="Experience" name="Experience" value="">
                                                        </div>
                                                        <br>
                                                        <div class="input-group">
                                                            <div class="input-group-append">
                                                                <button type="submit" class="btn btn-primary">Update</button>
                                                            </div>
                                                        </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
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
    <script>
        @if (session('failure'))
            swal({
            title: ' {{ session('failure') }}',
            icon: "warning",
            button: "Done",
            });
        @endif
    </script>
</body>

</html>
