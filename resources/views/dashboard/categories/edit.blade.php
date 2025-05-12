<x-layouts.app :title="__('Categories')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Product Categories</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage data Product
            Categories</flux:heading>
            <flux:separator variant="subtle" />
    </div>
    @if(session()->has('successMessage'))
    <flux:badge color="lime" class="mb-3
w-full">{{session()->get('successMessage')}}</flux:badge>
    @elseif(session()->has('errorMessage'))
    <flux:badge color="red" class="mb-3
wf-full">{{session()->get('errorMessage')}}</flux:badge>
    @endif
    <form action="{{ route('categories.update', $category->id) }}" method="post"
        enctype="multipart/form-data">
        @method('patch')
        @csrf

        <flux:input label="Name" name="name" value="{{ $category->name }}" class="mb-3" />
        <flux:input label="Slug" name="slug" value="{{ $category->slug }}" class="mb-3" />
        <flux:textarea label="Description" name="description" class="mb-3">{{
$category->description }}</flux:textarea>
        @if($category->image)
        <div class="mb-3">
            <img src="{{ Storage::url($category->image) }}" alt="{{ $category->name
}}" class="w-32 h-32 object-cover rounded">
        </div>
        @endif
        <flux:input type="file" label="Image" name="image" class="mb-3" />
        <flux:separator />
        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('categories.index') }}" variant="ghost"
                class="ml-3">Kembali</flux:link>
        </div>
    </form>
</x-layouts.app>

<x-layouts.app :title="__('Edit Product')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Edit Product</flux:heading>
        <flux:subheading size="lg" class="mb-6">Update product information</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        @method('PUT')

        <flux:input name="name" label="Product Name" required value="{{ old('name', $product->name) }}" />
        @error('name') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <flux:textarea name="description" label="Description">{{ old('description', $product->description) }}</flux:textarea>
        @error('description') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <flux:input type="number" name="price" label="Price" required value="{{ old('price', $product->price) }}" />
        @error('price') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <div>
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="h-20 mb-2 rounded">
            @endif
            <flux:input type="file" name="image" label="Change Image" />
        </div>
        @error('image') <flux:badge color="red">{{ $message }}</flux:badge> @enderror

        <flux:button type="submit" icon="pencil">Update Product</flux:button>
        <flux:link href="{{ route('products.index') }}" variant="outline" icon="arrow-left">Back</flux:link>
    </form>
</x-layouts.app>
