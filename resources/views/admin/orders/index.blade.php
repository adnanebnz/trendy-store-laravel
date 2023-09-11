<x-default-layout title="ادارة الطلبات">
    <div class="flex items-center justify-end">
        <div class="sm:flex-auto">
            <h1 class="text-base font-semibold leading-6 text-gray-900">الطلبات</h1>
            <p class="mt-2 text-sm text-gray-700">واجهة الإدارة</p>
        </div>
    </div>
    <div class="mt-6 md:mt-14 flow-root text-left">
        <div class="-mx-4 -my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 align-middle sm:px-6 lg:px-8">
                <table class="min-w-full divide-y divide-gray-300">
                    <thead>
                        <tr>
                            <th scope="col"
                                class="py-3.5 pl-4 pr-3 text-left text-sm font-semibold text-gray-900 sm:pl-3">الاسم
                                واللقب</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">
                                رقم الهاتف</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">السعر
                                الإجمالي</th>
                            <th scope="col" class="px-3 py-3.5 text-left text-sm font-semibold text-gray-900">الحالة
                            </th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                            <th scope="col" class="relative py-3.5 pl-3 pr-4 sm:pr-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach ($orders as $order)
                            <tr class="even:bg-gray-50">
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    {{ $order->name }}</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    {{ $order->phone }}</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    {{ $order->total_price }}</td>
                                <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-3">
                                    @if ($order->status->value == 'pending')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-yellow-100 text-yellow-800">
                                            في انتظار المعالجة
                                        </span>
                                    @endif
                                    @if ($order->status->value == 'processing')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-blue-100 text-blue-800">
                                            يتم معالجتها
                                        </span>
                                    @endif
                                    @if ($order->status->value == 'shipped')
                                        <span
                                            class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                            تم تسليم الطلب
                                        </span>
                                    @endif
                                </td>


                                <td class="whitespace-nowrap px-3 py-4 text-sm text-gray-500">
                                    <a href="{{ route('admin.orders.edit', ['order' => $order]) }}"
                                        class="text-amber-600 hover:text-amber-700">
                                        أظهر / تعديل
                                    </a>
                                </td>
                                <td x-data
                                    class="relative whitespace-nowrap py-4 pl-3 pr-4 text-right text-sm font-medium sm:pr-3">
                                    <a href="{{ route('admin.orders.destroy', ['order' => $order]) }}"
                                        @click.prevent="$refs.delete.submit()"
                                        class="text-amber-600 hover:text-amber-700">
                                        حذف
                                    </a>
                                    <form x-ref="delete"
                                        action="{{ route('admin.orders.destroy', ['order' => $order]) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-default-layout>
