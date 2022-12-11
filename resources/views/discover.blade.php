<x-template.guest>
    <x-main.guest.navbar />
    <div class="paginate-body py-2 px-1 px-md-2 px-lg-5">
        <h4 class="text-primary">
            all products >>
        </h4>
        <div class="inner w-100 me-2 border">
            <div class="pagination-content d-flex justify-content-around align-items-start flex-wrap">
                @foreach($data as $product)
                    <x-template.parts.product :product="$product"/>
                @endforeach
            </div>
            <div class="pagination-navbar w-100 d-flex justify-content-center py-2">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="{{$data->previousPageUrl() ?? '#'}}" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                        </li>
                        @foreach($data->getUrlRange(1 , $data->lastPage()) as $index=>$url)
                            <li class="page-item"><a class="page-link" href="{{$url}}">{{$index}}</a></li>
                        @endforeach
                        <li class="page-item">
                            <a class="page-link" href="{{$data->nextPageUrl() ?? '#'}}" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>

    <div data-bs-toggle="modal" data-bs-target="#cartModal" class="cart-toggeler position-fixed bg-light rounded-circle border d-flex justify-content-center align-items-center" data-bs-target="#cartModal" data-bs-toggle="modal">
        <div id="cartCount" class="count bg-danger small text-light fw-bold position-absolute px-1  rounded-circle" count="0"></div>
        <i class="fas fa-cart-shopping"></i>
    </div>

    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="cartModalLabel">cart content</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="cartBody">
                    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <a class="btn btn-primary" href="{{route('makeorder')}}">done</a>
                </div>
            </div>
        </div>
    </div>


    <script src="{{asset('./js/modules/cart.mjs')}}" type="module"></script>
    <script src="{{asset('./js/cart.js')}}" type="module"></script>
</x-template.guest>