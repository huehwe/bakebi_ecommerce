<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="text-2xl font-bold mb-4">Orders</h2>

                    <div class="overflow-x-auto">
                        <table class="min-w-full table-auto">
                            <thead>
                                <tr class="bg-gray-100">
                                    <th class="px-4 py-2">ID</th>
                                    <th class="px-4 py-2">Customer</th>
                                    <th class="px-4 py-2">Total</th>
                                    <th class="px-4 py-2">Status</th>
                                    <th class="px-4 py-2">Payment</th>
                                    <th class="px-4 py-2">Date</th>
                                    <th class="px-4 py-2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td class="border px-4 py-2">#{{ $order->id }}</td>
                                        <td class="border px-4 py-2">{{ $order->user->name }}</td>
                                        <td class="border px-4 py-2">${{ number_format($order->total_price, 2) }}</td>
                                        <td class="border px-4 py-2">{{ $order->status->value }}</td>
                                        <td class="border px-4 py-2">{{ $order->payment_status->value }}</td>
                                        <td class="border px-4 py-2">{{ $order->created_at->format('Y-m-d H:i') }}</td>
                                        <td class="border px-4 py-2">
                                            <a href="{{ route('admin.orders.view', $order) }}" 
                                               class="text-blue-600 hover:text-blue-900">View</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $orders->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>