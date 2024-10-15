<?php

namespace App\Filament\Resources\AppointmentResource\Pages;

use App\Filament\Resources\AppointmentResource;
use App\Traits\IncludeAuthenticatedUser;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateAppointment extends CreateRecord
{
    use IncludeAuthenticatedUser;
    protected static string $resource = AppointmentResource::class;
}
