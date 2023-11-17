<?php

namespace App\Http\Controllers;

use App\Events\StoreMessageEvent;
use App\Http\Requests\Message\StoreRequest;
use App\Http\Resources\Message\MessageResource;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Session\Store;

class MessageController extends Controller
{
    public function index(): \Inertia\Response
    {
        $messages = Message::query()
            ->latest()
            ->get();

        return inertia('Message/Index', [
            'messages' => MessageResource::collection($messages)->resolve()
        ]);
    }

    public function store(StoreRequest $request): array
    {
        $message = Message::query()->create($request->validated());

        broadcast(new StoreMessageEvent($message))->toOthers();

        return MessageResource::make($message)->resolve();
    }
}
