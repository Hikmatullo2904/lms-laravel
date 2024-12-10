<?php

namespace App\Actions\Chat;

use App\Exceptions\CustomAccessDeniedException;
use App\Models\ChatMessage;
use App\Repositories\Contracts\ChatMessageRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class UpdateChatMessageAction {
    public function __construct(
        public ChatMessageRepositoryInterface $chatMessageRepository
    ){}


    /**
     * Update a given chat message.
     * 
     * @param int $id
     * @param array $data
     * 
     * @throws CustomAccessDeniedException
     */
    public function handle(int $id, array $data) : void {
        $chatMessage = $this->chatMessageRepository->findById($data['id']);
        if($chatMessage->sender_id != Auth::id()) {
            throw new CustomAccessDeniedException('you are not owner of message');
        }
        $chatMessage->message = $data['message'];
        $this->chatMessageRepository->save($chatMessage);
    }
}