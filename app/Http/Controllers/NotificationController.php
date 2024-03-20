<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    //

    public function getByUser()
    {
        $notificationsData = [];

        $user = auth()->user();

        foreach ($user->notifications as $notification) {
            $notificationsData[] = $notification->data;
        }
        return $notificationsData;
    }

    public function readNotification()
    {
        $notificationsData = [];

        $user = auth()->user();

        foreach ($user->unreadNotifications as $notification) {
            $notificationsData[] = ['id' => $notification->id, 'data' => $notification->data, 'created_at' => $notification->created_at, 'read_at' => $notification->read_at];
        }
        return $notificationsData;
    }

    public function markAsRead($id)
    {

        $user = auth()->user();

        $notification = $user->unreadNotifications()->where('id', $id)->first();
        if ($notification) {
            $notification->markAsRead();
            return response()->json(['message' => 'Notification marked as read'], 200);
        } else {
            return response()->json(['message' => 'Notification not found'], 404);
        }
    }
}
