@extends('frontendv2.main_master')
@section('content')

<div class="page-title-overlap bg-dark pt-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
      <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
            <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
            <li class="breadcrumb-item text-nowrap"><a href="#">Account</a>
            </li>
            <li class="breadcrumb-item text-nowrap active" aria-current="page">Cancelled Orders</li>
          </ol>
        </nav>
      </div>
      <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
        <h1 class="h3 text-light mb-0">Cancelled Orders</h1>
      </div>
    </div>
  </div>
  <div class="container pb-5 mb-2 mb-md-4">
    <div class="row">
      <!-- Sidebar-->
      @include('frontendv2.common.user_sidebar')
      <!-- Content  -->
      <section class="col-lg-8">
        <!-- Toolbar-->
        <div class="d-flex justify-content-between align-items-center pt-lg-2 pb-4 pb-lg-5 mb-lg-3">
          <div class="d-flex align-items-center">
            <label class="d-none d-lg-block fs-sm text-light text-nowrap opacity-75 me-2" for="ticket-sort">Sort tickets:</label>
            <label class="d-lg-none fs-sm text-nowrap opacity-75 me-2" for="ticket-sort">Sort tickets:</label>
            <select class="form-select" id="ticket-sort">
              <option>All</option>
              <option>Open</option>
              <option>Closed</option>
            </select>
          </div><a class="btn btn-primary btn-sm d-none d-lg-inline-block" href="account-signin.html"><i class="ci-sign-out me-2"></i>Sign out</a>
        </div>
        <!-- Tickets list-->
        <div class="table-responsive fs-md mb-4">
          <table class="table table-hover mb-0 text-center">
            <thead>
              <tr>
                <th>Invoice</th>
                <th>Date of Cancel</th>

                <th>Request status</th>
              </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)

              <tr>
                <td class="py-3"><a class="nav-link-style fw-medium fs-sm" target="_blank" href="{{ url('user/order_details/'.$order->id ) }}">{{ $order->invoice_no }}</a></td>
                <td class="py-3"><a class="nav-link-style fw-medium" href="account-single-ticket.html">{{ $order->order_date }}</a></td>


                <td class="py-3">


                    <span class="badge bg-danger m-0">Cancelled</span>


                </td>


              </tr>

              @endforeach



            </tbody>
          </table>
        </div>
        <div >
            {{ $orders->links('vendor.pagination.grid_paginate') }}
        </div>
      </section>
    </div>
  </div>

  @endsection

