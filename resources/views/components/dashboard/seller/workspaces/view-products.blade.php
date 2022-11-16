<div class="w-100">
    <h3 class="text-center h2 text-primary py-3 fw-bold" style="letter-spacing: 1.5px;">
        Your products
    </h3>
</div>

<div class="w-100 p-2">
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
                $products = auth()->user()->products;
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
</div>

<script>
    $(function(){
        $('.rmproduct').click(function(){
            let id  = $(this).attr('id')

            let data = new FormData
            data.set("id" , id);
            data.set("_token" , "{{csrf_token()}}")

            fetch("{{route('remove')}}" , {
                method : "POST",
                body : data
            }).then(response => response.json())
            .then(json => {
                alert(json.message)

                $(this).parent().parent().remove()
            })
        })
    })
</script>