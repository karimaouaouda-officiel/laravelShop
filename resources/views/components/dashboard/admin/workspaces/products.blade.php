<div class="w-100">
    <h3 class="text-center h2 text-primary py-3 fw-bold" style="letter-spacing: 1.5px;">
        Your products
    </h3>
</div>

<div class="w-100  px-0 px-sm-2 px-lg-5">
    <div class="form-floating mx-0 mx-lg-5">
        <select class="form-select" id="filter" aria-label="Floating label select example">
            <option value="waiting" selected>waiting</option>
            <option value="published">published</option>
        </select>
        <label for="floatingSelect">which products you want to seeWorks with selects</label>
    </div>
    <table class="table table-striped table-success my-3">
        <tbody>
            <tr>
                <th>
                    product name
                </th>
                <th>
                    price
                </th>
                <th>
                    description
                </th>
                <th>
                    actions
                </th>
            </tr>
        </tbody>
    </table>

    {{-- modal for description --}}
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="descModal" tabindex="-1" aria-labelledby="descModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="desc">
                    <p class="px-0 px-lg-5"></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


    {{-- check modal --}}
    <div class="modal fade" id="checkModal" tabindex="-1" aria-labelledby="descModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="descModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="desc">
                    <form class="w-100" action="{{route('check')}}" method="POST" onsubmit="false" id="checkForm">
                        @csrf
                        <input type="hidden" name="product_id" id="productId">
                        <div class="form-floating my-3">
                            <input type="number" name="new_price" class="form-control rounded" id="price" placeholder="new price">
                            <label for="pass"> <i class="fas fa-usd"></i> new price </label>
                        </div>
                        <div class="py-2 d-flex w-100 justify-content-center">
                            <button id="publichBtn" type="button" class="btn btn-primary">
                                publish
                            </button>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    {{-- end modal  --}}

    <div class="modal fade" id="viewModal" tabindex="-1" aria-labelledby="viewModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="viewModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex justify-content-center flex-column align-items-center" id="view">

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>


</div>

<script>
    $(function() {

        var tr = (product) => {
            return `<tr>
                <td>
                    ${product.name}
                </td>
                <td>
                    ${product.price} DA
                </td>
                <td>
                    <button class="btn btn-primary showDescription" data-bs-toggle="modal" data-bs-target="#descModal" data-desc="${product.description}">
                        description
                    </button>
                </td>
                <td>
                    <button class="btn btn-danger rmproduct" id="${product.id}">
                        <i class="fas fa-times"></i>
                    </button>
                    <button class="btn btn-success publich" data-bs-toggle="modal" data-bs-target="#checkModal" id="${product.id}">
                        ${product.statut == "waiting" ? '<i class="fas fa-check"></i>' : '<i class="fas fa-pen"></i>'}
                    </button>
                    <button class="btn btn-secondary view-product" data-bs-toggle="modal" data-bs-target="#viewModal" data-product="${product.id}">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>`
        }


        $('#descModal').on('show.bs.modal', function(e) {
            let text = e.relatedTarget.dataset.desc
            $('#descModal #desc p').text(text)
        })

        function laodTable(products = [], not) {
            products.forEach(product => {
                if ((product.statut == not)) {
                    $('table tbody').append(tr(product))
                }
            });

            $('.rmproduct').click(function() {
                let id = $(this).attr('id')

                let data = new FormData
                data.set("id", id);
                data.set("_token", "{{csrf_token()}}")

                fetch("{{route('remove')}}", {
                        method: "POST",
                        body: data
                    }).then(response => response.json())
                    .then(json => {
                        alert('succes')
                        localStorage.setItem('products', json)
                        $(this).parent().parent().remove()
                    })
            })
        }
        $(document).ready(function() {
            let fdata = new FormData
            fdata.set('_token', "{{csrf_token()}}")
            fetch(`{{route("getProducts" , ['_token'=> csrf_token()])}}`, {
                    method: "GET",
                }).then(res => res.json())
                .then(function(json) {
                    localStorage.setItem('products', JSON.stringify(json))
                    laodTable(json, "waiting")
                })
        })

        $('#filter').on('change', function() {
            $('table tbody').html(`<tr>
                <th>
                    product name
                </th>
                <th>
                    price
                </th>
                <th>
                    description
                </th>
                <th>
                    actions
                </th>
            </tr>`);
            laodTable(JSON.parse(localStorage.getItem('products')), $(this).val())
        })
        $('#viewModal').on('show.bs.modal', function(e) {
            let id = e.relatedTarget.dataset.product
            let json = JSON.parse(localStorage.getItem('products'))
            let p;
            for (let product of json) {
                if (product.id == id) {
                    p = product
                }
            }

            $("#viewModal .modal-body").html(`
                <h4 class="text-primary fw-bold py-3 px-2">product : </h4>
                <x-template.parts.product/>
                <h4 class="text-primary fw-bold py-3 px-2">product seller : </h4>
                <x-template.parts.user-card/>
            `)
            $("#viewModal #productName").text(p.name);
            $("#viewModal #productDescription").text(p.description);
            console.log(p)
            $("#viewModal .user-card #userName").text(`${p.user.firstname} ${p.user.lastname}`);
            $("#viewModal .user-card #userRole").text(p.user.role);
            $("#viewModal .user-card #userPhone").text(p.user.phone_number == "-1" ? "no number" : p.user.phone_number);
            $("#viewModal .user-card #userEmail").text(p.user.email);
            $("#viewModal .user-card #userCountry").text(p.user.country == "" ? "no country" : p.user.country);
            $("#viewModal .user-card #userValidity").text("perfect");
            $("#viewModal .user-card #chatBtn").attr('href', `{{route('getProducts')}}/?user=${p.user.id}`);
        })

        $("#checkModal").on('show.bs.modal', function(e) {
            let id = e.relatedTarget.id;

            $("#productId").val(id);
        })

        $("#publichBtn").click(function() {
            let formdata = new FormData(document.querySelector("#checkForm"))
            fetch("{{route('check')}}", {
                    method: "POST",
                    body: formdata
                }).then(res => res.json())
                .then(json => {
                    alert(json.message);
                    products = localStorage.getItem('products')
                    products = JSON.parse(products)

                    for (let product of products) {
                        if ("" + product.id == $("#productId").val()) {
                            product.statut = "published";
                            product.price = $("input[name=new_price]").val()
                            break;
                        }
                    }
                    $("table tbody").html(`<tr>
                <th>
                    product name
                </th>
                <th>
                    price
                </th>
                <th>
                    description
                </th>
                <th>
                    actions
                </th>
            </tr>`)
                    laodTable(products, $("#filter").val());
                    document.querySelector("#checkForm").reset()
                })
        })

    })
</script>


<!--
<table class="table table-striped table-success">
        <tbody>
            <tr>
                <th>
                    product name
                </th>
                <th>
                    price
                </th>
                <th>
                    description
                </th>
                <th>
                    statut
                </th>
                <th>
                    actions
                </th>
            </tr>
            @php
                $products = DB::table('products')->get();
            @endphp
            @foreach($products as $product)
            <tr>
                <td>
                    {{ $product->name }}
                </td>
                <td>
                    {{ $product->price }} DA
                </td>
                <td>
                    <button class="btn btn-primary" data-desc="{{ $product->description }}">
                        description
                    </button>
                </td>
                <td class="{{$product->statut == 'waiting' ? 'text-danger' : 'text-success'}} fw-bold" >
                    {{ $product->statut }}
                </td>
                <td>
                    <button class="btn btn-danger rmproduct" id="{{$product->id}}">
                        <i class="fas fa-times"></i>
                    </button>
                    <button class="btn btn-secondary" id="2" disabled="{{$product->statut == 'waiting' ? 1: 0}}}}">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

-->