<x-default-layout>
    <div class="py-11">

        <div class="flex items-center justify-between">
            <h1 class="md:text-3xl">Message de <strong>{{ $contact->name }}</strong></h1>
            <div class="flex flex-col md:flex-row items-center gap-4">

                <div x-data>
                    <a href="{{ route('admin.contacts.destroy', ['contact' => $contact]) }}"
                        @click.prevent="$refs.delete.submit()"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        Supprimer
                    </a>
                    <form x-ref="delete" action="{{ route('admin.contacts.destroy', ['contact' => $contact]) }}"
                        method="POST">
                        @csrf
                        @method('DELETE')
                    </form>
                </div>
                <button class="bg-indigo-500 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded">
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
