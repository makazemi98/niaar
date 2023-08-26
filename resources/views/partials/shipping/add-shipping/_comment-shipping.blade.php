<div id="kt_app_content">
    <!--begin::Content container-->
    <div id="kt_app_content_container">
        <div class="card card-flush py-4">

            <div class="card-footer my-8">
                @if ($shipping->comments)
                    @foreach ($shipping->comments as $comment)
                        <div class="d-flex mb-5">
                            <div class="symbol symbol-45px me-5">
                                <img src="{{ asset($comment->creator->avatar ?? 'assets/media/avatars/300-1.jpg') }}" alt="">
                            </div>
                            <div class="d-flex flex-column flex-row-fluid">
                                <div class="d-flex align-items-center flex-wrap mb-1">
                                    <a href="#"
                                        class="text-gray-800 text-hover-primary fw-bold me-2">{{ $comment->creator->full_name }}</a>
                                    <span class="text-gray-400 fw-semibold fs-7">{{ $comment->created_at}}</span>
                                </div>
                                <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $comment->body }}</span>
                            </div>
                        </div>
                    @endforeach
                @endif

            </div>

            <div class="card-body">
                <!--begin::Input group-->
                <div class="card mb-5 mb-xxl-8">
                    <div class="card-body pb-0">
                        <div class="d-flex align-items-center">
                            <div class="d-flex align-items-center flex-grow-1">
                                <div class="symbol symbol-45px me-5">
                                    <img src='{{ asset(auth()->user()->avatar ?? 'assets/media/avatars/300-1.jpg') }}' alt="">
                                </div>
                                <div class="d-flex flex-column">
                                    <div class="text-gray-900 text-hover-primary fs-6 fw-bold">
                                        {{ auth()->user()->full_name }}</div>
                                    {{-- <span class="text-gray-400 fw-bold">role</span> --}}
                                </div>
                            </div>

                        </div>
                        <form id="form"
                            action="{{ route('shipping.add.comment', [isset($shipping) ? $shipping->id : '']) }}"
                            class="ql-quil ql-quil-plain pb-3" method="POST">
                            @csrf
                            <div class="separator mt-4"></div>

                            <div id="editor" class="py-6 ql-container ql-snow">
                                <textarea name="body" id="body" cols="30" rows="5" style="width: 100%; border: none; outline: none;">{{ old('body') }}</textarea>
                            </div>
                            <!--end::Editor-->
                            <div class="separator mb-4"></div>
                            <!--begin::Toolbar-->
                            <div class="w-100 d-flex justify-content-end"><button
                                    class="btn btn-primary">Submit</button></div>

                            <!--end::Toolbar-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Body-->
                </div>
                <!--end::Input group-->
            </div>
        </div>
    </div>
</div>
