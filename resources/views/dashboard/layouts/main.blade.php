<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="shortcut icon" type="image/x-icon" href="img/logo_pemprovsu.png">
    <title>SI ALUR KATA</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="Wide selection of modal dialogs styles and animations available.">
    <meta name="msapplication-tap-highlight" content="no">
<link href="/css/dashboard/main.css" rel="stylesheet"></head>
<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        @include('dashboard.layouts.header')       
        @include('dashboard.layouts.theme')
        <div class="app-main">
                @include('dashboard.layouts.sidebar')  
                <div class="app-main__outer">
                    <div class="app-main__inner">
                        <div class="app-page-title">
                            <div class="page-title-wrapper">
                                <div class="page-title-heading">
                                    <div class="page-title-icon">
                                        <i class="pe-7s-menu icon-gradient bg-ripe-malin">
                                        </i>
                                    </div>
                                    <div>SI ALUR KATA
                                        <div class="page-title-subheading">Sistem Informasi, Administrasi Evaluasi dan Laporan Realisasi Anggaran Kabupaten/Kota.
                                        </div>
                                    </div>
                                </div>
                               </div>
                        </div>            <div class="row">
                            <div class="col-md-12">
                                @yield('container')
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
<script type="text/javascript" src="/assets/scripts/main.js"></script></body>
</html>