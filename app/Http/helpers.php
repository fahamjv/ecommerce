<?php
    function ReturnMainImageOfProduct($product) {
        foreach ($product->images as $image)
        {
            if($image->isMain == 1)
            {
                return 'http://127.0.0.1:8000/images/products/'.$image->src;
            }
        }
        return 'http://127.0.0.1:8000/images/products/no-image.svg';
    }
?>