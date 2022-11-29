<x-template.guest>
    <x-main.landing.header />
    <section class="w-100 p-2 ">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <x-template.parts.feautures title="Browse our site, transact commercially and buy safely" src="{{asset('./media/security.svg')}}">
                    We take the safety of our customers very seriously and have taken all precautions to give you complete peace of mind
                </x-template.parts.feautures>
            </div>
            <div class="col-md-6 col-lg-4">
                <x-template.parts.feautures title="Enjoy the difference in products and diversity" src="{{asset('./media/many.svg')}}">
                    many product from many categories, chose what you love and make it in your home with one click
                </x-template.parts.feautures>
            </div>
            <div class="col-md-6 col-lg-4">
                <x-template.parts.feautures title="Interact with products by commenting, liking and more" src="{{asset('./media/react.svg')}}">
                    react , save , rate , comment and discuss with other custommers all in one place
                </x-template.parts.feautures>
            </div>
        </div>
    </section>
    <section class="w-100 px-2 px-lg-4 py-2">
        <div class="w-100 border overflow-hidden">
            <div class="w-100 some-products position-relative d-flex justify-content-center align-items-center" style="height: max-content;">
                <h4 class="border-2 bg-light py-0 border-primary px-3 text-center text-primary">
                    some products
                </h4>
            </div>
            <div class="products py-2 px-1 px-md-2 px-lg-3 position-relative">
                <div class="inner w-100 d-flex justify-content-start align-items-center" style="flex:1;white-space:nowrap;flex-wrap:nowrap">
                    <x-template.parts.product/>
                    <x-template.parts.product/>
                    <x-template.parts.product/>
                    <x-template.parts.product/>
                </div>
                <a href="#" class="position-absolute btn btn-light border-2 border-secondary text-primary" style="height: 2.5rem;border-radius:2.5rem;right:0px;top:calc(50% - 1.5rem)">
                    more >>
                </a>
            </div>
        </div>
    </section>
</x-template.guest>