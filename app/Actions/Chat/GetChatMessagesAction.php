<?php

namespace App\Actions\Chat;

use App\Repositories\Contracts\ChatMessageRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetChatMessagesAction
{
    public function __construct(
        public ChatMessageRepositoryInterface $chatMessageRepository
    ){}

    /**
     * Retrieve all chat messages for a given chat.
     *
     * @param int $chat_id The ID of the chat whose messages are to be retrieved.
     * @return Collection A collection of chat messages belonging to the specified chat.
     */
    public function handle(int $chat_id) : Collection {
        return $this->chatMessageRepository->findAllByChatId($chat_id);
    }
}