<?php

namespace App\Repositories\Contracts;

use App\Models\ChatMessage;
use Illuminate\Database\Eloquent\Collection;

interface ChatMessageRepositoryInterface extends BaseRepositoryInterface
{
    /**
     * Saves a given chat message.
     *
     * @param ChatMessage $chatMessage
     *
     * @return void
     */
    public function save(ChatMessage $chatMessage) : void;

    public function findAllByChatId(int $chat_id): Collection;
}