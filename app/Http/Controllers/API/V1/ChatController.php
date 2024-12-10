<?php

namespace App\Http\Controllers\API\V1;

use App\Actions\Chat\AddChatMessageAction;
use App\Actions\Chat\DeleteMessageAction;
use App\Actions\Chat\GetChatMessagesAction;
use App\Actions\Chat\GetUserChatsAction;
use App\Actions\Chat\UpdateChatMessageAction;
use App\Http\Requests\ChatMessageUpdateRequest;
use App\Http\Requests\ChatRequest;
use App\Http\Resources\ApiResponse;
use App\Http\Resources\ChatCollection;
use App\Http\Resources\ChatMessageCollection;
use Illuminate\Support\Facades\Auth;

class ChatController extends Controller
{
    
    public function __construct(
        public AddChatMessageAction $addChatAction,
        public GetUserChatsAction $getUserChatsAction,
        public UpdateChatMessageAction $updateChatMessageAction,
        public GetChatMessagesAction $getChatMessages,
        public DeleteMessageAction $deleteMessage
    ){}

    /**
     * Add a new message to a chat.
     * 
     * @param ChatRequest $request
     * @return ApiResponse
     */
    public function create(ChatRequest $request) : ApiResponse {
        $data = $request->validated();
        $this->addChatAction->handle($data);
        return new ApiResponse(null);
    }

    /**
     * Returns all chats that belong to the currently authenticated user.
     * 
     * @return ChatMessageCollection
     */
    public function getUserChats() : ChatCollection {
        return new ChatCollection($this->getUserChatsAction->handle(Auth::id()));
    }


    /**
     * Updates an existing chat message.
     * 
     * @param int $id The ID of the chat message to update.
     * @param ChatMessageUpdateRequest $request The request containing the updated message data.
     * @return ApiResponse The response after updating the chat message.
     */
    public function updateMessage(int $id, ChatMessageUpdateRequest $request) : ApiResponse {
        $data = $request->validated();
        $this->updateChatMessageAction->handle($id, $data);
        return new ApiResponse(null);
    }

    /**
     * Deletes a chat message.
     * 
     * @param int $id The ID of the chat message to delete.
     * @return ApiResponse The response after deleting the chat message.
     */
    public function deleteMessage(int $id) : ApiResponse {
        $this->deleteMessage->handle($id);
        return new ApiResponse(null);
    }

    /**
     * Retrieves all chat messages for a given chat.
     * 
     * @param int $chat_id The ID of the chat whose messages are to be retrieved.
     * @return ChatMessageCollection A collection of chat messages belonging to the specified chat.
     */
    public function getChatMessages(int $chat_id) : ChatMessageCollection {
        return new ChatMessageCollection($this->getChatMessages->handle($chat_id));
    }
}