<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Product List</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage your product data</flux:subheading>
        <flux:separator variant="subtle" />
    </div>
    <div class="flex justify-between items-center mb-4">
        <div>
            <form action="{{ route('products.index') }}" method="get">
                @csrf
                <flux:input icon="magnifying-glass" name="q" value="{{ $q }}" placeholder="Search Products" />
            </form>
        </div>
        <div>
            <flux:button icon="plus">
                <flux:link href="{{ route('products.create') }}" variant="subtle">Add New Product</flux:link>
            </flux:button>
        </div>
    </div>

    @if(session()->has('successMessage'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session()->get('successMessage') }}</flux:badge>
    @endif

    <div class="overflow-x-auto bg-gray-100 p-4 rounded-lg shadow">
        <table class="min-w-full leading-normal bg-gray-100 rounded">
            <thead>
                <tr>
                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">ID</th>
                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Image</th>
                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Name</th>
                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Price</th>
                    <th class="px-5 py-3 border-b-2 border-gray-300 bg-gray-200 text-left text-xs font-semibold text-gray-700 uppercase tracking-wider">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="bg-gray-100 hover:bg-gray-200 transition">
                        <td class="px-5 py-5 border-b border-gray-300 text-sm text-gray-800">{{ $product->id }}</td>
                        <td class="px-5 py-5 border-b border-gray-300 text-sm">
                            @if($product->image)
                            <img src="{{ asset('storage/' . $product->image) }}"
     alt="{{ $product->name }}"
     class="h-10 w-10 object-cover rounded cursor-pointer"
     onclick="showImageModal('{{ asset('storage/' . $product->image) }}')">

                            @else
                                <span class="text-gray-500 text-sm">No Image</span>
                            @endif
                        </td>
                        <td class="px-5 py-5 border-b border-gray-300 text-sm text-gray-800">{{ $product->name }}</td>
                        <td class="px-5 py-5 border-b border-gray-300 text-sm text-gray-800">{{ $product->price }}</td>
                        <td class="px-5 py-5 border-b border-gray-300 text-sm">
                            <flux:dropdown>
                                <flux:button icon="chevron-down">Actions</flux:button>
                                <flux:menu>
                                    <flux:menu.item icon="pencil" href="{{ route('products.edit', $product->id) }}">Edit</flux:menu.item>
                                    <flux:menu.item icon="trash" variant="danger" onclick="event.preventDefault(); if(confirm('Are you sure you want to delete this product?')) document.getElementById('delete-form-{{ $product->id }}').submit();">Delete</flux:menu.item>
                                    <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </flux:menu>
                            </flux:dropdown>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>



        <div class="mt-3">
            {{ $products->links() }}
        </div>
    </div>

    <!-- Image Modal -->
<!-- Image Modal -->




</x-layouts.app>
<!-- Image Modal -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 hidden">
    <img id="modalImage" src="" class="max-h-[90vh] max-w-[90vw] rounded shadow-lg border-4 border-white">
    
    <!-- Tombol close -->
    <button onclick="closeImageModal()"
        class="absolute top-4 right-6 text-red-600 hover:text-red-800 text-5xl font-extrabold transition duration-200">
        &times;
    </button>
</div>

<script>
    function showImageModal(src) {
        document.getElementById('modalImage').src = src;
        document.getElementById('imageModal').classList.remove('hidden');
    }

    function closeImageModal() {
        document.getElementById('imageModal').classList.add('hidden');
    }
</script>