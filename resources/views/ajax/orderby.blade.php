{{-- view created to generate the code of the filtered products and send html to ajax  --}}
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