<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class faqsResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {

        if (app()->getLocale() == 'Ar') {
            return [
                'id' => $this->id,
                'question' => $this->questionAr,
                'answer' => $this->answerAr,
            ];
        } else {
            return [
                'id' => $this->id,
                'question' => $this->question,
                'answer' => $this->answer,
            ];
        };
    }
}
