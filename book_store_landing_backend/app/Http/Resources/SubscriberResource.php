<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubscriberResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'email' => $this->email,
            'question' => $this->question,
            'frequency' => $this->frequency,
            'new_arrivals' => $this->new_arrivals,
            'selection_by_genre' => $this->selection_by_genre,
            'recommended_papers' => $this->recommended_papers,
            'discount_notifications' => $this->discount_notifications,
        ];
    }
}
