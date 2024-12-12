<?php

namespace App\Repositories\Impl;

use App\Models\ChatMessage;
use App\Repositories\Contracts\ChatMessageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class ChatMessageRepository extends BaseRepository implements ChatMessageRepositoryInterface
{
    public function __construct(ChatMessage $chatMessage)
    {
        parent::__construct($chatMessage);
    }

    /**
     * Saves a given chat message.
     *
     * @param ChatMessage $chatMessage
     *
     * @return void
     */
    public function save(ChatMessage $chatMessage) : void {
        $chatMessage->save();
    }

    public function findAllByChatId(int $chat_id) : Collection {
        return $this->model->where('chat_id', $chat_id)->
            orderBy('created_at', 'asc')->get();
    }
}