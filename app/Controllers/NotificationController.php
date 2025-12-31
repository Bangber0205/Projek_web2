<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\NotificationModel;
use CodeIgniter\HTTP\ResponseInterface;

class NotificationController extends BaseController
{
    protected $notificationModel;

    public function __construct()
    {
        $this->notificationModel = new NotificationModel();
    }
    public function index()
    {
        $user = service('authentication')->user();
        $userId = $user ? $user->id : null;
        $notifications = $this->notificationModel->getNotifications($userId, 20);
        $unreadCount = count($this->notificationModel->getUnreadNotifications($userId));

        return $this->response->setJSON([
            'notifications' => $notifications,
            'unread_count' => $unreadCount
        ]);
    }
    
    public function markAsRead($id)
    {
        $user = service('authentication')->user();
        $userId = $user ? $user->id : null;
        $notification = $this->notificationModel->find($id);
        if (!$notification || ($userId && $notification['user_id'] != $userId)) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Notification not found']);
        }

        $this->notificationModel->markAsRead($id);

        return $this->response->setJSON(['success' => true]);
    }
    public function delete($id)
    {
        $user = service('authentication')->user();
        $userId = $user ? $user->id : null;
        $notification = $this->notificationModel->find($id);
        if (!$notification || ($userId && $notification['user_id'] != $userId)) {
            return $this->response->setStatusCode(404)->setJSON(['error' => 'Notification not found']);
        }

        $this->notificationModel->deleteNotification($id, $userId);

        return $this->response->setJSON(['success' => true]);
    }
}
