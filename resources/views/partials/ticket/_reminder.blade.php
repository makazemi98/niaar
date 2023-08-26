@unless ($inquiry->isCanceled())

    @can('tab:inquiry_reminder')
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container">
                <!--begin::Card-->
                <div class="card card-flush">

                    <!--begin::Card header-->
                    <div class="card-header pt-8">
                        <div class="card-title">
                            <!--begin::Search-->
                            {{-- <div class="d-flex align-items-center position-relative my-1">
                        <i class="ki-duotone ki-magnifier fs-1 position-absolute ms-6">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                        <input type="text" data-kt-filemanager-table-filter="search"
                            class="form-control form-control-solid w-250px ps-15"
                            placeholder="Search Files &amp; Folders">
                    </div> --}}
                            <!--end::Search-->
                        </div>
                        <!--begin::Card toolbar-->
                        <div class="card-toolbar">
                            <!--begin::Toolbar-->
                            <div class="d-flex justify-content-end" data-kt-filemanager-table-toolbar="base">
                                <!--begin::Back to folders-->
                                {{-- <a href="../../demo1/dist/apps/file-manager/folders.html"
                            class="btn btn-icon btn-light-primary me-3">
                            <i class="ki-duotone ki-exit-up fs-2">
                                <span class="path1"></span>
                                <span class="path2"></span>
                            </i>
                        </a> --}}

                                {{-- @can(str_contains($url, 'docs') ? 'action:inquiry_docs_upload' : 'action:inquiry_confidential_upload')
                                <button type="button" class="btn btn-flex btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#kt_modal_upload">
                                    <i class="ki-duotone ki-folder-up fs-2">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>Upload Files</button>
                            @endcan --}}

                                <!--end::Add customer-->
                            </div>
                            <!--end::Toolbar-->
                            <!--begin::Group actions-->
                            <div class="d-flex justify-content-end align-items-center d-none"
                                data-kt-filemanager-table-toolbar="selected">
                                <div class="fw-bold me-5">
                                    <span class="me-2" data-kt-filemanager-table-select="selected_count">10</span>Selected
                                </div>
                                <button type="button" class="btn btn-danger"
                                    data-kt-filemanager-table-select="delete_selected">Delete Selected</button>
                            </div>
                            <!--end::Group actions-->
                        </div>
                        <!--end::Card toolbar-->
                    </div>

                    <!--end::Card header-->
                    <!--begin::Card body-->
                    <div class="card-body">
                        <!--begin::Table header-->
                        @include('partials.errors')

                        <div class="d-flex flex-stack">
                            <!--begin::Folder Stats-->
                            <div class="badge badge-lg badge-primary">
                                <span id="kt_file_manager_items_counter">{{ count($reminders) }} items</span>
                            </div>
                            <!--end::Folder Stats-->
                        </div>
                        <!--end::Table header-->
                        <!--begin::Table-->
                        <div id="kt_file_manager_list_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                            <div class="table-responsive">
                                <table id="kt_file_manager_list" data-kt-filemanager-table="files"
                                    class="table align-middle table-row-dashed fs-6 gy-5 dataTable no-footer">
                                    <thead>
                                        <tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
                                            <th class="w-10px pe-2 sorting_disabled" rowspan="1" colspan="1"
                                                style="width: 29.8906px;">
                                                <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
                                                    <input class="form-check-input" type="checkbox" data-kt-check="true"
                                                        data-kt-check-target="#kt_file_manager_list .form-check-input"
                                                        value="1">
                                                </div>
                                            </th>
                                            <th class="min-w-150px sorting_disabled" rowspan="1" colspan="1">Title</th>
                                            <th class="min-w-20px sorting_disabled" rowspan="1" colspan="1">Details</th>
                                            <th class="min-w-20px sorting_disabled" rowspan="1" colspan="1">Date</th>
                                            <th class="w-125px sorting_disabled text-center" rowspan="1" colspan="1"
                                                style="width: 125px;">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="fw-semibold text-gray-600">
                                        @foreach ($reminders as $reminder)
                                            <tr class="odd">
                                                <td>
                                                    <div class="form-check form-check-sm form-check-custom form-check-solid">
                                                        <input class="form-check-input" type="checkbox" value="1">
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-hover-primary">{{ $reminder->title }}</div>
                                                    </div>
                                                </td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <div class="text-gray-s text-hover-primary">{{ $reminder->body }}</div>
                                                    </div>
                                                </td>
                                                <td>{{ $reminder->reminder_date ?? '-' }}</td>
                                                <td class="text-end" data-kt-filemanager-table="action_dropdown">
                                                    <div class="d-flex justify-content-end">

                                                        <div class="ms-2">
                                                            <button type="button"
                                                                class="btn btn-sm btn-icon btn-light btn-active-light-primary"
                                                                data-kt-menu-trigger="click"
                                                                data-kt-menu-placement="bottom-end">
                                                                <i class="ki-duotone ki-dots-square fs-5 m-0">
                                                                    <span class="path1"></span>
                                                                    <span class="path2"></span>
                                                                    <span class="path3"></span>
                                                                    <span class="path4"></span>
                                                                </i>
                                                            </button>
                                                            <!--begin::Menu-->
                                                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-150px py-4"
                                                                data-kt-menu="true" style="">
                                                                <!--begin::Menu item-->
                                                                @can(str_contains($url, 'docs') ? 'action:inquiry_docs_download'
                                                                    : 'action:inquiry_confidential_download')
                                                                    <div class="menu-item px-3">
                                                                        <form
                                                                            action="{{ route('inquiries.reminder.delete', $reminder->id) }}"
                                                                            method="POST">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button
                                                                                class="w-100 px-3 btn btn-danger">Delete</button>
                                                                        </form>

                                                                    </div>
                                                                @endcan


                                                                <!--end::Menu item-->
                                                            </div>
                                                            <!--end::Menu-->
                                                        </div>
                                                        <!--end::More-->
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            {{-- <div class="row">
                        <div
                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
                        </div>
                        <div
                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                            <div class="dataTables_paginate paging_simple_numbers" id="kt_file_manager_list_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled"
                                        id="kt_file_manager_list_previous"><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="0" tabindex="0"
                                            class="page-link"><i class="previous"></i></a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="2" tabindex="0"
                                            class="page-link">2</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="3" tabindex="0"
                                            class="page-link">3</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="4" tabindex="0"
                                            class="page-link">4</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="5" tabindex="0"
                                            class="page-link">5</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="6" tabindex="0"
                                            class="page-link">6</a></li>
                                    <li class="paginate_button page-item "><a href="#"
                                            aria-controls="kt_file_manager_list" data-dt-idx="7" tabindex="0"
                                            class="page-link">7</a></li>
                                    <li class="paginate_button page-item next" id="kt_file_manager_list_next"><a
                                            href="#" aria-controls="kt_file_manager_list" data-dt-idx="8"
                                            tabindex="0" class="page-link"><i class="next"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                        </div>
                    </div>
                </div>

                <div class="modal fade" id="kt_modal_upload" tabindex="-1" style="display: nonse;" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered mw-650px">
                        <div class="modal-content">

                            <div class="modal-header">
                                <h2 class="fw-bold">Upload files</h2>
                                <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                    <i class="ki-duotone ki-cross fs-1">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </div>
                            </div>

                            <div class="modal-body pt-10 pb-15 px-lg-17">
                                <form class="form" action="{{ route('inquiries.upload.files', $inquiry->id) }}"
                                    enctype="multipart/form-data" id="kt_modal_upload_form" method="POST">
                                    @csrf
                                    <input type="hidden" name="type"
                                        value="{{ str_contains($url, 'docs') ? 'docs' : 'confidential' }}">

                                    <div class="form-group">
                                        <div class="dropzone dropzone-queue mb-2" id="kt_modal_upload_dropzone">
                                            <div class="dropzone-panel mb-4">
                                                <div class="d-flex my-2">
                                                    <input type="file" style="display:none" id="uploads-file-inquiries"
                                                        accept=" .pdf ">
                                                    <label for="uploads-file-inquiries" class="btn btn-primary btn-sm">
                                                        Attach files
                                                    </label>
                                                </div>

                                            </div>
                                            <div class="dropzone-items wm-200px"></div>
                                            {{-- <div class="dz-default dz-message"><button class="dz-button" type="button">Drop
                                            files here to upload</button></div> --}}
                                            <span class="form-text fs-6 text-muted">Max file size is 1MB per file.</span>

                                        </div>

                                        <div id="inputs-containers"></div>

                                        <div id="docs_upload_pdf" class="row g-6 g-xl-9 mb-6 mb-xl-9 form-size"
                                            style="margin-bottom: 0"></div>
                                    </div>
                                    <div class="w-100 btn-group">
                                        <button class="btn btn-light-primary">Upload</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>

                {{-- <div class="modal fade" id="kt_modal_move_to_folder" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered mw-650px">
                <div class="modal-content">
                    <form class="form fv-plugins-bootstrap5 fv-plugins-framework" action="#"
                        id="kt_modal_move_to_folder_form">
                        <div class="modal-header">
                            <h2 class="fw-bold">Move to folder</h2>
    
                            <div class="btn btn-icon btn-sm btn-active-icon-primary" data-bs-dismiss="modal">
                                <i class="ki-duotone ki-cross fs-1">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </div>
                        </div>

                        <div class="modal-body pt-10 pb-15 px-lg-17">
                            <div class="form-group fv-row fv-plugins-icon-container">
                                <div class="d-flex">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="0" id="kt_modal_move_to_folder_0">
                                        <label class="form-check-label" for="kt_modal_move_to_folder_0">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>account
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="1" id="kt_modal_move_to_folder_1">
                                        <label class="form-check-label" for="kt_modal_move_to_folder_1">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>apps
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="2" id="kt_modal_move_to_folder_2">
                                        <label class="form-check-label" for="kt_modal_move_to_folder_2">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>widgets
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="3" id="kt_modal_move_to_folder_3">
                                        <label class="form-check-label" for="kt_modal_move_to_folder_3">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>assets
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="4" id="kt_modal_move_to_folder_4">
                                        <label class="form-check-label" for="kt_modal_move_to_folder_4">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>documentation
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div class="separator separator-dashed my-5"></div>
                                <div class="d-flex">
                                    <div class="form-check form-check-custom form-check-solid">
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="5" id="kt_modal_move_to_folder_5">
                                        <label class="form-check-label" for="kt_modal_move_to_folder_5">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>layouts
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="6" id="kt_modal_move_to_folder_6">
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_6">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>modals
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="7" id="kt_modal_move_to_folder_7">
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_7">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>authentication
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="8" id="kt_modal_move_to_folder_8">
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_8">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>dashboards
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                                <div class="separator separator-dashed my-5"></div>
                                <!--begin::Item-->
                                <div class="d-flex">
                                    <!--begin::Checkbox-->
                                    <div class="form-check form-check-custom form-check-solid">
                                        <!--begin::Input-->
                                        <input class="form-check-input me-3" name="move_to_folder" type="radio"
                                            value="9" id="kt_modal_move_to_folder_9">
                                        <!--end::Input-->
                                        <!--begin::Label-->
                                        <label class="form-check-label" for="kt_modal_move_to_folder_9">
                                            <div class="fw-bold">
                                                <i class="ki-duotone ki-folder fs-2 text-primary me-2">
                                                    <span class="path1"></span>
                                                    <span class="path2"></span>
                                                </i>pages
                                            </div>
                                        </label>
                                        <!--end::Label-->
                                        <div class="fv-plugins-message-container invalid-feedback"></div>
                                    </div>
                                    <!--end::Checkbox-->
                                </div>
                                <!--end::Item-->
                            </div>
                            <!--end::Input group-->
                            <!--begin::Action buttons-->
                            <div class="d-flex flex-center mt-12">
                                <!--begin::Button-->
                                <button type="button" class="btn btn-primary" id="kt_modal_move_to_folder_submit">
                                    <span class="indicator-label">Save</span>
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                </button>
                                <!--end::Button-->
                            </div>
                            <!--begin::Action buttons-->
                        </div>
                        <!--end::Modal body-->
                    </form>
                    <!--end::Form-->
                </div>
            </div>
        </div> --}}
                <!--end::Modal - Move file-->
                <!--end::Modals-->
            </div>
            <!--end::Content container-->
        </div>


        @section('script')
            <script defer>
                const fileAddInquiry = document.getElementById('uploads-file-inquiries');
                const fileContainerInput = document.getElementById('inputs-containers');
                const docPdfContainer = document.getElementById('docs_upload_pdf');

                fileAddInquiry.addEventListener("change", function(e) {

                    if (e.target.files[0]) {
                        const count = fileContainerInput.childElementCount;

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
                        containerInput.setAttribute("type", `file`);
                        containerInput.setAttribute("id", `docs_inputs_${count}`);
                        containerInput.setAttribute("name", `docs[]`);
                        containerInput.setAttribute("class", `d-none`);
                        container.items.add(file);
                        containerInput.files = container.files;
                        fileContainerInput.appendChild(containerInput);
                        docPdfContainer.appendChild(containerInputPdf);

                    }


                });
            </script>
        @endsection
    @endcan

@endunless
