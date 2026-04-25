<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    @include('partials.head')
</head>






<body class="min-h-screen bg-white dark:bg-zinc-800">
    <flux:sidebar sticky stashable class="border-r border-zinc-200 bg-zinc-50 dark:border-zinc-700 dark:bg-zinc-900">
        <flux:sidebar.toggle class="lg:hidden" icon="x-mark" />

        <a href="{{ route('home') }}" class="mr-5 flex items-center space-x-2" wire:navigate>
            <x-app-logo class="size-8" href="#"></x-app-logo>
        </a>




        <flux:dropdown>


            <flux:button variant="primary" class="w-full"><svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                </svg>New</flux:button>

            <flux:menu>
                <flux:modal.trigger name="create-folder">
                    <flux:menu.item icon="folder-plus" icon:variant="outline">
                        New Folder
                    </flux:menu.item>
                </flux:modal.trigger>
                <flux:menu.separator />

                <flux:menu.item icon="arrow-up-on-square" icon:variant="outline">File Upload</flux:menu.item>
                <flux:menu.item icon="arrow-up-on-square-stack" icon:variant="outline">Folder Upload</flux:menu.item>
            </flux:menu>
        </flux:dropdown>


        <!---- CREATE NEW FOLDER (START) ---->
        <flux:modal name="create-folder" :dismissible="false" class="md:w-96">
            <livewire:create-folder />
        </flux:modal>
        <!---- CREATE NEW FOLDER (END) ---->

        <flux:navlist variant="outline">

            <flux:navlist.group heading="Main" class="grid">
                <flux:navlist.item icon="home" :href="route('home')" :current="request()->routeIs('home')" wire:navigate>
                    Home
                </flux:navlist.item>

                <flux:navlist.item icon="inbox" :href="route('my-drive')" :current="request()->routeIs('my-drive')" wire:navigate>
                    My Drive
                </flux:navlist.item>


                <flux:navlist.item icon="clock" :href="route('recent')" :current="request()->routeIs('recent')" wire:navigate>
                    Recent
                </flux:navlist.item>

                <flux:navlist.item icon="users" wire:navigate>
                    Shared with me
                </flux:navlist.item>
            </flux:navlist.group>

            <flux:navlist.group heading="System" class="grid">
                <flux:navlist.item icon="star" wire:navigate>
                    Starred
                </flux:navlist.item>

                <flux:navlist.item icon="exclamation-triangle" wire:navigate>
                    Spam
                </flux:navlist.item>

                <flux:navlist.item icon="trash" wire:navigate>
                    Trash
                </flux:navlist.item>
            </flux:navlist.group>

        </flux:navlist>



        <flux:spacer />

        <flux:navlist variant="outline">
            <flux:navlist.item icon="folder-git-2" href="https://github.com/laravel/livewire-starter-kit" target="_blank">
                Repository
            </flux:navlist.item>

            <flux:navlist.item icon="book-open-text" href="https://laravel.com/docs/starter-kits" target="_blank">
                Documentation
            </flux:navlist.item>
        </flux:navlist>

        <!-- Desktop User Menu -->
        <flux:dropdown position="bottom" align="start">
            <flux:profile
                :name="auth()->user()->name"
                :initials="auth()->user()->initials()"
                :avatar="auth()->user()->socialAvatar()"
                icon-trailing="chevrons-up-down" />

            <flux:menu class="w-[220px]">
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">

                                @if ($avatar = auth()->user()->socialAvatar())
                                <img src="{{ $avatar }}" class="h-full w-full object-cover rounded-lg">
                                @else
                                {{ auth()->user()->initials() }}
                                @endif
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:sidebar>

    <!-- Mobile User Menu -->
    <flux:header class="lg:hidden">
        <flux:sidebar.toggle class="lg:hidden" icon="bars-2" inset="left" />

        <flux:spacer />

        <flux:dropdown position="top" align="end">
            <flux:profile
                :initials="auth()->user()->initials()"
                icon-trailing="chevron-down" />

            <flux:menu>
                <flux:menu.radio.group>
                    <div class="p-0 text-sm font-normal">
                        <div class="flex items-center gap-2 px-1 py-1.5 text-left text-sm">
                            <span class="relative flex h-8 w-8 shrink-0 overflow-hidden rounded-lg">
                                <span
                                    class="flex h-full w-full items-center justify-center rounded-lg bg-neutral-200 text-black dark:bg-neutral-700 dark:text-white">
                                    {{ auth()->user()->initials() }}
                                </span>
                            </span>

                            <div class="grid flex-1 text-left text-sm leading-tight">
                                <span class="truncate font-semibold">{{ auth()->user()->name }}</span>
                                <span class="truncate text-xs">{{ auth()->user()->email }}</span>
                            </div>
                        </div>
                    </div>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <flux:menu.radio.group>
                    <flux:menu.item href="/settings/profile" icon="cog" wire:navigate>Settings</flux:menu.item>
                </flux:menu.radio.group>

                <flux:menu.separator />

                <form method="POST" action="{{ route('logout') }}" class="w-full">
                    @csrf
                    <flux:menu.item as="button" type="submit" icon="arrow-right-start-on-rectangle" class="w-full">
                        {{ __('Log Out') }}
                    </flux:menu.item>
                </form>
            </flux:menu>
        </flux:dropdown>
    </flux:header>

    {{ $slot }}

    @fluxScripts
</body>

</html>