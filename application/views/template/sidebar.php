<?php $uri = $this->uri->segment(2); ?>
<section>
    <!-- Left Sidebar -->
    <aside id="leftsidebar" class="sidebar">
        <!-- User Info -->
        <div class="user-info">
            <div class="image">
                <img src="<?= base_url('assets/bsb/images/default.png') ?>" width="48" height="48" alt="User" />
            </div>
            <div class="info-container">
                <div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $this->session->userdata('name') ?></div>
                <div class="email"><?= $this->session->userdata('email') ?></div>
            </div>
        </div>
        <!-- #User Info -->
        <!-- Menu -->
        <div class="menu">
            <ul class="list">

                <li class="header">MENU UTAMA</li>
                <li class="<?= ($uri == "") ? "active" : ""; ?>">
                    <a href="<?= base_url('admin') ?>">
                        <i class="material-icons">face</i>
                        <span>Karyawan</span>
                    </a>
                </li>
                <li class="<?= ($uri == "lokasi") ? "active" : ""; ?>">
                    <a href="<?= base_url('admin/lokasi') ?>">
                        <i class="material-icons">location_on</i>
                        <span>Set Lokasi</span>
                    </a>
                </li>
                <li class="<?= ($uri == "absensi") ? "active" : ""; ?>">
                    <a href="<?= base_url('admin/absensi') ?>">
                        <i class="material-icons">assignment</i>
                        <span>Absensi</span>
                    </a>
                </li>
                <li class="<?= ($uri == "shift") ? "active" : ""; ?>">
                    <a href="<?= base_url('admin/shift') ?>">
                        <i class="material-icons">alarm</i>
                        <span>Shift</span>
                    </a>
                </li>
                <li class="<?= ($uri == "laporan") ? "active" : ""; ?>">
                    <a href="<?= base_url('admin/laporan') ?>">
                        <i class="material-icons">assignment</i>
                        <span>Laporan</span>
                    </a>
                </li>

                <li class="<?= ($uri == "user" || $uri == "zona") ? "active" : ""; ?>">
                    <a href="javascript:void(0);" class="menu-toggle">
                        <i class="material-icons">build</i>
                        <span>Setting</span>
                    </a>
                    <ul class="ml-menu">
                        <li class="<?= ($uri == "user") ? "active" : ""; ?>">
                            <a href="<?= base_url('admin/user') ?>">User Admin</a>
                        </li>
                        <li class="<?= ($uri == "zona") ? "active" : ""; ?>">
                            <a href="<?= base_url('admin/zona') ?>">Zona Waktu</a>
                        </li>
                    </ul>
                </li>


                <!-- <li class="<?= ($uri == "lisensi") ? "active" : ""; ?>">
                    <a href="<?= base_url('admin/lisensi') ?>">
                        <i class="material-icons">https</i>
                        <span>Lisensi</span>
                    </a>
                </li> -->

                <li>
                    <a href="<?= base_url('auth/logout') ?>">
                        <i class="material-icons">power_settings_new</i>
                        <span>Signout</span>
                    </a>
                </li>
            </ul>
        </div>
        <!-- #Menu -->
        <!-- Footer -->
        <div class="legal">
            <div class="copyright">
                &copy; <?= date('Y') ?> Improve By <a href="#">Percik Tours</a>.
            </div>
            <div class="version">
                <b>Version: </b> 0.1
            </div>
        </div>
        <!-- #Footer -->
    </aside>
    <!-- #END# Left Sidebar -->
    <!-- Right Sidebar -->
    <aside id="rightsidebar" class="right-sidebar">
        <ul class="nav nav-tabs tab-nav-right" role="tablist">
            <li role="presentation" class="active"><a href="#skins" data-toggle="tab">SKINS</a></li>
            <!-- <li role="presentation"><a href="#settings" data-toggle="tab">SETTINGS</a></li> -->
        </ul>
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane fade in active in active" id="skins">
                <ul class="demo-choose-skin">
                    <li data-theme="red">
                        <div class="red"></div>
                        <span>Red</span>
                    </li>
                    <li data-theme="pink" class="active">
                        <div class="pink"></div>
                        <span>Pink</span>
                    </li>
                    <li data-theme="purple">
                        <div class="purple"></div>
                        <span>Purple</span>
                    </li>
                    <li data-theme="deep-purple">
                        <div class="deep-purple"></div>
                        <span>Deep Purple</span>
                    </li>
                    <li data-theme="indigo">
                        <div class="indigo"></div>
                        <span>Indigo</span>
                    </li>
                    <li data-theme="blue">
                        <div class="blue"></div>
                        <span>Blue</span>
                    </li>
                    <li data-theme="light-blue">
                        <div class="light-blue"></div>
                        <span>Light Blue</span>
                    </li>
                    <li data-theme="cyan">
                        <div class="cyan"></div>
                        <span>Cyan</span>
                    </li>
                    <li data-theme="teal">
                        <div class="teal"></div>
                        <span>Teal</span>
                    </li>
                    <li data-theme="green">
                        <div class="green"></div>
                        <span>Green</span>
                    </li>
                    <li data-theme="light-green">
                        <div class="light-green"></div>
                        <span>Light Green</span>
                    </li>
                    <li data-theme="lime">
                        <div class="lime"></div>
                        <span>Lime</span>
                    </li>
                    <li data-theme="yellow">
                        <div class="yellow"></div>
                        <span>Yellow</span>
                    </li>
                    <li data-theme="amber">
                        <div class="amber"></div>
                        <span>Amber</span>
                    </li>
                    <li data-theme="orange">
                        <div class="orange"></div>
                        <span>Orange</span>
                    </li>
                    <li data-theme="deep-orange">
                        <div class="deep-orange"></div>
                        <span>Deep Orange</span>
                    </li>
                    <li data-theme="brown">
                        <div class="brown"></div>
                        <span>Brown</span>
                    </li>
                    <li data-theme="grey">
                        <div class="grey"></div>
                        <span>Grey</span>
                    </li>
                    <li data-theme="blue-grey">
                        <div class="blue-grey"></div>
                        <span>Blue Grey</span>
                    </li>
                    <li data-theme="black">
                        <div class="black"></div>
                        <span>Black</span>
                    </li>
                </ul>
            </div>
        </div>
    </aside>
    <!-- #END# Right Sidebar -->
</section>