<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ecommerce @yield('title')</title>

    <!-- Global stylesheets -->
{{Html::style('adminpanel/assets/css/icons/icomoon/styles.css') }}
{{Html::style('adminpanel/assets/css/bootstrap.css') }}
{{Html::style('adminpanel/assets/css/core.css') }}
{{Html::style('adminpanel/assets/css/components.css') }}
{{Html::style('adminpanel/assets/css/colors.css') }}
<!-- Core JS files -->
{{Html::script('adminpanel/assets/js/pages/login.js')}}
{{Html::script('adminpanel/assets/js/plugins/forms/styling/uniform.min.js')}}
{{Html::script('adminpanel/assets/js/plugins/loaders/pace.min.js')}}
{{Html::script('adminpanel/assets/js/core/libraries/jquery.min.js')}}
{{Html::script('adminpanel/assets/js/core/libraries/bootstrap.min.js')}}
{{Html::script('adminpanel/assets/js/plugins/loaders/blockui.min.js')}}
<!-- Theme JS files -->



{{Html::script('adminpanel/assets/js/core/app.js')}}

<!-- /theme JS files -->

    <style>
        .panel.panel-body.login-form {

            width: 320px !important;
            margin: 0 auto !important;

        }
    </style>
    <!-- /theme JS files -->


</head>

<body>

@section('title')
    Login Admin
@endsection


<!-- Page container -->
<!-- /page container -->


<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Content area -->
            <div class="content">

                <!-- Advanced login -->
                <form action="" method="post">
                    {!! csrf_field() !!}
                    <div class="panel panel-body login-form">
                        <div class="text-center">
                            <div class="icon-object border-warning text-warning"><i class="icon-spinner11"></i></div>
                            <h5 class="content-group">Password recovery <small class="display-block">We'll send you instructions in email</small></h5>
                        </div>

                        <div class="form-group has-feedback">
                            <input class="form-control" placeholder="Your email" type="email">
                            <div class="form-control-feedback">
                                <i class="icon-mail5 text-muted"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn bg-blue btn-block">Reset password <i class="icon-arrow-right14 position-right"></i></button>
                    </div>

                </form>
                <!-- /advanced login -->


                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>


</body>
</html>