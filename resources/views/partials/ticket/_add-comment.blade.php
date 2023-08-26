@unless ($inquiry->isCanceled())
<div class="card mb-5 mb-xxl-8">
    <div class="card-body pb-0">
        <div class="d-flex align-items-center">
            <div class="d-flex align-items-center flex-grow-1">
                <div class="symbol symbol-45px me-5">
                    <img src="{{ asset(auth()->user()->avatar ?? 'assets/media/avatars/300-1.jpg') }}" alt="">
                </div>
                <div class="d-flex flex-column">
                    <div class="text-gray-900 text-hover-primary fs-6 fw-bold">{{ $fullname }}</div>
                    <span class="text-gray-400 fw-bold">{{ $rule }}</span>
                </div>
            </div>
        </div>

        <form id="form" action="{{ route('inquiries.add.comment', [$inquiry->id]) }}"
            class="ql-quil ql-quil-plain pb-3" method="POST">
            @csrf
            <div class="separator mt-4"></div>

            <div id="editor" class="py-6 ql-container ql-snow">
                <textarea name="body" id="body" cols="30" rows="5" style="width: 100%; border: none; outline: none;">{{ old('body') }}</textarea>
            </div>
            <!--end::Editor-->
            <div class="separator mb-4"></div>
            <!--begin::Toolbar-->
            <div class="w-100 d-flex justify-content-end"><button class="btn btn-primary">Submit</button></div>

            <!--end::Toolbar-->
        </form>
        <!--end::Form-->
    </div>
    <!--end::Body-->
</div>
@endunless

<!--end::Feeds Widget 1-->
