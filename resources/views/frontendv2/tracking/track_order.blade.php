@extends('frontendv2.main_master')
@section('content')


@section('title')
Vartouhi | Track {{  $track->invoice_no }}
@endsection


<div class="bg-dark py-4">
    <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
        <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                    <li class="breadcrumb-item"><a class="text-nowrap" href="{{ url('/') }}"><i class="ci-home"></i>Home</a>
                    </li>
                    
                    <li class="breadcrumb-item text-nowrap active" aria-current="page">Order tracking</li>
                </ol>
            </nav>
        </div>
        <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Tracking order: <span class="h4 fw-normal text-light">{{  $track->invoice_no }}</span></h1>
        </div>
    </div>
</div>
<div class="container py-5 mb-2 mb-md-3">
    <!-- Details-->
    <div class="row gx-4 mb-4">
        <div class="col-md-3 mb-2">
            <div class="bg-secondary h-100 p-4 text-center rounded-3"><span class="fw-medium text-dark me-2">Shipped
                    via:</span>LBC</div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="bg-secondary h-100 p-4 text-center rounded-3"><span class="fw-medium text-dark me-2">Payment:</span>
            
                @if($track->payment_method == 'Cash On Delivery')
                Cash On Delivery
                @else
                Paid via GCash
                @endif

            
            </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="bg-secondary h-100 p-4 text-center rounded-3"><span
                    class="fw-medium text-dark me-2">Status:</span>
                    @if ($track->status == 'pending')
                    Pending order
                    @elseif($track->status == 'confirm')
                    Confirming order
                    @elseif($track->status == 'reject')
                    Rejected order
                    @elseif($track->status == 'processing')
                    Processing order
                    @elseif($track->status == 'picked')
                    Picking order
                    @elseif($track->status == 'shipped')
                    Shipping order
                    @elseif($track->status == 'delivered')
                    Successfully Delivered

                    @endif
                
                
                </div>
        </div>
        <div class="col-md-3 mb-2">
            <div class="bg-secondary h-100 p-4 text-center rounded-3"><span class="fw-medium text-dark me-2">Duration:</span>3-5 Business days</div>
        </div>
    </div>
{{-- INSERTED --}}

<div class="tns-carousel tns-controls-static tns-controls-outside tns-nav-enabled">
    <div class="card border-0 shadow-lg">

        <div class="card-body pb-2">
    <div class="tns-carousel-inner" data-carousel-options='{"items": 4, "nav": true, "loop": false, "responsive": {"0":{"items":1},"500":{"items":2, "gutter": 18},"768":{"items":4, "gutter": 20}, "1100":{"gutter": 24}}}'>
        

        {{-- Order placed --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Order details has been submitted.">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-bag"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">First step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Order placed</h6>
                    </div>
                </div>
            </div>
        </div>

        @if($track->status == 'pending')

        {{-- Pending --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="You order was placed on queue.">
            <div class="nav-link active">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-eye-off"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Pending Order</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Confirmed --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-thumb-up"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Confirming</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Processed --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-settings"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Processing</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Picked --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-package"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Picking Order</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipped --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-delivery"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Shipping Order</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delivered --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-check"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                    </div>
                </div>
            </div>
        </div>

        @elseif($track->status == 'reject')

                        {{-- Pending --}}
                        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The admin has checked your order.">
                            <div class="nav-link completed">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-eye"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Checked</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        {{-- Confirmed --}}
                        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been rejected!">
                            <div class="nav-link active">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-close"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Rejected</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        {{-- Processed --}}
                        <div class="nav-item">
                            <div class="nav-link" >
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-settings"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Processing</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        {{-- Picked --}}
                        <div class="nav-item">
                            <div class="nav-link">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-package"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Picking Order</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        {{-- Shipped --}}
                        <div class="nav-item">
                            <div class="nav-link">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-delivery"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Shipping Order</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
                
                        {{-- Delivered --}}
                        <div class="nav-item">
                            <div class="nav-link">
                                <div class="d-flex align-items-center">
                                    <div class="media-tab-media"><i class="ci-check"></i></div>
                                    <div class="ps-3">
                                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                                        <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                                    </div>
                                </div>
                            </div>
                        </div>
        


        @elseif($track->status == 'confirm')

                {{-- Pending --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The admin has checked your order.">
                    <div class="nav-link completed">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-eye"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Checked</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Confirmed --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order is under verification.">
                    <div class="nav-link active">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-thumb-up"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Confirming</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Processed --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-settings"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Processing</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Picked --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-package"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Picking Order</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Shipped --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-delivery"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Shipping Order</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Delivered --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-check"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                            </div>
                        </div>
                    </div>
                </div>

                
        
        
       
       
        





        
                @elseif($track->status == 'processing')
                {{-- Pending --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The admin has checked your order.">
                    <div class="nav-link completed">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-eye"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Checked</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Confirmed --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been confirmed!">
                    <div class="nav-link completed">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-thumb-up"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Confirmed</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Processed --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order is on the process.">
                    <div class="nav-link active">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-settings"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Processing</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Picked --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-package"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Picking Order</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Shipped --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-delivery"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Shipping Order</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Delivered --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-check"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                            </div>
                        </div>
                    </div>
                </div>

               
       
       
       
       
       
        @elseif($track->status == 'picked')
                {{-- Pending --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The admin has checked your order!">
                    <div class="nav-link completed">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-eye"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Checked</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Confirmed --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been confirmed!">
                    <div class="nav-link completed">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-thumb-up"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Confirmed</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Processed --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been processed!">
                    <div class="nav-link completed">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-settings"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Processed</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Picked --}}
                <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The courier will attempt to pick your order.">
                    <div class="nav-link active">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-package"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Picking Order</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Shipped --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-delivery"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Shipping Order</h6>
                            </div>
                        </div>
                    </div>
                </div>
        
                {{-- Delivered --}}
                <div class="nav-item">
                    <div class="nav-link">
                        <div class="d-flex align-items-center">
                            <div class="media-tab-media"><i class="ci-check"></i></div>
                            <div class="ps-3">
                                <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                                <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                            </div>
                        </div>
                    </div>
                </div>

               
        
       
       
       
       
        
        @elseif($track->status == 'shipped')
        {{-- Pending --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The admin has checked your order!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-eye"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Checked</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Confirmed --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been confirmed!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-thumb-up"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Confirmed</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Processed --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been processed!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-settings"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Processed</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Picked --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been picked by the courier!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-package"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Picked</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipped --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The courier will now attempt to deliver your order.">
            <div class="nav-link active">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-delivery"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Shipping Order</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delivered --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-check"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                    </div>
                </div>
            </div>
        </div>


       
       
       
       
       
       

        @elseif($track->status == 'delivered')
        {{-- Pending --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="The admin has checked your order!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-eye"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Checked</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Confirmed --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been confirmed!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-thumb-up"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Confirmed</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Processed --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been processed.">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-settings"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Processed</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Picked --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been picked by the courier!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-package"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Picked</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipped --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Your order has been shipped out!">
            <div class="nav-link completed">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-delivery"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Shipped</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delivered --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="Leave us some review about it!">
            <div class="nav-link active">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-check"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                    </div>
                </div>
            </div>
        </div>



        @elseif ($track->status == 'cancel_order')
        {{-- Pending --}}
        <div class="nav-item" data-bs-toggle="tooltip" data-bs-placement="top" title="You cancelled your order.">
            <div class="nav-link active">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-close"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Cancelled Order</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Confirmed --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-thumb-up"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Confirming</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Processed --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-settings"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Processing</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Picked --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-package"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Fifth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Picking Order</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Shipped --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-delivery"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Sixth step</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Shipping Order</h6>
                    </div>
                </div>
            </div>
        </div>

        {{-- Delivered --}}
        <div class="nav-item">
            <div class="nav-link">
                <div class="d-flex align-items-center">
                    <div class="media-tab-media"><i class="ci-check"></i></div>
                    <div class="ps-3">
                        <div class="media-tab-subtitle text-muted fs-xs mb-1">Order Completed</div>
                        <h6 class="media-tab-title text-nowrap mb-0">Delivered</h6>
                    </div>
                </div>
            </div>
        </div>        


        @endif


    </div>
  </div>
</div>
</div>

{{-- End INSERTED --}}
    {{-- <!-- Progress-->

        <div class="card border-0 shadow-lg">

            <div class="card-body pb-2">

                <div class="nav nav-tabs media-tabs nav-justified">

                    <div class="nav-item">
                        <div class="nav-link completed">
                            <div class="d-flex align-items-center">
                                <div class="media-tab-media"><i class="ci-bag"></i></div>
                                <div class="ps-3">
                                    <div class="media-tab-subtitle text-muted fs-xs mb-1">First step</div>
                                    <h6 class="media-tab-title text-nowrap mb-0">Order placed</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item">
                        <div class="nav-link active">
                            <div class="d-flex align-items-center">
                                <div class="media-tab-media"><i class="ci-settings"></i></div>
                                <div class="ps-3">
                                    <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                                    <h6 class="media-tab-title text-nowrap mb-0">Processing order</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item">
                        <div class="nav-link">
                            <div class="d-flex align-items-center">
                                <div class="media-tab-media"><i class="ci-star"></i></div>
                                <div class="ps-3">
                                    <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                    <h6 class="media-tab-title text-nowrap mb-0">Quality check</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item">
                        <div class="nav-link">
                            <div class="d-flex align-items-center">
                                <div class="media-tab-media"><i class="ci-package"></i></div>
                                <div class="ps-3">
                                    <div class="media-tab-subtitle text-muted fs-xs mb-1">Fourth step</div>
                                    <h6 class="media-tab-title text-nowrap mb-0">Product dispatched</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="nav-item">
                        <div class="nav-link active">
                            <div class="d-flex align-items-center">
                                <div class="media-tab-media"><i class="ci-settings"></i></div>
                                <div class="ps-3">
                                    <div class="media-tab-subtitle text-muted fs-xs mb-1">Second step</div>
                                    <h6 class="media-tab-title text-nowrap mb-0">Processing order</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                  
                    <div class="nav-item align-items-center text-center">
                        <div class="nav-link">
                            <div class="d-flex align-items-center">
                                <div class="media-tab-media"><i class="ci-star"></i></div>
                                <div class="ps-3">
                                    <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                    <h6 class="media-tab-title text-nowrap mb-0">Quality check</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                   
                    <div class="nav-item align-items-center text-center">
                        <div class="nav-link">
                            <div class="d-flex align-items-center">
                                <div class="media-tab-media"><i class="ci-star"></i></div>
                                <div class="ps-3">
                                    <div class="media-tab-subtitle text-muted fs-xs mb-1">Third step</div>
                                    <h6 class="media-tab-title text-nowrap mb-0">Quality check</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                
            </div>

        </div>



    </div> --}}

    <!-- Footer-->
    <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">
        <div class="form-check mt-2 me-3">
            <span class="text-sm">Modified by Admin :</span> <span class="fw-bold">

                @if($track->updated_at == null || $track->updated_at->diffForHumans() == null)
                ----
                @else
                
                {{ $track->updated_at }} </span> ({{ $track->updated_at->diffForHumans() }})
                @endif
            
        </div><a class="btn btn-primary btn-sm mt-2" href="{{ url('user/order_details/'.$track->id ) }}" target="_blank">View Order Details</a>
    </div>
</div>

{{-- <div class="modal fade" id="order-details">
    <div class="modal-dialog modal-lg modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Order No - {{  $track->invoice_no }}</h5>
          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body pb-0">

           

          <!-- Item-->
          <div class="d-sm-flex justify-content-between mb-4 pb-3 pb-sm-2 border-bottom">
            <div class="d-sm-flex text-center text-sm-start"><a class="d-inline-block flex-shrink-0 mx-auto" href="shop-single-v1.html" style="width: 10rem;"><img src="img/shop/cart/01.jpg" alt="Product"></a>
              <div class="ps-sm-4 pt-2">
                <h3 class="product-title fs-base mb-2"><a href="shop-single-v1.html">Women Colorblock Sneakers</a></h3>
                <div class="fs-sm"><span class="text-muted me-2">Size:</span>8.5</div>
                <div class="fs-sm"><span class="text-muted me-2">Color:</span>White &amp; Blue</div>
                <div class="fs-lg text-accent pt-2">$154.<small>00</small></div>
              </div>
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
              <div class="text-muted mb-2">Quantity:</div>1
            </div>
            <div class="pt-2 ps-sm-3 mx-auto mx-sm-0 text-center">
              <div class="text-muted mb-2">Subtotal</div>$154.<small>00</small>
            </div>
          </div>
          <!-- End Item-->
          
        </div>
        <!-- Footer-->
        <div class="modal-footer flex-wrap justify-content-between bg-secondary fs-md">
          <div class="px-2 py-1"><span class="text-muted">Subtotal:&nbsp;</span><span>$265.<small>00</small></span></div>
          <div class="px-2 py-1"><span class="text-muted">Shipping:&nbsp;</span><span>$22.<small>50</small></span></div>
          <div class="px-2 py-1"><span class="text-muted">Tax:&nbsp;</span><span>$9.<small>50</small></span></div>
          <div class="px-2 py-1"><span class="text-muted">Total:&nbsp;</span><span class="fs-lg">$297.<small>00</small></span></div>
        </div>
      </div>
    </div>
  </div> --}}


@endsection
