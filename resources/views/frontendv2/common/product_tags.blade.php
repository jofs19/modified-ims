<head>

    <style>
    
      .tagfield{
        visibility: hidden;
      }
    
      .tagfield > *{
        visibility: visible;
        transition: opacity 200ms;
      }
    
      .tagfield:hover > :not(:hover){
        opacity: 0.5;
      }
    
    </style>
    
    </head>



                          {{-- Tag Cloud --}}
                @php
                $tags_en = App\Models\Product::groupBy('product_tags_en')->select('product_tags_en')->get();
                $tags_fil = App\Models\Product::groupBy('product_tags_fil')->select('product_tags_fil')->get();
                @endphp   
                    <div class="widget">

                        <h3 class="widget-title">Product Tags</h3>

                    <div class=" tagfield">

                        @if(session()->get('language') == 'filipino') 

                        @foreach($tags_fil as $tag)
                        <a href="{{ url('product/tag/'.$tag->product_tags_fil) }}" class="btn-tag me-2 mb-2">
                            #{{ str_replace(',',' ',$tag->product_tags_fil)  }} </a> 
                        @endforeach

                        @else 

                        @foreach($tags_en as $tag)
                        <a href="{{ url('product/tag/'.$tag->product_tags_en) }}" class="btn-tag me-2 mb-2">
                            #{{ str_replace(',',' ',$tag->product_tags_en)  }} </a> 
                        @endforeach

                        @endif
                        
                    </div>

                        
                    </div>

                    {{-- End Tag cloud --}}