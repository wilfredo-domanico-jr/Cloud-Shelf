<?php

use Livewire\Attributes\Layout;
use Livewire\Volt\Component;

new #[Layout('components.layouts.app')] class extends Component {

    public string $view = 'grid';
    public string $sortBy = 'name';

    public function setView($mode)
    {
        $this->view = $mode;
    }

    public function toggleSort()
    {
        $this->sortBy = ($this->sortBy === 'name') ? 'modified' : 'name';
    }

    public function with(): array
    {
        $files = [
            ['id' => 1, 'name' => 'Project Assets', 'type' => 'folder', 'size' => '—', 'modified' => 'Mar 25, 2026', 'owner' => 'me', 'shared' => ['AK', 'BR'], 'starred' => false],
            ['id' => 2, 'name' => 'Q1 Report.xlsx', 'type' => 'sheet', 'size' => '2.4 MB', 'modified' => 'Mar 24, 2026', 'owner' => 'me', 'shared' => [], 'starred' => true],
            ['id' => 3, 'name' => 'Product Roadmap.docx', 'type' => 'doc', 'size' => '1.1 MB', 'modified' => 'Mar 23, 2026', 'owner' => 'me', 'shared' => ['CR'], 'starred' => false],
            ['id' => 4, 'name' => 'Design Mockups', 'type' => 'folder', 'size' => '—', 'modified' => 'Mar 22, 2026', 'owner' => 'me', 'shared' => ['AK', 'BR', 'CR'], 'starred' => true],
            ['id' => 5, 'name' => 'hero-banner.png', 'type' => 'image', 'size' => '5.2 MB', 'modified' => 'Mar 20, 2026', 'owner' => 'me', 'shared' => [], 'starred' => false],
            ['id' => 6, 'name' => 'API Docs.pdf', 'type' => 'pdf', 'size' => '3.7 MB', 'modified' => 'Mar 19, 2026', 'owner' => 'me', 'shared' => ['BR'], 'starred' => false],
            ['id' => 7, 'name' => 'Demo Video.mp4', 'type' => 'video', 'size' => '128 MB', 'modified' => 'Mar 17, 2026', 'owner' => 'me', 'shared' => [], 'starred' => false],
            ['id' => 8, 'name' => 'Source Code.zip', 'type' => 'zip', 'size' => '22 MB', 'modified' => 'Mar 15, 2026', 'owner' => 'me', 'shared' => [], 'starred' => false],
            ['id' => 9, 'name' => 'index.js', 'type' => 'code', 'size' => '42 KB', 'modified' => 'Mar 14, 2026', 'owner' => 'me', 'shared' => [], 'starred' => false],
            ['id' => 10, 'name' => 'Meeting Notes.docx', 'type' => 'doc', 'size' => '0.8 MB', 'modified' => 'Mar 12, 2026', 'owner' => 'me', 'shared' => ['AK'], 'starred' => false],
            ['id' => 11, 'name' => 'logo-final.png', 'type' => 'image', 'size' => '1.2 MB', 'modified' => 'Mar 10, 2026', 'owner' => 'me', 'shared' => [], 'starred' => true],
            ['id' => 12, 'name' => 'Archive 2025', 'type' => 'folder', 'size' => '—', 'modified' => 'Feb 28, 2026', 'owner' => 'me', 'shared' => [], 'starred' => false],
        ];

        usort($files, function ($a, $b) {
            return strcmp($a[$this->sortBy], $b[$this->sortBy]);
        });

        return [
            'folders' => array_filter($files, fn($f) => $f['type'] === 'folder'),
            'onlyFiles' => array_filter($files, fn($f) => $f['type'] !== 'folder'),
            'emojis' => [
                'doc' => '📄',
                'sheet' => '📊',
                'image' => '🖼️',
                'pdf' => '📕',
                'video' => '🎬',
                'zip' => '🗜️',
                'code' => '💻'
            ],
            'colors' => [
                'doc' => 'bg-blue-100',
                'sheet' => 'bg-green-100',
                'image' => 'bg-purple-100',
                'pdf' => 'bg-red-100',
                'video' => 'bg-pink-100',
                'zip' => 'bg-orange-100',
                'code' => 'bg-slate-200',
            ]
        ];
    }
};
?>

<section class="w-full p-6">

    <x-my-drive.toolbar :sortBy="$sortBy" :view="$view" />

    <x-my-drive.file-section
        title="FOLDERS"
        :items="$folders"
        :emojis="['folder' => '📂']"
        :colors="['folder' => 'bg-yellow-200']" :view="$view" />

    <div class="my-8"></div>

    <x-my-drive.file-section
        title="FILES"
        :items="$onlyFiles"
        :emojis="$emojis"
        :colors="$colors" :view="$view" />
</section>