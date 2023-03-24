      <!-- Reviews-->
      <section class="bg-secondary pt-3 product-section">
        <div class="container py-md-5 pt-3 pb-4">
          <h2 class="text-center mb-4 mb-md-5 pb-2">Customer reviews to our Products</h2>
          <div class="tns-carousel mb-3">
            <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 2, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1, &quot;gutter&quot;:20}, &quot;576&quot;:{&quot;items&quot;:2, &quot;gutter&quot;:20},&quot;850&quot;:{&quot;items&quot;:3, &quot;gutter&quot;:20},&quot;1080&quot;:{&quot;items&quot;:4, &quot;gutter&quot;:25}}}">

                @php
                // $reviews = App\Models\Review::where('product_id',$product->id)->latest()->limit(5)->get();
                $reviews = App\Models\Review::all()->where('status',1);
                @endphp



                @foreach($reviews as $review)

                @php
                $reviewcount =
                App\Models\Review::where('product_id',$product->id)->where('status',1)->latest()->get();
                $average =
                App\Models\Review::where('product_id',$product->id)->where('status',1)->avg('rating');
                @endphp
                
              <blockquote class="mb-2">
                <div class="card border-0 shadow-sm"><span class="testimonial-mark"></span>
                  <div class="card-body fs-md text-muted">
                    <div class="mb-2">
                     

                    


                      @if($review->rating == 0) <a
                          href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                          <div class="star-rating"><i class="star-rating-icon ci-star-filled "></i><i
                                  class="star-rating-icon ci-star-filled "></i><i
                                  class="star-rating-icon ci-star-filled "></i><i
                                  class="star-rating-icon ci-star-filled "></i><i
                                  class="star-rating-icon ci-star-filled "></i>
                          </div>
                          {{-- <span class="review">{{ count($reviewcount) }}
                          Review(s)</span> --}}
                          </a>
                          @elseif($review->rating == 1) <a
                              href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                              <div class="star-rating"><i class="star-rating-icon ci-star-filled active"></i><i
                                      class="star-rating-icon ci-star-filled "></i><i
                                      class="star-rating-icon ci-star-filled "></i><i
                                      class="star-rating-icon ci-star-filled "></i><i
                                      class="star-rating-icon ci-star-filled "></i>
                              </div>
                              {{-- <span class="review">{{ count($reviewcount) }}
                              Review(s)</span> --}}
                              </a>
                              @elseif($review->rating == 2) <a
                                  href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                  <div class="star-rating"><i
                                          class="star-rating-icon ci-star-filled active"></i><i
                                          class="star-rating-icon ci-star-filled active"></i><i
                                          class="star-rating-icon ci-star-filled "></i><i
                                          class="star-rating-icon ci-star-filled "></i><i
                                          class="star-rating-icon ci-star-filled "></i>
                                  </div>
                                  {{-- <span class="review">{{ count($reviewcount) }}
                                  Review(s)</span> --}}
                                  </a>

                                  @elseif($review->rating == 3) <a
                                      href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                      <div class="star-rating"><i
                                              class="star-rating-icon ci-star-filled active"></i><i
                                              class="star-rating-icon ci-star-filled active"></i><i
                                              class="star-rating-icon ci-star-filled active"></i><i
                                              class="star-rating-icon ci-star-filled "></i><i
                                              class="star-rating-icon ci-star-filled"></i>
                                      </div>
                                      {{-- <span class="review">{{ count($reviewcount) }}
                                      Review(s)</span> --}}
                                      </a>


                                      @elseif($review->rating == 4) <a
                                          href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                          <div class="star-rating"><i
                                                  class="star-rating-icon ci-star-filled active"></i><i
                                                  class="star-rating-icon ci-star-filled active"></i><i
                                                  class="star-rating-icon ci-star-filled active"></i><i
                                                  class="star-rating-icon ci-star-filled active"></i><i
                                                  class="star-rating-icon ci-star-filled "></i>
                                          </div>
                                          {{-- <span class="review">{{ count($reviewcount) }}
                                          Review(s)</span> --}}
                                          </a>
                                          @elseif($review->rating == 5) <div class="reviews">
                                              <a
                                                  href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
                                                  <div class="star-rating"><i
                                                          class="star-rating-icon ci-star-filled active"></i><i
                                                          class="star-rating-icon ci-star-filled active"></i><i
                                                          class="star-rating-icon ci-star-filled active"></i><i
                                                          class="star-rating-icon ci-star-filled active"></i><i
                                                          class="star-rating-icon ci-star-filled active"></i>
                                                  </div>
                                                  {{-- <span class="review">{{ count($reviewcount) }}
                                                  Review(s)</span> --}}
                                              </a>
                  </div>

                  @endif


                    </div>
                    
                    <dl>
                        <dt>{{ $review->summary }}</dt>
                        {{-- truncate text --}}
                        <dd>{{ Str::limit($review->comment, 100) }}</dd>
                    </dl>

                    {{-- review image --}}

                    @if($review->image != NULL)
                    <div class="gallery">
                      <a href="{{ asset($review->image) }}" class="gallery-item rounded-3" data-sub-html='<h6 class="fs-sm text-light">{{ $review->summary }}</h6>'>
                        {{-- <img src="{{ asset($item->image) }}" style="width: 50%;height: 50%" alt="Gallery thumbnail"> --}}
                        <!-- Block outline button -->

<button type="button" class="btn btn-secondary d-block w-100">View Image</button>
                      </a>
                    </div>
                    @endif

                    {{-- <img src="{{ asset($item->image) }}" alt="" srcset=""> --}}
                    {{-- <div class="text-nowrap">
                      <button class="btn-like" type="button">15</button>
                      <button class="btn-dislike" type="button">3</button>
                    </div> --}}
                  <!-- End Review-->
                  
                    
                    
                  </div>
                </div>
                <footer class="d-flex justify-content-center pt-4">
                  <div class="d-flex align-items-center"><img class="rounded-circle" src="{{ (!empty($review->user->profile_photo_path)) ? asset($review->user->profile_photo_path):url('upload/no_image.jpg') }}" width="50" alt="User">
                    <div class="ps-3">
                      {{-- date published --}}
                      @php
                        $date_published = $review->created_at;
                      @endphp
                      <h6 class="fs-sm mb-n1">{{ $review->name }}</h6><span class="fs-ms text-muted opacity-75">{{ $date_published }}</span>
                    </div>
                  </div>
                </footer>
              </blockquote>
                @endforeach
              
            </div>
          </div>
        </div>
      </section>