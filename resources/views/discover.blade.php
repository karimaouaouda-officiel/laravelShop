<x-template.guest>
    <x-main.guest.navbar />
    <div class="paginate-body py-2 px-1 px-md-2 px-lg-5">
        <h4 class="text-primary">
            all products >>
        </h4>
        <script>
            console.log("{{json_encode($data)}}")
        </script>
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

    




    <script>

    </script>
</x-template.guest>