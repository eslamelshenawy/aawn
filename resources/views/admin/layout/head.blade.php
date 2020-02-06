<!DOCTYPE html>
@if(dirction()== 'rtl')
    <html lang="ar" dir="rtl">
    @else
        <html lang="en">
        @endif
        <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="author" content="">
            <meta name="viewport" content="width=device-width, initial-scale=1">
            <title>AWWNN @yield('up')</title>
        @if(dirction()== 'ltr')
            <!-- Global stylesheets -->
            {{Html::style('adminpanel/assets/css/icons/icomoon/styles.css') }}
            {{Html::style('adminpanel/assets/css/bootstrap.css') }}
            {{Html::style('adminpanel/assets/css/core.css') }}
            {{Html::style('adminpanel/assets/css/components.css') }}
            {{Html::style('adminpanel/assets/css/colors.css') }}
            {{Html::script('adminpanel/assets/js/pages/login.js')}}
            {{Html::script('adminpanel/assets/js/plugins/forms/styling/uniform.min.js')}}
            {{Html::script('adminpanel/assets/js/plugins/loaders/pace.min.js')}}
            {{Html::script('adminpanel/assets/js/core/libraries/jquery.min.js')}}
            {{Html::script('adminpanel/assets/js/core/libraries/bootstrap.min.js')}}
            {{Html::script('adminpanel/assets/js/plugins/loaders/blockui.min.js')}}
            <!-- Theme JS files -->
                <link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
                <!-- Theme JS files -->
            {{Html::script('adminpanel/assets/js/plugins/tables/datatables/datatables.min.js')}}
            {{Html::script('adminpanel/assets/js/plugins/forms/selects/select2.min.js')}}
            {{Html::script('adminpanel/assets/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}
            {{Html::script('adminpanel/assets/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}
            {{Html::script('adminpanel/assets/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}
            {{Html::script('adminpanel/assets/js/plugins/tables/datatables/extensions/buttons.min.js')}}


            {{Html::script('adminpanel/assets/js/core/app.js')}}
            {{Html::script('adminpanel/assets/js/pages/datatables_extension_buttons_html5.js')}}
        @else


            {{Html::style('adminpanel/assets/rtl/css/icons/icomoon/styles.css') }}
            {{Html::style('adminpanel/assets/rtl/css/bootstrap.css') }}
            {{Html::style('adminpanel/assets/rtl/css/core.css') }}
            {{Html::style('adminpanel/assets/rtl/css/components.css') }}
            {{Html::style('adminpanel/assets/rtl/css/colors.css') }}

            <!-- /global stylesheets -->

            {{Html::script('adminpanel/assets/rtl/js/pages/login.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/forms/styling/uniform.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/loaders/pace.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/core/libraries/jquery.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/core/libraries/bootstrap.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/loaders/blockui.min.js')}}
            <!-- Theme JS files -->
            {{Html::script('adminpanel/assets/rtl/js/plugins/tables/datatables/datatables.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/forms/selects/select2.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/tables/datatables/extensions/jszip/jszip.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/tables/datatables/extensions/pdfmake/pdfmake.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/tables/datatables/extensions/pdfmake/vfs_fonts.min.js')}}
            {{Html::script('adminpanel/assets/rtl/js/plugins/tables/datatables/extensions/buttons.min.js')}}

            {{Html::script('adminpanel/assets/rtl/js/core/app.js')}}
            {{Html::script('adminpanel/assets/rtl/js/pages/datatables_extension_buttons_html5.js')}}
        @endif
        <!-- Core JS files -->


            <script>
                $(function () {
                    // setTimeout() function will be fired after page is loaded
                    // it will wait for 5 sec. and then will fire
                    // $("#successMessage").hide() function
                    setTimeout(function () {
                        $(".alert").hide('blind', {}, 200)
                    }, 3000);


                    $('.alert').delay(3000).fadeOut('slow');


                });
            </script>
            <!-- /theme JS files -->
            <!-- /theme JS files -->


        </head>

        <body style="font-family: 'Cairo', sans-serif;">
