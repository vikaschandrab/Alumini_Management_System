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
    {{-- <link href="vendors\font_awesome\css\all.min.css" rel="stylesheet"> --}}
    <script src="https://kit.fontawesome.com/09a05bb41f.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        #alumini_table {
            display: none;
        }

        #unReg_alumini_table {
            display: none;
        }

        .image-upload>input {
            display: none;
        }

        #addAlumini {
            display: none;
        }

    </style>
</head>

<body class="crm_body_bg">

    <nav class="sidebar">
        <div class="logo d-flex justify-content-between">
            <a href="/admin/dashboard"><img src="../img/logo.png" alt=""></a>
            <div class="sidebar_close_icon d-lg-none">
                <i class="ti-close"></i>
            </div>
        </div>
        <ul id="sidebar_menu">
            <li class="">
                <a href="/admin/dashboard" aria-expanded="false">
                    <img src="../img/menu-icon/1.svg" alt="">
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="mm-active">
                <a href="#" aria-expanded="false">
                    <i class="fa-solid fa-user-graduate"></i>
                    <span>Alumini</span>
                </a>
            </li>
            <li class="">
                <a href="/admin/student" aria-expanded="false">
                    <i class="fa-solid fa-user"></i>
                    <span>Students</span>
                </a>
            </li>
            <li class="">
                <a href="/admin/department" aria-expanded="false">
                    <i class="fa-solid fa-building-columns"></i>
                    <span>Department</span>
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
                                    <img src="{{ asset('../img/admin/' . $profile->profilePicture) }}">
                                @else
                                    <img src="../img/profile.png" alt="#">
                                @endif
                                <div class="profile_info_iner">
                                    <p>Admin </p>
                                    <h5>{{ $profile->name }}</h5>
                                    <div class="profile_info_details">
                                        <a href="/admin/profile">My Profile <i class="ti-user"></i></a>
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
                        <div class="single_element">
                            <div class="quick_activity">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="quick_activity_wrap">
                                            <div class="single_quick_activity d-flex" onclick="alumini_list()">
                                                <div class="icon">
                                                    <img src="../img/icon/alumini.svg" alt="image">
                                                </div>
                                                <div class="count_content">
                                                    <h3><span>{{ $aluminiCount }}</span> </h3>
                                                    <p>Registered Alumini</p>
                                                </div>
                                            </div>

                                            <div class="single_quick_activity d-flex" onclick="Unreg_alumini_list()">
                                                <div class="icon">
                                                    <img src="../img/icon/alumini.svg" alt="image">
                                                </div>
                                                <div class="count_content">
                                                    <h3><span>{{ $UnRegAluminiCount }}</span> </h3>
                                                    <p>Unregistered Alumini</p>
                                                </div>
                                            </div>

                                            <div class="image-upload" style="padding-top: 10px;" onclick="AddAlumini()">
                                                <label for="file-input">
                                                    <img src="../img/Cloudarrow.png" />
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" id="alumini_table">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Profile Picture</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Department</th>
                                            <th scope="col">Project Details</th>
                                            <th scope="col">Job Details</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($aluminiList) != null)
                                            @foreach ($aluminiList as $list)
                                                <tr>
                                                    <td>
                                                        @if ($list->profilePicture != null)
                                                            <img
                                                                src="{{ asset('../img/alumini/' . $list->profilePicture) }}">
                                                        @else
                                                            <img src="../img/profile.png" alt="#">
                                                        @endif
                                                    </td>
                                                    <td>{{ $list->name }}</td>
                                                    <td>{{ $list->phone }}</td>
                                                    <td>{{ $list->email }}</td>
                                                    <td>{{ $list->department }}</td>
                                                    <td><a href="#project-{{ $list->aluminiId }}"><i class="ti-eye"></i></a></td>
                                                    <td><a href="#job-{{ $list->aluminiId }}"><i class="ti-eye"></i></a>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>No Data Added</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-12" id="unReg_alumini_table">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Profile Picture</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (count($UnRegAlumini) != null)
                                            @foreach ($UnRegAlumini as $list)
                                                <tr>
                                                    <td>
                                                        @if ($list->profilePicture != null)
                                                            <img
                                                                <img src="{{ asset('../img/alumini/'.$list->profilePicture) }}">
                                                        @else
                                                            <img src="../img/profile.png" alt="#">
                                                        @endif
                                                    </td>
                                                    <td>{{ $list->name }}</td>
                                                    <td>{{ $list->phone }}</td>
                                                    <td>{{ $list->email }}</td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>No Data Added</td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" id="addAlumini">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Add Department</h3>
                                </div>
                            </div>
                            <form action="{{ url('importalumini') }}" method="POST" enctype="multipart/form-data" name="quickForm">
                                {{ csrf_field() }}
                                <div class="input-group">
                                    <div class="custom-file">
                                        <label for="inputGroupFile04"></label>
                                        <input type="file" id="aluminiDoc  @error('aluminiDoc') is-invalid @enderror" name="aluminiDoc">
                                        @error('aluminiDoc')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="input-group-append">
                                        <button class="btn btn-secondary" type="submit">Upload</button>
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



    @foreach ($aluminiList as $list)
    <div id="project-{{ $list->aluminiId }}" class="modal-window">
        <div>
            <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
            <div class="input-field-pop">
                <div class="white_box mb_30">
                    <div class="main-title">
                        <h3 class="mb-0">Project Details</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><b>Project Title:</b> &nbsp;{{ $list->title }}</li>
                            <li><b>Achievements:</b> &nbsp;{{ $list->achievements }}</li>
                            <li><b>Guide:</b> &nbsp;{{ $list->guide }}</li>
                            <li><b>Year:</b> &nbsp;{{ $list->projectYear }}</li>
                            <li><b>Project Description:</b> &nbsp;{{ $list->description }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    @foreach ($aluminiList as $list)
    <div id="job-{{ $list->aluminiId }}" class="modal-window">
        <div>
            <a href="#modal-close-edit" title="Close" class="modal-close"> &times;</a>
            <div class="input-field-pop">
                <div class="white_box mb_30">
                    <div class="main-title">
                        <h3 class="mb-0">Job Details</h3>
                    </div>
                    <div class="card-body">
                        <ul>
                            <li><b>Working:</b> &nbsp;{{ $list->companyName }}</li>
                            <li><b>Experience:</b> &nbsp;{{ $list->jobExperiance }}</li>
                            <li><b>Designation:</b> &nbsp;{{ $list->jobDesignation }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <!-- End pop up modal -->

    <script>
        function alumini_list() {
            var x = document.getElementById("alumini_table");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function AddAlumini() {
            var x = document.getElementById("addAlumini");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
        function Unreg_alumini_list() {
            var x = document.getElementById("unReg_alumini_table");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }
    </script>

    <script src="../js/jquery-3.4.1.min.js"></script>

    <script src="../js/popper.min.js"></script>

    <script src="../js/bootstrap.min.js"></script>

    <script src="../js/metisMenu.js"></script>

    <script src="../vendors/count_up/jquery.waypoints.min.js"></script>

    <script src="../vendors/chartlist/Chart.min.js"></script>

    <script src="../vendors/count_up/jquery.counterup.min.js"></script>

    <script src="../vendors/swiper_slider/js/swiper.min.js"></script>

    <script src="../vendors/niceselect/js/jquery.nice-select.min.js"></script>

    <script src="../vendors/owl_carousel/js/owl.carousel.min.js"></script>

    <script src="../vendors/gijgo/gijgo.min.js"></script>

    <script src="../vendors/datatable/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatable/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatable/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatable/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatable/js/jszip.min.js"></script>
    <script src="../vendors/datatable/js/pdfmake.min.js"></script>
    <script src="../vendors/datatable/js/vfs_fonts.js"></script>
    <script src="../vendors/datatable/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatable/js/buttons.print.min.js"></script>
    <script src="../js/chart.min.js"></script>

    <script src="../vendors/progressbar/jquery.barfiller.js"></script>

    <script src="../vendors/tagsinput/tagsinput.js"></script>

    {{-- <script src="vendors/text_editor/summernote-bs4.js"></script>
    <script src="vendors/apex_chart/apexcharts.js"></script> --}}

    <script src="../js/custom.js"></script>
    <script src="../vendors/apex_chart/bar_active_1.js"></script>
    <script src="../vendors/apex_chart/apex_chart_list.js"></script>

    <script>
        @if (session('failure'))
            swal({
            title: ' {{ session('failure') }}',
            icon: "warining",
            button: "Done",
            });
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
