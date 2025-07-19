@extends('layouts.admin')

@section('body')

<!-- Main content -->
<section class="content">
    <!-- Info boxes -->
    <div class="row">
        @if (Auth::user()->isAdminPetshop())
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('reservationData') }}">
            <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="ion ion-ios-folder-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Total Reservation</span>
                    <span class="info-box-number">{{$reservationCount}}</span></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('petshopTotalApproved') }}">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-checkmark-circled"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Approved Reservation</span>
                    <span class="info-box-number">{{$approvedCount}}</span></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
            <a href="{{ route('petshopTotalRejected') }}">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-close-circled"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Rejected Reservation</span>
                    <span class="info-box-number">{{$rejectedCount}}</span></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
            <div class="info-box">
                <a href="{{ route('petshopTotalWaiting') }}">
                <span class="info-box-icon bg-yellow"><i class="ion-ios-time-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Waiting Reservation</span>
                    <span class="info-box-number">{{$waitingCount}}</span></a>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    @endif
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->

        @if (Auth::user()->isAdmin())

        <div style="margin-left: 20px">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <a href="#">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-ios-folder-outline"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Total Reservation</span>
                            <span class="info-box-number">{{$reservationCount}}</span></a>
            </div>
            <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#">
            <div class="info-box">
                <span class="info-box-icon bg-green"><i class="ion ion-checkmark-circled"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Approved Reservation</span>
                    <span class="info-box-number">{{$approvedCount}}</span></a>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->

    <!-- fix for small devices only -->
    <div class="clearfix visible-sm-block"></div>

    <div class="col-md-3 col-sm-6 col-xs-12">
        <a href="#">
            <div class="info-box">
                <span class="info-box-icon bg-red"><i class="ion ion-close-circled"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Rejected Reservation</span>
                    <span class="info-box-number">{{$rejectedCount}}</span></a>
    </div>
    <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    <div class="col-md-3 col-sm-6 col-xs-12">
        <div class="info-box">
            <a href="#">
                <span class="info-box-icon bg-yellow"><i class="ion-ios-time-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text">Waiting Reservation</span>
                    <span class="info-box-number">{{$waitingCount}}</span></a>
        </div>
        <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
    </div>
    <!-- /.col -->
    </div>
        </div>

        <div class="col-md-4">
            <!-- Petshop -->
            <div class="info-box bg-purple">
                <span class="info-box-icon"><i class="ion ion-ios-home-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 20px">Total Petshops</span>
                    <span class="info-box-number">{{$petshopCount}}</span>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- User -->
            <div class="info-box bg-gray">
                <span class="info-box-icon"><i class="ion ion-ios-person-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 20px">Total Users</span>
                    <span class="info-box-number">{{$userCount}}</span>

                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- Pet -->
            <div class="info-box bg-blue">
                <span class="info-box-icon"><i class="ion ion-ios-paw-outline"></i></span>

                <div class="info-box-content">
                    <span class="info-box-text" style="font-size: 20px">Total Pets</span>
                    <span class="info-box-number">{{$petCount}}</span>
                </div>
                <!-- /.info-box-content -->
            </div>
            <!-- /.info-box -->
        </div>
        @endif
        <!-- /.col -->
    </div>
    <!-- /.row -->
</section>
<!-- /.content -->

@endsection