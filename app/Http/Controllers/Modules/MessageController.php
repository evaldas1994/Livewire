<?php

namespace App\Http\Controllers\Modules;

use App\Models\Message;
use Illuminate\View\View;
use Illuminate\Support\Arr;
use App\Models\MessageGroup;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\MessageStoreUpdateRequest;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return View
     */
    public function index()
    {
        $messages = Message::simplePaginate();

        return view('modules.message.index', compact('messages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create()
    {
        $messageGroups = MessageGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.message.create', compact('messageGroups'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param MessageStoreUpdateRequest $request
     * @return RedirectResponse
     */
    public function store(MessageStoreUpdateRequest $request)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request);
        }

        Message::create($request->validated());

        return redirect()->route('messages.index')->withSuccess(trans('global.created_successfully'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Message $message
     * @return View
     */
    public function edit(Message $message)
    {
        $messageGroups = MessageGroup::select('f_id', 'f_name')->orderBy('f_name')->limit(10)->get();

        return view('modules.message.edit', compact('message', 'messageGroups'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param MessageStoreUpdateRequest $request
     * @param Message $message
     * @return RedirectResponse
     */
    public function update(MessageStoreUpdateRequest $request, Message $message)
    {
        if (Arr::exists($request->input(), 'button-action-without-validation')) {
            return $this->checkButtonActionWithoutValidation($request, $message);
        }

        try {
            $message->update($request->validated());

            return redirect()->route('messages.index')->withSuccess(trans('global.updated_successfully'));
        } catch (\Exception) {
            return redirect()->route('messages.index')->withError(trans('global.update_failed'));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Message $message
     * @return RedirectResponse
     */
    public function destroy(Message $message)
    {
        try {
            $message->delete();

            return redirect()->route('messages.index')->withSuccess(trans('global.deleted_successfully'));
        } catch (\Exception) {
            return redirect()->route('messages.index')->withError(trans('global.delete_failed'));
        }
    }

    /**
     * @param MessageStoreUpdateRequest $request
     * @param Message|null $message
     * @param string $routeMessage
     * @return RedirectResponse
     */
    private function checkButtonActionWithoutValidation(MessageStoreUpdateRequest $request, Message $message = null, string $routeMessage='global.empty'): RedirectResponse
    {
        $actionWithoutValidation = explode('|', $request->input('button-action-without-validation'));
        switch ($actionWithoutValidation[0]) {
            case 'close':
                return redirect()->route('messages.index');

            case 'select-message-group':
                dd('route to message group.index', $actionWithoutValidation[1]);
        }

        return redirect()->route('messages.index')->withSuccess(trans($routeMessage));
    }
}
