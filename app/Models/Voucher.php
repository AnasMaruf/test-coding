<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Voucher extends Model
{
    /**
     * Get all of the voucherClaims for the Voucher
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function voucherClaims(): HasMany
    {
        return $this->hasMany(VoucherClaim::class);
    }
}
