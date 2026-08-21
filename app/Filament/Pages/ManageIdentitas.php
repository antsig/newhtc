<?php

namespace App\Filament\Pages;

use App\Models\Identitas;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Components\Tabs;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Schemas\Schema;
use Filament\Pages\Page;
use Filament\Notifications\Notification;

class ManageIdentitas extends Page implements HasForms
{
    use InteractsWithForms;

    public static function getNavigationIcon(): string|\BackedEnum|null
    {
        return 'heroicon-o-cog-6-tooth';
    }
    
    public static function getNavigationSort(): ?int
    {
        return 2;
    }
    
    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Pengaturan Identitas Web';
    }

    public static function getNavigationLabel(): string
    {
        return 'Identitas Website';
    }
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

    public function form(Schema $form): Schema
    {
        return $form
            ->schema([
                Tabs::make('Tabs')
                    ->tabs([
                        Tabs\Tab::make('Sejarah')
                            ->schema([
                                \Filament\Forms\Components\RichEditor::make('sejarah')
                                    ->label('Sejarah Lembaga')
                                    ->fileAttachmentsDirectory('profil')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Visi & Misi')
                            ->schema([
                                \Filament\Forms\Components\RichEditor::make('visi_misi')
                                    ->label('Visi & Misi Lembaga')
                                    ->fileAttachmentsDirectory('profil')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Legalitas')
                            ->schema([
                                \Filament\Forms\Components\RichEditor::make('legalitas')
                                    ->label('Legalitas Lembaga')
                                    ->fileAttachmentsDirectory('profil')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Tim / Struktur')
                            ->schema([
                                \Filament\Forms\Components\RichEditor::make('tim')
                                    ->label('Tim atau Struktur Organisasi')
                                    ->fileAttachmentsDirectory('profil')
                                    ->columnSpanFull(),
                            ]),
                        Tabs\Tab::make('Identitas Web')
                            ->schema([
                                TextInput::make('nama_website')
                                    ->required(),
                                TextInput::make('url')
                                    ->url()
                                    ->required(),
                                FileUpload::make('logo')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('identitas'),
                                FileUpload::make('favicon')
                                    ->image()
                                    ->imageEditor()
                                    ->directory('identitas'),
                                Textarea::make('meta_deskripsi')
                                    ->rows(15)
                                    ->columnSpanFull(),
                                Textarea::make('meta_keyword')
                                    ->rows(15)
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

