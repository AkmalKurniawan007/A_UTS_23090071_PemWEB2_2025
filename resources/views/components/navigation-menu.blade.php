<div class="space-y-1">
    <x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
        {{ __('Manajemen Produk') }}
    </x-nav-link>
</div>
<!-- Dashboard -->
<x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
    {{ __('Dashboard') }}
</x-nav-link>

<!-- Produk -->
<x-nav-link :href="route('products.index')" :active="request()->routeIs('products.*')">
    {{ __('Produk') }}
</x-nav-link>