<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;

class StudentUpdateNotification extends Notification
{
    use Queueable;

    public function __construct(
        public string $type,
        public string $title,
        public string $message,
        public string $url,
        public ?int $subjectId = null,
        public ?int $lessonId = null,
    ) {
    }

    /**
     * Store this notification in the database.
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Data saved in the user's notifications table.
     */
    public function toArray(object $notifiable): array
    {
        return [
            'type' => $this->type,
            'title' => $this->title,
            'message' => $this->message,
            'url' => $this->url,
            'subject_id' => $this->subjectId,
            'lesson_id' => $this->lessonId,
        ];
    }
}
