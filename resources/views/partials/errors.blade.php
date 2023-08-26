@if ($errors->any())
    <div class="mt-5">
        @foreach ($errors->all() as $error)
            <p class="alert alert-danger custom_alert text-left" style="direction: ltr">{{ $error }}</p>
        @endforeach

    </div>
@endif
