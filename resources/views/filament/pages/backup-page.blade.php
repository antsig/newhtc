<x-filament-panels::page>
    <div class="fi-ta-content bg-white ring-1 ring-gray-950/5 rounded-xl shadow-sm dark:bg-gray-900 dark:ring-white/10">
        <div class="p-4 sm:p-6 flex flex-col gap-y-1">
            <h2 class="text-base font-semibold leading-6 text-gray-950 dark:text-white">Daftar Backup Tersedia</h2>
            <p class="text-sm text-gray-500 dark:text-gray-400">Berikut adalah daftar file backup database yang tersedia di server.</p>
        </div>
        
        <div class="overflow-x-auto divide-y divide-gray-200 dark:divide-white/10">
            <table class="fi-ta-table w-full text-left divide-y divide-gray-200 dark:divide-white/5 table-auto">
                <thead class="bg-gray-50 dark:bg-white/5">
                    <tr>
                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6"><span class="text-sm font-semibold text-gray-950 dark:text-white">Nama File</span></th>
                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6"><span class="text-sm font-semibold text-gray-950 dark:text-white">Ukuran</span></th>
                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6"><span class="text-sm font-semibold text-gray-950 dark:text-white">Tanggal</span></th>
                        <th class="fi-ta-header-cell px-3 py-3.5 sm:first-of-type:ps-6 sm:last-of-type:pe-6 text-right"><span class="text-sm font-semibold text-gray-950 dark:text-white">Aksi</span></th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200 dark:divide-white/5 whitespace-nowrap">
                    @forelse($backups as $backup)
                    <tr class="fi-ta-row hover:bg-gray-50 dark:hover:bg-white/5 transition duration-75">
                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                <span class="text-sm font-medium text-gray-950 dark:text-white">{{ $backup['name'] }}</span>
                            </div>
                        </td>
                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $backup['size'] }}</span>
                            </div>
                        </td>
                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3">
                            <div class="fi-ta-text grid w-full gap-y-1 px-3 py-4">
                                <span class="text-sm text-gray-500 dark:text-gray-400">{{ $backup['date'] }}</span>
                            </div>
                        </td>
                        <td class="fi-ta-cell p-0 first-of-type:ps-1 last-of-type:pe-1 sm:first-of-type:ps-3 sm:last-of-type:pe-3 text-right">
                            <div class="px-3 py-4 flex justify-end gap-3">
                                <x-filament::button wire:click="downloadBackup('{{ $backup['path'] }}')" color="gray" size="sm" icon="heroicon-m-arrow-down-tray" outlined>Download</x-filament::button>
                                <x-filament::button wire:click="deleteBackup('{{ $backup['path'] }}')" color="danger" size="sm" icon="heroicon-m-trash" wire:confirm="Yakin ingin menghapus file backup ini?">Hapus</x-filament::button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="4" class="p-8 text-center text-gray-500 dark:text-gray-400">
                            <x-heroicon-o-server-stack style="width: 48px; height: 48px; margin: 0 auto 12px auto;" class="text-gray-400 dark:text-gray-500" />
                            <p class="font-medium text-gray-950 dark:text-white">Belum ada file backup yang tersedia.</p>
                            <p class="text-sm mt-1">Klik tombol "Buat Backup Baru" di atas untuk mem-backup database.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</x-filament-panels::page>
