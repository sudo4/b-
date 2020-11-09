<aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div class="text-center">
                            <img src="/assets/images/icon/staff.png" alt="user-img" class="img-circle">
                            <p>Hi, {{ucwords(\Auth::user()->name)}} <br> {{\Auth::user()->email}}</p>
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-camera-enhance"></i><span class="hide-menu">APP </span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/home">Qr Scan </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Data</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/company">P3MI </a></li>
                                <li><a href="/visitor">Pengunjung</a></li>
                                <li><a href="/member">Delegasi</a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Absensi</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/absensi">Delegasi </a></li>
                            </ul>
                        </li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Komisi</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/komisi1">Komisi 1 </a></li>
                                <li><a href="/komisi2">Komisi 2 </a></li>
                                <li><a href="/komisi3">Komisi 3 </a></li>
                            </ul>
                        </li>
                        @role('superadministrator')
                        <li> <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i class="icon-speedometer"></i><span class="hide-menu">Backend</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="/admin/users">User </a></li>
                            </ul>
                        </li>
                        

                        <li> <a class="waves-effect waves-dark" href="/history" aria-expanded="false"><i class="fa fa-circle-o text-danger"></i><span class="hide-menu">Documentation</span></a></li>
                        @endrole
                        <li> <a class="waves-effect waves-dark" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();"><i class="fa fa-circle-o"></i> {{ __('Logout') }} </a> <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf </form></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>