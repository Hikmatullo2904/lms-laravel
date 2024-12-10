<?php

namespace App\Actions\Chat;

use App\Repositories\Contracts\ChatMessageRepositoryInterface;

class DeleteMessageAction
{
    public function __construct(
        public ChatMessageRepositoryInterface $chatMessageRepository
    ){}


    /**
     * Deletes a chat message given its ID.
     *
     * @param int $id The ID of the chat message to delete.
     *
     * @return void
     */
    public function handle(int $id) : void {
        $this->chatMessageRepository->deleteById($id);
    }
}