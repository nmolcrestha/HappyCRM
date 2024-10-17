<?php

namespace App\Filament\Pages;

use Faker\Provider\ar_EG\Text;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Pages\Page;

class Settings extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static ?string $navigationGroup = 'Settings';

    protected static ?string $navigationLabel = 'User Settings';

    protected static string $view = 'filament.pages.settings';

    public ?array $settings = [];

    public function __construct()
    {
        $this->settings = [
            'name' => auth()->user()->name,
            'email' => auth()->user()->email,
        ];
    }
    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Grid::make(2)
                    ->schema([
                        TextInput::make('name')
                            ->required(),

                        TextInput::make('email')
                            ->type('email')
                            ->unique(ignorable: auth()->user())
                            ->required(),
                    ])
            ])
            ->statePath('settings');
    }

    public function save()
    {
        $state = $this->form->getState();
        auth()->user()->update([
            'name' => $state['name'],
            'email' => $state['email'],
        ]);

        Notification::make()
            ->title('Settings updated successfully')
            ->success()
            ->send();
    }
}
