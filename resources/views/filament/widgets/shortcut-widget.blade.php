<x-filament-widgets::widget>
    <x-filament::section>
        <style>
            .htc-grid { display: grid; grid-template-columns: repeat(3, minmax(0, 1fr)); gap: 0.75rem; }
            @media (min-width: 768px) { .htc-grid { grid-template-columns: repeat(6, minmax(0, 1fr)); gap: 1rem; } }
            .htc-card { display: flex; flex-direction: column; align-items: center; justify-content: center; padding: 1.25rem; background-color: #ffffff; border-radius: 0.75rem; box-shadow: 0 1px 2px 0 rgba(0,0,0,0.05); border: 1px solid #e5e7eb; transition: all 0.2s; text-decoration: none; position: relative; overflow: hidden; }
            .htc-card:hover { box-shadow: 0 4px 6px -1px rgba(0,0,0,0.1); border-color: #074174; }
            .htc-icon-wrap { padding: 0.625rem; border-radius: 9999px; margin-bottom: 0.5rem; transition: transform 0.2s; display: flex; align-items: center; justify-content: center; }
            .htc-card:hover .htc-icon-wrap { transform: scale(1.1); }
            .htc-text { font-size: 0.75rem; font-weight: 600; color: #374151; text-align: center; }
            
            /* Dark mode */
            .dark .htc-card { background-color: #1f2937; border-color: #374151; }
            .dark .htc-text { color: #e5e7eb; }
            
            /* Specific colors */
            .c-primary { color: #0ea5e9; } .bg-primary { background-color: rgba(14, 165, 233, 0.1); }
            .c-success { color: #10b981; } .bg-success { background-color: rgba(16, 185, 129, 0.1); }
            .c-warning { color: #f59e0b; } .bg-warning { background-color: rgba(245, 158, 11, 0.1); }
            .c-info { color: #6366f1; } .bg-info { background-color: rgba(99, 102, 241, 0.1); }
            .c-danger { color: #ef4444; } .bg-danger { background-color: rgba(239, 68, 68, 0.1); }
            .c-purple { color: #8b5cf6; } .bg-purple { background-color: rgba(139, 92, 246, 0.1); }
        </style>

        <div style="display: flex; align-items: center; gap: 8px; margin-bottom: 16px;">
            <x-heroicon-o-bolt style="width: 20px; height: 20px; color: #0ea5e9;" />
            <h2 style="font-size: 1rem; font-weight: bold; margin: 0;">Pintasan Aksi Cepat</h2>
        </div>
        
        <div class="htc-grid">
            <a href="{{ url('admin/beritas/create') }}" class="htc-card">
                <div class="htc-icon-wrap bg-primary c-primary">
                    <x-heroicon-o-pencil-square style="width: 28px; height: 28px;" />
                </div>
                <span class="htc-text">Tulis Berita</span>
            </a>
            
            <a href="{{ url('admin/agendas/create') }}" class="htc-card">
                <div class="htc-icon-wrap bg-success c-success">
                    <x-heroicon-o-calendar style="width: 28px; height: 28px;" />
                </div>
                <span class="htc-text">Tambah Agenda</span>
            </a>
            
            <a href="{{ url('admin/layanans') }}" class="htc-card">
                <div class="htc-icon-wrap bg-danger c-danger">
                    <x-heroicon-o-briefcase style="width: 28px; height: 28px;" />
                </div>
                <span class="htc-text">Kelola Layanan</span>
            </a>

            <a href="{{ url('admin/menus') }}" class="htc-card">
                <div class="htc-icon-wrap bg-purple c-purple">
                    <x-heroicon-o-bars-3-bottom-right style="width: 28px; height: 28px;" />
                </div>
                <span class="htc-text">Kelola Menu</span>
            </a>
            


            <a href="{{ url('admin/manage-profil') }}" class="htc-card">
                <div class="htc-icon-wrap bg-info c-info">
                    <x-heroicon-o-building-office style="width: 28px; height: 28px;" />
                </div>
                <span class="htc-text">Edit Profil</span>
            </a>

            <a href="{{ url('admin/backup-page') }}" class="htc-card">
                <div class="htc-icon-wrap bg-danger c-danger">
                    <x-heroicon-o-server-stack style="width: 24px; height: 24px;" />
                </div>
                <span class="htc-text">Backup Data</span>
            </a>
        </div>
    </x-filament::section>
</x-filament-widgets::widget>
