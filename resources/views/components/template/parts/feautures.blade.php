<div class="w-100 py-3 px-2" style="height: 100vh;">
    <div class="inner border-primary border-3 rounded h-100">
        <div class="img-container w-100 d-flex justify-content-center align-items-center" style="height:45vh ;">
            <img src="{{$pic}}" class="w-75 h-100" alt="/">
        </div>
        <div class="my-2">
            <h4 class="h4 w-100 text-center text-primary px-2">
                {{$title}}
            </h4>
        </div>
        <div class="py-2 lh-lg my-2 text-center fw-bold text-secondary h6 px-1 px-md-2 px-lg-4" style="letter-spacing: 1.5px;">
            {{$slot}}
        </div>
    </div>
</div>