<?php

namespace App\Http\Controllers\Modules;

use App\Models\Calendar;
use Illuminate\View\View;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\CalendarStoreUpdateRequest;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $calendars = Calendar::simplePaginate();

        return view('modules.calendar.index', compact('calendars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        return view('modules.calendar.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param CalendarStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(CalendarStoreUpdateRequest $request)
    {
        Calendar::create($request->validated());
        return redirect()->route('calendars.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Calendar $calendar
     * @return View
     */
    public function edit(Calendar $calendar)
    {
        $days = null;

        return view('modules.calendar.edit', compact('calendar', 'days'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param CalendarStoreUpdateRequest $request
     * @param Calendar $calendar
     * @return RedirectResponse
     */
    public function update(CalendarStoreUpdateRequest $request, Calendar $calendar)
    {
        try {
            $calendar->update($request->validated());

            return redirect()->route('calendars.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('calendars.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Calendar $calendar
     * @return RedirectResponse
     */
    public function destroy(Calendar $calendar)
    {
        try {
            $calendar->delete();

            return redirect()->route('calendars.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('calendars.index')->withError(trans('global.delete_failed'));
        }
    }
}
