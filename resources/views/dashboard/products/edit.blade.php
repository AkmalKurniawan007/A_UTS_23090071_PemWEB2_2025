<x-layouts.app :title="__('Edit Product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Update the product details below</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="overflow-hidden bg-gray-100 shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-black">Edit Product Information</h3>
        </div>

        <!-- Form untuk mengedit produk -->
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="px-4 py-5 sm:p-6">
                <!-- Nama Produk -->
                <div class="mt-2">
                    <label for="name" class="block text-sm font-medium text-black">Product Name</label>
                    <input type="text" name="name" id="name" class="mt-1 block w-full rounded-md border-black shadow-sm" value="{{ old('name', $product->name) }}" required>
                    @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Deskripsi Produk -->
                <div class="mt-2">
                    <label for="description" class="block text-sm font-medium text-black">Description</label>
                    <textarea name="description" id="description" rows="4" class="mt-1 block w-full rounded-md border-black shadow-sm" required>{{ old('description', $product->description) }}</textarea>
                    @error('description') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Harga Produk -->
                <div class="mt-2">
                    <label for="price" class="block text-sm font-medium text-black">Price</label>
                    <input type="number" step="0.01" name="price" id="price" class="mt-1 block w-full rounded-md border-black shadow-sm" value="{{ old('price', $product->price) }}" required>
                    @error('price') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Stok Produk -->
                <div class="mt-2">
                    <label for="stock" class="block text-sm font-medium text-black">Stock</label>
                    <input type="number" name="stock" id="stock" class="mt-1 block w-full rounded-md border-black shadow-sm" value="{{ old('stock', $product->stock) }}" required>
                    @error('stock') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Gambar Produk -->
                <div class="mt-2">
                    <label for="image" class="block text-sm font-medium text-black">Product Image</label>
                    <input type="file" name="image" id="image" class="mt-1 block w-full rounded-md border-black shadow-sm">
                    
                    <!-- Menampilkan gambar lama jika ada -->
                    @if($product->image)
                        <img src="{{ Storage::url($product->image) }}" alt="Current Image" class="mt-2 h-16 w-16 object-cover rounded">
                    @endif
                    @error('image') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" class="inline-flex items-center px-4 py-2 bg-white text-black border border-black rounded-md shadow hover:bg-gray-200">
                        Update Product
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
