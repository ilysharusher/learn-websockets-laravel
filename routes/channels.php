<?php

use Illuminate\Support\Facades\Broadcast;

Broadcast::channel(
    'send_like_{id}',
    fn($user, $id) => (int)$user->id === (int)$id
);
