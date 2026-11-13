<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Order extends Model
{
    protected $guarded = [];

    protected function casts(): array
    {
        return ['details' => 'array'];
    }

    protected static function booted(): void
    {
        static::creating(function (Order $order) {
            do {
                $code = 'ORD-'.strtoupper(Str::random(6));
            } while (static::where('code', $code)->exists());

            $order->code = $code;
        });
    }

    public static function normalizePhone(string $phone): string
    {
        $digits = preg_replace('/\D/', '', $phone);

        return match (true) {
            str_starts_with($digits, '0') => '62'.substr($digits, 1),
            str_starts_with($digits, '8') => '62'.$digits,
            default => $digits,
        };
    }

    public function serviceLabel(): string
    {
        return $this->service === 'gambar' ? 'Gambar' : 'Motion picture edit';
    }

    public function statusLabel(): string
    {
        return config('shop.statuses.'.$this->status, $this->status);
    }
}
