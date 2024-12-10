<?php

namespace App\Repositories\Contracts;

use App\Models\Chat;
use Illuminate\Database\Eloquent\Collection;

interface ChatRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Saves a given chat.
     *
     * @param Chat $chat
     * @return Chat
     */
    public function save(Chat $chat) : Chat;

    /**
     * Finds a chat by its receiver and sender ids.
     * 
     * @param int $receiver_id
     * @param int $sender_id
     * 
     * @return Chat|null
     */
    public function findByReceiverAndSender(int $receiver_id, int $sender_id) : Chat|null;

    /**
     * Returns all chats that belong to a given user.
     * 
     * @param int $user_id
     * 
     * @return Collection
     */
    public function getAllUserChats(int $user_id) : Collection;
}