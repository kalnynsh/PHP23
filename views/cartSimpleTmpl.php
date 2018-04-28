<div class="products">
    <?php if (count($products)) : ?>
        <?php foreach ($products as $product) : ?>        
            <div class="products__item">
                    <div class="product-description">
                        <p>
                            <?php echo $product['product_name']; ?>
                            <?php echo $product['color']; ?>
                        </p>
                        <p>Цена: <?php echo $product['price']; ?> руб.</p>
                        <p>Количество: <?php echo $product['amount']; ?> шт.</p>
                    </div>
            </div>               
        <?php endforeach; ?>
    <?php else : ?>
        <div>
            <p>Ваша корзина пуста</p>
        </div>
    <?php endif; ?>
</div>
