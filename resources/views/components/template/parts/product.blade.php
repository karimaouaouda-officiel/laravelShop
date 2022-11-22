<div class="product-card border p-3 mx-2">
    <div class="inner w-100 h-100 py-2">
        <div class="image-container border position-relative" data-price="300da">
            <img class="w-100 h-100" src="{{asset('./media/hp.png')}}" alt="">
        </div>
        <h3 class="fw-bold h5 py-2 text-primary text-center" id="productName">
            {{$product->name ?? "no name"}}
        </h3>

        <p class="h6 small text-secondary text-center" id="productDescription">
            {{$product->description ?? "no name"}}
        </p>

        <div class="w-100 d-flex align-items-center justify-content-center">
            <button type="button" class="btn small btn-primary my-3 mx-t">
                <i class="fas fa-cart-shopping mx-2"></i>add to cart
            </button>
            <i class="fas fa-heart mx-2 text-secondary" style="font-size: 1.5rem;"></i>
        </div>
    </div>
</div>