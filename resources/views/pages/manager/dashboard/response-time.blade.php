<x-default-layout>
    <div class="row g-5 g-xl-10 mb-5 mb-xl-10 mt-5">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h3>Average Response Time</h3>
                    <hr>
                    <div>
                        @isset($result['accountant'])
                            <h6> Accountant: <span class="font-weight-bold"> {{ $result['accountant']['days'] }} days -
                                    {{ $result['accountant']['hours'] }} hours - {{ $result['accountant']['minutes'] }}
                                    minutes</span></h6>
                        @endisset

                        @isset($result['team-leader'])
                            <h6> Team Leader: <span class="font-weight-bold"> {{ $result['team-leader']['days'] }} days -
                                    {{ $result['team-leader']['hours'] }} hours - {{ $result['team-leader']['minutes'] }}
                                    minutes</span></h6>
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-default-layout>
