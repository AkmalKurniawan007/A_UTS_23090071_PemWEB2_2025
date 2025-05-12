<x-layouts.app :title="__('Create Product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl" class="text-white">Create New Product</flux:heading>
        <flux:subheading size="lg" class="mb-6 text-white">Fill the form below to create a new product</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <div class="overflow-hidden bg-gray-700 shadow sm:rounded-lg">
        <div class="px-4 py-5 sm:px-6">
            <h3 class="text-lg font-medium leading-6 text-white">Product Information</h3>
        </div>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="px-4 py-5 sm:p-6 bg-gray-700">
                <!-- Name Field -->
                <div class="mt-2">
                    <label for="name" class="block text-sm font-medium text-white">Product Name</label>
                    <input type="text" name="name" id="name" 
                        class="mt-1 block w-full rounded-md bg-gray-600 text-white border-gray-600 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-100" 
                        value="{{ old('name') }}" required>
                    @error('name') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Description Field -->
                <div class="mt-2">
                    <label for="description" class="block text-sm font-medium text-white">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="mt-1 block w-full rounded-md bg-gray-600 text-white border-gray-600 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                        required>{{ old('description') }}</textarea>
                    @error('description') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Price Field -->
                <div class="mt-2">
                    <label for="price" class="block text-sm font-medium text-white">Price</label>
                    <input type="number" name="price" id="price"
                        class="mt-1 block w-full rounded-md bg-gray-600 text-white border-white-600 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                        value="{{ old('price') }}" required step="0.01">
                    @error('price') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Stock Field -->
                <div class="mt-2">
                    <label for="stock" class="block text-sm font-medium text-white">Stock</label>
                    <input type="number" name="stock" id="stock"
                        class="mt-1 block w-full rounded-md bg-gray-600 text-white border-gray-600 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50"
                        value="{{ old('stock') }}" required>
                    @error('stock') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <!-- Image Upload Field -->
                <div class="mt-2">
                    <label for="image" class="block text-sm font-medium text-white">Product Image</label>
                    <input type="file" name="image" id="image"
                        class="mt-1 block w-full rounded-md bg-gray-600 text-white border-gray-600 shadow-sm focus:border-white focus:ring focus:ring-white focus:ring-opacity-50">
                    @error('image') <div class="text-red-500 text-sm mt-1">{{ $message }}</div> @enderror
                </div>

                <div class="mt-6">
                    <button type="submit"
                        class="inline-flex items-center px-4 py-2 bg-gray-600 border border-gray-300 rounded-md shadow-sm text-white hover:bg-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white">
                        Save Product
                    </button>
                </div>
            </div>
        </form>
    </div>
</x-layouts.app>
