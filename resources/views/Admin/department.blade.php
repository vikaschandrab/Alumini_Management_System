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
    <link href="vendors\font_awesome\css\all.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/09a05bb41f.js" crossorigin="anonymous"></script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        #alumini_table {
            display: none;
        }

        .image-upload>input {
            display: none;
        }

        #addDepartment {
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
            <li class="">
                <a href="/admin/alumini" aria-expanded="false">
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
            <li class="mm-active">
                <a href="#" aria-expanded="false">
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
                                    <img src="{{ asset('../img/admin/'.$profile->profilePicture) }}">
                                @else
                                    <img src="../img/profile.png" alt="#">
                                @endif
                                <div class="profile_info_iner">
                                    <p>Admin </p>
                                    <h5>{{ $profile -> name }}</h5>
                                    <div class="profile_info_details">
                                        <a href="/admin/profile">My Profile <i class="ti-user"></i></a>
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
                    <div class="col-lg-12">
                        <div class="single_element">
                            <div class="quick_activity">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="quick_activity_wrap">
                                            <div class="single_quick_activity d-flex" onclick="alumini_list()">
                                                <div class="icon">
                                                    <img src="../img/icon/student.svg" alt="image">
                                                </div>
                                                <div class="count_content">
                                                    <h3><span>{{ count($getDepartment) }}</span> </h3>
                                                    <p>Departments</p>
                                                </div>
                                            </div>
                                            <div class="single_quick_activity" onclick="AddDepartment()" style="background-color: #EFF1F7;">
                                                <div class="icon">
                                                    <img src="../img/icon/plus.svg" alt="image">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-6" id="alumini_table">
                        <div class="QA_section">
                            <div class="QA_table mb_30">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Department</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if(count($getDepartment) != null)
                                            <?php $i = 1 ?>
                                                @foreach ($getDepartment as $List)
                                                <tr>
                                                    <td><?php echo"$i" ?></td>
                                                    <td>{{ $List -> department }}</td>
                                                </tr>
                                            <?php $i++ ?>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td>
                                                    No Data Added
                                                </td>
                                            </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6" id="addDepartment">
                        <div class="white_box mb_30">
                            <div class="box_header ">
                                <div class="main-title">
                                    <h3 class="mb-0">Add Department</h3>
                                </div>
                            </div>
                            <form action="{{ url('departmentadd') }}" method="POST" enctype="multipart/form-data" name="quickForm">
                                {{ csrf_field() }}
                                <table class="table" id="AddDepartment">
                                    <thead>
                                        <tr>
                                            <th scope="col">Department</th>
                                            <th scope="col" style="text-align: center;">ADD</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row"><input class="form-control @error('name') is-invalid @enderror" type="text" placeholder="Enter Name" name="addmore[0][name]" id="name"
                                                required autocomplete="off" /></th>
                                                @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                                @enderror
                                                <td style="text-align: center;"><a href="#" name="add" id="add-btn" class="status_btn">Add More</a></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="input-group-append">
                                    <button class="btn btn-secondary" type="submit">Add Department</button>
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

    <script>
        function alumini_list() {
            var x = document.getElementById("alumini_table");
            if (x.style.display === "block") {
                x.style.display = "none";
            } else {
                x.style.display = "block";
            }
        }

        function AddDepartment() {
            var x = document.getElementById("addDepartment");
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

<script src="vendors/text_editor/summernote-bs4.js"></script>
<script src="vendors/apex_chart/apexcharts.js"></script>

<script src="../js/custom.js"></script>
<script src="../vendors/apex_chart/bar_active_1.js"></script>
<script src="../vendors/apex_chart/apex_chart_list.js"></script>

    <script type="text/javascript">
        var i = 0;
        $("#add-btn").click(function () {
            ++i;
            $("#AddDepartment").append(
                '<tbody><tr><th scope="row"><input type="text" class="form-control" placeholder="Enter Name" name="addmore['+i+'][name]" id="name"required autocomplete="off" /></th><td style="text-align: center;"><a href="#" name="remove" id="'+i+'" class="status_btn btn_remove">Remove</a></td></tr></tbody>'
                );
        });

        $(document).on('click', '.btn_remove', function () {
            $(this).parents('tr').remove();
        });
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
