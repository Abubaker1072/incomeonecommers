@php
    $images = [];
    if ($product->image_path) {
        $images[] = (strpos($product->image_path, 'http') === 0) ? $product->image_path : asset($product->image_path);
    }
    if ($product->relationLoaded('images')) {
        foreach ($product->images as $img) {
            $images[] = (strpos($img->path, 'http') === 0) ? $img->path : asset($img->path);
        }
    }
    // Fallback to defaults
    if (empty($images)) {
        $images = [
            asset('marketplace/img/product01.png'),
            asset('marketplace/img/product03.png'),
            asset('marketplace/img/product06.png'),
            asset('marketplace/img/product08.png'),
        ];
    }
@endphp

<div class="modal-header" style="border-bottom: 1px solid #E4E7ED; padding: 15px 30px;">
    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="font-size: 28px; font-weight: 500; color: #8D99AE; opacity: 0.8; outline: none; margin-top: -5px;">&times;</button>
    <h4 class="modal-title" id="quickviewModalLabel" style="font-weight: 700; color: #2B2D42; font-size: 18px; text-transform: uppercase;">Product Quick View</h4>
</div>
<div class="modal-body" style="padding: 30px;">
    <div class="row">
        <!-- Left Side: Product Images Carousel -->
        <div class="col-md-6" style="margin-bottom: 25px;">
            <div id="quickview-main-img" style="margin-bottom: 15px;">
                @foreach ($images as $imgUrl)
                <div class="product-preview">
                    <img src="{{ $imgUrl }}" alt="{{ $product->name }}" style="width: 100%; max-height: 350px; object-fit: contain; border-radius: 8px;">
                </div>
                @endforeach
            </div>
            
            <div id="quickview-imgs" class="row">
                @foreach ($images as $imgUrl)
                <div class="product-preview" style="cursor: pointer; padding: 0 5px; outline: none;">
                    <img src="{{ $imgUrl }}" alt="" style="width: 100%; height: 70px; object-fit: cover; border: 1px solid #E4E7ED; border-radius: 4px;">
                </div>
                @endforeach
            </div>
        </div>

        <!-- Right Side: Product Details -->
        <div class="col-md-6">
            <div class="product-details" style="padding-left: 10px;">
                <h2 class="product-name" style="font-size: 26px; font-weight: 700; margin-top: 0; margin-bottom: 15px; color: #2B2D42;">{{ $product->name }}</h2>
                
                <div style="margin-bottom: 15px; display: flex; align-items: center; gap: 10px;">
                    <div class="product-rating" style="color: #D10024; display: inline-flex; gap: 2px;">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star-o"></i>
                    </div>
                    <span style="font-size: 13px; color: #8D99AE;">10 Reviews | Add yours</span>
                </div>

                <div style="margin-bottom: 20px;">
                    <h3 class="product-price" style="color: #D10024; font-size: 26px; font-weight: 700; margin: 0; display: inline-block;">
                        ${{ number_format($product->price, 2) }}
                        <del class="product-old-price" style="font-size: 16px; font-weight: 500; color: #8D99AE; margin-left: 10px; text-decoration: line-through;">
                            ${{ number_format($product->price * 1.25, 2) }}
                        </del>
                    </h3>
                    <span class="product-available" style="color: #2b96cc; font-weight: 700; text-transform: uppercase; font-size: 11px; border: 1px solid #2b96cc; border-radius: 3px; padding: 2px 6px; margin-left: 15px; vertical-align: middle;">In Stock</span>
                </div>

                <p style="font-size: 14px; color: #555; line-height: 1.6; margin-bottom: 25px;">
                    {{ $product->description ?? 'Experience superior quality and premium build with this classic selection. Certified and verified for complete satisfaction, providing durability, functionality, and modern styling for everyday use.' }}
                </p>

                <div class="product-options" style="margin-bottom: 25px; border-top: 1px solid #F0F2F5; border-bottom: 1px solid #F0F2F5; padding: 15px 0;">
                    <label style="font-weight: 500; font-size: 14px; margin-right: 25px; display: inline-block;">
                        Size
                        <select class="input-select" style="margin-left: 10px; border-radius: 4px; border: 1px solid #E4E7ED; padding: 5px 12px; outline: none; font-size: 13px;">
                            <option value="0">Standard</option>
                            <option value="1">Medium</option>
                            <option value="2">Large</option>
                        </select>
                    </label>
                    <label style="font-weight: 500; font-size: 14px; display: inline-block;">
                        Color
                        <select class="input-select" style="margin-left: 10px; border-radius: 4px; border: 1px solid #E4E7ED; padding: 5px 12px; outline: none; font-size: 13px;">
                            <option value="0">Default</option>
                            <option value="1">Metallic Black</option>
                            <option value="2">Silver Satin</option>
                        </select>
                    </label>
                </div>

                <div class="add-to-cart" style="margin-bottom: 25px; display: flex; align-items: center; gap: 15px; flex-wrap: wrap;">
                    <div class="qty-label" style="font-weight: 700; text-transform: uppercase; font-size: 12px; display: flex; align-items: center; gap: 10px;">
                        Qty
                        <div class="input-number" style="width: 90px;">
                            <input type="number" class="qty-input-field" value="1" min="1" style="height: 40px; text-align: center; border-radius: 4px; border: 1px solid #E4E7ED; width: 100%; outline: none; font-weight: 700;">
                            <span class="qty-up-btn" style="position: absolute; right: 8px; top: 3px; cursor: pointer; user-select: none; font-size: 13px; font-weight: bold; color: #8D99AE; transition: color 0.2s;">+</span>
                            <span class="qty-down-btn" style="position: absolute; right: 8px; bottom: 3px; cursor: pointer; user-select: none; font-size: 13px; font-weight: bold; color: #8D99AE; transition: color 0.2s;">-</span>
                        </div>
                    </div>
                    <button class="add-to-cart-btn" style="background-color: #D10024; color: white; border: none; border-radius: 40px; padding: 12px 30px; font-weight: 700; text-transform: uppercase; font-size: 14px; transition: all 0.3s; outline: none; display: flex; align-items: center; gap: 8px; box-shadow: 0 4px 10px rgba(209, 0, 36, 0.2);">
                        <i class="fa fa-shopping-cart"></i> add to cart
                    </button>
                </div>

                <ul class="product-btns" style="margin-bottom: 20px; padding: 0; list-style: none; display: flex; gap: 20px; border-bottom: 1px solid #F0F2F5; padding-bottom: 15px;">
                    <li><a href="#" style="font-size: 13px; color: #2B2D42; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;"><i class="fa fa-heart-o" style="color: #D10024; font-size: 15px;"></i> add to wishlist</a></li>
                    <li><a href="#" style="font-size: 13px; color: #2B2D42; font-weight: 500; text-decoration: none; display: inline-flex; align-items: center; gap: 6px;"><i class="fa fa-exchange" style="color: #D10024; font-size: 15px;"></i> add to compare</a></li>
                </ul>

                <div style="font-size: 13px; color: #8D99AE; display: flex; flex-direction: column; gap: 8px;">
                    <div>
                        <strong style="color: #2B2D42; margin-right: 5px;">Category:</strong>
                        <a href="#" style="color: #8D99AE; text-decoration: none; transition: color 0.2s;">{{ $product->category->name ?? 'Accessories' }}</a>
                    </div>
                    <div style="display: flex; align-items: center; gap: 8px;">
                        <strong style="color: #2B2D42;">Share:</strong>
                        <a href="#" style="color: #8D99AE; font-size: 14px; transition: color 0.2s;"><i class="fa fa-facebook"></i></a>
                        <a href="#" style="color: #8D99AE; font-size: 14px; transition: color 0.2s;"><i class="fa fa-twitter"></i></a>
                        <a href="#" style="color: #8D99AE; font-size: 14px; transition: color 0.2s;"><i class="fa fa-google-plus"></i></a>
                        <a href="#" style="color: #8D99AE; font-size: 14px; transition: color 0.2s;"><i class="fa fa-envelope"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
