@extends('dashboard.layouts.driver-dashboard')
@section('contents')
<!-- main contents -->
<div class="navbar bg-body-tertiary mx-3 mt-3 pngtree-img-file-document-icon-png-image_913759 container-fluid border rounded" style="width: 97.8%;">
    <h5 class="mx-4 mt-2"><span class="text-success mx-2"><b>|</b></span>Dashboard | <span class="text-secondary h6">Welcome {{ auth()->user()->firstname }} {{ auth()->user()->lastname }}</span> </h5>
    <div class="d-flex mx-3  mt-2">
        <span class="h5 me-4">
            <i class='bx bxs-home'></i>
        </span>
        <span class="h6 me-2">
            <span>Client</span>
        </span>
        <span class="h5 me-2">
            <i class='bx bx-chevrons-right' ></i>
        </span>
        <span class="h6">
            <a href="#">Dashboard</a>
        </span>
    </div>
</div>
<!-- table -->
<div class="card mx-3 mt-3 p-4">
    <h1>Tables</h1>
</div>
@endsection