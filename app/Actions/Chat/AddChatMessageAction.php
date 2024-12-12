<?php

namespace App\Actions\Chat;

use App\Models\Chat;
use App\Models\ChatMessage;
use App\Repositories\Contracts\ChatMessageRepositoryInterface;
use App\Repositories\Contracts\ChatRepositoryInterface;
use Illuminate\Support\Facades\Auth;

class AddChatMessageAction
{
    public function __construct(
        public ChatRepositoryInterface $chatRepository,
        public ChatMessageRepositoryInterface $chatMessageRepository
    ){}


    /**
     * Handles the addition of a chat message. If the chat_id is null, the method
     * will create a new chat if it does not already exist. Otherwise, it will use
     * the existing chat. The method will save the chat message to the database.
     *
     * @param array $data An array containing the sender_id, receiver_id, chat_id,
     *                    and message to be added.
     *
     * @return void
     */
    public function handle(array $data) {
        $chat_id = $data['chat_id'];
        $chat = null;
        if($chat_id == null) {
            $chat = $this->chatRepository->findByReceiverAndSender($data['receiver_id'], Auth::id());
            if($chat == null) {
                $chat = new Chat();
                $chat->sender_id = Auth::id();
                $chat->last_message_at = now();
                $chat->receiver_id = $data['receiver_id'];
                $this->chatRepository->save($chat);
            }
        }else{
            $chat = $this->chatRepository->findById($chat_id);
        }

        $chat->last_message_at = now();

        $chatMessage = new ChatMessage();
        $chatMessage->chat_id = $chat->id;
        $chatMessage->message = $data['message'];
        $chatMessage->sender_id = Auth::id();
        $this->chatMessageRepository->save($chatMessage);
        $this->chatRepository->save($chat);
    }
}