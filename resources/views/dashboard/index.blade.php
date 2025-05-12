@php
    $title = 'Dashboard Produk';
@endphp

<x-layouts.app.sidebar :title="$title">
    <flux:main>
        <h1 class="text-xl font-bold mb-4">{{ $title }}</h1>

        <div class="overflow-x-auto">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead class="bg-gray-200">
                    <tr>
                        <th class="border p-2">Name</th>
                        <th class="border p-2">Price</th>
                        <th class="border p-2">Quantity</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $product)
                        <tr>
                            <td class="border p-2">{{ $product->name }}</td>
                            <td class="border p-2">{{ number_format($product->price, 2) }}</td>
                            <td class="border p-2">{{ $product->quantity }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="border p-2 text-center">Tidak ada data produk.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </flux:main>
</x-layouts.app.sidebar>
