<hr class="mb-2">



{{-- Color Options --}}
<section class="container py-5">



    <div class="row align-items-center py-3 py-md-4">
      <div class="col-sm-6">
        <div class="mb-5 mb-sm-0 text-center text-sm-start" id="colorOptions">
          <div class="radio-tab-pane active" id="color-1" role="tabpanel"><img class="slide-in-elliptic-top-fwd d-block mx-auto img-thumbnail rounded" src="{{ asset('upload/tomato-soap.jpg') }}" alt="Color 1" width="350px"></div>
          <div class="radio-tab-pane" id="color-2" role="tabpanel"><img class="slide-in-elliptic-top-fwd d-block mx-auto img-thumbnail rounded" src="{{ asset('upload/kojic.jpg') }}" alt="Color 1" width="350px"></div>
          <div class="radio-tab-pane" id="color-3" role="tabpanel"><img class="slide-in-elliptic-top-fwd d-block mx-auto img-thumbnail rounded" src="{{ asset('upload/gluta-soap.jpg') }}" alt="Color 1" width="350px"></div>
          <div class="radio-tab-pane" id="color-4" role="tabpanel"><img class="slide-in-elliptic-top-fwd d-block mx-auto img-thumbnail rounded" src="{{ asset('upload/green-tea-soap.jpg') }}" alt="Color 1" width="350px"></div>
          <div class="radio-tab-pane" id="color-5" role="tabpanel"><img class="slide-in-elliptic-top-fwd d-block mx-auto img-thumbnail rounded" src="{{ asset('upload/product-charcoal.jpg') }}" alt="Color 1" width="350px"></div>
          
        </div>
      </div>
      <div class="col-sm-6 text-center text-sm-start">
        <h2 class="pb-3">Choose variety of Soap!</h2>
        <div class="mb-3"><span class="fs-sm text-heading fw-medium me-1" id="colorOptionText">Tomato Extract</span><span>&nbsp;&mdash;&nbsp; ₱ 200.<small>00</small></span></div>
        <div class="mb-3 pb-1">
          <div class="form-check form-option form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="color" id="color1" data-bs-label="colorOptionText" value="Tomato Soap" checked>
            <label class="form-option-label rounded-circle" for="color1" data-bs-toggle="radioTab" data-bs-target="#color-1" data-bs-parent="#colorOptions"><span class="form-option-color rounded-circle" style="background-color: red"></span></label>
          </div>
          <div class="form-check form-option form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="color" id="color2" data-bs-label="colorOptionText" value="Kojic Soap">
            <label class="form-option-label rounded-circle" for="color2" data-bs-toggle="radioTab" data-bs-target="#color-2" data-bs-parent="#colorOptions"><span class="form-option-color rounded-circle" style="background-color: orange;"></span></label>
          </div>
          <div class="form-check form-option form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="color" id="color3" data-bs-label="colorOptionText" value="Gluta Soap">
            <label class="form-option-label rounded-circle" for="color3" data-bs-toggle="radioTab" data-bs-target="#color-3" data-bs-parent="#colorOptions"><span class="form-option-color rounded-circle" style="background-color: #e4e3e3;"></span></label>
          </div>
          <div class="form-check form-option form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="color" id="color4" data-bs-label="colorOptionText" value="Green Tea Soap">
            <label class="form-option-label rounded-circle" for="color4" data-bs-toggle="radioTab" data-bs-target="#color-4" data-bs-parent="#colorOptions"><span class="form-option-color rounded-circle" style="background-color: green;"></span></label>
          </div>
          <div class="form-check form-option form-check-inline mb-2">
            <input class="form-check-input" type="radio" name="color" id="color5" data-bs-label="colorOptionText" value="Charcoal Soap">
            <label class="form-option-label rounded-circle" for="color5" data-bs-toggle="radioTab" data-bs-target="#color-5" data-bs-parent="#colorOptions"><span class="form-option-color rounded-circle" style="background-color: #292828;"></span></label>
          </div>
          
        </div><a class="btn btn-primary shimmer-btn placeholder-wave" href="{{ route('shop.page') }}"><i class="ci-store fs-md me-2"></i>Get yours now!</a>
      </div>
    </div>
  </section>
  {{-- End Color Options --}}






