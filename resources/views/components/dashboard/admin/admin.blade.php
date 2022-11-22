<div class="container-fluid py-2 px-0 position-relative" style="min-height: 90vh;">
    {{-- workspace --}}

    <div class="w-100 py-3 position-absolute" style="height: 100vh;top:0px;left:0px;padding-left:40px">
        <div class="workspace w-100 py-2 bg-light border">

            {{-- I will get the target workspace from url --}}
            @switch( request()->get('workspace') )
                @case("view")
                    <x-dashboard.admin.workspaces.products/>
                @break
                @case("users")
                    <x-dashboard.admin.workspaces.users/>
                @break
                @case("satistiques")
                    <x-dashboard.admin.workspaces.satistiques/>
                @break
                @case("users")
                    <x-dashboard.admin.workspaces.users/>
                @break
                @default
                    <x-dashboard.admin.workspaces.welcome/>
                


            @endswitch

        </div>
    </div>



    {{-- tools component --}}
    <x-dashboard.admin.tools />
</div>