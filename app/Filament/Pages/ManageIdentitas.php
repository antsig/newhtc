<?php

namespace App\Filament\Pages;

use App\Models\Identitas;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Form;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class ManageIdentitas extends Page implements HasForms
{
    use InteractsWithForms;

    protected static string|\BackedEnum|null $navigationIcon = 'heroicon-o-cog-6-tooth';
    protected static string|\UnitEnum|null $navigationGroup = 'Pengaturan Web';
    protected static ?string $title = 'Pengaturan Identitas Web';
    protected static ?string $navigationLabel = 'Identitas Website';
    protected string $view = 'filament.pages.manage-identitas';

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

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Informasi Umum')
                            ->schema([
                                TextInput::make('nama_website')
                                    ->required(),
                                TextInput::make('url')
                                    ->url()
                                    ->required(),
                                FileUpload::make('favicon')
                                    ->image()
                                    ->directory('identitas'),
                            ]),
                        Tabs\Tab::make('Kontak & Sosial Media')
                            ->schema([
                                TextInput::make('email')
                                    ->label('Email address')
                                    ->email()
                                    ->required(),
                                TextInput::make('no_telp')
                                    ->tel(),
                                TextInput::make('facebook')
                                    ->url(),
                                TextInput::make('rekening'),
                                Textarea::make('maps')
                                    ->columnSpanFull(),
                            ])->columns(2),
                        Tabs\Tab::make('SEO & Meta')
                            ->schema([
                                Textarea::make('meta_deskripsi')
                                    ->columnSpanFull(),
                                Textarea::make('meta_keyword')
                                    ->columnSpanFull(),
                            ]),
                    ])->columnSpanFull()
            ])
            ->statePath('data');
    }

    public function save(): void
    {
        $identitas = Identitas::first() ?? new Identitas();
        $identitas->fill($this->form->getState());
        $identitas->save();

        Notification::make()
            ->title('Pengaturan Berhasil Disimpan')
            ->success()
            ->send();
    }
}
