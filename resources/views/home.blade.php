@extends('layouts.app')

@section('content')
    
<div class="starter-template">
    <h1 style="opacity: 0%"> </h1>
    <br>
    <br>
</div>
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
@endsection
