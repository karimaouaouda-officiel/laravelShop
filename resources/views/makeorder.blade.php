<x-template.guest>
    <x-main.guest.navbar />

    <div class="container-fluid p-2">
        <div class="container border rounded">
            <div class="w-100 py-2 text-primary h3 fw-bold text-center">
                new order
            </div>
            <div class="border-t border-gray-100"></div>
            <div class="py-2 w-100 px-0 px-lg-5 border-primary">
                <div class="w-100 fw-light text-primary small">
                    products >>
                </div>
                <div class="body w-100">
                    
                </div>
            </div>

            <div class="w-100 py-2 d-flex flex-wrap justify-content-center align-items-center">
                <button type="button" id="cancelOrder" class="btn btn-danger mx-2">
                    cancel
                </button>
                <button type="button" id="submitOrder" class="btn btn-success mx-2">
                    submit
                </button>
            </div>
        </div>
    </div>

    <script>
        var f = localStorage.getItem('products')
        var j = f.split("|")
        var k = []
        var e = $(".body")[0]
        var template = (obj , i) => `<div class="w-100 py-2 row">
                        <div class="col-1">
                            ${i}
                        </div>
                        <div class="col-6 overflow-hidden">
                            ${obj.name}
                        </div>
                        <div class="col-2">
                            ${obj.price} da
                        </div>
                        <div class="col-3">
                            <button class="remove btn btn-danger" id="${obj.id}">
                                <i class="fas fa-times"></i>
                            </button>
                            <button class="remove btn btn-secondary" id="${obj.id}">
                                <i class="fas fa-eye"></i>
                            </button>
                        </div>
                    </div>`

        j.forEach(json => {
            k.push(JSON.parse(json))
        })

        var j = 0

        k.forEach(v => {
            $(e).append(template(v , ++j))
        })

        $("#cancelOrder").click(function(){
            location.href = "{{route('discover')}}"
        })

        $("#submitOrder").click(function(){
            let data = new FormData
            data.set('user_id' , "{{auth()->user()->id}}")
            data.set('_token' , "{{csrf_token()}}")
            fetch("{{route('newOrder')}}" , {method:"POST" , body : data}).
            then(res => res.json()).
            then(json => {
                if(json.statut === 200){
                    d = new FormData
                    d.set("_token" , "{{csrf_token()}}")
                    d.set('order_id' , json.order_id)
                    for(product of k){
                        d.set('product_id' , `${product.id}`)
                        fetch("{{route('addToOrder')}}" , {method : "POST" , body : d})
                        .then(res => res.json())
                        .then(f=>{
                            console.log(f)
                        })
                    }
                }
            })
        })

    </script>
</x-template.guest>