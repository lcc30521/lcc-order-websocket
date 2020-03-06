<?php
use App\Order;
/*
|--------------------------------------------------------------------------
| Broadcast Channels
|--------------------------------------------------------------------------
|
| Here you may register all of the event broadcasting channels that your
| application supports. The given channel authorization callbacks are
| used to check if an authenticated user can listen to the channel.
|
*/

Broadcast::channel('User.{id}', function ($user, $id) {
    return (int) $user->id === (int) $id;
});

Broadcast::channel('Order{id}', function ($user, $id) {
  //  dd(Order::findOrFail($id)->user_id);
    return (int) Order::findOrFail($id)->user_id === (int) $user->id;
});
