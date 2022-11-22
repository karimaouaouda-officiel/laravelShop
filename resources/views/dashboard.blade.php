<x-template.guest>
    <x-main.guest.navbar/>


    {{ Auth::user()->role }}

    @switch(Auth::user()->role)
    @case("seller")
        <x-dashboard.seller/>
    @break

    @case("admin")
        <x-dashboard.admin.admin/>
    @break

    @default
        <x-dashboard.client/>
    @break
    @endswitch
</x-template.guest>