
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="/assets/images/logo.svg">
    <title>Munas APJATI 2020</title>
    <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
      <script>
     
        //Enable pusher logging - don't include this in production
        Pusher.logToConsole = true;
     
        var pusher = new Pusher('{{ config('test.pusher_key')}}', {
          cluster: '{{config('test.pusher_cluster')}}'
        });
     
        var channel = pusher.subscribe('{{config('test.channel')}}');
        channel.bind('App\\Events\\NotifPusherEvent', function(data) {
          alert(JSON.stringify(data));
        });
      </script>
    <!-- Custom CSS -->
    <link href="/dist/css/style.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link href="/assets/node_modules/select2/dist/css/select2.min.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/js/instascan.min.js">
    <link href="dist/css/pages/user-card.css" rel="stylesheet">

    <script type="text/javascript" src="/js/instascan.min.js"></script>
    <script type="text/javascript" src="/js/jquery.min.js"></script>

    @include('layouts.profile')
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
@yield('form')
</head>

<body class="skin-default-dark fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader bg-secondary">
        <div class="loader">
            <div class="loader__figure" style="background-image: url(/assets/images/logo.svg)">
              <!--   <img src="/assets/images/favicon.png"> -->
            </div>
            <h1 class="loader__label text-white">Munas APJATI 2020</h1>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">

        @include('layouts.sidebar')
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Page wrapper  -->
        <!-- ============================================================== -->
        <div class="page-wrapper">
            <!-- ============================================================== -->
            <!-- Container fluid  -->
            <!-- ============================================================== -->
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">{{ __('Qr Scanner') }}</div>

                            <div class="card-body">
                                <video id="preview" class="embed-responsive embed-responsive-1by1">
                                </video>                        
                                <script src="/js/rawgit.min.js"></script>
                                    <script type="text/javascript">
                                        var scanner = new Instascan.Scanner({ video: document.getElementById('preview'), mirror: false });
                                        scanner.addListener('scan',function(content){
                                            // alert(content);
                                            window.location.href=content;
                                        });
                                        Instascan.Camera.getCameras().then(function (cameras){
                                            if(cameras.length>0){
                                                scanner.start(cameras[0]);
                                                $('[name="options"]').on('change',function(){
                                                    if($(this).val()==1){
                                                        if(cameras[0]!=""){
                                                            scanner.start(cameras[0]);
                                                        }else{
                                                            alert('No Front camera found!');
                                                        }
                                                    }else if($(this).val()==2){
                                                        if(cameras[1]!=""){
                                                            scanner.start(cameras[1]);
                                                        }else{
                                                            alert('No Back camera found!');
                                                        }
                                                    }
                                                });
                                            }else{
                                                console.error('No cameras found.');
                                                alert('No cameras found.');
                                            }
                                        }).catch(function(e){
                                            console.error(e);
                                            alert(e);
                                        });
                                    </script>
                                    <br>
                                    <div class="text-center">
                                        <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                                            <label class="btn btn-outline-primary">
                                            <input type="radio" name="options" value="1" autocomplete="off" checked> Kamera Depan
                                            </label>
                                        </div>
                                        <div class="btn-group btn-group-toggle mb-5" data-toggle="buttons">
                                            <label class="btn btn-outline-secondary">
                                            <input type="radio" name="options" value="2" autocomplete="off"> Kamera Belakang
                                            </label>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
             <footer class="text-center">
            © 2020 Munas APJATI 2020
        </footer>
            <!-- ============================================================== -->
            <!-- End Container fluid  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Page wrapper  -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
       
        <!-- ============================================================== -->
        <!-- End footer -->
        <!-- ============================================================== -->
    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="/assets/node_modules/jquery/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap tether Core JavaScript -->
    <script src="/assets/node_modules/popper/popper.min.js"></script>
    <script src="/assets/node_modules/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- slimscrollbar scrollbar JavaScript -->
    <script src="/dist/js/perfect-scrollbar.jquery.min.js"></script>
    <!--Wave Effects -->
    <script src="/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="/dist/js/sidebarmenu.js"></script>
    <!--stickey kit -->
    <script src="/assets/node_modules/sticky-kit-master/dist/sticky-kit.min.js"></script>
    <script src="/assets/node_modules/sparkline/jquery.sparkline.min.js"></script>
    <!--Custom JavaScript -->
    <script src="/dist/js/custom.min.js"></script>
    @include('layouts.datatable')
    @include('layouts.dropify')
    @include('layouts.select2')
    @include('layouts.magnific')
</body>

</html>


