@extends('layouts.default')

@section('title', 'Ionicons')

@push('css')
	<link href="/assets/plugins/ionicons/css/ionicons.min.css" rel="stylesheet" />
@endpush

@section('content')
	<!-- begin breadcrumb -->
	<ol class="breadcrumb float-xl-right">
		<li class="breadcrumb-item"><a href="javascript:;">Home</a></li>
		<li class="breadcrumb-item"><a href="javascript:;">UI Elements</a></li>
		<li class="breadcrumb-item active">Ionicons</li>
	</ol>
	<!-- end breadcrumb -->
	<!-- begin page-header -->
	<h1 class="page-header">Ionicons V4.0 <small>bundle with 696 icons (material & ios style icons)</small></h1>
	<!-- end page-header -->
	
	<!-- begin nav-tabs -->
	<ul id="ioniconsTab" class="nav nav-tabs nav-tabs-inverse">
		<li class="nav-item"><a href="#md" data-toggle="tab" class="nav-link active"><i class="ion-logo-android fa-lg text-green"></i> <span class="d-none d-lg-inline m-l-5">Material style (317)</span>&nbsp;</a></li>
		<li class="nav-item"><a href="#ios" data-toggle="tab" class="nav-link"><i class="ion-logo-apple  fa-lg"></i> <span class="d-none d-lg-inline m-l-5">IOS style (317)</span>&nbsp;</a></li>
		<li class="nav-item"><a href="#logos" data-toggle="tab" class="nav-link"><i class="ion-logo-ionic fa-lg text-blue"></i> <span class="d-none d-lg-inline m-l-5">Logos (62)</span>&nbsp;</a></li>
	</ul>
	<!-- end nav-tabs -->
	
	<!-- begin tab-content -->
	<div id="ioniconsTabContent" class="tab-content">
		<!-- begin tab-pane -->
		<div class="tab-pane fade show active" id="md">
			<!-- begin row -->
			<div class="row row-space-10" data-id="icon">
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-add-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-add-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-add-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-add-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-add fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-add</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-airplane fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-airplane</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-alarm fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-alarm</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-albums fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-albums</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-alert fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-alert</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-american-football fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-american-football</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-analytics fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-analytics</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-aperture fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-aperture</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-apps fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-apps</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-appstore fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-appstore</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-archive fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-archive</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-back fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-back</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropdown-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropdown-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropdown fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropdown</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropleft-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropleft-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropleft fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropleft</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropright-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropright-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropright fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropright</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropup-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropup-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-dropup fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-dropup</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-forward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-forward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-round-back fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-round-back</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-round-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-round-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-round-forward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-round-forward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-round-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-round-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-arrow-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-arrow-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-at fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-at</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-attach fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-attach</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-backspace fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-backspace</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-barcode fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-barcode</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-baseball fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-baseball</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-basket fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-basket</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-basketball fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-basketball</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-battery-charging fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-battery-charging</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-battery-dead fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-battery-dead</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-battery-full fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-battery-full</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-beaker fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-beaker</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bed fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bed</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-beer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-beer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bicycle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bicycle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bluetooth fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bluetooth</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-boat fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-boat</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-body fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-body</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bonfire fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bonfire</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-book fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-book</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bookmark fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bookmark</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bookmarks fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bookmarks</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bowtie fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bowtie</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-briefcase fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-briefcase</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-browsers fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-browsers</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-brush fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-brush</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bug fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bug</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-build fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-build</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bulb fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bulb</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-bus fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-bus</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-business fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-business</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cafe fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cafe</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-calculator fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-calculator</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-calendar fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-calendar</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-call fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-call</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-camera fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-camera</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-car fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-car</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-card fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-card</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cart fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cart</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cash fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cash</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cellular fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cellular</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-chatboxes fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-chatboxes</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-chatbubbles fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-chatbubbles</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-checkbox-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-checkbox-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-checkbox fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-checkbox</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-checkmark-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-checkmark-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-checkmark-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-checkmark-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-checkmark fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-checkmark</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-clipboard fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-clipboard</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-clock fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-clock</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-close-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-close-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-close-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-close-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-close fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-close</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloud-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloud-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloud-done fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloud-done</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloud-download fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloud-download</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloud-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloud-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloud-upload fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloud-upload</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloud fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloud</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloudy-night fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloudy-night</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cloudy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cloudy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-code-download fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-code-download</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-code-working fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-code-working</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-code fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-code</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cog fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cog</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-color-fill fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-color-fill</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-color-filter fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-color-filter</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-color-palette fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-color-palette</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-color-wand fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-color-wand</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-compass fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-compass</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-construct fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-construct</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-contact fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-contact</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-contacts fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-contacts</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-contract fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-contract</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-contrast fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-contrast</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-copy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-copy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-create fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-create</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-crop fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-crop</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cube fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cube</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-cut fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-cut</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-desktop fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-desktop</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-disc fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-disc</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-document fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-document</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-done-all fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-done-all</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-download fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-download</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-easel fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-easel</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-egg fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-egg</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-exit fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-exit</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-expand fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-expand</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-eye-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-eye-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-eye fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-eye</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-fastforward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-fastforward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-female fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-female</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-filing fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-filing</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-film fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-film</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-finger-print fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-finger-print</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-fitness fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-fitness</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-flag fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-flag</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-flame fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-flame</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-flash-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-flash-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-flash fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-flash</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-flashlight fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-flashlight</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-flask fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-flask</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-flower fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-flower</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-folder-open fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-folder-open</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-folder fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-folder</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-football fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-football</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-funnel fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-funnel</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-gift fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-gift</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-git-branch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-git-branch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-git-commit fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-git-commit</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-git-compare fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-git-compare</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-git-merge fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-git-merge</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-git-network fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-git-network</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-git-pull-request fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-git-pull-request</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-glasses fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-glasses</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-globe fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-globe</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-grid fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-grid</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-hammer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-hammer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-hand fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-hand</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-happy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-happy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-headset fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-headset</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-heart fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-heart</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-heart-dislike fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-heart-dislike</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-heart-empty fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-heart-empty</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-heart-half fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-heart-half</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-help-buoy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-help-buoy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-help-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-help-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-help-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-help-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-help fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-help</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-home fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-home</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-hourglass fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-hourglass</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-ice-cream fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-ice-cream</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-image fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-image</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-images fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-images</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-infinite fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-infinite</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-information-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-information-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-information-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-information-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-information fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-information</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-jet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-jet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-journal fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-journal</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-key fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-key</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-keypad fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-keypad</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-laptop fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-laptop</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-leaf fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-leaf</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-link fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-link</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-list-box fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-list-box</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-list fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-list</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-locate fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-locate</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-lock fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-lock</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-log-in fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-log-in</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-log-out fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-log-out</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-magnet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-magnet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-mail-open fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-mail-open</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-mail-unread fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-mail-unread</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-mail fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-mail</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-male fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-male</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-man fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-man</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-map fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-map</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-medal fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-medal</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-medical fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-medical</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-medkit fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-medkit</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-megaphone fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-megaphone</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-menu fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-menu</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-mic-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-mic-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-mic fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-mic</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-microphone fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-microphone</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-moon fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-moon</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-more fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-more</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-move fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-move</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-musical-note fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-musical-note</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-musical-notes fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-musical-notes</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-navigate fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-navigate</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-notifications-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-notifications-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-notifications-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-notifications-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-notifications fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-notifications</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-nuclear fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-nuclear</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-nutrition fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-nutrition</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-open fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-open</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-options fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-options</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-outlet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-outlet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-paper-plane fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-paper-plane</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-paper fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-paper</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-partly-sunny fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-partly-sunny</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pause fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pause</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-paw fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-paw</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-people fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-people</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-person-add fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-person-add</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-person fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-person</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-phone-landscape fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-phone-landscape</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-phone-portrait fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-phone-portrait</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-photos fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-photos</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pie fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pie</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pin fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pin</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pint fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pint</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pizza fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pizza</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-planet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-planet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-play-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-play-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-play fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-play</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-podium fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-podium</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-power fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-power</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pricetag fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pricetag</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pricetags fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pricetags</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-print fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-print</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-pulse fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-pulse</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-qr-scanner fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-qr-scanner</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-quote fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-quote</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-radio-button-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-radio-button-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-radio-button-on fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-radio-button-on</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-radio fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-radio</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-rainy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-rainy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-recording fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-recording</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-redo fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-redo</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-refresh-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-refresh-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-refresh fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-refresh</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-remove-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-remove-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-remove-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-remove-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-remove fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-remove</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-reorder fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-reorder</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-repeat fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-repeat</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-resize fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-resize</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-restaurant fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-restaurant</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-return-left fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-return-left</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-return-right fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-return-right</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-reverse-camera fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-reverse-camera</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-rewind fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-rewind</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-ribbon fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-ribbon</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-rocket fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-rocket</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-rose fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-rose</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-sad fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-sad</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-save fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-save</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-school fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-school</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-search fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-search</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-send fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-send</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-settings fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-settings</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-share-alt fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-share-alt</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-share fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-share</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-shirt fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-shirt</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-shuffle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-shuffle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-skip-backward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-skip-backward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-skip-forward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-skip-forward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-snow fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-snow</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-speedometer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-speedometer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-square-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-square-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-square fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-square</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-star-half fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-star-half</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-star-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-star-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-star fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-star</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-stats fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-stats</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-stopwatch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-stopwatch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-subway fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-subway</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-sunny fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-sunny</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-swap fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-swap</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-switch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-switch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-sync fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-sync</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-tablet-landscape fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-tablet-landscape</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-tablet-portrait fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-tablet-portrait</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-tennisball fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-tennisball</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-text fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-text</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-thermometer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-thermometer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-thumbs-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-thumbs-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-thumbs-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-thumbs-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-thunderstorm fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-thunderstorm</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-time fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-time</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-timer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-timer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-today fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-today</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-train fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-train</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-transgender fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-transgender</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-trash fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-trash</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-trending-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-trending-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-trending-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-trending-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-trophy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-trophy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-tv fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-tv</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-umbrella fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-umbrella</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-undo fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-undo</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-unlock fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-unlock</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-videocam fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-videocam</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-volume-high fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-volume-high</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-volume-low fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-volume-low</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-volume-mute fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-volume-mute</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-volume-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-volume-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-wallet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-wallet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-walk fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-walk</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-warning fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-warning</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-watch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-watch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-water fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-water</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-wifi fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-wifi</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-wine fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-wine</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-md-woman fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-md-woman</p></div>
			</div>
			<!-- end row -->
		</div>
		<!-- end tab-pane -->
		<!-- begin tab-pane -->
		<div class="tab-pane fade" id="ios">
			<!-- begin row -->
			<div class="row row-space-10">
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-add-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-add-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-add-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-add-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-add fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-add</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-airplane fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-airplane</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-alarm fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-alarm</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-albums fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-albums</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-alert fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-alert</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-american-football fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-american-football</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-analytics fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-analytics</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-aperture fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-aperture</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-apps fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-apps</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-appstore fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-appstore</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-archive fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-archive</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-back fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-back</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropdown-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropdown-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropdown fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropdown</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropleft-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropleft-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropleft fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropleft</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropright-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropright-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropright fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropright</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropup-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropup-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-dropup fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-dropup</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-forward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-forward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-round-back fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-round-back</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-round-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-round-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-round-forward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-round-forward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-round-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-round-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-arrow-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-arrow-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-at fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-at</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-attach fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-attach</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-backspace fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-backspace</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-barcode fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-barcode</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-baseball fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-baseball</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-basket fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-basket</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-basketball fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-basketball</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-battery-charging fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-battery-charging</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-battery-dead fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-battery-dead</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-battery-full fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-battery-full</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-beaker fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-beaker</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bed fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bed</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-beer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-beer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bicycle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bicycle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bluetooth fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bluetooth</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-boat fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-boat</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-body fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-body</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bonfire fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bonfire</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-book fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-book</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bookmark fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bookmark</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bookmarks fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bookmarks</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bowtie fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bowtie</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-briefcase fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-briefcase</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-browsers fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-browsers</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-brush fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-brush</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bug fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bug</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-build fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-build</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bulb fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bulb</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-bus fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-bus</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-business fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-business</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cafe fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cafe</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-calculator fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-calculator</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-calendar fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-calendar</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-call fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-call</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-camera fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-camera</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-car fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-car</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-card fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-card</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cart fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cart</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cash fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cash</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cellular fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cellular</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-chatboxes fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-chatboxes</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-chatbubbles fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-chatbubbles</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-checkbox-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-checkbox-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-checkbox fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-checkbox</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-checkmark-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-checkmark-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-checkmark-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-checkmark-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-checkmark fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-checkmark</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-clipboard fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-clipboard</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-clock fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-clock</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-close-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-close-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-close-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-close-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-close fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-close</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloud-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloud-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloud-done fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloud-done</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloud-download fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloud-download</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloud-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloud-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloud-upload fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloud-upload</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloud fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloud</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloudy-night fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloudy-night</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cloudy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cloudy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-code-download fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-code-download</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-code-working fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-code-working</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-code fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-code</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cog fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cog</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-color-fill fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-color-fill</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-color-filter fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-color-filter</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-color-palette fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-color-palette</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-color-wand fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-color-wand</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-compass fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-compass</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-construct fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-construct</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-contact fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-contact</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-contacts fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-contacts</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-contract fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-contract</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-contrast fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-contrast</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-copy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-copy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-create fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-create</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-crop fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-crop</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cube fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cube</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-cut fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-cut</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-desktop fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-desktop</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-disc fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-disc</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-document fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-document</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-done-all fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-done-all</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-download fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-download</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-easel fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-easel</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-egg fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-egg</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-exit fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-exit</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-expand fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-expand</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-eye-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-eye-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-eye fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-eye</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-fastforward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-fastforward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-female fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-female</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-filing fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-filing</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-film fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-film</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-finger-print fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-finger-print</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-fitness fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-fitness</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-flag fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-flag</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-flame fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-flame</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-flash-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-flash-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-flash fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-flash</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-flashlight fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-flashlight</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-flask fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-flask</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-flower fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-flower</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-folder-open fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-folder-open</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-folder fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-folder</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-football fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-football</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-funnel fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-funnel</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-gift fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-gift</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-git-branch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-git-branch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-git-commit fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-git-commit</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-git-compare fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-git-compare</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-git-merge fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-git-merge</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-git-network fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-git-network</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-git-pull-request fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-git-pull-request</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-glasses fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-glasses</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-globe fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-globe</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-grid fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-grid</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-hammer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-hammer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-hand fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-hand</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-happy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-happy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-headset fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-headset</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-heart fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-heart</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-heart-dislike fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-heart-dislike</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-heart-empty fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-heart-empty</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-heart-half fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-heart-half</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-help-buoy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-help-buoy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-help-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-help-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-help-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-help-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-help fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-help</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-home fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-home</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-hourglass fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-hourglass</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-ice-cream fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-ice-cream</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-image fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-image</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-images fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-images</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-infinite fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-infinite</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-information-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-information-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-information-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-information-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-information fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-information</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-jet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-jet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-journal fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-journal</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-key fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-key</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-keypad fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-keypad</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-laptop fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-laptop</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-leaf fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-leaf</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-link fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-link</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-list-box fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-list-box</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-list fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-list</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-locate fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-locate</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-lock fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-lock</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-log-in fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-log-in</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-log-out fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-log-out</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-magnet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-magnet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-mail-open fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-mail-open</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-mail-unread fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-mail-unread</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-mail fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-mail</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-male fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-male</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-man fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-man</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-map fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-map</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-medal fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-medal</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-medical fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-medical</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-medkit fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-medkit</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-megaphone fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-megaphone</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-menu fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-menu</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-mic-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-mic-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-mic fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-mic</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-microphone fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-microphone</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-moon fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-moon</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-more fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-more</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-move fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-move</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-musical-note fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-musical-note</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-musical-notes fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-musical-notes</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-navigate fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-navigate</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-notifications-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-notifications-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-notifications-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-notifications-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-notifications fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-notifications</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-nuclear fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-nuclear</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-nutrition fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-nutrition</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-open fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-open</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-options fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-options</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-outlet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-outlet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-paper-plane fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-paper-plane</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-paper fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-paper</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-partly-sunny fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-partly-sunny</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pause fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pause</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-paw fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-paw</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-people fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-people</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-person-add fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-person-add</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-person fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-person</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-phone-landscape fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-phone-landscape</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-phone-portrait fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-phone-portrait</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-photos fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-photos</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pie fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pie</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pin fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pin</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pint fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pint</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pizza fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pizza</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-planet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-planet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-play-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-play-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-play fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-play</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-podium fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-podium</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-power fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-power</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pricetag fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pricetag</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pricetags fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pricetags</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-print fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-print</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-pulse fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-pulse</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-qr-scanner fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-qr-scanner</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-quote fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-quote</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-radio-button-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-radio-button-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-radio-button-on fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-radio-button-on</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-radio fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-radio</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-rainy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-rainy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-recording fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-recording</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-redo fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-redo</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-refresh-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-refresh-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-refresh fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-refresh</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-remove-circle-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-remove-circle-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-remove-circle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-remove-circle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-remove fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-remove</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-reorder fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-reorder</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-repeat fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-repeat</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-resize fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-resize</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-restaurant fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-restaurant</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-return-left fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-return-left</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-return-right fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-return-right</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-reverse-camera fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-reverse-camera</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-rewind fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-rewind</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-ribbon fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-ribbon</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-rocket fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-rocket</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-rose fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-rose</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-sad fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-sad</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-save fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-save</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-school fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-school</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-search fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-search</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-send fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-send</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-settings fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-settings</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-share-alt fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-share-alt</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-share fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-share</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-shirt fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-shirt</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-shuffle fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-shuffle</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-skip-backward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-skip-backward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-skip-forward fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-skip-forward</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-snow fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-snow</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-speedometer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-speedometer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-square-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-square-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-square fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-square</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-star-half fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-star-half</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-star-outline fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-star-outline</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-star fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-star</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-stats fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-stats</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-stopwatch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-stopwatch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-subway fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-subway</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-sunny fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-sunny</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-swap fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-swap</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-switch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-switch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-sync fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-sync</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-tablet-landscape fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-tablet-landscape</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-tablet-portrait fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-tablet-portrait</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-tennisball fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-tennisball</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-text fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-text</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-thermometer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-thermometer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-thumbs-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-thumbs-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-thumbs-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-thumbs-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-thunderstorm fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-thunderstorm</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-time fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-time</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-timer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-timer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-today fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-today</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-train fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-train</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-transgender fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-transgender</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-trash fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-trash</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-trending-down fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-trending-down</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-trending-up fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-trending-up</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-trophy fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-trophy</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-tv fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-tv</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-umbrella fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-umbrella</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-undo fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-undo</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-unlock fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-unlock</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-videocam fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-videocam</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-volume-high fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-volume-high</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-volume-low fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-volume-low</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-volume-mute fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-volume-mute</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-volume-off fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-volume-off</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-wallet fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-wallet</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-walk fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-walk</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-warning fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-warning</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-watch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-watch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-water fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-water</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-wifi fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-wifi</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-wine fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-wine</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-ios-woman fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-ios-woman</p></div>
			</div>
			<!-- end row -->
		</div>
		<!-- end tab-pane -->
		<!-- begin tab-pane -->
		<div class="tab-pane fade" id="logos">
			<!-- begin row -->
			<div class="row row-space-10">
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-android fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-android</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-angular fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-angular</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-apple fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-apple</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-bitbucket fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-bitbucket</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-bitcoin fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-bitcoin</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-buffer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-buffer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-chrome fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-chrome</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-closed-captioning fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-closed-captioning</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-codepen fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-codepen</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-css3 fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-css3</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-designernews fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-designernews</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-dribbble fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-dribbble</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-dropbox fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-dropbox</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-euro fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-euro</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-facebook fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-facebook</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-flickr fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-flickr</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-foursquare fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-foursquare</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-freebsd-devil fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-freebsd-devil</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-game-controller-a fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-game-controller-a</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-game-controller-b fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-game-controller-b</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-github fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-github</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-google fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-google</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-googleplus fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-googleplus</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-hackernews fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-hackernews</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-html5 fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-html5</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-instagram fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-instagram</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-ionic fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-ionic</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-ionitron fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-ionitron</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-javascript fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-javascript</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-linkedin fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-linkedin</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-markdown fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-markdown</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-model-s fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-model-s</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-no-smoking fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-no-smoking</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-nodejs fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-nodejs</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-npm fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-npm</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-octocat fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-octocat</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-pinterest fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-pinterest</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-playstation fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-playstation</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-polymer fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-polymer</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-python fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-python</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-reddit fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-reddit</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-rss fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-rss</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-sass fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-sass</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-skype fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-skype</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-slack fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-slack</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-snapchat fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-snapchat</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-steam fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-steam</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-tumblr fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-tumblr</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-tux fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-tux</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-twitch fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-twitch</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-twitter fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-twitter</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-usd fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-usd</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-vimeo fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-vimeo</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-vk fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-vk</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-whatsapp fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-whatsapp</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-windows fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-windows</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-wordpress fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-wordpress</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-xbox fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-xbox</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-xing fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-xing</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-yahoo fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-yahoo</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-yen fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion-logo-yen</p></div>
				<div class="col-lg-2 col-sm-4 col-6 p-t-5 p-b-5"><i class="ion ion-logo-youtube fa-2x fa-fw pull-left m-r-10 text-black-lighter"></i><p class="text-ellipsis m-t-3 m-b-0">ion ion-logo-youtube</p></div>
			</div>
			<!-- end row -->
		</div>
		<!-- end tab-pane -->
	</div>
	<!-- end tab-content -->
@endsection
