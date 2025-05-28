<div>
    {{-- Success is as dangerous as failure. --}}
    <ul class="list-none p-0 m-0">
        @foreach ($contacts as $contact)
            <li class="flex justify-between items-center p-2 border-b">
                <div>
                    <h5 class="text-white">{{ $contact->name }}</h5>
                    <p class="text-gray-700">{{ $contact->email }}</p>
                    <p class="text-gray-700">{{ $contact->phone }}</p>
                </div>
                <div class="flex justify-between">
                    <a class="inline-block p-2 border-2  border-indigo-500 rounded-md "
                        href="{{ route('form', $contact->id) }}">Modifica</a>
                </div>
        @endforeach
    </ul>
</div>
