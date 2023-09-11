<x-default-layout>
    <div class="py-11 text-left">

        <div class="flex items-center justify-between">
            <h1 class="md:text-3xl text-left">Message de <strong>{{ $contact->name }}</strong></h1>
            <div class="flex flex-col md:flex-row items-center gap-4">

                <div x-data class="ml-1">
                    <a href="{{ route('admin.contacts.destroy', ['contact' => $contact]) }}"
                        @click.prevent="$refs.delete.submit()"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold md:py-2 md:px-4  px-2 py-1 rounded text-sm">
                        Supprimer
                    </a>
                    <form x-ref="delete" action="{{ route('admin.contacts.destroy', ['contact' => $contact]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <button
                    class="bg-amber-500 hover:bg-amber-600 text-white font-bold md:py-2 md:px-4 px-2 py-1 rounded text-sm">
                    <a href="{{ route('admin.contacts.index') }}">Retour</a>
                </button>
            </div>

        </div>
        <div class="mt-5 flex flex-col gap-2 items-start justify-start">
            <p>email: <strong>{{ $contact->email }}</strong></p>
            <p>Téléphone: <strong>{{ $contact->phone }}</strong></p>
            <p>Message: <strong>{{ $contact->subject }}</strong></p>
        </div>
    </div>

</x-default-layout>
