<!--begin::Basic info-->

@php
    $role_name = $user->roles->first()->name;
    
    $isAdmin = in_array($role_name, \App\Enums\RolesEnum::admins());
@endphp


<div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
        <!--begin::Card title-->
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Edit Profile</h3>
        </div>
        <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
        <!--begin::Form-->
        @include('partials.errors')

        <form id="kt_account_profile_details_form" class="form fv-plugins-bootstrap5 fv-plugins-framework"
            novalidate="novalidate" enctype="multipart/form-data" method="POST"
            action="{{ route('manager.profile.update', $user->id) }}">
            @csrf
            <!--begin::Card body-->
            <div class="card-body border-top p-9">
                <!--begin::Input group avatar-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Avatar</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Image input-->
                        <div class="image-input image-input-outline" data-kt-image-input="true"
                            style="background-image: url('')">
                            <!--begin::Preview existing avatar-->
                            <div class="image-input-wrapper w-125px h-125px"
                                style="background-image: url({{ asset($user->avatar ?? 'assets/media/avatars/300-1.jpg') }})">
                            </div>
                            <!--end::Preview existing avatar-->
                            <!--begin::Label-->
                            <label class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="change" data-bs-toggle="tooltip" aria-label="Change avatar"
                                data-bs-original-title="Change avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-pencil fs-7">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                                <!--begin::Inputs-->
                                <input type="file" name="avatar" accept=".png, .jpg, .jpeg">
                                <input type="hidden" name="avatar_remove">
                                <!--end::Inputs-->
                            </label>
                            <!--end::Label-->
                            <!--begin::Cancel-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="cancel" data-bs-toggle="tooltip" aria-label="Cancel avatar"
                                data-bs-original-title="Cancel avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <!--end::Cancel-->
                            <!--begin::Remove-->
                            <span class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                data-kt-image-input-action="remove" data-bs-toggle="tooltip" aria-label="Remove avatar"
                                data-bs-original-title="Remove avatar" data-kt-initialized="1">
                                <i class="ki-duotone ki-cross fs-2">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </span>
                            <!--end::Remove-->
                        </div>
                        <!--end::Image input-->
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group avatar-->
                <!--begin::Input group fullName-->
                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Full Name</label>
                    <!--end::Label-->
                    <!--begin::Col-->
                    <div class="col-lg-8">
                        <!--begin::Row-->
                        <div class="row">
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text"
                                    class="form-control form-control-lg form-control-solid mb-3 mb-lg-0"
                                    name="first_name" placeholder="First name"
                                    value="{{ old('first_name', $user->first_name) }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                            <!--begin::Col-->
                            <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                <input type="text" class="form-control form-control-lg form-control-solid"
                                    placeholder="Last name" name="last_name"
                                    value="{{ old('last_name', $user->last_name) }}">
                                <div class="fv-plugins-message-container invalid-feedback"></div>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Row-->
                    </div>
                    <!--end::Col-->
                </div>
                <!--end::Input group fullName-->
                <!--begin::Input group contact phone-->


                @unless ($isAdmin)
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Contact Phone</label>


                        <!--end::Label-->
                        <!--begin::Col-->
                        <div class="col-lg-8">
                            <!--begin::Row-->
                            <div class="row">
                                <!--begin::Col-->
                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    <input type="number" class="form-control form-control-lg form-control-solid"
                                        placeholder="Phone number" name="mobile_number"
                                        value="{{ old('mobile_number', $user->mobile_number) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                                <div class="col-lg-6 fv-row fv-plugins-icon-container">
                                    <input type="number" class="form-control form-control-lg form-control-solid"
                                        placeholder="Phone number2" name="mobile_number2"
                                        value="{{ old('mobile_number2', $user->mobile_number2) }}">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>

                    </div>
                @endunless




                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Email</span>
                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active"
                            data-bs-original-title="Phone number must be active" data-kt-initialized="1">
                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </label>

                    <div class="col-lg-8 fv-row">
                        <input type="tel" class="form-control form-control-lg form-control-solid"
                            placeholder="Email" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">Password</label>

                    <div class="col-lg-8 fv-row">
                        <input type="password" class="form-control form-control-lg form-control-solid"
                            placeholder="Password" name="password" value="{{ old('password') }}">
                    </div>
                </div>

                @if ($isAdmin)
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Abbreviation</label>

                        <div class="col-lg-8 fv-row">
                            <input type="email" name="abbreviation"
                                class="form-control form-control-lg form-control-solid" placeholder="Abbreviation"
                                value="{{ old('abbreviation', $user->abbreviation) }}">
                        </div>
                    </div>
                @else
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Abbreviation</label>

                        <div class="col-lg-8 fv-row">
                            <input type="email" name="company_abbreviation"
                                class="form-control form-control-lg form-control-solid"
                                placeholder="Company Abbreviation"
                                value="{{ old('company_abbreviation', $user->company_abbreviation) }}">
                        </div>
                    </div>
                @endif


                @if ($isAdmin)
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Renewal Date</label>

                        <div class="col-lg-8 fv-row">
                            <input type="date" name="renewal_date"
                                class="form-control form-control-lg form-control-solid" placeholder="Email"
                                value="{{ old('renewal_date', $user->renewal_date) }}">
                        </div>
                    </div>
                @endif
                @unless ($isAdmin)
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Name</label>


                        <div class="col-lg-8 fv-row fv-plugins-icon-container">
                            <input type="text" name="company_name"
                                class="form-control form-control-lg form-control-solid" placeholder="Company name"
                                value="{{ old('company_name', $user->company_name) }}">
                            <div class="fv-plugins-message-container invalid-feedback"></div>
                        </div>
                        <!--end::Col-->
                    </div>

                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Company Phone</label>

                        <div class="col-lg-8 fv-row">
                            <input type="number" name="company_number"
                                class="form-control form-control-lg form-control-solid" placeholder="Company Phone"
                                value="{{ old('company_number', $user->company_number) }}">
                        </div>
                    </div>
                @endunless

                <div class="row mb-6">
                    <!--begin::Label-->
                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                        <span class="required">Gender</span>
                        <span class="ms-1" data-bs-toggle="tooltip" aria-label="Phone number must be active"
                            data-bs-original-title="Phone number must be active" data-kt-initialized="1">
                            <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </span>
                    </label>

                    <div class="col-lg-8 fv-row">
                        <select name="gender" class="form-select  form-select-solid" data-control="select2"
                            value="{{ old('gender', $user->gender) }}" data-placeholder="Gender"
                            data-hide-search="true">
                            <option value="male">Male</option>
                            <option value="female">Female</option>

                        </select>
                        <div class="fv-plugins-message-container invalid-feedback"></div>
                    </div>
                </div>

                @unless ($isAdmin)
                    <div class="row mb-6">
                        <!--begin::Label-->
                        <label class="col-lg-4 col-form-label fw-semibold fs-6">Cofidential Note</label>

                        <div class="col-lg-8 fv-row">
                            <textarea class="form-control form-control-solid resize-none" rows="3" name="cofidential" id="cofidential"
                                cols="30">{{ old('cofidential', $user->cofidential) }}</textarea>
                        </div>
                    </div>
                @endunless


            </div>

            <div class="card-footer d-flex justify-content-end py-6 px-9">
                {{-- <button type="reset" class="btn btn-light btn-active-light-primary me-2">Discard</button> --}}
                <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Save
                    Changes</button>
            </div>
            <input type="hidden">
        </form>
    </div>
</div>



{{-- <div class="card mb-5 mb-xl-10">
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
        data-bs-target="#kt_account_signin_method">
        <div class="card-title m-0">
            <h3 class="fw-bold m-0">Sign-in Method</h3>
        </div>
    </div>

    <div id="kt_account_settings_signin_method" class="collapse show">
        <div class="card-body border-top p-9">
            <div class="d-flex flex-wrap align-items-center">
                <div id="kt_signin_email">
                    <div class="fs-6 fw-bold mb-1">Email Address</div>
                    <div class="fw-semibold text-gray-600">{{ $data['emailAddress']['email'] }}</div>
                </div>

                <div id="kt_signin_email_edit" class="flex-row-fluid d-none">
                    <form id="kt_signin_change_email" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        novalidate="novalidate">
                        <div class="row mb-6">
                            <div class="col-lg-6 mb-4 mb-lg-0">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="emailaddress" class="form-label fs-6 fw-bold mb-3">Enter New Email
                                        Address</label>
                                    <input type="email" class="form-control form-control-lg form-control-solid"
                                        id="emailaddress" placeholder="Email Address" name="emailaddress"
                                        value="support@keenthemes.com">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmemailpassword" class="form-label fs-6 fw-bold mb-3">Confirm
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="confirmemailpassword" id="confirmemailpassword">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex">
                            <button id="kt_signin_submit" type="button" class="btn btn-primary me-2 px-6">Update
                                Email</button>
                            <button id="kt_signin_cancel" type="button"
                                class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                </div>

                <div id="kt_signin_email_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Change Email</button>
                </div>
            </div>

            <div class="separator separator-dashed my-6"></div>

            <div class="d-flex flex-wrap align-items-center mb-10">
                <div id="kt_signin_password">
                    <div class="fs-6 fw-bold mb-1">Password</div>
                    <div class="fw-semibold text-gray-600">************</div>
                </div>

                <div id="kt_signin_password_edit" class="flex-row-fluid d-none">
                    <form id="kt_signin_change_password" class="form fv-plugins-bootstrap5 fv-plugins-framework"
                        novalidate="novalidate">
                        <div class="row mb-1">
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="currentpassword" class="form-label fs-6 fw-bold mb-3">Current
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="currentpassword" id="currentpassword">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="newpassword" class="form-label fs-6 fw-bold mb-3">New
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="newpassword" id="newpassword">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="fv-row mb-0 fv-plugins-icon-container">
                                    <label for="confirmpassword" class="form-label fs-6 fw-bold mb-3">Confirm New
                                        Password</label>
                                    <input type="password" class="form-control form-control-lg form-control-solid"
                                        name="confirmpassword" id="confirmpassword">
                                    <div class="fv-plugins-message-container invalid-feedback"></div>
                                </div>
                            </div>
                        </div>
                        <div class="form-text mb-5">Password must be at least 8 character and contain symbols</div>
                        <div class="d-flex">
                            <button id="kt_password_submit" type="button" class="btn btn-primary me-2 px-6">Update
                                Password</button>
                            <button id="kt_password_cancel" type="button"
                                class="btn btn-color-gray-400 btn-active-light-primary px-6">Cancel</button>
                        </div>
                    </form>
                </div>

                <div id="kt_signin_password_button" class="ms-auto">
                    <button class="btn btn-light btn-active-light-primary">Reset Password</button>
                </div>
            </div>
        </div>
    </div>
</div> --}}
