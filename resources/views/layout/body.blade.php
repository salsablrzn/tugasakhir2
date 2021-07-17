@extends('layout/index')
@section('konten')

    <div id="content">
        <div class="panel box-shadow-none content-header">
            <div class="panel-body">
                <div class="col-md-12">
                    <h3 class="animated fadeInLeft">Dashboard</h3>
                    <p class="animated fadeInDown">
                        Home <span class="fa-angle-right fa"></span> Dashboard
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="panel">
                    <div class="panel-heading">
                        <h3>Welcome</h3>
                    </div>
                    <div class="panel-body">
                        <img src="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" />
                        <div class="alert alert-primary" role="alert">
                            <h4 class="alert-heading">Informasi</h4>


                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <p>Pastikan anda mengaktifkan notifikasi browser, silahkan klik ikon lonceng di pojok kanan
                                bawah & klik
                                Subcribe.</p>
                        </div>
                        @if (session()->get('TIPE_AKUN') == "ADMIN")
                        <div>
                            <button onclick="buatnotif()" class="btn btn-primary">Buat Notifikasi Absen</button>
                            <p id="txloading">ini message</p>
                        </div>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
    <script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
    <script>
        window.OneSignal = window.OneSignal || [];
        OneSignal.push(function() {
            OneSignal.init({
                appId: "d57167d0-0f91-4d07-826d-d0ce267f7192",
                notifyButton: {
                    enable: true,
                },
                allowLocalhostAsSecureOrigin: true,
            });
            OneSignal.on('subscriptionChange', function(isSubscribed) {
                console.log('is subscribed', isSubscribed);
                // OneSignal.push(function() {
                console.log('attempt to get id'); // doesn't get this far
                OneSignal.getUserId(function(userId) {
                    console.log('user id', userId); // doesn't get this far    
                    updatetoken(userId)
                });
                // });
            });
            OneSignal.getUserId(function(userId) {
                console.log('user id', userId); // doesn't get this far     
                updatetoken(userId)
            });
        });

        function updatetoken(params) {
            console.log(params);
            $.ajax({
                type: 'post',
                url: "{{ url('api/updatetoken') }}",
                dataType: "JSON",
                data: {
                    newtoken: params,
                    id_user: "{{ session()->get('ID_PEGAWAI') }}"
                },
                success: function(data) {}
            });
        }

    </script>
    <script type='text/javascript'>
    function buatnotif() {
        document.getElementById("txloading").innerText = 'Loading . . . .'
        $.ajax({
            type: 'get',
            url: '{{url("api/cronjob/notifsatumenit")}}',
            dataType: "JSON",
            success: function(data) {
                console.log(data);
                document.getElementById("txloading").innerText = 'Berhasil'
                
            }
        });
    }
    </script>
@endsection
