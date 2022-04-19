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
            <a href="/student/dashboard"><img src="../img/logo.png" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="">
                <a href="/student/dashboard" aria-expanded="false">
                    <img src="../img/menu-icon/1.svg" alt="">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="/student/requestlist" aria-expanded="false">
                    <i class="ti-view-list-alt"></i>
                    <span>Request List</span>
                </a>
            </li>
            <li class="">
                <a href="/student/projectlist" aria-expanded="false">
                    <i class="ti-list"></i>
                    <span>Project List</span>
                </a>
            </li>
            <li class="">
                <a href="/student/joblist" aria-expanded="false">
                    <i class="ti-id-badge"></i>
                    <span>Job List</span>
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
                                @if ($profile != null)
                                    <img src="{{ asset('../img/student/'.$profile->profilePicture) }}">
                                @else
                                    <img src="../img/profile.png" alt="#">
                                @endif
                                <div class="profile_info_iner">
                                    <p>Student </p>
                                    @if($profile != null)
                                        <h5>{{ $profile->name }}</h5>
                                    @else
                                        <h5>Student Name</h5>
                                    @endif
                                    <div class="profile_info_details">
                                        <a href="/student/profile">My Profile <i class="ti-user"></i></a>
                                        <form class="modal-content-logout" id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        <a href="{{ route('logout') }}"  onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">Log Out <i class="ti-shift-left"></i></a>
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
                    <div class="col-12">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Registration Number</th>
                                            <th scope="col">Department</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if($profile != null)
                                            <tr>
                                                <td>{{ $profile->name }}</td>
                                                <td>{{ $profile->email }}</td>
                                                <td>{{ $profile->phone }}</td>
                                                <td>{{ $profile->StudentregNumber }}</td>
                                                <td>{{ $profile->department }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td></td>
                                                <td></td>
                                                <td>No Data Available</td>
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
                <div class="row">
                    <div class="col-md-4">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Profile</h3>
                                </div>
                            </div>
                            <div class="profile-card-4">
                                @if ($profile != null)
                                    <img src="{{ asset('../img/student/'.$profile->profilePicture) }}">
                                @else
                                    <img src="../img/profile.png" alt="#">
                                @endif
                                <div class="profile-content">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Update Profile</h3>
                                </div>
                            </div>
                            <form method="Post" action="/updateProfile" enctype="multipart/form-data" >
                                @csrf
                                <div class="form-group">
                                    <label for="studentemail">Email address</label>
                                    <input type="email" class="form-control" id="studentemail" name="studentemail"
                                        placeholder="name@example.com">
                                </div>
                                <div class="form-group">
                                    <label for="studentphonenumber">Phone Number</label>
                                    <input type="text" class="form-control" id="studentphonenumber"
                                        name="adminphonenumber" placeholder="Phone Number">
                                </div>
                                <div class="form-group">
                                    <div class="custom-file">
                                        <label for="inputGroupFile04">Profile Picture</label>
                                        <input type="file" id="profilePicture" name="profilePicture">
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="studentregnumber">Registration  Number</label>
                                    <input type="text" class="form-control" id="studentregnumber"
                                        name="studentregnumber" placeholder="Registration Number">
                                </div>
                                <div class="form-group">
                                    <label for="studentdepartment">Department  Number</label>
                                    <div class="form-group">
                                        <select class="default_sel mb_30 w-100" name="department" id="department">
                                            <option selected="" value="">-- Select Department --</option>
                                            @foreach ($fetchDepartment as $departments => $department)
                                            <option value="{{ $department -> departmentId }}">{{ $department -> department }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <br>
                                <div class="input-group">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                    </div>
                                </div>
                            </form>
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
