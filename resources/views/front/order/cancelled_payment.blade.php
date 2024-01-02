@extends('front.layouts.master')

@section('styles')
<style>
    @media (min-width: 1025px) {
    .h-custom {
    height: 85vh !important;
    }
    }

    .horizontal-timeline .items {
    border-top: 2px solid #ddd;
    }

    .horizontal-timeline .items .items-list {
    position: relative;
    margin-right: 0;
    }

    .horizontal-timeline .items .items-list:before {
    content: "";
    position: absolute;
    height: 8px;
    width: 8px;
    border-radius: 50%;
    background-color: #ddd;
    top: 0;
    margin-top: -5px;
    }

    .horizontal-timeline .items .items-list {
    padding-top: 15px;
    }
</style>
@endsection

@section('content')

<section class="h-100 h-custom" style="background-color: #eee;">
  <div class="container py-4 h-50">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-lg-8 col-xl-6">
        <div class="card border-top border-bottom border-3" style="border-color: #7fad39 !important;">
          <div class="card-body p-5">

            <p class="lead fw-bold mb-2" style="color: #7fad39;">Your order has been cancelled.</p>

            <p class="lead fw-bold mb-5" style="color: #7fad39;">Purchase Reciept</p>

            <div class="row">
              <div class="col mb-3">
                <p class="small text-muted mb-1">Date</p>
                <p>10 April 2021</p>
              </div>
              <div class="col mb-3">
                <p class="small text-muted mb-1">Order No.</p>
                <p>012j1gvs356c</p>
              </div>
            </div>

            <p class="lead fw-bold mb-4 pb-2" style="color: #7fad39;">Tracking Order</p>

            <div class="row">
              <div class="col-lg-12">

                <div class="horizontal-timeline">

                  <ul class="list-inline items d-flex justify-content-between">
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Ordered</p
                        class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                    </li>
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">Shipped</p
                        class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">
                    </li>
                    <li class="list-inline-item items-list">
                      <p class="py-1 px-2 rounded text-white" style="background-color: #f37a27;">On the way
                      </p>
                    </li>
                    <li class="list-inline-item items-list text-end" style="margin-right: 8px;">
                      <p style="margin-right: -8px; color:#f37a27;">Delivered</p>
                    </li>
                  </ul>

                </div>

              </div>
            </div>

            <p class="mt-4 pt-2 mb-0">Want any help? <a href="#!" style="color: #7fad39;">Please contact
                us</a></p>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

@endsection