<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\Storage;

class PostResource extends JsonResource
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
            'image_url' =>  $this->image_url ? Storage::disk("local")->temporaryUrl($this->image_url, now()->addMinutes(10)) : null,
            'user' => [
                "name" => $this->user->name,
                "image" => $this->user->image ? Storage::disk("local")->temporaryUrl($this->user->image, now()->addMinutes(10)) : null,
            ]
        ];
    }
}
