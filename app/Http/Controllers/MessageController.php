<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use Telegram\Bot\Laravel\Facades\Telegram;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
//        $response = Telegram::sendMessage([
//            'chat_id' => '435223517',
//            'text' => 'dddd'
//        ]);
        $allMessages = Message::all();
        return view('messages/index',
            [
                'messages' => $allMessages,
//                'telegramResponse' => $response
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('messages.create');
    }

    public function store(Request $request)
    {
            Message::query()->create([
                'text_message' => $request->input('text_message'),
                'bot_name' => $request->input('bot_name'),
                'token' => $request->input('token')
            ]);
        return redirect()->route('messages.index')->with('Готово');
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
        $message = Message::query()->find($id);
        return view('messages.edit',
            ['message' => $message]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $message = Message::query()->findOrFail($id);
        $message->update($request->all());
        return redirect()->route('messages.index')->with('success', 'Готово');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $message = Message::query()->find($id);
        $message->delete();
        return redirect()->route('messages.index');
    }
}
