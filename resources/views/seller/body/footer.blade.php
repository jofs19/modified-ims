<footer class="footer bg-dark pt-5">
    <div class="container pt-2 pb-3">
      <div class="row">
        <div class="col-md-6 text-center text-md-start mb-4">
          <div class="text-nowrap mb-3"><a class="d-inline-block align-middle mt-n1 me-2" href="#"><img class="d-block" src="{{ asset('frontendv2/assets/img/psu.png') }}" width="117" alt="vartouhi"></a><span class="d-inline-block align-middle h5 fw-light text-white mb-0">Inventory Management System - PSU, LC</span></div>
          {{-- <p class="fs-sm text-white opacity-70 pb-1">High quality items created by our global community.</p>
          <h6 class="d-inline-block pe-3 me-3 border-end border-light"><span class="text-primary">65,478 </span><span class="fw-normal text-white">Products</span></h6>
          <h6 class="d-inline-block pe-3 me-3 border-end border-light"><span class="text-primary">2,521 </span><span class="fw-normal text-white">Members</span></h6>
          <h6 class="d-inline-block me-3"><span class="text-primary">897 </span><span class="fw-normal text-white">Vendors</span></h6>
          <div class="widget mt-4 text-md-nowrap text-center text-md-start"><a class="btn-social bs-light bs-twitter me-2 mb-2" href="#"><i class="ci-twitter"></i></a><a class="btn-social bs-light bs-facebook me-2 mb-2" href="#"><i class="ci-facebook"></i></a><a class="btn-social bs-light bs-dribbble me-2 mb-2" href="#"><i class="ci-dribbble"></i></a><a class="btn-social bs-light bs-behance me-2 mb-2" href="#"><i class="ci-behance"></i></a><a class="btn-social bs-light bs-pinterest me-2 mb-2" href="#"><i class="ci-pinterest"></i></a></div> --}}
        </div>
        <!-- Mobile dropdown menu (visible on screens below md)-->
        {{-- <div class="col-12 d-md-none text-center mb-4 pb-2">
          <div class="btn-group dropdown d-block mx-auto mb-3">
            <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-bs-toggle="dropdown">Categories</button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#">Photos</a></li>
              <li><a class="dropdown-item" href="#">Graphics</a></li>
              <li><a class="dropdown-item" href="#">UI Design</a></li>
              <li><a class="dropdown-item" href="#">Web Themes</a></li>
              <li><a class="dropdown-item" href="#">Fonts</a></li>
              <li><a class="dropdown-item" href="#">Add-Ons</a></li>
            </ul>
          </div>
          <div class="btn-group dropdown d-block mx-auto">
            <button class="btn btn-outline-light border-light dropdown-toggle" type="button" data-bs-toggle="dropdown">For members</button>
            <ul class="dropdown-menu my-1">
              <li><a class="dropdown-item" href="#">Licenses</a></li>
              <li><a class="dropdown-item" href="#">Return policy</a></li>
              <li><a class="dropdown-item" href="#">Payment methods</a></li>
              <li><a class="dropdown-item" href="{{ route('become.vendor') }}">Become a vendor</a></li>
              <li><a class="dropdown-item" href="#">Become an affiliate</a></li>
              <li><a class="dropdown-item" href="#">Marketplace benefits</a></li>
            </ul>
          </div>
        </div>
        <!-- Desktop menu (visible on screens above md)-->
        <div class="col-md-3 d-none d-md-block text-center text-md-start mb-4">
          <div class="widget widget-links widget-light pb-2">
            <h3 class="widget-title text-light">Categories</h3>
            <ul class="widget-list">
              <li class="widget-list-item"><a class="widget-list-link" href="#">Photos</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Graphics</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">UI Design</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Web Themes</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Fonts</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Add-Ons</a></li>
            </ul>
          </div>
        </div>
        <div class="col-md-3 d-none d-md-block text-center text-md-start mb-4">
          <div class="widget widget-links widget-light pb-2">
            <h3 class="widget-title text-light">For members</h3>
            <ul class="widget-list">
              <li class="widget-list-item"><a class="widget-list-link" href="#">Licenses</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Return policy</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Payment methods</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="{{ route('become.vendor') }}">Become a vendor</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Become an affiliate</a></li>
              <li class="widget-list-item"><a class="widget-list-link" href="#">Marketplace benefits</a></li>
            </ul>
          </div>
        </div> --}}
      </div>
    </div>
    <!-- Second row-->
    <div class="pt-5 bg-darker">
      <div class="container">
        <div class="widget w-100 mb-4 pb-3 text-center mx-auto" style="max-width: 28rem;">
          <h3 class="widget-title text-light pb-1">Subscribe to newsletter</h3>
          <form class="subscription-form validate" action="https://studio.us12.list-manage.com/subscribe/post?u=c7103e2c981361a6639545bd5&amp;amp;id=29ca296126" method="post" name="mc-embedded-subscribe-form" target="_blank" novalidate>
            <div class="input-group flex-nowrap"><i class="ci-mail position-absolute top-50 translate-middle-y text-muted fs-base ms-3"></i>
              <input class="form-control rounded-start" type="email" name="EMAIL" placeholder="Your email" required>
              <button class="btn btn-primary" type="submit" name="subscribe">Subscribe*</button>
            </div>
            <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
            <div style="position: absolute; left: -5000px;" aria-hidden="true">
              <input class="subscription-form-antispam" type="text" name="b_c7103e2c981361a6639545bd5_29ca296126" tabindex="-1">
            </div>
            <div class="form-text text-light opacity-50">*Receive early discount offers, updates and new products info.</div>
            <div class="subscription-status"></div>
          </form>
        </div>
        <hr class="hr-light mb-3">
        <div class="d-md-flex justify-content-between pt-4">
          <div class="pb-4 fs-xs text-light opacity-50 text-center text-md-start">© All rights reserved 2023. Made by <a class="text-light" href="https://createx.studio/" target="_blank" rel="noopener">John Oliver Santiago</a></div>
          <div class="widget widget-links widget-light pb-4">
            <ul class="widget-list d-flex flex-wrap justify-content-center justify-content-md-start">
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Help Center</a></li>
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Affiliates</a></li>
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Support</a></li>
              <li class="widget-list-item ms-4"><a class="widget-list-link fs-ms" href="#">Terms &amp; Conditions</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </footer>

