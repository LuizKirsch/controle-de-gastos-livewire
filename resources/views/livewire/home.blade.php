<div class="container mx-auto p-6">
    <h1 class="text-4xl font-semibold text-center text-gray-800 mb-4">{{ $message }}</h1>
    <p class="text-lg text-center text-gray-600 mb-6">Esta é a página inicial do seu site, feita com Livewire.</p>

    <div class="flex justify-center">
        <button wire:click="changeMessage" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full shadow-lg transition duration-300 ease-in-out">
            Clique para mudar a mensagem
        </button>
    </div>
</div>
