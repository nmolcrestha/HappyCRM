<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AppointmentResource\Pages;
use App\Filament\Resources\AppointmentResource\RelationManagers;
use App\Models\Appointment;
use App\Models\Customer;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AppointmentResource extends Resource
{
    protected static ?string $model = Appointment::class;

    protected static ?string $navigationIcon = 'heroicon-o-calendar-date-range';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('customer_id')
                    ->relationship(
                        name: 'customer',
                    )
                    ->getOptionLabelFromRecordUsing(fn(Customer $customer) => "$customer->first_name $customer->last_name")
                    ->searchable(['first_name', 'last_name',  'email'])
                    ->required(),
                Forms\Components\Select::make('service_id')
                    ->relationship(name: 'service')
                    ->getOptionLabelFromRecordUsing(fn(Service $service) => "$service->name")
                    ->searchable(['name'])
                    ->required(),
                Forms\Components\DateTimePicker::make('starts_at')
                    ->seconds(false)
                    ->required(),
                Forms\Components\DateTimePicker::make('ends_at')
                    ->seconds(false),
                Forms\Components\Toggle::make('is_confirmed')
                    ->required(),
                Forms\Components\Textarea::make('additional_notes')
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('customer.first_name')
                    ->label('First Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('customer.last_name')
                    ->label('Last Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('service.name')
                    ->label('Service Name')
                    ->sortable(),
                Tables\Columns\TextColumn::make('starts_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\TextColumn::make('ends_at')
                    ->dateTime()
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_confirmed')
                    ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAppointments::route('/'),
            'create' => Pages\CreateAppointment::route('/create'),
            'edit' => Pages\EditAppointment::route('/{record}/edit'),
        ];
    }
}
