{*страница продукта*}
<div style="display: flex; flex-direction: column;">
    <h3>{$rsProduct['name']}</h3>

    <img width="575" height="575" src="/images/products/{$rsProduct['image']}">

    Стоимость: {$rsProduct['price']} тенге.

    <a href="#" alt="Добавить в корзину">Добавить в корзину</a>
    <p> Описание <br/>{$rsProduct['description']}</p>
</div>