<?php

namespace App\Filament\Pages;

use App\Models\Identitas;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class ManageKontak extends Page implements HasForms
{
    use InteractsWithForms;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-phone';
    }

    public static function getNavigationSort(): ?int
    {
        return 8;
    }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Pengaturan Kontak';
    }

    public static function getNavigationLabel(): string
    {
        return 'Kontak';
    }
    protected string $view = 'filament.pages.manage-kontak';

    public ?array $data = [];

    public function mount(): void
    {
        $identitas = Identitas::first();
        if ($identitas) {
            $this->form->fill($identitas->toArray());
        } else {
            $this->form->fill();
        }
    }

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                TextInput::make('email')
                    ->label('Email address')
                    ->email(),
                TextInput::make('no_telp')
                    ->tel()
                    ->label('Nomor Telepon / WhatsApp'),
                TextInput::make('rekening')
                    ->label('Rekening Bank'),
                \Filament\Forms\Components\Repeater::make('sosmed')
                    ->label('Media Sosial')
                    ->schema([
                        TextInput::make('name')->label('Nama (misal: Facebook, Instagram)')->required(),
                        TextInput::make('url')->url()->required(),
                    ])
                    ->columns(2)
                    ->columnSpanFull(),
                Textarea::make('maps')
                    ->label('Google Maps (Iframe / Embed)')
                    ->columnSpanFull(),
            ])->columns(2)
            ->statePath('data');
    }

    public function save(): void
    {
        $identitas = Identitas::first() ?? new Identitas();
        $identitas->fill($this->form->getState());
        $identitas->save();

        Notification::make()
            ->title('Kontak Berhasil Disimpan')
            ->success()
            ->send();
    }
}

