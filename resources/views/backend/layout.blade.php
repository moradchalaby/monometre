<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>MONOMETRE CMS PANEL</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="/backend/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/backend/bower_components/font-awesome/css/all.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/backend/bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="/backend/dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
    <link rel="stylesheet" href="/backend/dist/css/skins/skin-blue.min.css">
 <script src="/backend/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="/backend/bower_components/jquery-ui/jquery-ui.js"></script>
    <!-- Bootstrap 3.3.7 -->
    <script src="/backend/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="/backend/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/backend/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <!-- SlimScroll -->
    <script src="/backend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="/backend/bower_components/fastclick/lib/fastclick.js"></script>
    <!-- AdminLTE App -->
    <script src="/backend/dist/js/adminlte.min.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="/backend/dist/js/demo.js"></script>
    <!-- page script -->
    <script>
        $(function() {
            $('#example1').DataTable()
            $('#example2').DataTable({
                'paging': true,
                'lengthChange': false,
                'searching': false,
                'ordering': true,
                'info': true,
                'autoWidth': false
            })
        });

    </script>
    <!-- // ALERTİFY -->

    <script src="/backend/bower_components/alertify/alertify.min.js"></script>
    <link rel="stylesheet" href="/backend/dist/css/alertify/alertify.min.css">
    <link rel="stylesheet" href="/backend/dist/css/alertify/themes/default.min.css">
    <link rel="stylesheet" href="/backend/dist/css/alertify/themes/semantic.min.css">
    <link rel="stylesheet" href="/backend/dist/css/alertify/themes/bootstrap.min.css">

    <script src="/backend/bower_components/ckeditor/ckeditor.js"></script>
    <!-- Alertify son ->
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
    <link rel="stylesheet" href="/backend/custom/css/custom.css">
    <!-- Google Font -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->

<body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

        <!-- Main Header -->
        <header class="main-header">

            <!-- Logo -->
            <a href="{{ route('nedmin.Index') }}" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>MM</b>Y</span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>MONOMETRE </b>YAPI</span>
            </a>

            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top" role="navigation">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <i class="fas fa-bars"></i><span class="sr-only">Toggle navigation</span>
                </a>
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                        <!-- Messages: style can be found in dropdown.less-->


                        <!-- User Account Menu -->
                        <li class="dropdown user user-menu">
                            <!-- Menu Toggle Button -->
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <!-- The user image in the navbar-->
                                <img src="/images/users/{{ Auth::user()->user_file }}" class="user-image"
                                    alt="User Image">
                                <!-- hidden-xs hides the username on small devices so only the image appears. -->
                                <span class="hidden-xs">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- The user image in the menu -->
                                <li class="user-header">
                                    <img src="/images/users/{{ Auth::user()->user_file }}" class="img-circle"
                                        alt="User Image">

                                    <p>
                                        {{ Auth::user()->name }} - Yönetici

                                    </p>

                                </li>
                                <!-- Menu Body -->

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="{{ route('user.edit', Auth::user()->id) }}"
                                            class="btn btn-default btn-flat">Profili Düzenle</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="{{ route('nedmin.Logout') }}"
                                            class="btn btn-default btn-flat">Çıkış</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->

                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">

            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">

                <!-- Sidebar user panel (optional) -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/images/users/{{ Auth::user()->user_file }}" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p>{{ Auth::user()->name }}</p>
                        <p>Yönetici</p>
                        <!-- Status -->

                    </div>
                </div>



                <!-- Sidebar Menu -->
                <ul class="sidebar-menu" id="menulist" data-widget="tree">
                    <li class="header">MENULER</li>
                    <!-- Optionally, you can add icons to the links -->
                    <li class=""><a href="{{ route('nedmin.Index') }}"><i class="fas fa-link"></i>
                            <span>Dashboard</span></a></li>
                    <li><a href="{{ route('blog.index') }}"><i class="fas fa-share-alt"></i> <span>Bloglar</span></a>
                    </li>
                    <li><a href="{{ route('page.index') }}"><i class="fas fa-file"></i> <span>Sayfalar</span></a>
                    </li>
                    <li><a href="{{ route('slider.index') }}"><i class="fas fa-image"></i> <span>Slider</span></a>
                    </li>
                    <li><a href="{{ route('brand.index') }}"><i class="fas fa-handshake"></i></i>
                            <span>Markalar</span></a>
                    </li>
                    <li><a href="{{ route('category.index') }}"><i class="fas fa-th-list"></i>
                            <span>Kategoriler</span></a>
                    </li>
                    <li><a href="{{ route('product.index') }}"><i class="fas fa-tags"></i> <span>Ürünler</span></a>
                    </li>
                    <li class="treeview active">
                        <a href="#"><i class="fas fa-user"></i> <span>Yönetim</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('settings.Index') }}"><i class="fas fa-cog"></i>
                                    <span>Ayarlar</span></a></li>
                            <li><a href="{{ route('user.index') }}"><i class="fas fa-users"></i>
                                    <span>Kullanıcılar</span></a></li>
                        </ul>
                    </li>
                </ul>
                <!-- /.sidebar-menu -->
            </section>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->


            @yield('content')
            <!-- Main content -->
            <section class="content container-fluid">

                <!--------------------------
        | Your Page Content Here |
        -------------------------->

            </section>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Main Footer -->
        <footer class="main-footer">
            <!-- To the right -->
            <div class="pull-right hidden-xs">
                Kurumsal Web Yazılımları
            </div>
            <!-- Default to the left -->
            <strong>Copyright &copy; <script>
                                        document.write(new Date().getFullYear());

                                    </script> <a href="#">MORADCHALABY</a>.</strong> All rights reserved.
        </footer>



        <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
        <div class="control-sidebar-bg"></div>
    </div>
    <!-- ./wrapper -->

    <!-- REQUIRED JS SCRIPTS -->



    <!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->

    @if (session()->has('success'))
        <script>
            alertify.success('{{ session('success') }}');

        </script>
    @endif
    @if (session()->has('error'))
        <script>
            alertify.error('{{ session('error') }}');

        </script>
    @endif

    @foreach ($errors->all() as $error)
        <script>
            var metin = '{{ $error }}';
            var pass = metin.indexOf('password');
            var username = metin.indexOf('username');
            var email = metin.indexOf('email');
            var name = metin.indexOf('name');
            if (pass != -1) {
                alertify.error('{{ str_ireplace('password', 'Şifre', $error) }}');
            } else if (username != -1) {
                alertify.error('{{ str_ireplace('username', 'Kullanıcı Adı', $error) }}');
            } else if (email != -1) {
                alertify.error('{{ str_ireplace('email', 'E-Mail', $error) }}');
            } else if (name != -1) {
                alertify.error('{{ str_ireplace('name', 'Ad Soyad', $error) }}');
            } else {
                alertify.error('{{ $error }}');
            }

        </script>

    @endforeach
<!-- jQuery 3 -->

</body>

</html>
