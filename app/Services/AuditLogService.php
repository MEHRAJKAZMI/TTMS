<?php

namespace App\Services;

use App\Models\AuditLog;
use Illuminate\Contracts\Auth\Authenticatable;

class AuditLogService
{
    public function record(string $action, object $target, array $meta = [], ?Authenticatable $actor = null, ?string $ip = null): void
    {
        AuditLog::create([
            'user_id' => $actor?->getAuthIdentifier(),
            'action' => $action,
            'target_type' => $target::class,
            'target_id' => $target->id ?? null,
            'meta' => $meta,
            'ip_address' => $ip,
        ]);
    }
}
