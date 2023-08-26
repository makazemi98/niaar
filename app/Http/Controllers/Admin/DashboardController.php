<?php

// namespace App\Http\Controllers\Admin;

// use App\Enums\InquiryStatusesEnum;
// use App\Enums\RolesEnum;
// use App\Http\Controllers\Controller;
// use App\Models\Inquiry;
// use Illuminate\Http\Request;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\DB;

// class DashboardController extends Controller
// {
//     public function getChartsData()
//     {
//         return response()->json([
//             'profit' => $this->getProfitStats(),
//             'inquiry' => $this->getInquiryStats(),
//             'active_customers' => $this->getActiveCustomerStats(),
//             'orders' => $this->getOrdersStats(),
//         ]);
//     }

//     protected function getData($query)
//     {
//         $months = range(1, 12);

//         $result = [];

//         $query
//             ->groupBy(DB::raw('date'))
//             ->get()
//             ->groupBy([
//                 'year',
//                 function ($item) {
//                     return $item->month;
//                 }
//             ], preserveKeys: true)
//             ->transform(function ($item, $year) use(&$result, $months) {
//                 foreach ($months as $month) {
//                     if (isset($item[$month])) {
//                         $result[$year][$month] = $item[$month]->first()->total;
//                     } else {
//                         $result[$year][$month] = 0;
//                     }
//                 }
//             });

//         return $result;
//     }

//     protected function getProfitStats()
//     {
//         $query = DB::connection('non_strict_mysql')
//             ->table('inquiries as inq')
//             ->where('inq.deleted_at', null)
//             ->selectRaw('
//                 (SUM(calc.actual_ordered_price_aed) - SUM(calc.buying_total_price_aed)) AS total,
//                 DATE_FORMAT(inq.created_at, "%Y-%m") AS date,
//                 MONTH(inq.created_at) AS month,
//                 YEAR(inq.created_at) AS year
//             ')
//             ->join('calculations as calc', 'inq.id', '=', 'calc.inquiry_id');

//         return $this->getData($query);
//     }

//     protected function getInquiryStats()
//     {
//         $query = DB::connection('non_strict_mysql')
//             ->table('inquiries')
//             ->where('deleted_at', null)
//             ->selectRaw('
//                 COUNT(*) AS total,
//                 DATE_FORMAT(created_at, "%Y-%m") AS date,
//                 MONTH(created_at) AS month,
//                 YEAR(created_at) AS year
//             ');

//         return $this->getData($query);

//     }

//     protected function getActiveCustomerStats()
//     {
//         $query = DB::connection('non_strict_mysql')
//             ->table('inquiries')
//             ->where('deleted_at', null)
//             ->selectRaw('
//                 COUNT(DISTINCT client_id) AS total,
//                 DATE_FORMAT(created_at, "%Y-%m") AS date,
//                 MONTH(created_at) AS month,
//                 YEAR(created_at) AS year
//             ');

//         return $this->getData($query);
//     }

//     protected function getOrdersStats()
//     {
//         $query = DB::connection('non_strict_mysql')
//             ->table('statuses')
//             ->where([
//                 'model_type' => Inquiry::class,
//                 'name' => InquiryStatusesEnum::ORDERED->value,
//                 'inq.deleted_at' => null
//             ])
//             ->join('inquiries AS inq', 'statuses.model_id', '=', 'inq.id')
//             ->selectRaw('
//                 COUNT(DISTINCT inq.client_id) AS total,
//                 DATE_FORMAT(inq.created_at, "%Y-%m") AS date,
//                 MONTH(inq.created_at) AS month,
//                 YEAR(inq.created_at) AS year
//             ');

//         return $this->getData($query);

//     }

//     public function inquiriesStats(Request $request)
//     {
//         $filters = $request->all();

//         $result = [];
//         foreach (InquiryStatusesEnum::cases() as $status)
//         {
//             $result[$status->value] = Inquiry::currentStatus($status->value)
//                 ->when(Auth::user()->hasRole(RolesEnum::CLIENT->value), function ($query) {
//                     $query->where('client_id', Auth::id());
//                 })
//                 ->when(
//                     isset($filters['from_created_at']) && !isset($filters['to_created_at']),
//                     function ($query) use($filters) {
//                         $query->whereDate('created_at', '>=', $filters['from_created_at']);
//                     }
//                 )
//                 ->when(
//                     !isset($filters['from_created_at']) && isset($filters['to_created_at']),
//                     function ($query) use($filters) {
//                         $query->whereDate('created_at', '<=', $filters['to_created_at']);
//                     }
//                 )
//                 ->when(
//                     isset($filters['from_created_at']) && isset($filters['to_created_at']),
//                     function ($query) use($filters) {
//                         $query->whereBetween(
//                             'created_at',
//                             [
//                                 $filters['from_created_at'],
//                                 $filters['to_created_at']
//                             ]
//                         );
//                     }
//                 )
//                 ->count();
//         }

//         return $result;
//     }

// }
