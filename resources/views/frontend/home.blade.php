@extends('layouts.app')
@section('content')

<!-- Categories Section Begin -->
<!--<div class="ps-banner">
    <div class="rev_slider fullscreenbanner" id="home-banner">
      <ul>
        @foreach($banners as $key => $banner)
        <li class="ps-banner" data-index="rs-{{ $key }}" data-transition="random" data-slotamount="default" data-hideafterloop="0" data-hideslideonmobile="off" data-rotate="0">
            <img class="rev-slidebg" src="{{ url($banner->image) }}" alt="" data-bgposition="center center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="5" data-no-retina>
        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <br>-->
 

    <!-- Featured Section Begin -->
@if(!$products_featured->isEmpty())
<div class="alime-portfolio-area section-padding-80 clearfix ps-section--features-product ps-section masonry-root pt-100 pb-100">
    <div class="container-fluid">
      <div class="ps-section__header mb-50">
       
        <ul class="ps-masonry__filter alime-projects-menu">
          <li class="portfolio-menu text-cente">
            <a href="#" data-filter="*">
                All 
                <!-- <sup>8</sup> -->
            </a>
          </li>
          @foreach($featured_categories as $fcKey => $fc)
          <li>
                <a href="#" data-filter=".{{ preg_replace('/[^A-Za-z0-9\-]/', '', $fc->category_name) }}">
                    {{ $fc->category_name }} 
                    <!-- <sup>1</sup> -->
                </a>
          </li>
          @endforeach
        </ul>
      </div>
<br>
<br>
<br>
<br>
      <div class="ps-section__content pb-50">
        <div class="masonry-wrapper" data-col-md="4" data-col-sm="2" data-col-xs="1" data-gap="30" data-radio="100%">
          <div class="ps-masonry">
            <div class="grid-sizer"></div>
            @foreach($products_featured as $featured)
                
                <div class="grid-item {{ preg_replace('/[^A-Za-z0-9\-]/', '', $featured->category_name) }}">
                  <div class="grid-item__content-wrapper">
                    <div class="ps-shoe mb-30">
                      <div class="ps-shoe__thumbnail">
                        <!-- <div class="ps-badge"><span>New</span></div> -->
                       
                       

                        <img src="{{ (!empty($featured->image)) ? url($featured->image)  : 'images/no-image-available-icon-61.jpg' }}" alt="" >
                        <a class="ps-shoe__overlay" href="{{ route('details', [str_replace('/', '-', $featured->product_name), md5($featured->id)]) }}"></a>
                      </div>
                      
                    </div>
                  </div>
                </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
@endif

@endsection


@section('js')
<script type="text/javascript">
$('.add-to-cart-btn').click( function(e){
    e.preventDefault();
    $('.loading-gif').show();
    var ele = $(this);
    var isAdmin = '{{ Auth::guard("admin")->check() }}';
    var isMerchant = '{{ Auth::guard("merchant")->check() }}';
    var isUser = '{{ Auth::check() }}';

    if(isAdmin){
        auth_check = isAdmin;
    }else if(isMerchant){
        auth_check = isMerchant;
    }else if(isUser){
        auth_check = isUser;
    }else{
        auth_check = "";
    }

    if(auth_check){
        var fd = new FormData();
        fd.append('product_id', ele.data('id'));
        fd.append('quantity', '1');

        $.ajax({
            url: '{{ route("AddToCart") }}',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                // alert(response);
                // return false;
                $('.loading-gif').hide();

                if(response == 'wallet not enough balance'){
                    toastr.error('Wallet Balance Not Enough');
                    return false;
                }

                if(response == 'quantity error'){
                    toastr.error('Please Add Quantity At least 1');
                    return false;
                }

                if(response == 'quantity exceed error'){
                    toastr.error('Product Balance Quantity Not Enough');
                    return false;
                }

                if(response == 'ok'){
                    $.ajax({
                        url: '{{ route("CountCart") }}',
                        type: 'get',
                        success: function(response){
                            $('.cart_count span').html(response[0]);
                            $('.cart_price').html('RM '+parseFloat(response[1]).toFixed(2));
                            
                        }
                    });
                    
                    toastr.success('Items Add To Cart. <a href="{{ route("checkout") }}" class="view-cart-button pull-right"><i class="fa fa-shopping-cart"></i> View Cart</a>');
                }else{
                    toastr.error('Error Please Contact Admin');
                }
            },
        });
    }else{
        window.location.href = "{{ route('login') }}";
    }
});

$('.add-to-wish-btn').click( function(e){
    
    e.preventDefault();
    $('.loading-gif').show();
    var ele = $(this);
    var isAdmin = '{{ Auth::guard("admin")->check() }}';
    var isMerchant = '{{ Auth::guard("merchant")->check() }}';
    var isUser = '{{ Auth::check() }}';

    if(isAdmin){
        auth_check = isAdmin;
    }else if(isMerchant){
        auth_check = isMerchant;
    }else if(isUser){
        auth_check = isUser;
    }else{
        auth_check = "";
    }

    var id = ele.data('id');
    var nameProduct = ele.parent().parent().find('.js-name-b2').html();
    if(auth_check){
        var fd = new FormData();
        fd.append('product_id', id);

        $.ajax({
            url: '{{ route("Favourite") }}',
            type: 'post',
            data: fd,
            contentType: false,
            processData: false,
            success: function(response){
                $('.loading-gif').hide();
                if(response[0] == 1){
                    toastr.success('Added to wish list');
                }else{
                    toastr.success('Removed from wish list');
                }

                $('.wishlist_count').html(response[1]);
            }
        });
    }else{
        window.location.href = "{{ route('login') }}";
    }
});


</script>
<script src="//code.tidio.co/ura8xjzggie6fl8hmcxdupulawmo5u1m.js" async></script>
@endsection