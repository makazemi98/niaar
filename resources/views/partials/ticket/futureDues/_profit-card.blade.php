<div class="col-12 mb-5 mb-xxl-8">
    <div class="card">
        <div class="card-header">
            <div class="col-12 d-flex align-items-center justify-content-between">
                <!--begin::title-->
                <h3>Proﬁt of current project</h3>
                <!--begin::title-->
                <!--begin::action-->
                <a href="#" class="btn fw-bold btn-primary">Submit</a>
                <!--begin::action-->
            </div>
        </div>
        <!--begin::card body-->
        <div class="card-body">
            @foreach ($profit as $key => $value)
                <div class="d-flex me-2">
                    <a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">{{ $key }} : </a>
                    <span class="text-gray-400 fw-bold d-block fs-7"> {{ $value }}</span>
                </div>
            @endforeach
        </div>
        <!--begin::card body-->
    </div>
</div>
