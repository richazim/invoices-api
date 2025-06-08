<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Invoice extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_number',
        'total_price_excluding_vat',
        'total_vat',
        'total_price',
        'user_id'
    ];

    protected $casts = [
        'total_price_excluding_vat' => 'decimal:2',
        'total_vat' => 'decimal:2',
        'total_price' => 'decimal:2'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
