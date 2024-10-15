<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use App\Traits\IncludeAuthenticatedUser;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateCustomer extends CreateRecord
{
    use IncludeAuthenticatedUser;
    protected static string $resource = CustomerResource::class;
}
