<div class="row">
            <h3>Categories</h3>
            @foreach($category as $category)
            <div class="col-md-3 mb-4">
                <div class="card">
                    <img src="{{ $category['image'] }}" class="card-img-top" alt="{{ $category['name'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $category['name'] }}</h5>
                        <p class="card-text">
                            {{ $category['description'] }}
                        </p>
                        <a href="/category/{{ $category['slug'] }}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>