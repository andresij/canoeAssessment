<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class FundResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'fundsManagerId' => $this->funds_manager_id,
            'name' => $this->name,
            'startYear' => $this->start_year,
            'fundsManager' => FundsManagerResource::make($this->whenloaded('fundsManager')),
            'aliases' => AliasResource::collection($this->whenloaded('aliases')),
            'companies' => CompanyResource::collection ($this->whenloaded('companies'))
        ];
    }
}
