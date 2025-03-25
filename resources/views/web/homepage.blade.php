<x-layout>
    <div class="hero">
        <h1>Welcome to Our Store</h1>
        <p>Discover the best products at the best prices.</p>
        <a href="#" class="btn btn-primary">Shop Now</a>
    </div>

    <div class="container mt-5">
        <h2 class="text-center mb-4">Featured Products</h2>
        <div class="row">
            <div class="col-md-4">
                <x-card 
                    title="Product 1" 
                    text="High-quality product with affordable price." 
                    image="https://source.unsplash.com/400x300/?clothing"
                />
            </div>
            <div class="col-md-4">
                <x-card 
                    title="Product 2" 
                    text="Stylish and comfortable footwear." 
                    image="https://source.unsplash.com/400x300/?shoes"
                />
            </div>
            <div class="col-md-4">
                <x-card 
                    title="Product 3" 
                    text="Trendy accessories for all occasions." 
                    image="https://source.unsplash.com/400x300/?accessories"
                />
            </div>
        </div>

        {{-- Alert Component --}}
        <x-alert type="success" message="Limited time offer! Grab your favorite items now." />
    </div>
</x-layout>
