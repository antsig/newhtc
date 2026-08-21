<?php

namespace App\Filament\Pages;

use App\Models\Identitas;
use Filament\Forms\Components\RichEditor;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class ManageProfil extends Page implements HasForms
{
    use InteractsWithForms;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-building-office';
    }

    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Profil Lembaga';
    }

    public static function getNavigationLabel(): string
    {
        return 'Profil Lembaga';
    }
    
    protected string $view = 'filament.pages.manage-profil'; // we need to create this view or use a generic form view

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
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Sejarah')
                            ->schema([
                                RichEditor::make('sejarah')
                                    ->label('Sejarah Lembaga')
                                    ->fileAttachmentsDirectory('profil')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Visi & Misi')
                            ->schema([
                                RichEditor::make('visi_misi')
                                    ->label('Visi & Misi Lembaga')
                                    ->fileAttachmentsDirectory('profil')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Legalitas')
                            ->schema([
                                RichEditor::make('legalitas')
                                    ->label('Legalitas Lembaga')
                                    ->fileAttachmentsDirectory('profil')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Tim / Struktur')
                            ->schema([
                                RichEditor::make('tim')
                                    ->label('Tim atau Struktur Organisasi')
                                    ->fileAttachmentsDirectory('profil')
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
            ->title('Profil Berhasil Disimpan')
            ->success()
            ->send();
    }
}
