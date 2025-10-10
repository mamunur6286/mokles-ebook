<?php

namespace App\Enums;

enum AdsTypeEnum: string
{
    case GOOGLE_ADS = 'google_ads';
    case PERSONAL_ADS = 'personal_ads';

    public function label(): string
    {
        return match($this) {
            self::GOOGLE_ADS => 'Google Ads',
            self::PERSONAL_ADS => 'Personal Ads',
        };
    }

    public static function dropdown(): array
    {
        return array_map(function ($case) {
            return [
                'value' => $case->value,
                'text' => $case->label(),
            ];
        }, self::cases());
    }

    public static function fromId(int $id): ?self
    {
        return collect(self::cases())->first(fn($case) => $case->value === $id);
    }
}
