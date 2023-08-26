<x-default-layout>
    <form action="{{ route('admin.orders.update', ['order' => $order]) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <h1 class="text-base font-semibold leading-7 text-gray-900">
                    {{ 'Modifier la commande' }}
                </h1>

                <div class="mt-10 space-y-8 md:w-2/3">
                    {{-- TODO SHOW PRODUCT --}}
                    {{-- TODO SHOW ORDER DETAILS --}}
                    {{-- TODO SHOW SELECT TO CHANGE STATUS --}}
                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <button type="submit"
                class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                Mettre à jour
            </button>
        </div>
    </form>
</x-default-layout>
