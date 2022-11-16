<div class="container-fluid py-2 px-0 position-relative" style="min-height: 90vh;">
    {{-- workspace --}}

    <div class="w-100 py-3 position-absolute" style="height: 100vh;top:0px;left:0px;padding-left:40px">
        <div class="workspace w-100 py-2 bg-light border">

            {{-- get current workspace from the url query --}}

            @switch(request()->get('workspace'))

            @case("add")
                <x-dashboard.seller.workspaces.add-product/>
            @break

            @case("view")
                <x-dashboard.seller.workspaces.view-products/>
            @break


            @default
                <x-dashboard.seller.workspaces.welcome/>


            @endswitch

        </div>
    </div>



    {{-- tools component --}}
    <x-dashboard.seller.tools />
</div>