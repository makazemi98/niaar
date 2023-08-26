<form action="{{ route('inquiries.store') }}" enctype="multipart/form-data"
    class="form mb-15 fv-plugins-bootstrap5 fv-plugins-framework" method="post" id="kt_careers_form">
    @csrf
    <!--begin::Input group-->
    @include('partials.errors')
    
    <div class="row mb-5">
        <!--begin::Col-->
        <div class="col-md-4 fv-row fv-plugins-icon-container">
            <!--begin::Label-->
            <label class="required fs-5 fw-semibold mb-2">Inquiry Number</label>
            <!--end::Label-->
            <!--begin::Input-->
            <div style="font-size: 20px;font-weight: bold; color: #1f67f0;"> Ni{{ $ni_num }}</div>
            <input type="hidden" class="form-control form-control-solid" placeholder="" name="title"
                value="{{ $ni_num }}">
            <!--end::Input-->
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>

        <div class="col-md-8 fv-row fv-plugins-icon-container">
            <label class="required fs-5 fw-semibold mb-2">Inquiry Title / Ref:</label>
            <input class="form-control form-control-solid" placeholder="" name="title" value="{{ old('title') }}">
            <div class="fv-plugins-message-container invalid-feedback"></div>
        </div>
    </div>

    <div class="d-flex flex-column mb-8">
        <label class="fs-6 fw-semibold mb-2">Description Qty Brand</label>
        <textarea class="form-control form-control-solid" rows="4" name="description" placeholder="">{{old("description")}}</textarea>
    </div>


    <div class="d-flex flex-wrap flex-stack mb-6">
        <h3 class="fw-bold my-2">Inquiry Docs</h3>
        <div class="d-flex my-2">
            <label for="uplode-file-add-inquiries" class="btn btn-primary btn-sm">
                Upload
            </label>
            <input type="file" style="display:none" id="uplode-file-add-inquiries" accept=" .pdf ">
        </div>
    </div>

    <div id="inputs-container">

    </div>



    <div id="docs_pdf" class="row g-6 g-xl-9 mb-6 mb-xl-9 form-size" style="margin-bottom: 0"></div>



    <div class="d-flex flex-column mb-8">
        <label class="fs-6 fw-semibold mb-2">Remarks</label>
        <textarea class="form-control form-control-solid" rows="4" name="remark" placeholder="">{{old("remark")}}</textarea>
    </div>

    <div class="separator mb-8"></div>
    <button type="submit" class="btn btn-primary" id="kt_careers_submit_button">
        <span class="indicator-label">Submit</span>
        <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
    <button type="submit" class="btn btn-light me-3" id="kt_careers_submit_button">
        <span class="indicator-label ">Cancel</span>
        <span class="indicator-progress">Please wait...
            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
    </button>
</form>


@section('script')
    <script defer>
        const fileAddInquiries = document.getElementById('uplode-file-add-inquiries');
        const fileContainerInputs = document.getElementById('inputs-container');
        const docsPdfContainer = document.getElementById('docs_pdf');

        const files = [];
        fileAddInquiries.addEventListener('change', (e) => {

            if (e.target.files[0]) {
                const count = fileContainerInputs.childElementCount;

                files.push(e.target.files[0])

                let fileName = e.target.files[0].name
                let file = e.target.files[0];
                let container = new DataTransfer();
                const containerInput = document.createElement("input");
                const containerInputPdf = document.createElement("div");
                containerInputPdf.setAttribute("class", `col-md-6 col-lg-4 col-xl-3`);
                containerInputPdf.setAttribute("id", `docs_inputs_${count}`);
                containerInputPdf.innerHTML = `
            <div class="card h-100">
                <div class="card-body d-flex justify-content-center text-center flex-column p-8">
                    <div class="text-gray-800 text-hover-primary d-flex flex-column">
                        <div class="symbol symbol-60px mb-5">
                            <img src="{{ asset('assets/media/svg/files/pdf.svg') }}" class="theme-light-show"
                                alt="">
                        </div>
                        <div class="fs-5 fw-bold mb-2">${fileName}</div>
                    </div>
                </div>
                `;
                containerInput.setAttribute("id", `docs_inputs_${count}`);
                containerInput.setAttribute("type", `file`);
                containerInput.setAttribute("name", `docs[]`);
                containerInput.setAttribute("class", `d-none`);
                container.items.add(file);
                containerInput.files = container.files;
                // containerInput.innerHTML = `<input value="${fileName}" type="file" name="docs[${count}]" accept=" .pdf ">`;
                fileContainerInputs.appendChild(containerInput);
                docsPdfContainer.appendChild(containerInputPdf);

            }


            // console.log(files);
            // <input type="file" style="display:none" id="uplode-file-add-inquiries" accept=" .pdf ">

        })
    </script>
@endsection
