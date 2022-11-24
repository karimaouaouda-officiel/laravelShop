<div class="w-100">
    <h3 class="text-center h2 text-primary py-3 fw-bold" style="letter-spacing: 1.5px;">
        Your products
    </h3>
</div>

<div class="w-100  px-0 px-sm-2 px-lg-5">
    <div class="form-floating mx-0 mx-lg-5">
        <select class="form-select" id="filter" aria-label="Floating label select example">
            <option value="waiting" selected>all</option>
            <option value="published">sellers</option>
            <option value="published">clients</option>
            <option value="published">admins</option>
        </select>
        <label for="floatingSelect">filter users</label>
    </div>
    <table class="table table-striped table-success my-3">
        <tbody>
            <tr>
                <th>
                    user id
                </th>
                <th>
                    user name
                </th>
                <th>
                    user email
                </th>
                <th>
                    user country
                </th>
                <th>
                    user phone
                </th>
                <th>
                    action
                </th>
            </tr>
            {{-- if there is any user in database --}}
            @if(count($users) > 0)
            {{-- foreach user show his informations as a row in our table --}}
            @foreach($users as $user)
            <tr>
                <td>
                    {{$user->id}}
                </td>
                <td>
                    {{$user->firstname}} {{$user->lastname}} ({{$user->role}})
                </td>
                <td>
                    {{$user->email}}
                </td>
                <td>
                    {{$user->country}}
                </td>
                <td>
                    {{$user->phone_number}}
                </td>
                <td>
                    <button class="btn btn-danger rmproduct" id="${{$user->id}}">
                        <i class="fas fa-times"></i>
                    </button>
                    <button class="btn btn-secondary view-product" data-bs-toggle="modal" data-bs-target="#viewModal" data-product="{{$user->id}}">
                        <i class="fas fa-eye"></i>
                    </button>
                </td>
            </tr>
            @endforeach
            @else
            @endif
        </tbody>
    </table>
</div>