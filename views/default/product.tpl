{*страница продукта*}
<div style="display: flex; flex-direction: column;">
    <h3>{$rsProduct['name']}</h3>

    <img width="575" height="575" src="/images/products/{$rsProduct['image']}">

    Стоимость: {$rsProduct['price']} тенге.

    <a id="removeCart_{$rsProduct['id']}" {if !$itemInCart}class="hideme"{/if} href="#" onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины">Удалить из корзины</a>
    <a id="addCart_{$rsProduct['id']}" {if $itemInCart}class="hideme"{/if} href="#" onClick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину">Добавить в корзину</a>
    <p> Описание <br/>{$rsProduct['description']}</p>
</div>