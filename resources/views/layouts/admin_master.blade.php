<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Book Review System">
    <meta name="author" content="Tran Thanh An">
    <title>{{ trans('general.page_title') }}</title>

    {!! Html::style('bower/bootstrap/dist/css/bootstrap.min.css') !!}
    {!! Html::style('bower/metisMenu/dist/metisMenu.min.css') !!}
    {!! Html::style('bower/dist/css/sb-admin-2.css') !!}
    {!! Html::style('bower/font-awesome/css/font-awesome.min.css') !!}
    {!! Html::style('bower/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.css') !!}
    {!! Html::style('bower/datatables-responsive/css/dataTables.responsive.css') !!}
</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.html">{{ trans('general.page_head') }}</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
                        <li><a href="#"><i class="fa fa-user fa-fw"></i>{{ trans('user.profile') }}</a>
                        </li>
                        <li><a href="#"><i class="fa fa-gear fa-fw"></i>{{ trans('user.setting') }}</a>
                        </li>
                        <li class="divider"></li>
                        <li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> {{ trans('user.logout') }}</a>
                        </li>
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="{{ trans('general.search') }}">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="button">
                                        <i class="fa fa-search"></i>
                                    </button>
                                </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-dashboard fa-fw"></i>{{ trans('general.dashboard') }}</a>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i>{{ trans('category.category') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">{{ trans('category.list_category') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ trans('category.add_category') }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-cube fa-fw"></i>{{ trans('book.book') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">{{ trans('book.list_book') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ trans('book.add_book') }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-users fa-fw"></i>{{ trans('user.user') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">{{ trans('user.list_user') }}</a>
                                </li>
                                <li>
                                    <a href="#">{{ trans('user.add_user') }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-file fa-fw"></i>{{ trans('review.review') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">{{ trans('review.list_review') }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-share fa-fw"></i>{{ trans('bookRequest.book_request') }}<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="#">{{ trans('bookRequest.list_request') }}</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>

                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        @yield('header')
                    </div>
                    <!-- /.col-lg-12 -->
                    @yield('content')
                    
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    {!! Html::script('bower/jquery/dist/jquery.min.js') !!}
    {!! Html::script('bower/bootstrap/dist/js/bootstrap.min.js') !!}

    {!! Html::script('bower/metisMenu/dist/metisMenu.min.js') !!}

    {!! Html::script('bower/dist/js/sb-admin-2.js') !!}
    {!! Html::script('bower/DataTables/media/js/jquery.dataTables.min.js') !!}

    {!! Html::script('bower/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js') !!}

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
            responsive: true
        });
    });
    </script>
</body>

</html>
