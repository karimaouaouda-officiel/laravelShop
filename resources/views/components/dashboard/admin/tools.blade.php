<div class="tools position-sticky border bg-light">
    <div class="w-100 text-light d-grid" style="grid-template-columns: 35px auto;">
        <i class="fas fa-tools text-center w-100" style="height:35px;line-height:35px"></i>
        <div class="h-100 bg-light text-center text-primary h4" style="letter-spacing: 1.5px;line-height:35px;height:35px">
            Tools
        </div>
    </div>
    <ul class="flex-column my-2 p-0">
        <li class="w-100 py-2 bg-warnin">
            <a class="w-100 h-100 d-grid" style="grid-template-columns: 35px auto;" href="{{route('dashboard',['workspace'=>'view'])}}">
                <i class="fas fa-eye text-center w-100" style="height:35px;line-height:35px"></i>
                <span class="d-block w-100 h-100 fw-bold px-2" style="line-height:35px">
                    view products
                </span>
            </a>
        </li>
        <li class="w-100 py-2 bg-warnin">
            <a class="w-100 h-100 d-grid" style="grid-template-columns: 35px auto;" href="{{route('dashboard',['workspace'=>'view'])}}">
                <i class="fas fa-eye text-center w-100" style="height:35px;line-height:35px"></i>
                <span class="d-block w-100 h-100 fw-bold px-2" style="line-height:35px">
                    view products
                </span>
            </a>
        </li>
        <li class="w-100 py-2 bg-warnin">
            <a class="w-100 h-100 d-grid" style="grid-template-columns: 35px auto;" href="{{route('dashboard',['workspace'=>'add'])}}">
                <i class="fas fa-chart-simple text-center w-100" style="height:35px;line-height:35px"></i>
                <span class="d-block w-100 h-100 fw-bold px-2" style="line-height:35px">
                    satistiques
                </span>
            </a>
        </li>
        <li class="w-100 py-2 bg-warnin">
            <a class="w-100 h-100 d-grid" style="grid-template-columns: 35px auto;" href="{{route('dashboard',['workspace'=>'add'])}}">
                <i class="fas fa-plus text-center w-100" style="height:35px;line-height:35px"></i>
                <span class="d-block w-100 h-100 fw-bold px-2" style="line-height:35px">
                    Add Product
                </span>
            </a>
        </li>
    </ul>

    <button class="btn btn-light border tools-toggler">
        <i class="fas fa-arrow-right "></i>
    </button>
</div>


<script>
    $(function(){
        $('.tools-toggler').click(function(){
            $('.tools').toggleClass("shown")
        })
    })
</script>