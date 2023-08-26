<x-default-layout>

    <div class="container">
        
        @include('partials.errors')
        <div class="row g-5 g-xl-10 mb-5 mt-5 mb-xl-10 box-container">

            <div class=" card p-5">
                @include('partials/widgets/Doc/_add-team-member')
            </div>
        </div>
    </div>
    <!--end::Row-->
</x-default-layout>
