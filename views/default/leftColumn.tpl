<div id="leftColumn">
    <div id="leftMenu">
        <div class="menuCaption">Меню:</div>
            {foreach $rsCategories as $item}
                {*<a href="/?controller=category&id={$item['id']}">{$item['name']}</a><br/>*}
                    <a href="/category/{$item['id']}/">{$item['name']}</a><br/>

                {if isset($item['children'])}
                    {foreach $item['children'] as $itemChild}
                    {*foreach $rsChildCats as $item name=childCats*}
                        {*--<a href='/?controller=category&id={$itemChild['id']}'> {$itemChild['name']}<a/><br/>*}
                        --<a href="/category/{$itemChild['id']}/">{$itemChild['name']}</a><br/>
                    {/foreach}
                {/if}

            {/foreach}
    </div>
</div>
