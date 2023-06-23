<?php 

error_reporting(0);

if ($_SESSION['hak_akses']=='Super Admin'){ ?>
    <ul class="nav nav-list">
    <?php
  
    if ($_GET["module"] == "beranda") {
        echo '  <li class="active">
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }

     if ($_GET["module"] == "tiket" || $_GET["module"] == "tiket") {
        echo '  <li class="active">
                    <a href="?module=tiket">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Tiket</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=tiket">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Tiket</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }

   
    if ($_GET["module"] == "report" || $_GET["module"] == "report") {
        echo '  <li class="active">
                    <a href="?module=report">
                        <i class="menu-icon fa fa-print"></i>
                        <span class="menu-text">Report</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=report">
                        <i class="menu-icon fa fa-print"></i>
                        <span class="menu-text">Report</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 


    if ($_GET["module"] == "user" || $_GET["module"] == "user") {
        echo '  <li class="active">
                    <a href="?module=user">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">User</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=user">
                        <i class="menu-icon fa fa-user"></i>
                        <span class="menu-text">User</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
    ?>



    </ul>

    <?php
}
elseif ($_SESSION['hak_akses']=='STAFF'){ ?>
    <ul class="nav nav-list">
    <?php
  
    if ($_GET["module"] == "beranda") {
        echo '  <li class="active">
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }

     if ($_GET["module"] == "tiket_list" || $_GET["module"] == "tiket_list") {
        echo '  <li class="active">
                    <a href="?module=tiket_list">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Tiket</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=tiket_list">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Tiket</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }
    ?>



    </ul>

    <?php
}
if ($_SESSION['hak_akses']=='HELPDESK'){ ?>
    <ul class="nav nav-list">
    <?php
  
    if ($_GET["module"] == "beranda") {
        echo '  <li class="active">
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=beranda">
                        <i class="menu-icon fa fa-home"></i>
                        <span class="menu-text"> Beranda </span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }

     if ($_GET["module"] == "tiket" || $_GET["module"] == "tiket") {
        echo '  <li class="active">
                    <a href="?module=tiket">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Tiket</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    } 
   
    else {
        echo '  <li>
                    <a href="?module=tiket">
                        <i class="menu-icon fa fa-book"></i>
                        <span class="menu-text">Tiket</span>
                    </a>
                    <b class="arrow"></b>
                </li>';
    }

   
   
    ?>



    </ul>

    <?php
}
?>