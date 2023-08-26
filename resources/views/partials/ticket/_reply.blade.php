<div class="d-flex mb-5">
    <div class="symbol symbol-45px me-5">
        <img src={{ $item['src'] }} alt="">
    </div>
    <div class="d-flex flex-column flex-row-fluid">
        <div class="d-flex align-items-center flex-wrap mb-1">
            <a href="#" class="text-gray-800 text-hover-primary fw-bold me-2">{{ $item['name'] }}</a>
            <span class="text-gray-400 fw-semibold fs-7">{{ $item['date'] }}</span>
        </div>

        <span class="text-gray-800 fs-7 fw-normal pt-1">{{ $item['content'] }}</span>
    </div>
</div>

