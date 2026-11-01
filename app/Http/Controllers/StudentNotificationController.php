<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class StudentNotificationController extends Controller
{
    /**
     * Display notifications belonging to the authenticated student.
     */
    public function index(Request $request): View
    {
        abort_unless($request->user()->isStudent(), 403);

        $user = $request->user();

        $notifications = $user->notifications()
            ->latest()
            ->paginate(15);

        $unreadCount = $user->unreadNotifications()->count();

        return view('notifications.index', compact(
            'notifications',
            'unreadCount'
        ));
    }

    /**
     * Mark one of the authenticated student's notifications as read.
     */
    public function markRead(
        Request $request,
        string $notificationId
    ): RedirectResponse {
        abort_unless($request->user()->isStudent(), 403);

        $notification = $request->user()
            ->notifications()
            ->where('id', $notificationId)
            ->firstOrFail();

        $notification->markAsRead();

        return redirect()
            ->route('student.notifications.index')
            ->with('status', 'Notification marked as read.');
    }

    /**
     * Mark all notifications belonging to the student as read.
     */
    public function markAllRead(Request $request): RedirectResponse
    {
        abort_unless($request->user()->isStudent(), 403);

        $request->user()
            ->unreadNotifications()
            ->update(['read_at' => now()]);

        return redirect()
            ->route('student.notifications.index')
            ->with('status', 'All notifications marked as read.');
    }
}
