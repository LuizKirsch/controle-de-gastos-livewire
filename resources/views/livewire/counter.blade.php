<div class="text-center">
    <h1 class="text-2xl font-bold">Contador Livewire</h1>
    <div class="mt-4">
        <button
            wire:click="decrement"
            class="bg-red-500 text-white px-4 py-2 rounded"
        >
            -
        </button>
        <span class="mx-4 text-lg font-semibold">{{ $count }}</span>
        <button
            wire:click="increment"
            class="bg-green-500 text-white px-4 py-2 rounded"
        >
            +
        </button>
    </div>
</div>
