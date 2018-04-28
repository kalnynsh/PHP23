<div class="products">      
    <div class="products__item">
        <img width="100%" 
            src="/images/products/<?php echo 'item-2' . $product->image_id . '.jpg'; ?>" 
                alt="image">
            <div class="product-description">
                <p>
                    <?php echo $product->product_name; ?>
                    <?php echo $product->color; ?>
                </p>
                <p>Цена: <?php echo $product->price; ?> руб.</p>
                <p>Количество: <?php echo $product->amount; ?> шт.</p>
            </div>
    </div>
</div>
