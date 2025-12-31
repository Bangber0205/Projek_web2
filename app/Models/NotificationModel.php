<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table            = 'notifications';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['user_id', 'title', 'message', 'type', 'is_read'];

    protected bool $allowEmptyInserts = false;
    protected bool $updateOnlyChanged = true;

    protected array $casts = [];
    protected array $castHandlers = [];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [
        'title' => 'required|max_length[255]',
        'message' => 'required',
        'type' => 'in_list[info,warning,success,error]',
    ];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    /**
     * Get unread notifications for a user
     */
    public function getUnreadNotifications($userId = null)
    {
        $builder = $this->where('is_read', 0);

        if ($userId) {
            $builder->where('user_id', $userId);
        }

        return $builder->orderBy('created_at', 'DESC')->findAll();
    }

    /**
     * Get all notifications for a user
     */
    public function getNotifications($userId = null, $limit = 10)
    {
        $builder = $this;

        if ($userId) {
            $builder->where('user_id', $userId);
        }

        return $builder->orderBy('created_at', 'DESC')->findAll($limit);
    }

    /**
     * Mark notification as read
     */
    public function markAsRead($id)
    {
        return $this->update($id, ['is_read' => 1]);
    }

    /**
     * Create a new notification
     */
    public function createNotification($data)
    {
        return $this->insert($data);
    }

    /**
     * Delete a notification
     */
    public function deleteNotification($id, $userId = null)
    {
        $builder = $this->where('id', $id);

        if ($userId) {
            $builder->where('user_id', $userId);
        }

        return $builder->delete();
    }
}
