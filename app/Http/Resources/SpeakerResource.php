<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class SpeakerResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            ...parent::toArray($request),
            'image' =>  $this->image ? Storage::disk("local")->temporaryUrl($this->image, now()->addMinutes(10)) : null,
            'secundary_image' =>  $this->secundary_image ? Storage::disk("local")->temporaryUrl($this->secundary_image, now()->addMinutes(10)) : null,
        ];
    }
}
