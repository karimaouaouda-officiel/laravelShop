{{-- tool header --}}
<div class="w-100 text-center">
    <h3 class="text-success h2 fw-bold py-2">
        Add new product
    </h3>
</div>


<div class="w-100 px-1 px-md-2 px-lg-5 m-0">
    @if($errors->any())
        <div class="w-100 px-2 px-md-4 px-lg-5 rounded bg-danger px-2 py-2">
            <ol class="px-0 px-md-2 px-lg-5">
                @foreach($errors->all() as $error)
                    <li class="text-light text-center">
                        {{$error}}
                    </li>
                @endforeach
            </ol>
        </div>
    @endif
    <form action="{{route('add')}}" method="POST" class="w-100 form-floating px-1 px-md-5 m-0" enctype="multipart/form-data">
        @csrf
        <div class="input-group px-0 px-lg-5  my-3 mx-0 mx-md-2 mx-lg-5">
            <span class="input-group-text" id="basic-addon1">product name</span>
            <input type="text" name="name" class="form-control" id="pname" placeholder="product name" aria-label="Username" aria-describedby="basic-addon1">
        </div>

        <div class="form-floating  ps-0 ps-lg-5 my-3 ms-0 ms-lg-5">
            <textarea class="form-control" name="description" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"></textarea>
            <label for="floatingTextarea2" class="ms-0 ms-lg-5">product description</label>
        </div>

        <div class="input-group px-0 px-lg-5  my-3 mx-0 mx-md-2 mx-lg-5">
            <span class="input-group-text"  id="basic-addon1">price (DA)</span>
            <input type="number" name="price" id="price" class="form-control" id="pname" placeholder="product price" aria-label="Username" aria-describedby="basic-addon1">
        </div>


        <div class="w-100 my-4 py-2  row">
            <div class="col-md-6 justify-content-center d-flex">
                <x-template.parts.file-btn text="product's picture"/>
                <input type="file" name="pic" class="d-none">
            </div>
            <div class="col-md-6 justify-content-center d-flex">
                <input type="submit" class="btn btn-primary" value="add product">
            </div>
        </div>

    </form>
</div>