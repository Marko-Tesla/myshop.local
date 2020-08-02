{*шаблон главной страницы*}
<div style="display: flex">
    <div>
        {foreach $rsProducts as $item name=products}
            <div style="float:left; padding: 0px 30px 40px 0px;">
                <a href="/product/{$item['id']}/">
                    <img src="/images/products/{$item['image']}" width="200" height="200"/>
                </a><br/>
                <a href="/product/{$item['id']}/">{$item['name']}</a>
            </div>
            {if $smarty.foreach.products.iteration mod 3 == 0}
                <div style="clear: both;"></div>
            {/if}
        {/foreach}

    </div>

</div>





