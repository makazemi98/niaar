<!--begin::Table-->
<table class="table table-row-dashed align-middle gs-0 gy-4 my-0">
    <thead>
        <tr class="fs-7 fw-bold text-gray-500 border-bottom-0">
            @foreach ($table['cols'] as $item)
                <th class="min-w-125px">{{ $item }}</th>
            @endforeach
        </tr>
    </thead>
    <tbody>
        @foreach ($table['data'] as $row)
            <tr>
                @foreach ($row as $item)
                    @if (is_array($item))
                        <td class="pe-0 d-flex flex-column align-items-center">
                            @foreach ($item as $key => $value)
                                <div class="d-flex flex-column align-items-center">
                                    <span
                                        class="text-gray-800 fw-bold text-hover-primary d-block fs-6 border-bottom border-light">{{ $key }}:
                                    </span>
                                    <span
                                        class="text-gray-800 fw-bold text-hover-primary d-block fs-6">{{ $value }}</span>
                                </div>
                            @endforeach
                        </td>
                    @else
                        <td class="pe-0">
                            <span
                                class="text-gray-800 fw-bold text-hover-primary d-block fs-6">{{ $item }}</span>
                        </td>
                    @endif
                @endforeach
            </tr>
        @endforeach
    </tbody>
</table>
<div class="row my-5">
    <div class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start">
        <div class="dataTables_length" id="kt_ecommerce_sales_table_length"><label><select
                    name="kt_ecommerce_sales_table_length" aria-controls="kt_ecommerce_sales_table"
                    class="form-select form-select-sm form-select-solid">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select></label></div>
    </div>
    <div class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
        <div class="dataTables_paginate paging_simple_numbers" id="kt_ecommerce_sales_table_paginate">
            <ul class="pagination">
                <li class="paginate_button page-item previous disabled" id="kt_ecommerce_sales_table_previous"><a
                        href="#" aria-controls="kt_ecommerce_sales_table" data-dt-idx="0" tabindex="0"
                        class="page-link"><i class="previous"></i></a></li>
                <li class="paginate_button page-item active"><a href="#" aria-controls="kt_ecommerce_sales_table"
                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_sales_table"
                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_sales_table"
                        data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_sales_table"
                        data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                <li class="paginate_button page-item "><a href="#" aria-controls="kt_ecommerce_sales_table"
                        data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                <li class="paginate_button page-item next" id="kt_ecommerce_sales_table_next"><a href="#"
                        aria-controls="kt_ecommerce_sales_table" data-dt-idx="6" tabindex="0" class="page-link"><i
                            class="next"></i></a></li>
            </ul>
        </div>
    </div>
</div>
