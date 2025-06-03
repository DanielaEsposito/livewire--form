<div>
    <div class="container text-center my-12 columns-3">
        <div class="name">

            <label class="block text-white mb-2 text-md" for="name">Cerca per nome</label>
            <input type="text" wire:model.live.debounce.200ms="searchName" name="name" placeholder="Cerca per nome..."
                class="rounded-md p-2 border-2 border-indigo-500 focus:bg-indigo-400/30 focus:outline-none focus  ">
        </div>
        <div class="phone">
            <label class="block text-white mb-2 text-md" for="phone">Cerca per numero</label>
            <input type="text" name="phone"wire:model.live.debounce.200ms="searchPhone"
                placeholder="Cerca per email..."
                class="rounded-md p-2 border-2 border-indigo-500  focus:bg-indigo-400/30 focus:outline-none focus ">
        </div>
        <div class="email">
            <label class="block text-white mb-2 text-md" for="email">Cerca per email</label>
            <input type="email" name="email"wire:model.live.debounce.200ms="searchEmail"
                placeholder="Cerca per email..."
                class="rounded-md p-2 border-2 border-indigo-500  focus:bg-indigo-400/30 focus:outline-none focus ">
        </div>
    </div>
    <div class="container">
        <a class=" inline-block border-2 cursor-pointer text-white hover:bg-indigo-500 border-indigo-500 rounded-md mb-3 p-2"
            href="{{ route('form') }}"> <i class="fa-solid fa-user-plus "></i> Nuovo Contatto
        </a>
    </div>
    <ul class="list-none p-0 m-0">
        @foreach ($contacts as $contact)
            <li class="flex justify-between items-center p-2 border-b">
                <div class="info flex justify-between ">
                    <div class="favourite flex me-3 items-center">
                        @if ($contact->favourite)
                            <i class="fa-solid fa-star text-indigo-500"></i>
                        @else
                            <i class="fa-regular fa-star text-gray-400"></i>
                        @endif

                    </div>

                    <div>
                        <h5 class="text-white">{{ $contact->name }}</h5>
                        <p class="text-gray-700">{{ $contact->email }}</p>
                        <p class="text-gray-700">{{ $contact->phone }}</p>
                    </div>
                </div>
                <div class="flex justify-between">
                    <a class="inline-block cursor-pointer hover:bg-indigo-500 p-2 border-2 text-white border-indigo-500 rounded-md"
                        href="{{ route('form', $contact->id) }}">Modifica</a>
                    <button wire:confirm="Sei sicuro di voler eliminare questo contatto?"
                        wire:click="delete({{ $contact->id }})"
                        class="mx-2 border-2 cursor-pointer hover:bg-indigo-500 text-white border-indigo-500 rounded-md p-2">
                        Elimina
                    </button>
                </div>
            </li>
        @endforeach
    </ul>
</div>
