<?php

namespace App\Http\Controllers\manager;

use App\Enums\RolesEnum;
use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Reminder;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ManagerController extends Controller
{

    public function __construct()
    {
        $this->middleware(['role:manager']);
    }

    /**
     * Display a listing of the resource.
     */
    public function charts()
    {
        return view('pages.manager.dashboard.charts');
    }

    public function clientsStatus()
    {
        $clients = User::with("roles")->whereHas("roles", function ($role) {
            $role->where('name', RolesEnum::CLIENT->value);
        })->get();
        return view('pages.manager.dashboard.clients', compact('clients'));
    }

    public function responseTime()
    {
        return view('pages.manager.dashboard.response-time');
    }
    public function reminders()
    {
        $reminders = Reminder::where('user_id', Auth::id())->get();

        return view('pages.manager.dashboard.reminders', compact('reminders'));
    }
    public function procurementsActivities()
    {
        $procurements = User::with("roles")->whereHas("roles", function ($role) {
            $role->where('name', RolesEnum::PROCUREMENT->value);
        })->get();
        return view('pages.manager.dashboard.procurements-activities', compact('procurements'));
    }

    public function inquiriesStatistics()
    {
        $statusGroup = Inquiry::all('status')->groupBy('status');
        return view('pages.manager.dashboard.inquiries-statistics', compact('statusGroup'));
    }
    public function inquiries()
    {
        return view('pages.manager.inquiries.list');
    }

    public function createInquiries()
    {
        return view('pages.manager.inquiries.create');
    }
    public function teamMembers()
    {
        return view('pages.manager.teamMembers.index');
    }

    public function createTeamMembers()
    {
        return view('pages.manager.teamMembers.create');
    }
    public function clients()
    {
        return view('pages.manager.client.index');
    }

    public function ticket()
    {
        return view('pages.manager.ticket.ticket');
    }

    public function ticketDocs()
    {
        return view('pages.manager.ticket.ticket');
    }

    public function ticketConfidential()
    {
        return view('pages.manager.ticket.ticket');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
