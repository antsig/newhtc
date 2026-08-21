<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Actions\Action;
use Filament\Support\Icons\Heroicon;
use Illuminate\Support\Facades\Artisan;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class BackupPage extends Page
{
    public static function getNavigationIcon(): string|null
    {
        return 'heroicon-o-server-stack';
    }

    public static function getNavigationGroup(): ?string
    {
        return 'Sistem';
    }

    public static function getNavigationLabel(): string
    {
        return 'Backup Database & File';
    }

    public function getTitle(): string | \Illuminate\Contracts\Support\Htmlable
    {
        return 'Sistem Backup';
    }
    
    protected string $view = 'filament.pages.backup-page';

    public $backups = [];

    public function mount()
    {
        $this->loadBackups();
    }

    public function loadBackups()
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0] ?? 'local');
        $name = config('backup.backup.name');
        
        $files = $disk->allFiles($name);
        
        $this->backups = array_map(function ($file) use ($disk) {
            return [
                'path' => $file,
                'name' => basename($file),
                'size' => round($disk->size($file) / 1048576, 2) . ' MB',
                'date' => \Carbon\Carbon::createFromTimestamp($disk->lastModified($file))->format('d M Y H:i:s'),
            ];
        }, array_reverse($files));
    }

    protected function getHeaderActions(): array
    {
        return [
            Action::make('createBackup')
                ->label('Buat Backup Baru')
                ->icon('heroicon-o-play')
                ->color('primary')
                ->requiresConfirmation()
                ->action(function () {
                    try {
                        Artisan::call('backup:run', ['--only-db' => true]);
                        $this->loadBackups();
                        
                        Notification::make()
                            ->title('Backup Berhasil Dibuat')
                            ->success()
                            ->send();
                    } catch (\Exception $e) {
                        Notification::make()
                            ->title('Gagal Membuat Backup')
                            ->body($e->getMessage())
                            ->danger()
                            ->send();
                    }
                }),
        ];
    }

    public function downloadBackup($path)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0] ?? 'local');
        return response()->download($disk->path($path));
    }

    public function deleteBackup($path)
    {
        $disk = Storage::disk(config('backup.backup.destination.disks')[0] ?? 'local');
        $disk->delete($path);
        
        $this->loadBackups();
        
        Notification::make()
            ->title('Backup Dihapus')
            ->success()
            ->send();
    }
}
