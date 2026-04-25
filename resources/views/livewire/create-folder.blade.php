<?php

use Livewire\Volt\Component;
use App\Models\Folder;
use Illuminate\Support\Facades\Auth;

new class extends Component
{
    public $name = '';
    public $parent_id = null;

    public function mount()
    {
        $this->setContext();
    }

    private function setContext()
    {
        // Inside a folder page
        if (request()->routeIs('folders.show')) {
            $this->parent_id = request()->route('folder');
        }

        // Shared tab → always root
        elseif (request()->routeIs('shared')) {
            $this->parent_id = null;
        }

        // Home or fallback → root
        else {
            $this->parent_id = null;
        }
    }

    public function createFolder()
    {
        $this->validate([
            'name' => 'required|string|max:255',
        ]);

        $this->setContext(); // ensure latest context
        
        $exists = Folder::where('user_id', Auth::id())
            ->where('parent_id', $this->parent_id)
            ->where('name', $this->name)
            ->exists();

        if ($exists) {
            $this->addError('name', 'Folder already exists');
            return;
        }

        Folder::create([
            'user_id' => Auth::id(),
            'parent_id' => $this->parent_id,
            'name' => $this->name,
        ]);

        $this->reset('name');

        $this->dispatch('close-modal', name: 'create-folder');
        $this->dispatch('folder-created');

        return $this->redirect(url()->previous());
    }
};
?>

<form wire:submit.prevent="createFolder" class="space-y-6">
    <div>
        <flux:heading size="lg">Create New Folder</flux:heading>
        <flux:text class="mt-2">
            Give your folder a name to organize your files.
        </flux:text>
    </div>

    <flux:input
        label="Folder Name"
        placeholder="e.g. Projects"
        wire:model="name" />

    @error('name')
    <p class="text-red-500 text-sm">{{ $message }}</p>
    @enderror

    <div class="flex">
        <flux:spacer />
        <flux:button type="submit" variant="primary">
            Create Folder
        </flux:button>
    </div>
</form>