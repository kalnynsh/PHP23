<div class="greeting">
    <?php if ($usename) : ?>
        Добро пожаловать <?php echo ucfirst(($usename)); ?>
    <?php endif; ?>
</div>
<div class="products">
    <?php foreach ($products as $product) : ?>        
        <div class="products__item">
            <a href="/product.php?id=<?php echo $product['product_id']; ?>">
                <img width="200" 
                    src="/images/products_small/<?php echo $product['image_name']; ?>" 
                    alt="image">
                <div class="product-description">
                    <p><?php echo $product['product_name']; ?></p>
                    <p><?php echo $product['color']; ?></p>
                    <p>Цена: <?php echo $product['price']; ?>руб.</p>
                </div>
            </a>
        </div>               
    <?php endforeach; ?>
</div>
