<div id="left-menu">
              <div class="sub-left-menu scroll">
                <ul class="nav nav-list">
                    <li><div class="left-bg"></div></li>
                    <li class="time">
                      <h1 class="animated fadeInLeft">21:00</h1>
                      <p class="animated fadeInRight">Sat,October 1st 2029</p>
                    </li>
                    
                    <li class="ripple"><a href="{{url('dashboard')}}"><span class="fa-home fa"></span>Dashboard</a></li>
                    @if (session()->get('TIPE_AKUN') == "ADMIN")

                        <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-users"></span> Data Master  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="{{url('admindatapegawai')}}">Data Pegawai</a></li>
                        <li><a href="{{url('gajipokok')}}">Data Gaji Pokok</a></li>
                        <li><a href="{{url('tunjangan')}}">Data Tunjangan</a></li>
                        <li><a href="{{url('nilai')}}">Data Nilai</a></li>
                        <li><a href="{{url('golongan')}}">Data Golongan</a></li>
                        <li><a href="{{url('detailgolongan')}}">Data Detail Golongan</a></li>
                      </ul>
                    </li>
                        <li class="ripple"><a href="{{url('waktupresensi')}}"><span class="fa fa-clock-o"></span> Waktu Presensi</span></a></li>

                    <li class="ripple"><a href="{{url('admin/rekappresensi')}}"><span class="fa-book fa"></span>Rekap Data Presensi</a></li>

                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-dollar"></span> Laporan Penggajian  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="{{url('admin/penggajian/keseluruhan')}}">Gaji Keseluruhan</a></li>
                        <li><a href="{{url('admin/penggajian/utama')}}">Gaji Utama</a></li>
                        <li><a href="{{url('admin/penggajian/tunjangan')}}">Tunjangan Mamin</a></li>
                      </ul>
                    </li>
                    
                    @elseif (session()->get('ID_JABATAN') == 3)

                    <li class="ripple"><a href="{{url('pegawai/presensi/hariini')}}"><span class="fa fa-check-square"></span>Presensi Hari Ini</a></li>
                    <li class="ripple"><a href="{{url('pegawai/riwayat/presensi')}}"><span class="fa-book fa"></span>Riwayat Presensi</a></li>
                    <li class="ripple"><a href="{{url('pegawai/riwayat/penggajian')}}"><span class="fa-book fa"></span>Riwayat Penggajian</a></li>
                    <li class="ripple"><a href="{{url('admindatapegawai')}}"><span class="fa fa-users"></span> Data Pegawai</span></a></li>

                    <li class="ripple"><a href="{{url('admin/rekappresensi')}}"><span class="fa-book fa"></span>Rekap Data Presensi</a></li>

                    <li class="ripple"><a class="tree-toggle nav-header"><span class="fa fa-dollar"></span> Laporan Penggajian  <span class="fa-angle-right fa right-arrow text-right"></span> </a>
                      <ul class="nav nav-list tree">
                        <li><a href="{{url('admin/penggajian/keseluruhan')}}">Gaji Keseluruhan</a></li>
                        <li><a href="{{url('admin/penggajian/utama')}}">Gaji Utama</a></li>
                        <li><a href="{{url('admin/penggajian/tunjangan')}}">Tunjangan Mamin</a></li>
                      </ul>
                    </li>

                    @elseif (session()->get('TIPE_AKUN') == "PEGAWAI")
                    <li class="ripple"><a href="{{url('pegawai/presensi/hariini')}}"><span class="fa fa-check-square"></span>Presensi Hari Ini</a></li>
                    <li class="ripple"><a href="{{url('pegawai/riwayat/presensi')}}"><span class="fa-book fa"></span>Riwayat Presensi</a></li>
                    <li class="ripple"><a href="{{url('pegawai/riwayat/penggajian')}}"><span class="fa-book fa"></span>Riwayat Penggajian</a></li>
                        
                    @endif

                    <!-- <li class="ripple"><a href="admindataakun"><span class="fa-user fa"></span>Data Akun</a></li> -->
                                        
                    

                    <li class="ripple"><a href="{{url('logout')}}"><span class="fa fa-power-off"></span>Logout</a></li>

                  </ul>
                </div>
            </div>