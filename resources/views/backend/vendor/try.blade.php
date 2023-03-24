@extends('seller.vendor_dashboard')
@section('vendor')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<section class="col-lg-8 pt-lg-4 pb-4 mb-3">
    <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
      <h2 class="h3 py-2 text-center text-sm-start">Vendor Details</h2>
      <!-- Tabs-->
      <ul class="nav nav-tabs nav-justified" role="tablist">
        <li class="nav-item"><a class="nav-link px-0 active" href="#profile" data-bs-toggle="tab" role="tab">
            <div class="d-none d-lg-block"><i class="ci-store opacity-60 me-2"></i>Information</div>
            <div class="d-lg-none text-center"><i class="ci-user opacity-60 d-block fs-xl mb-2"></i><span class="fs-ms">Profile</span></div></a></li>
        <li class="nav-item"><a class="nav-link px-0" href="#notifications" data-bs-toggle="tab" role="tab">
            <div class="d-none d-lg-block"><i class="ci-basket opacity-60 me-2"></i>Products</div>
            <div class="d-lg-none text-center"><i class="ci-bell opacity-60 d-block fs-xl mb-2"></i><span class="fs-ms">Notifications</span></div></a></li>
        {{-- <li class="nav-item"><a class="nav-link px-0" href="#payment" data-bs-toggle="tab" role="tab">
            <div class="d-none d-lg-block"><i class="ci-card opacity-60 me-2"></i>Payment methods</div>
            <div class="d-lg-none text-center"><i class="ci-card opacity-60 d-block fs-xl mb-2"></i><span class="fs-ms">Payment</span></div></a></li> --}}
      </ul>
      <!-- Tab content-->
      <div class="tab-content">
        <!-- Profile-->
        <div class="tab-pane fade show active" id="profile" role="tabpanel">
            <div class="bg-white h-100 border-end p-4">
                <div class="p-2">
                  <h6>About</h6>
                  <p class="fs-ms text-muted">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium viras doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                  <hr class="my-4">
                  <h6>Contacts</h6>
                  <ul class="list-unstyled fs-sm">
                    <li><a class="nav-link-style d-flex align-items-center" href="mailto:contact@example.com"><i class="ci-mail opacity-60 me-2"></i>contact@example.com</a></li>
                    <li><a class="nav-link-style d-flex align-items-center" href="#"><i class="ci-globe opacity-60 me-2"></i>www.createx.studio</a></li>
                  </ul><a class="btn-social bs-facebook bs-outline bs-sm me-2 mb-2" href="#"><i class="ci-facebook"></i></a><a class="btn-social bs-twitter bs-outline bs-sm me-2 mb-2" href="#"><i class="ci-twitter"></i></a><a class="btn-social bs-dribbble bs-outline bs-sm me-2 mb-2" href="#"><i class="ci-dribbble"></i></a><a class="btn-social bs-behance bs-outline bs-sm me-2 mb-2" href="#"><i class="ci-behance"></i></a>
                  <hr class="my-4">
                  <h6 class="pb-1">Send message</h6>
                  <form class="needs-validation pb-2" method="post" novalidate>
                    <div class="mb-3">
                      <textarea class="form-control" rows="6" placeholder="Your message" required></textarea>
                      <div class="invalid-feedback">Please wirte your message!</div>
                    </div>
                    <button class="btn btn-primary btn-sm d-block w-100" type="submit">Send</button>
                  </form>
                </div>
              </div>
        </div>
        <!-- Notifications-->
        <div class="tab-pane fade" id="notifications" role="tabpanel">
            <div class="pt-2 px-4 ps-lg-0 pe-xl-5">
                <h2 class="h3 pt-2 pb-4 mb-4 text-center text-sm-start border-bottom">Products<span class="badge bg-faded-accent fs-sm text-body align-middle ms-2">6</span></h2>
                <div class="row pt-2">
                  <!-- Product-->
                  <div class="col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                        <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="marketplace-single.html"><i class="ci-eye"></i></a>
                          <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i class="ci-cart"></i></button>
                        </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="img/marketplace/products/04.jpg" alt="Product">
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                          <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std. </a>in <a class="product-meta fw-medium" href="#">Graphics</a></div>
                          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                          </div>
                        </div>
                        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">Flat-line E-Commerce Icons (AI)</a></h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                          <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>26<span class="fs-xs ms-1">Sales</span></div>
                          <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">$18.<small>00</small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Product-->
                  <div class="col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                        <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="marketplace-single.html"><i class="ci-eye"></i></a>
                          <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i class="ci-cart"></i></button>
                        </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="img/marketplace/products/01.jpg" alt="Product">
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                          <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std. </a>in <a class="product-meta fw-medium" href="#">UI Design</a></div>
                          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                          </div>
                        </div>
                        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">Square Style Mobile UI Kit (Sketch)</a></h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                          <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>153<span class="fs-xs ms-1">Sales</span></div>
                          <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">$24.<small>00</small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Product-->
                  <div class="col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                        <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="marketplace-single.html"><i class="ci-eye"></i></a>
                          <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i class="ci-cart"></i></button>
                        </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="img/marketplace/products/05.jpg" alt="Product">
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                          <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std. </a>in <a class="product-meta fw-medium" href="#">UI Design</a></div>
                          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                          </div>
                        </div>
                        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">Minimal Mobile App UI Kit (Sketch)</a></h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                          <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>117<span class="fs-xs ms-1">Sales</span></div>
                          <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">$23.<small>00</small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Product-->
                  <div class="col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                        <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="marketplace-single.html"><i class="ci-eye"></i></a>
                          <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i class="ci-cart"></i></button>
                        </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="img/marketplace/products/02.jpg" alt="Product">
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                          <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std. </a>in <a class="product-meta fw-medium" href="#">Graphics</a></div>
                          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                          </div>
                        </div>
                        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">Floating Phone and Tablet Mockup (PSD)</a></h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                          <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>109<span class="fs-xs ms-1">Sales</span></div>
                          <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">$15.<small>00</small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Product-->
                  <div class="col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                        <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="marketplace-single.html"><i class="ci-eye"></i></a>
                          <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i class="ci-cart"></i></button>
                        </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="img/marketplace/products/06.jpg" alt="Product">
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                          <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std. </a>in <a class="product-meta fw-medium" href="#">Graphics</a></div>
                          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i>
                          </div>
                        </div>
                        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">Travel &amp; Landmark Icon Pack (AI)</a></h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                          <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>21<span class="fs-xs ms-1">Sales</span></div>
                          <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">$17.<small>00</small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- Product-->
                  <div class="col-sm-6 mb-grid-gutter">
                    <div class="card product-card-alt">
                      <div class="product-thumb">
                        <button class="btn-wishlist btn-sm" type="button"><i class="ci-heart"></i></button>
                        <div class="product-card-actions"><a class="btn btn-light btn-icon btn-shadow fs-base mx-2" href="marketplace-single.html"><i class="ci-eye"></i></a>
                          <button class="btn btn-light btn-icon btn-shadow fs-base mx-2" type="button"><i class="ci-cart"></i></button>
                        </div><a class="product-thumb-overlay" href="marketplace-single.html"></a><img src="img/marketplace/products/03.jpg" alt="Product">
                      </div>
                      <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between align-items-start pb-2">
                          <div class="text-muted fs-xs me-1">by <a class="product-meta fw-medium" href="#">Createx Std. </a>in <a class="product-meta fw-medium" href="#">Graphics</a></div>
                          <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star-filled active"></i><i class="star-rating-icon ci-star"></i>
                          </div>
                        </div>
                        <h3 class="product-title fs-sm mb-2"><a href="marketplace-single.html">Project Devices Showcase (PSD)</a></h3>
                        <div class="d-flex flex-wrap justify-content-between align-items-center">
                          <div class="fs-sm me-2"><i class="ci-download text-muted me-1"></i>95<span class="fs-xs ms-1">Sales</span></div>
                          <div class="bg-faded-accent text-accent rounded-1 py-1 px-2">$18.<small>00</small></div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
        </div>
        <!-- Payment methods-->
        <div class="tab-pane fade" id="payment" role="tabpanel">
          <div class="bg-secondary rounded-3 p-4 mb-4">
            <p class="fs-sm text-muted mb-0">Primary payment method is used by default</p>
          </div>
          <div class="table-responsive fs-md mb-4">
            <table class="table table-hover mb-0">
              <thead>
                <tr>
                  <th>Your credit / debit cards</th>
                  <th>Name on card</th>
                  <th>Expires on</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="d-flex align-items-center"><img src="img/card-visa.png" width="39" alt="Visa">
                      <div class="ps-2"><span class="fw-medium text-heading me-1">Visa</span>ending in 4999<span class="align-middle badge badge-info ms-2">Primary</span></div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">John doe</td>
                  <td class="py-3 align-middle">08 / 2019</td>
                  <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                      <div class="ci-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="d-flex align-items-center"><img src="img/card-master.png" width="39" alt="MesterCard">
                      <div class="ps-2"><span class="fw-medium text-heading me-1">MasterCard</span>ending in 0015</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">John doe</td>
                  <td class="py-3 align-middle">11 / 2021</td>
                  <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                      <div class="ci-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="d-flex align-items-center"><img src="img/card-paypal.png" width="39" alt="PayPal">
                      <div class="ps-2"><span class="fw-medium text-heading me-1">PayPal</span>j.doe@example.com</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">&mdash;</td>
                  <td class="py-3 align-middle">&mdash;</td>
                  <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                      <div class="ci-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="d-flex align-items-center"><img src="img/card-visa.png" width="39" alt="Visa">
                      <div class="ps-2"><span class="fw-medium text-heading me-1">Visa</span>ending in 6073</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">John doe</td>
                  <td class="py-3 align-middle">09 / 2021</td>
                  <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                      <div class="ci-trash"></div></a></td>
                </tr>
                <tr>
                  <td class="py-3 align-middle">
                    <div class="d-flex align-items-center"><img src="img/card-visa.png" width="39" alt="Visa">
                      <div class="ps-2"><span class="fw-medium text-heading me-1">Visa</span>ending in 9791</div>
                    </div>
                  </td>
                  <td class="py-3 align-middle">John doe</td>
                  <td class="py-3 align-middle">05 / 2021</td>
                  <td class="py-3 align-middle"><a class="nav-link-style me-2" href="#" data-bs-toggle="tooltip" title="Edit"><i class="ci-edit"></i></a><a class="nav-link-style text-danger" href="#" data-bs-toggle="tooltip" title="Remove">
                      <div class="ci-trash"></div></a></td>
                </tr>
              </tbody>
            </table>
          </div>
          <div class="text-sm-end"><a class="btn btn-primary" href="#add-payment" data-bs-toggle="modal">Add payment method</a></div>
        </div>
      </div>
    </div>
  </section>

  </section>

  @endsection


