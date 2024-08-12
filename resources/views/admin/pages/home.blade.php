@extends('admin.layouts.master')

@section('content')
    <div class="page-body">
        <div class="row">
            <!-- card1 start -->
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-pie-chart bg-c-blue card1-icon"></i>
                        <span class="text-c-blue f-w-600">Use space</span>
                        <h4>49/50GB</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-blue f-16 icofont icofont-warning m-r-10"></i>Get
                                more space
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card1 end -->
            <!-- card1 start -->
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-ui-home bg-c-pink card1-icon"></i>
                        <span class="text-c-pink f-w-600">Revenue</span>
                        <h4>$23,589</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-pink f-16 icofont icofont-calendar m-r-10"></i>Last
                                24 hours
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card1 end -->
            <!-- card1 start -->
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-warning-alt bg-c-green card1-icon"></i>
                        <span class="text-c-green f-w-600">Fixed issue</span>
                        <h4>45</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-green f-16 icofont icofont-tag m-r-10"></i>Tracked
                                via microsoft
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card1 end -->
            <!-- card1 start -->
            <div class="col-md-6 col-xl-3">
                <div class="card widget-card-1">
                    <div class="card-block-small">
                        <i class="icofont icofont-social-twitter bg-c-yellow card1-icon"></i>
                        <span class="text-c-yellow f-w-600">Followers</span>
                        <h4>+562</h4>
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-yellow f-16 icofont icofont-refresh m-r-10"></i>Just
                                update
                            </span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- card1 end -->
            <div class="col-md-12 col-xl-6">
                <div class="card add-task-card">
                    <div class="card-header">
                        <div class="card-header-left">
                            <h5>To do list</h5>
                        </div>
                        <div class="card-header-right">
                            <button class="btn btn-card btn-primary">Add task </button>
                        </div>
                    </div>
                    <div class="card-block">
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary d-block">
                                <label class="check-task d-block">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                    </span>
                                    <span>
                                        <h6>Schedule Meeting with Compnes <span class="label bg-c-green m-l-10 f-10">2
                                                week</span></h6>
                                    </span>
                                    <div class="task-card-img m-l-40">
                                        <a href="#!"><img src="assets/images/avatar-2.jpg" data-toggle="tooltip"
                                                title="Lary Doe" alt="" class="img-40"></a>
                                        <a href="#!"><img src="assets/images/avatar-3.jpg" data-toggle="tooltip"
                                                title="Alia" alt="" class="img-40 m-l-10"></a>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary d-block">
                                <label class="check-task d-block">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                    </span>
                                    <span>
                                        <h6>Meeting With HOD's and borad</h6>
                                        <p class="text-muted m-l-40">23 january 2003
                                        </p>
                                    </span>
                                </label>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary d-block">
                                <label class="check-task d-block">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                    </span>
                                    <span>
                                        <h6>Create template, admin with responsive<span class="label bg-c-pink m-l-10">2
                                                week</span></h6>
                                    </span>
                                    <div class="task-card-img m-l-40">
                                        <a href="#!"><img src="assets/images/avatar-2.jpg" data-toggle="tooltip"
                                                title="Alia" alt="" class="img-40"></a>
                                        <a href="#!"><img src="assets/images/avatar-3.jpg" data-toggle="tooltip"
                                                title="Suzen" alt="" class="img-40 m-l-10"></a>
                                        <a href="#!"><img src="assets/images/avatar-4.jpg" data-toggle="tooltip"
                                                title="Lary Doe" alt="" class="img-40 m-l-10"></a>
                                        <a href="#!"><img src="assets/images/avatar-2.jpg" data-toggle="tooltip"
                                                title="Josephin Doe" alt="" class="img-40 m-l-10"></a>
                                    </div>
                                </label>
                            </div>
                        </div>
                        <div class="to-do-list">
                            <div class="checkbox-fade fade-in-primary d-block">
                                <label class="check-task d-block">
                                    <input type="checkbox" value="">
                                    <span class="cr">
                                        <i class="cr-icon icofont icofont-ui-check txt-default"></i>
                                    </span>
                                    <span>
                                        <h6>Meeting With HOD's and borad</h6>
                                        <p class="text-muted m-l-40">23 january 2003
                                        </p>
                                    </span>
                                    <div class="task-card-img m-l-40">
                                        <a href="#!"><img src="assets/images/avatar-2.jpg" data-toggle="tooltip"
                                                title="Lary Doe" alt="" class="img-40"></a>
                                        <a href="#!"><img src="assets/images/avatar-3.jpg" data-toggle="tooltip"
                                                title="Alia" alt="" class="img-40 m-l-10"></a>
                                        <a href="#!"><img src="assets/images/avatar-2.jpg" data-toggle="tooltip"
                                                title="Josephin Doe" alt="" class="img-40 m-l-10"></a>
                                    </div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Data widget End -->

        </div>
    </div>
@endsection
