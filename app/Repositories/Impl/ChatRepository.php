<?php

namespace App\Repositories\Impl;

use App\Models\Chat;
use App\Repositories\Contracts\ChatRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ChatRepository extends BaseRepository implements ChatRepositoryInterface
{
    public function __construct(Chat $chat)
    {
        parent::__construct($chat);
    }

    /**
     * Saves a given chat.
     *
     * @param Chat $chat
     * @return Chat
     */
    public function save(Chat $chat) : Chat {
        return $this->save($chat);
    }

    /**
     * Finds a chat by its receiver and sender ids.
     * 
     * @param int $receiver_id
     * @param int $sender_id
     * 
     * @return Chat|null
     */
    public function findByReceiverAndSender(int $receiver_id, int $sender_id) : Chat|null
    {
        return $this->model->
            where('receiver_id', $receiver_id)->
            where('sender_id', $sender_id)->first();
    }

    /**
     * Returns all chats that belong to a given user.
     * 
     * @param int $user_id
     * 
     * @return Collection
     */
    public function getAllUserChats(int $user_id): Collection
    {
        return $this->model->where('receiver_id', $user_id)->
            orWhere('sender_id', $user_id)->
            orderBy('last_message_at', 'desc')->get();
    }
}