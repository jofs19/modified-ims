@extends('frontendv2.main_master')
@section('content')

@section('title')
Vartouhi | Compare Product
@endsection

<!-- Page Title (Dark)-->
      <div class="bg-dark py-4">
        <div class="container d-lg-flex justify-content-between py-2 py-lg-3">
          <div class="order-lg-2 mb-3 mb-lg-0 pt-lg-2">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb breadcrumb-light flex-lg-nowrap justify-content-center justify-content-lg-start">
                <li class="breadcrumb-item"><a class="text-nowrap" href="index.html"><i class="ci-home"></i>Home</a></li>
                <li class="breadcrumb-item text-nowrap active" aria-current="page">Comparison</li>
              </ol>
            </nav>
          </div>
          <div class="order-lg-1 pe-lg-4 text-center text-lg-start">
            <h1 class="h3 text-light mb-0">Product comparison</h1>
          </div>
        </div>
      </div>


      <div class="container py-5 mb-2">
        <div class="table-responsive">
          <table class="table table-bordered table-layout-fixed fs-sm" style="min-width: 45rem;"  id="compareTable">
            <thead>
              <tr class="table-header">             
                <td class="align-middle">
                  <select class="form-select" id="compare-criteria" data-filter-trigger>
                    <option value="all">Comparison criteria *</option>
                    <option value="description">Description</option>
                    <option value="sizes">Sizes</option>
                    <option value="variants">Variants</option>
                    <option value="stock">Stock</option>
                    <option value="price_rating">Price</option>
                  </select>
                  <div class="form-text">* Choose criteria to filter table below.</div>
                  
                </td>


                {{-- <td class="text-center px-4 pb-4"><a class="btn btn-sm d-block w-100 text-danger mb-2" href="#"><i class="ci-trash me-1"></i>Remove</a><a class="d-inline-block mb-3" href="shop-single-v2.html"><img src="/${value.product.product_thumbnail}" width="80" alt="Apple iPhone Xs Max"></a>
                  <h3 class="product-title fs-sm"><a href="shop-single-v2.html">${value.product.product_name_en}</a></h3>
                  <button class="btn btn-primary btn-sm" type="submit" href="#quick-view-electro"
                            data-bs-toggle="modal" data-bs-target="#quick-view-electro" id="${value.id}"
                            onclick="productView(${value.product_id})">Add to Cart</button>
                  <button class="btn btn-primary btn-sm" type="submit" id="${value.id}" onclick="addToWishlist(this.id)">Add to Wishlist</button>
                </td>  --}}
                
              </tr>
            </thead>


        {{-- DESCRIPTION --}}

            <tbody id="description" data-filter-target>
              <tr class="bg-secondary tname">
                <th class="text-uppercase text-dark">PRODUCT NAME</th>
                {{-- <td><span class="text-dark fw-medium text-dark">Apple iPhone Xs Max</span></td>
                <td><span class="text-dark fw-medium text-dark">Google Pixel 3 XL</span></td>
                <td><span class="text-dark fw-medium text-dark">Samsung Galaxy S10+</span></td> --}}
              </tr>
              <tr class="description ">
                <th class="text-dark">Description</th>
                {{-- <td>Hexa Core</td>
                <td>Octa Core</td>
                <td>Octa Core</td> --}}
              </tr>

            </tbody>
            
        {{-- DESCRIPTION --}}



        {{-- SIZES --}}

            <tbody id="sizes" data-filter-target>
              <tr class="bg-secondary tname">
                <th class="text-uppercase text-dark">PRODUCT NAME</th>
                {{-- <td><span class="text-dark fw-medium text-dark">Apple iPhone Xs Max</span></td>
                <td><span class="text-dark fw-medium text-dark">Google Pixel 3 XL</span></td>
                <td><span class="text-dark fw-medium text-dark">Samsung Galaxy S10+</span></td> --}}
              </tr>
              <tr class="sizes">
                <th class="text-dark">Sizes</th>
                {{-- <td>Yes</td>
                <td>Yes</td>
                <td>Yes</td> --}}
              </tr>

            </tbody>

        {{-- SIZES --}}

        {{-- VARIANTS --}}

            <tbody id="variants" data-filter-target>
              <tr class="bg-secondary tname">
                <th class="text-uppercase text-dark">PRODUCT NAME</th>
                {{-- <td><span class="text-dark fw-medium text-dark">Apple iPhone Xs Max</span></td>
                <td><span class="text-dark fw-medium text-dark">Google Pixel 3 XL</span></td>
                <td><span class="text-dark fw-medium text-dark">Samsung Galaxy S10+</span></td> --}}
              </tr>
              <tr class="variants">
                <th class="text-dark">Variants</th>
                {{-- <td>Apple A12 Bionic</td>
                <td>Qualcomm Snapdragon 845 (2.5GHz octa-core)</td>
                <td>Octa-core Qualcomm Snapdragon 855</td> --}}
              </tr>
              
            </tbody>

        {{-- VARIANTS --}}

        {{-- STOCK --}}

            <tbody id="stock" data-filter-target>
              <tr class="bg-secondary tname">
                <th class="text-uppercase text-dark">PRODUCT NAME</th>
                {{-- <td><span class="text-dark fw-medium text-dark">Apple iPhone Xs Max</span></td>
                <td><span class="text-dark fw-medium text-dark">Google Pixel 3 XL</span></td>
                <td><span class="text-dark fw-medium text-dark">Samsung Galaxy S10+</span></td> --}}
              </tr>
              <tr class="stock">
                <th class="text-dark">Stock</th>
                {{-- <td>64 GB</td>
                <td>64 GB</td>
                <td>128 GB</td> --}}
              </tr>
          
            </tbody>
                   
        {{-- STOCK --}}

        {{-- PRICE & RATING --}}

            <tbody id="price_rating" data-filter-target>
              <tr class="bg-secondary tname">
                <th class="text-uppercase text-dark">PRODUCT NAME</th>
                {{-- <td><span class="text-dark fw-medium text-dark">Apple iPhone Xs Max</span></td>
                <td><span class="text-dark fw-medium text-dark">Google Pixel 3 XL</span></td>
                <td><span class="text-dark fw-medium text-dark">Samsung Galaxy S10+</span></td> --}}
              </tr>
              <tr class="price_rating">
                <th class="text-dark">Price</th>
                {{-- <td>$1,099</td>
                <td>$899</td>
                <td>$1,000</td> --}}
              </tr>
              {{-- <tr>
                <th class="text-dark">Rating</th>
                <td>4.5/5</td>
                <td>4.5/5</td>
                <td>4.5/5</td>
              </tr> --}}
              <tr class="buttons">
                <th></th>
                {{-- <td>
                  <button class="btn btn-primary d-block w-100" type="button">Add to Cart</button>
                </td>
                <td>
                  <button class="btn btn-primary d-block w-100" type="button">Add to Cart</button>
                </td>
                <td>
                  <button class="btn btn-primary d-block w-100" type="button">Add to Cart</button>
                </td> --}}
              </tr>
            </tbody>

        {{-- PRICE & RATING --}}

          </table>
        </div>
      </div>


      @endsection