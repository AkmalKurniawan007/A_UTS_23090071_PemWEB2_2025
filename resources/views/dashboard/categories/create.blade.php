<x-layouts.app :title="__('Categories')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Product Categories</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product Categories</flux:heading>
            <flux:separator variant="subtle" />
    </div>
    @if(session()->has('successMessage'))
    <flux:badge color="lime" class="mb-3
w-full">{{session()->get('successMessage')}}</flux:badge>
    @elseif(session()->has('errorMessage'))
    <flux:badge color="red" class="mb-3
w-full">{{session()->get('errorMessage')}}</flux:badge>
    @endif
    <form action="{{ route('categories.store') }}" method="post"
        enctype="multipart/form-data">
        @csrf

        <flux:input label="Name" name="name" class="mb-3" />
        <flux:input label="Slug" name="slug" class="mb-3" />
        <flux:textarea label="Description" name="description" class="mb-3" />
        <flux:input type="file" label="Image" name="image" class="mb-3" />
        <flux:separator />
        <div class="mt-4">
            <flux:button type="submit" variant="primary">Simpan</flux:button>
            <flux:link href="{{ route('categories.index') }}" variant="ghost"
                class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>

<x-layouts.app :title="__('Add Product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Create a new product</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <flux:input name="name" label="Product Name" required value="{{ old('name') }}" />
        @error('name') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <flux:textarea name="description" label="Description" value="{{ old('description') }}" />
        @error('description') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <flux:input type="number" name="price" label="Price" required value="{{ old('price') }}" />
        @error('price') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <flux:input type="file" name="image" label="Product Image" />
        @error('image') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <flux:button type="submit" icon="check-circle">Save Product</flux:button>
        <flux:link href="{{ route('products.index') }}" variant="outline" icon="arrow-left">Back</flux:link>
    </form>
</x-layouts.app>
