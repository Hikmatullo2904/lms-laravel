<?php

namespace App\Actions\Chat;

use App\Repositories\Contracts\ChatRepositoryInterface;
use Illuminate\Database\Eloquent\Collection;

class GetUserChatsAction
{
    public function __construct(
        public ChatRepositoryInterface $chatRepository
    ){}

    /**
     * Handle the retrieval of all chats for a given user.
     *
     * @param int $user_id The ID of the user whose chats are to be retrieved.
     * @return Collection A collection of chats belonging to the user.
     */
    public function handle(int $user_id) : Collection {
        return $this->chatRepository->getAllUserChats($user_id);
    }
}