<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChatMessage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    /**
     * Get the chat that owns the ChatMessage.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function chat() {
        return $this->belongsTo(Chat::class);
    }
}
