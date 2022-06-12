@extends('layouts.backend.app')
@section('title')
    Pengguna
@endsection
<?php $link = asset('backend/backend1/dist/'); ?>
@section('css')
    <link href="{{ $link }}/assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet"
        type="text/css" />
@endsection
@section('content')
    <div class="post d-flex flex-column-fluid" id="kt_post">
        
        <div id="kt_content_container" class="container-xxl">
            
            <div class="card">
                
                <div class="card-header border-0 pt-6">
                    
                    <div class="card-title">
                        
                        <div class="d-flex align-items-center position-relative my-1">
                            
                            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                    fill="none">
                                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1"
                                        transform="rotate(45 17.0365 15.1223)" fill="currentColor" />
                                    <path
                                        d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z"
                                        fill="currentColor" />
                                </svg>
                            </span>
                            
                            <input type="text" data-kt-user-table-filter="search"
                                class="form-control form-control-solid w-250px ps-14" placeholder="Search user" />
                        </div>
                        
                    </div>
                    
                    
                    <div class="card-toolbar">
                        
                        <div class="d-flex justify-content-end" data-kt-user-table-toolbar="base">
                            
                            <button type="button" class="btn btn-light-primary me-3" data-kt-menu-trigger="click"
                                data-kt-menu-placement="bottom-end">
                                
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <path
                                            d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z"
                                            fill="currentColor" />
                                    </svg>
                                </span>
                                
                            </button>
                            
                            <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
                                
                                <div class="px-7 py-5">
                                    <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                                </div>
                                
                                
                                <div class="separator border-gray-200"></div>
                                
                                
                                <div class="px-7 py-5" data-kt-user-table-filter="form">
                                    
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-bold">Role:</label>
                                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-user-table-filter="role" data-hide-search="true">
                                            <option></option>
                                            <option value="Administrator">Administrator</option>
                                            <option value="Analyst">Analyst</option>
                                            <option value="Developer">Developer</option>
                                            <option value="Support">Support</option>
                                            <option value="Trial">Trial</option>
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="mb-10">
                                        <label class="form-label fs-6 fw-bold">Two Step Verification:</label>
                                        <select class="form-select form-select-solid fw-bolder" data-kt-select2="true"
                                            data-placeholder="Select option" data-allow-clear="true"
                                            data-kt-user-table-filter="two-step" data-hide-search="true">
                                            <option></option>
                                            <option value="Enabled">Enabled</option>
                                        </select>
                                    </div>
                                    
                                    
                                    <div class="d-flex justify-content-end">
                                        <button type="reset"
                                            class="btn btn-light btn-active-light-primary fw-bold me-2 px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="reset">Reset</button>
                                        <button type="submit" class="btn btn-primary fw-bold px-6"
                                            data-kt-menu-dismiss="true" data-kt-user-table-filter="filter">Apply</button>
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                            
                            
                            <button type="button" class="btn btn-light-primary me-3" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_export_users">
                                
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.3" x="12.75" y="4.25" width="12" height="2" rx="1"
                                            transform="rotate(90 12.75 4.25)" fill="currentColor" />
                                        <path
                                            d="M12.0573 6.11875L13.5203 7.87435C13.9121 8.34457 14.6232 8.37683 15.056 7.94401C15.4457 7.5543 15.4641 6.92836 15.0979 6.51643L12.4974 3.59084C12.0996 3.14332 11.4004 3.14332 11.0026 3.59084L8.40206 6.51643C8.0359 6.92836 8.0543 7.5543 8.44401 7.94401C8.87683 8.37683 9.58785 8.34458 9.9797 7.87435L11.4427 6.11875C11.6026 5.92684 11.8974 5.92684 12.0573 6.11875Z"
                                            fill="currentColor" />
                                        <path
                                            d="M18.75 8.25H17.75C17.1977 8.25 16.75 8.69772 16.75 9.25C16.75 9.80228 17.1977 10.25 17.75 10.25C18.3023 10.25 18.75 10.6977 18.75 11.25V18.25C18.75 18.8023 18.3023 19.25 17.75 19.25H5.75C5.19772 19.25 4.75 18.8023 4.75 18.25V11.25C4.75 10.6977 5.19771 10.25 5.75 10.25C6.30229 10.25 6.75 9.80228 6.75 9.25C6.75 8.69772 6.30229 8.25 5.75 8.25H4.75C3.64543 8.25 2.75 9.14543 2.75 10.25V19.25C2.75 20.3546 3.64543 21.25 4.75 21.25H18.75C19.8546 21.25 20.75 20.3546 20.75 19.25V10.25C20.75 9.14543 19.8546 8.25 18.75 8.25Z"
                                            fill="#C4C4C4" />
                                    </svg>
                                </span>
                                
                            </button>
                            
                            
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_add_user">
                                
                                <span class="svg-icon svg-icon-2">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                        fill="none">
                                        <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1"
                                            transform="rotate(-90 11.364 20.364)" fill="currentColor" />
                                        <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor" />
                                    </svg>
                                </span>
                                
                            </button>
                            
                        </div>
                        
                        
                        <div class="d-flex justify-content-end align-items-center d-none"
                            data-kt-user-table-toolbar="selected">
                            <div class="fw-bolder me-5">
                                <span class="me-2" data-kt-user-table-select="selected_count"></span>Selected
                            </div>
                            <button type="button" class="btn btn-danger" data-kt-user-table-select="delete_selected">Delete
                                Selected</button>
                        </div>
                        
                        
                        <div class="modal fade" id="kt_modal_export_users" tabindex="-1" aria-hidden="true">
                            
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                
                                <div class="modal-content">
                                    
                                    <div class="modal-header">
                                        
                                        <h2 class="fw-bolder">Export Users</h2>
                                        
                                        
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        
                                        <form id="kt_modal_export_users_form" class="form" action="#">
                                            
                                            <div class="fv-row mb-10">
                                                
                                                <label class="fs-6 fw-bold form-label mb-2">Select Roles:</label>
                                                
                                                
                                                <select name="role" data-control="select2" data-placeholder="Select a role"
                                                    data-hide-search="true" class="form-select form-select-solid fw-bolder">
                                                    <option></option>
                                                    <option value="Administrator">Administrator</option>
                                                    <option value="Analyst">Analyst</option>
                                                    <option value="Developer">Developer</option>
                                                    <option value="Support">Support</option>
                                                    <option value="Trial">Trial</option>
                                                </select>
                                                
                                            </div>
                                            
                                            
                                            <div class="fv-row mb-10">
                                                
                                                <label class="required fs-6 fw-bold form-label mb-2">Select Export
                                                    Format:</label>
                                                
                                                
                                                <select name="format" data-control="select2"
                                                    data-placeholder="Select a format" data-hide-search="true"
                                                    class="form-select form-select-solid fw-bolder">
                                                    <option></option>
                                                    <option value="excel">Excel</option>
                                                    <option value="pdf">PDF</option>
                                                    <option value="cvs">CVS</option>
                                                    <option value="zip">ZIP</option>
                                                </select>
                                                
                                            </div>
                                            
                                            
                                            <div class="text-center">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                        
                        <div class="modal fade" id="kt_modal_add_user" tabindex="-1" aria-hidden="true">
                            
                            <div class="modal-dialog modal-dialog-centered mw-650px">
                                
                                <div class="modal-content">
                                    
                                    <div class="modal-header" id="kt_modal_add_user_header">
                                        
                                        <h2 class="fw-bolder">Add User</h2>
                                        
                                        
                                        <div class="btn btn-icon btn-sm btn-active-icon-primary"
                                            data-kt-users-modal-action="close">
                                            
                                            <span class="svg-icon svg-icon-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none">
                                                    <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1"
                                                        transform="rotate(-45 6 17.3137)" fill="currentColor" />
                                                    <rect x="7.41422" y="6" width="16" height="2" rx="1"
                                                        transform="rotate(45 7.41422 6)" fill="currentColor" />
                                                </svg>
                                            </span>
                                            
                                        </div>
                                        
                                    </div>
                                    
                                    
                                    <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                                        
                                        <form id="kt_modal_add_user_form" class="form" action="#">
                                            
                                            <div class="d-flex flex-column scroll-y me-n7 pe-7"
                                                id="kt_modal_add_user_scroll" data-kt-scroll="true"
                                                data-kt-scroll-activate="{default: false, lg: true}"
                                                data-kt-scroll-max-height="auto"
                                                data-kt-scroll-dependencies="#kt_modal_add_user_header"
                                                data-kt-scroll-wrappers="#kt_modal_add_user_scroll"
                                                data-kt-scroll-offset="300px">
                                                
                                                <div class="fv-row mb-7">
                                                    
                                                    <label class="d-block fw-bold fs-6 mb-5">Avatar</label>
                                                    
                                                    
                                                    <div class="image-input image-input-outline" data-kt-image-input="true"
                                                        style="background-image: url('/metronic8/demo8/assets/media/svg/avatars/blank.svg')">
                                                        
                                                        <div class="image-input-wrapper w-125px h-125px"
                                                            style="background-image: url(/metronic8/demo8/assets/media/avatars/300-6.jpg);">
                                                        </div>
                                                        
                                                        
                                                        <label
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="change" data-bs-toggle="tooltip"
                                                            title="Change avatar">
                                                            <i class="bi bi-pencil-fill fs-7"></i>
                                                            
                                                            <input type="file" name="avatar" accept=".png, .jpg, .jpeg" />
                                                            <input type="hidden" name="avatar_remove" />
                                                            
                                                        </label>
                                                        
                                                        
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="cancel" data-bs-toggle="tooltip"
                                                            title="Cancel avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        
                                                        
                                                        <span
                                                            class="btn btn-icon btn-circle btn-active-color-primary w-25px h-25px bg-body shadow"
                                                            data-kt-image-input-action="remove" data-bs-toggle="tooltip"
                                                            title="Remove avatar">
                                                            <i class="bi bi-x fs-2"></i>
                                                        </span>
                                                        
                                                    </div>
                                                    
                                                    
                                                    <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                                                    
                                                </div>
                                                
                                                
                                                <div class="fv-row mb-7">
                                                    
                                                    <label class="required fw-bold fs-6 mb-2">Full Name</label>
                                                    
                                                    
                                                    <input type="text" name="user_name"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="Full name" value="Emma Smith" />
                                                    
                                                </div>
                                                
                                                
                                                <div class="fv-row mb-7">
                                                    
                                                    <label class="required fw-bold fs-6 mb-2">Email</label>
                                                    
                                                    
                                                    <input type="email" name="user_email"
                                                        class="form-control form-control-solid mb-3 mb-lg-0"
                                                        placeholder="example@domain.com" value="smith@kpmg.com" />
                                                    
                                                </div>
                                                
                                                
                                                <div class="mb-7">
                                                    
                                                    <label class="required fw-bold fs-6 mb-5">Role</label>
                                                    
                                                    
                                                    
                                                    <div class="d-flex fv-row">
                                                        
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            
                                                            <input class="form-check-input me-3" name="user_role"
                                                                type="radio" value="0" id="kt_modal_update_role_option_0"
                                                                checked='checked' />
                                                            
                                                            
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_0">
                                                                <div class="fw-bolder text-gray-800">Administrator</div>
                                                                <div class="text-gray-600">Best for business owners and
                                                                    company administrators</div>
                                                            </label>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class='separator separator-dashed my-5'></div>
                                                    
                                                    <div class="d-flex fv-row">
                                                        
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            
                                                            <input class="form-check-input me-3" name="user_role"
                                                                type="radio" value="1" id="kt_modal_update_role_option_1" />
                                                            
                                                            
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_1">
                                                                <div class="fw-bolder text-gray-800">Developer</div>
                                                                <div class="text-gray-600">Best for developers or people
                                                                    primarily using the API</div>
                                                            </label>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class='separator separator-dashed my-5'></div>
                                                    
                                                    <div class="d-flex fv-row">
                                                        
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            
                                                            <input class="form-check-input me-3" name="user_role"
                                                                type="radio" value="2" id="kt_modal_update_role_option_2" />
                                                            
                                                            
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_2">
                                                                <div class="fw-bolder text-gray-800">Analyst</div>
                                                                <div class="text-gray-600">Best for people who need full
                                                                    access to analytics data, but don't need to update
                                                                    business settings</div>
                                                            </label>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class='separator separator-dashed my-5'></div>
                                                    
                                                    <div class="d-flex fv-row">
                                                        
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            
                                                            <input class="form-check-input me-3" name="user_role"
                                                                type="radio" value="3" id="kt_modal_update_role_option_3" />
                                                            
                                                            
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_3">
                                                                <div class="fw-bolder text-gray-800">Support</div>
                                                                <div class="text-gray-600">Best for employees who
                                                                    regularly refund payments and respond to disputes</div>
                                                            </label>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    <div class='separator separator-dashed my-5'></div>
                                                    
                                                    <div class="d-flex fv-row">
                                                        
                                                        <div class="form-check form-check-custom form-check-solid">
                                                            
                                                            <input class="form-check-input me-3" name="user_role"
                                                                type="radio" value="4" id="kt_modal_update_role_option_4" />
                                                            
                                                            
                                                            <label class="form-check-label"
                                                                for="kt_modal_update_role_option_4">
                                                                <div class="fw-bolder text-gray-800">Trial</div>
                                                                <div class="text-gray-600">Best for people who need to
                                                                    preview content data, but don't need to make any updates
                                                                </div>
                                                            </label>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                            </div>
                                            
                                            
                                            <div class="text-center pt-15">
                                                <button type="reset" class="btn btn-light me-3"
                                                    data-kt-users-modal-action="cancel">Discard</button>
                                                <button type="submit" class="btn btn-primary"
                                                    data-kt-users-modal-action="submit">
                                                    <span class="indicator-label">Submit</span>
                                                    <span class="indicator-progress">Please wait...
                                                        <span
                                                            class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                </button>
                                            </div>
                                            
                                        </form>
                                        
                                    </div>
                                    
                                </div>
                                
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
                
                
                <div class="card-body py-4">
                    
                    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
                        
                        <thead>
                            
                            <tr class="text-start text-muted fw-bolder fs-7 text-uppercase gs-0">
                                <th class="text-left">ID</th>
                                <th class="text-left">User</th>
                                {{-- <th class="min-w-125px">Role</th>
                                <th class="min-w-125px">Last login</th>
                                <th class="min-w-125px">Two-step</th>
                                <th class="min-w-125px">Joined Date</th> --}}
                                <th class="text-left">Actions</th>
                            </tr>
                            
                        </thead>
                        
                        
                        <tbody class="text-gray-600 fw-bold">
                        </tbody>
                        
                    </table>
                    
                </div>
                
            </div>
            
        </div>
        
    </div>
@endsection

@section('js')
    <script src="{{ $link }}/assets/js/datatables.bundle.js"></script>
    <script src="{{ $link }}/assets/js/widgets.bundle.js"></script>
    {{-- <script src="{{ $link }}/assets/js/custom/apps/user-management/users/list/table.js"></script> --}}
    {{-- <script src="{{ $link }}/assets/js/custom/apps/user-management/users/list/table.js"></script> --}}
    <script>
        "use strict";

        var KTUsersList = function() {
            // Define shared variables
            var table = document.getElementById('kt_table_users');
            var datatable;
            var toolbarBase;
            var toolbarSelected;
            var selectedCount;

            // Private functions
            var initUserTable = function() {
                // Set date data order
                const tableRows = table.querySelectorAll('tbody tr');

                tableRows.forEach(row => {
                    const dateRow = row.querySelectorAll('td');
                    const lastLogin = dateRow[3].innerText.toLowerCase(); // Get last login time
                    let timeCount = 0;
                    let timeFormat = 'minutes';

                    // Determine date & time format -- add more formats when necessary
                    if (lastLogin.includes('yesterday')) {
                        timeCount = 1;
                        timeFormat = 'days';
                    } else if (lastLogin.includes('mins')) {
                        timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                        timeFormat = 'minutes';
                    } else if (lastLogin.includes('hours')) {
                        timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                        timeFormat = 'hours';
                    } else if (lastLogin.includes('days')) {
                        timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                        timeFormat = 'days';
                    } else if (lastLogin.includes('weeks')) {
                        timeCount = parseInt(lastLogin.replace(/\D/g, ''));
                        timeFormat = 'weeks';
                    }

                    // Subtract date/time from today -- more info on moment datetime subtraction: https://momentjs.com/docs/#/durations/subtract/
                    const realDate = moment().subtract(timeCount, timeFormat).format();

                    // Insert real date to last login attribute
                    dateRow[3].setAttribute('data-order', realDate);

                    // Set real date for joined column
                    const joinedDate = moment(dateRow[5].innerHTML, "DD MMM YYYY, LT")
                .format(); // select date from 5th column in table
                    dateRow[5].setAttribute('data-order', joinedDate);
                });

                // Init datatable --- more info on datatables: https://datatables.net/manual/
                datatable = $(table).DataTable({
                    // "info": false,
                    // 'order': [],
                    // "pageLength": 10,
                    // "lengthChange": false,
                    processing: true,
                    serverSide: true,
                    ajax: "{{ route('users') }}",
                    columns: [
                        {
                            data: 'id_user',
                            name: 'id_user'
                        },
                        {
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'action',
                            name: 'action',
                            orderable: false,
                            searchable: false
                        },
                    ],
                    // 'columnDefs': [{
                    //         orderable: false,
                    //         targets: 0
                    //     }, // Disable ordering on column 0 (checkbox)
                    //     {
                    //         orderable: false,
                    //         targets: 6
                    //     }, // Disable ordering on column 6 (actions)                
                    // ]
                });

                // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                datatable.on('draw', function() {
                    initToggleToolbar();
                    handleDeleteRows();
                    toggleToolbars();
                });
            }

            // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
            var handleSearchDatatable = () => {
                const filterSearch = document.querySelector('[data-kt-user-table-filter="search"]');
                filterSearch.addEventListener('keyup', function(e) {
                    datatable.search(e.target.value).draw();
                });
            }

            // Filter Datatable
            var handleFilterDatatable = () => {
                // Select filter options
                const filterForm = document.querySelector('[data-kt-user-table-filter="form"]');
                const filterButton = filterForm.querySelector('[data-kt-user-table-filter="filter"]');
                const selectOptions = filterForm.querySelectorAll('select');

                // Filter datatable on submit
                filterButton.addEventListener('click', function() {
                    var filterString = '';

                    // Get filter values
                    selectOptions.forEach((item, index) => {
                        if (item.value && item.value !== '') {
                            if (index !== 0) {
                                filterString += ' ';
                            }

                            // Build filter value options
                            filterString += item.value;
                        }
                    });

                    // Filter datatable --- official docs reference: https://datatables.net/reference/api/search()
                    datatable.search(filterString).draw();
                });
            }

            // Reset Filter
            var handleResetForm = () => {
                // Select reset button
                const resetButton = document.querySelector('[data-kt-user-table-filter="reset"]');

                // Reset datatable
                resetButton.addEventListener('click', function() {
                    // Select filter options
                    const filterForm = document.querySelector('[data-kt-user-table-filter="form"]');
                    const selectOptions = filterForm.querySelectorAll('select');

                    // Reset select2 values -- more info: https://select2.org/programmatic-control/add-select-clear-items
                    selectOptions.forEach(select => {
                        $(select).val('').trigger('change');
                    });

                    // Reset datatable --- official docs reference: https://datatables.net/reference/api/search()
                    datatable.search('').draw();
                });
            }


            // Delete subscirption
            var handleDeleteRows = () => {
                // Select all delete buttons
                const deleteButtons = table.querySelectorAll('[data-kt-users-table-filter="delete_row"]');

                deleteButtons.forEach(d => {
                    // Delete button on click
                    d.addEventListener('click', function(e) {
                        e.preventDefault();

                        // Select parent row
                        const parent = e.target.closest('tr');

                        // Get user name
                        const userName = parent.querySelectorAll('td')[1].querySelectorAll('a')[1]
                            .innerText;

                        // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                        Swal.fire({
                            text: "Are you sure you want to delete " + userName + "?",
                            icon: "warning",
                            showCancelButton: true,
                            buttonsStyling: false,
                            confirmButtonText: "Yes, delete!",
                            cancelButtonText: "No, cancel",
                            customClass: {
                                confirmButton: "btn fw-bold btn-danger",
                                cancelButton: "btn fw-bold btn-active-light-primary"
                            }
                        }).then(function(result) {
                            if (result.value) {
                                Swal.fire({
                                    text: "You have deleted " + userName + "!.",
                                    icon: "success",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                }).then(function() {
                                    // Remove current row
                                    datatable.row($(parent)).remove().draw();
                                }).then(function() {
                                    // Detect checked checkboxes
                                    toggleToolbars();
                                });
                            } else if (result.dismiss === 'cancel') {
                                Swal.fire({
                                    text: customerName + " was not deleted.",
                                    icon: "error",
                                    buttonsStyling: false,
                                    confirmButtonText: "Ok, got it!",
                                    customClass: {
                                        confirmButton: "btn fw-bold btn-primary",
                                    }
                                });
                            }
                        });
                    })
                });
            }

            // Init toggle toolbar
            var initToggleToolbar = () => {
                // Toggle selected action toolbar
                // Select all checkboxes
                const checkboxes = table.querySelectorAll('[type="checkbox"]');

                // Select elements
                toolbarBase = document.querySelector('[data-kt-user-table-toolbar="base"]');
                toolbarSelected = document.querySelector('[data-kt-user-table-toolbar="selected"]');
                selectedCount = document.querySelector('[data-kt-user-table-select="selected_count"]');
                const deleteSelected = document.querySelector('[data-kt-user-table-select="delete_selected"]');

                // Toggle delete selected toolbar
                checkboxes.forEach(c => {
                    // Checkbox on click event
                    c.addEventListener('click', function() {
                        setTimeout(function() {
                            toggleToolbars();
                        }, 50);
                    });
                });

                // Deleted selected rows
                deleteSelected.addEventListener('click', function() {
                    // SweetAlert2 pop up --- official docs reference: https://sweetalert2.github.io/
                    Swal.fire({
                        text: "Are you sure you want to delete selected customers?",
                        icon: "warning",
                        showCancelButton: true,
                        buttonsStyling: false,
                        confirmButtonText: "Yes, delete!",
                        cancelButtonText: "No, cancel",
                        customClass: {
                            confirmButton: "btn fw-bold btn-danger",
                            cancelButton: "btn fw-bold btn-active-light-primary"
                        }
                    }).then(function(result) {
                        if (result.value) {
                            Swal.fire({
                                text: "You have deleted all selected customers!.",
                                icon: "success",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            }).then(function() {
                                // Remove all selected customers
                                checkboxes.forEach(c => {
                                    if (c.checked) {
                                        datatable.row($(c.closest('tbody tr')))
                                            .remove().draw();
                                    }
                                });

                                // Remove header checked box
                                const headerCheckbox = table.querySelectorAll(
                                    '[type="checkbox"]')[0];
                                headerCheckbox.checked = false;
                            }).then(function() {
                                toggleToolbars(); // Detect checked checkboxes
                                initToggleToolbar
                            (); // Re-init toolbar to recalculate checkboxes
                            });
                        } else if (result.dismiss === 'cancel') {
                            Swal.fire({
                                text: "Selected customers was not deleted.",
                                icon: "error",
                                buttonsStyling: false,
                                confirmButtonText: "Ok, got it!",
                                customClass: {
                                    confirmButton: "btn fw-bold btn-primary",
                                }
                            });
                        }
                    });
                });
            }

            // Toggle toolbars
            const toggleToolbars = () => {
                // Select refreshed checkbox DOM elements 
                const allCheckboxes = table.querySelectorAll('tbody [type="checkbox"]');

                // Detect checkboxes state & count
                let checkedState = false;
                let count = 0;

                // Count checked boxes
                allCheckboxes.forEach(c => {
                    if (c.checked) {
                        checkedState = true;
                        count++;
                    }
                });

                // Toggle toolbars
                if (checkedState) {
                    selectedCount.innerHTML = count;
                    toolbarBase.classList.add('d-none');
                    toolbarSelected.classList.remove('d-none');
                } else {
                    toolbarBase.classList.remove('d-none');
                    toolbarSelected.classList.add('d-none');
                }
            }

            return {
                // Public functions  
                init: function() {
                    if (!table) {
                        return;
                    }

                    initUserTable();
                    initToggleToolbar();
                    handleSearchDatatable();
                    handleResetForm();
                    handleDeleteRows();
                    handleFilterDatatable();

                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function() {
            KTUsersList.init();
        });
    </script>
@endsection
