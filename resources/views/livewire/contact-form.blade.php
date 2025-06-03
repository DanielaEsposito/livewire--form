<div class="container text-center p-6 max-w-md mx-auto">
    {{-- Form --}}
    <form wire:submit.prevent="save">
        <label for="name">Nome</label>
        <input id="name" type="text" wire:model="name" placeholder="Nome" class="border p-2 my-2 w-full rounded">

        <label for="email">Email</label>
        <input id="email" type="email" wire:model="email" placeholder="Email"
            class="border p-2 my-2 w-full rounded">

        <label for="phone">Numero</label>
        <input id="phone" type="text" wire:model="phone" placeholder="Telefono"
            class="border p-2 my-2 w-full rounded">

        <button type="submit"
            class=" border-indigo-500 border-2 hover:bg-indigo-500  text-white px-4 py-2 mt-4 rounded cursor-pointer">
            {{ $contactId ? 'Aggiorna' : 'Salva' }}
        </button>
    </form>

    {{-- Messaggio di conferma --}}
    @if (session()->has('message'))
        <div class="bg-green-500 text-white p-4 mt-6 rounded">
            {{ session('message') }}
        </div>
    @endif

    {{-- Visualizza il nuovo contatto solo se è stato appena creato --}}
    @if (session('message') === 'Contatto creato!')
        <h2 class="text-lg font-semibold text-white mt-6">Nuovo contatto creato:</h2>
        <div class="new-contact  p-4 rounded mt-2 text-left">
            <div class="mb-2">
                <strong>Nome:</strong> {{ $contact->name }}
            </div>
            <div class="mb-2">
                <strong>Email:</strong> {{ $contact->email }}
            </div>
            <div class="mb-2">
                <strong>Telefono:</strong> {{ $contact->phone }}
            </div>
            <div class="mb-2 text-center"><a href="/">Torna alla lista dei contatti </a></div>
        </div>
    @endif
</div>
