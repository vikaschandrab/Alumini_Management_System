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
            <li class="mm-active">
                <a href="#" aria-expanded="false">
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
                                @if ($profile->profilePicture != null)
                                    <img src="{{ asset('../img/student/'.$profile->profilePicture) }}">
                                @else
                                    <img src="../img/profile.png" alt="#">
                                @endif
                                <div class="profile_info_iner">
                                    <p>Student </p>
                                    <h5>{{ $profile->name }}</h5>
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
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Status</th>
                                            <th scope="col">Project Title</th>
                                            <th scope="col">View</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($ProjectRequest) != null)
                                            @foreach ( $ProjectRequest as $List )
                                                <tr>
                                                    @if ($List->replayStatus == 3)
                                                        <td><a class="status_btn red_btn">Denied</a></td>
                                                    @elseif ($List->replayStatus == 2)
                                                        <td><a class="status_btn">Replied</a></td>
                                                    @else
                                                        <td><a class="status_btn yellow_btn">Pending</a></td>
                                                    @endif
                                                    <td>{{ $List->title }}</td>
                                                    <td><a href="#open-modal-view-{{ $List->projectId }}"><i class="ti-eye"></i></a></td>
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
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

@foreach ( $ProjectRequest as $List )
    @foreach ( $AluminiData as $Data)
        @if( $Data->departmentId_fk == $List->departmentId_fk)
            <div id="open-modal-view-{{ $List->projectId }}" class="modal-window-pro">
                <div>
                    <a href="#modal-close-edit" title="Close" class="modal-close-pro"> &times;</a>
                    <div class="input-field-pop">
                        <div class="col-lg-12">
                            <div class="white_box mb_30">
                                <div class="box_header ">
                                    <div class="main-title">
                                        <h3 class="mb-0">Project Details</h3>
                                    </div>
                                </div>
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th>Alumini Name</th>
                                            <td>{{ $Data->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alumini Contact Number</th>
                                            <td>{{ $Data->phone }}</td>
                                        </tr>
                                        <tr>
                                            <th>Alumini Email</th>
                                            <td>{{ $Data->email }}</td>
                                        </tr>
                                        <tr>
                                            <th>Title</th>
                                            <td>{{ $List->title}}</td>
                                        </tr>
                                        <tr>
                                            <th>Abstract</th>
                                            <td style="text-align: justify; white-space: wrap;">{{ $List->description}}</td>
                                        </tr>
                                        <tr>
                                            <th>Guide</th>
                                            <td>{{ $List->guide}}</td>
                                        </tr>
                                        <tr>
                                            <th>Year</th>
                                            <td>{{ $List->projectYear}}</td>
                                        </tr>
                                        <tr>
                                            <th>Achievements</th>
                                            <td>{{ $List->achievements}}</td>
                                        </tr>
                                        <tr>
                                            <th>Replay Information</th>
                                            <td>{{ $List->replyInfo}}</td>
                                        </tr>
                                        <tr>
                                            <th>Attachment</th>
                                            <td><a href="../documents/{{ $List->attachment }}" target="_blank"><img src="../img/pdf.png" width="50px"
                                                        height="50px"></a></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
@endforeach

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
</body>

</html>
