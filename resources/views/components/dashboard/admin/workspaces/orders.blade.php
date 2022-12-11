<div class="w-100">
    <h3 class="text-center h2 text-primary py-3 fw-bold" style="letter-spacing: 1.5px;">
        orders
    </h3>
</div>


<div class="w-100  px-0 px-sm-2 px-lg-5">
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


            @foreach($orders as $order)
            <tr>
                <td>
                    {{$order->user->full_name}}
                </td>
                <td>
                    ${$order->date_of_order} DA
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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>