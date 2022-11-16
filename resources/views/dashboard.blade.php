<x-template.guest>
    <x-main.guest.navbar/>


    @if(Auth::user()->role == "seller")
        <x-dashboard.seller/>
    @else
        <x-dashboard.client/>
    @endif
</x-template.guest>