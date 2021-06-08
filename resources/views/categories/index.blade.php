{{-- the link to main.blade.php to use the header and footer --}}
@extends('layouts.main')

{{-- the name of <title> for index.blade.php --}}

@section ('title', $cat->title )

{{-- custom css -> to fix the bug with appearence--}}
@section('custom_css')
<link rel="stylesheet" type="text/css" href="/styles/product.css">
<link rel="stylesheet" type="text/css" href="/styles/categories.css">
<link rel="stylesheet" type="text/css" href="/styles/product_responsive.css">
@endsection
{{-- the content from index.blade.php --}}
@section('content')
	<!-- Home -->
	<div class="home">
		<div class="home_container">
			<div class="home_background" style="background-image: url('/images/{{$cat->img}}')"></div>
			<div class="home_content_container">
				<div class="container">
					<div class="row">
						<div class="col">
							<div class="home_content">
								<div class="home_title">{{$cat->title}}<span>.</span></div>
                                <div class="home_text"><p>{{$cat->desc}}</p></div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Products -->

	<div class="products">
		<div class="container">
			<div class="row">
				<div class="col">

					<!-- Product Sorting -->
                    <div class="sorting_bar d-flex flex-md-row flex-column align-items-md-center justify-content-md-start">
                        <div class="results">Showing <span>{{$cat->products->count()}}</span> results</div>
                        <div class="sorting_container ml-md-auto">
                            <div class="sorting">
								<p><strong>Sort By:</strong> <select v-model="sortBy">
									<option class="product_sorting_btn" data-order="default">Default</option>
									<option class="product_sorting_btn" data-order="price-low-high">Price: Low-High</option>
									<option class="product_sorting_btn" data-order="price-high-low">Price: High-Low</option>
									<option class="product_sorting_btn" data-order="name-a-z">Name: A-Z</option>
									<option class="product_sorting_btn" data-order="name-z-a">Name: Z-A</option>
								  </select>
								  </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

			<div class="row">
				<div class="col">
					<div class="product_grid">
                        {{-- function products from category.php--}}
						@foreach ($products as $product)
						<!-- Product -->
						@php
						$image='';
						if(count ($product->images) > 0){
							$image = $product->images[0]['img'];
						} else {
							// if no photo available, it will be remplaced by the 'comming soon pic'
							$image = 'soon.png';
						}

						@endphp

                        <div class="product">
                            <div class="product_image"><img src="/images/{{$image}}" alt="{{$product->title}}"></div>
                            <div class="product_extra product_new"><a href="{{route('getCategories', $product->category['alias'] )}}">{{$product->category['title']}}</a></div>
                            <div class="product_content">
                                <div class="product_title"><a href="{{ route('getProduct', [$product->category['alias'],$product->id]) }}">{{$product->title}}</a></div>
                                @if ($product->new_price != null)
                                    <div style="text-decoration: line-through">${{$product->price}}</div>
                                    <div class="product_price">${{$product->new_price}}</div>
                                @else
                                    <div class="product_price">${{$product->price}}</div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    </div>
                    {{--method links to load more products and send the user to the next page--}}
					{{ $products->appends(request()->query())->links('pagination.index')}} 
				</div>
		</div>
	</div>

	<!-- Icon Boxes -->

	<div class="icon_boxes">
		<div class="container">
			<div class="row icon_box_row">

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
						<div class="icon_box_title">Free Shipping Worldwide</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
						<div class="icon_box_title">Free Returns</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

				<!-- Icon Box -->
				<div class="col-lg-4 icon_box_col">
					<div class="icon_box">
						<div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
						<div class="icon_box_title">24h Fast Support</div>
						<div class="icon_box_text">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie.</p>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>

	<!-- Newsletter -->

	<div class="newsletter">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="newsletter_border"></div>
				</div>
			</div>
			<div class="row">
				<div class="col-lg-8 offset-lg-2">
					<div class="newsletter_content text-center">
						<div class="newsletter_title">Subscribe to our newsletter</div>
						<div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed nec molestie eros</p></div>
						<div class="newsletter_form_container">
							<form action="#" id="newsletter_form" class="newsletter_form">
								<input type="email" class="newsletter_input" required="required">
								<button class="newsletter_button trans_200"><span>Subscribe</span></button>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection
{{-- https://api.jquery.com/ --}}
{{-- AJAX Product filter JS--}}
@section('custom_js')
<script>
 $(document).ready(function (){
            $('.product_sorting_btn').click(function () {
            let orderBy = $(this).data('order')
			
		/*
		X-CSRF for protection of the HTTP header for AJAX requests while rendering the HTML,
		then in front end to get the value from that meta tag and send it to backend.
		*/

			$.ajax({
                    url: "{{route('getCategories', $cat->alias)}}",
                    type: "GET",
                    data: {
                        orderBy: orderBy,
						// to solve the problem with wrong behavior while pagination and stay at p.1 
						// and not get the products from very begging if change the search filter
						page: {{isset($_GET['page']) ? $_GET['page'] : 1}},
                          },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					/* 
					to show the results after the application of a filter
					fixed ERR 500 in the productcontroller
					*/ 
					success: (data) => {
						// to get the request position after ? with get parameters 
						let positionParameters = location.pathname.indexOf('?');
                        let url = location.pathname.substring(positionParameters,location.pathname.length);
                        let newURL = url + '?'; // http://127.0.0.1:8001/phones?
                        
						// to show the correct link during the pagination 
						newURL += "&page={{isset($_GET['page']) ? $_GET['page'] : 1}}"+'orderBy=' + orderBy; // http://127.0.0.1:8001/phones?orderBy=name-z-a
                        // to safe and overwritten the new url
						history.pushState({}, '', newURL);
						
						//for the correct JQuery link treatment 
						$('.product_pagination a').each(function(index, value){
                            let link= $(this).attr('href')
                            $(this).attr('href',link+'&orderBy='+orderBy)
                        })

						$('.product_grid').html(data)
                        
					}
				})
            })
        })

</script>

@endsection
