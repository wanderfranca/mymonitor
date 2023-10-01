<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Traits\RuleTime;

class LogResource extends JsonResource
{
    use RuleTime;

    public function toArray(Request $request): array
    {
        return [
           'id' => $this->id,
           'loja' => $this->loja,
           'host' => $this->host,
           'ip' => $this->ip,
           'Captura:' => $this->datahora,
           'down:' => $this->down,
           'up:' => $this->up,
        ];
    }
}
