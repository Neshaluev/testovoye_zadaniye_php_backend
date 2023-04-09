<?php

namespace app;

require_once __DIR__."./vendor/autoload.php";

$data = CProducts::$instance->getAll(10);

if(isset($_POST['add_quantity'])){
    CProducts::$instance->addQuantityItem($_POST['add_quantity']);
}
if(isset($_POST['remove_quantity'])){
    CProducts::$instance->removeQuantityItem($_POST['remove_quantity']);
}
if(isset($_POST['product_hide'])){
    CProducts::$instance->hideItem($_POST['product_hide']);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
tr,
td,
th {
    border: 1px solid gray;
    padding: 5px;
}
</style>

<body>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>PRODUCT_ID</th>
                <th>PRODUCT_NAME</th>
                <th>PRODUCT_PRICE</th>
                <th>PRODUCT_ARTICLE</th>
                <th>PRODUCT_QUANTITY</th>
                <th>DATE_CREATE</th>
            </tr>
        </thead>
        <tbody>
            <? if(isset($data)): ?>
            <? foreach($data as $item): ?>
            <tr class="table_row" data-id="<?=$item['ID']?>">
                <td><?=$item['ID']?></td>
                <td><?=$item['PRODUCT_ID']?></td>
                <td><?=$item['PRODUCT_NAME']?></td>
                <td><?=$item['PRODUCT_PRICE']?></td>
                <td><?=$item['PRODUCT_ARTICLE']?></td>
                <td>
                    <button class="add_quantity" data-id="<?=$item['ID']?>">+</button>
                    <span class="view_quantity" data-id="<?=$item['ID']?>"><?=$item['PRODUCT_QUANTITY']?></span>
                    <button class="remove_quantity" data-id="<?=$item['ID']?>">-</button>
                </td>
                <td><?=$item['DATE_CREATE']?></td>
                <td>
                    <form class="form_hide" data-id="<?=$item['ID']?>" action="" method="post">
                        <input type="hidden" name="product_hide" value="<?=$item['ID']?>">
                        <button>Скрыть</button>
                    </form>
                </td>
            </tr>
            <? endforeach; ?>
            <? endif;?>
        </tbody>
    </table>

</body>

<script src="/vendor/components/jquery/jquery.js"></script>

</html>

<script>
$(function() {

    $('.form_hide').submit(e => {
        e.preventDefault();
        const $this = $(e.target);
        const id = $this.attr("data-id");
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                product_hide: id,
            }
        }).done((data) => {
            $(`tr[data-id=${id}]`).remove();
        })

    })

    $('.remove_quantity').click(e => {
        const $this = $(e.target);
        const id = $this.attr('data-id')
        const viewElement = $(`.view_quantity[data-id=${id}]`)
        const minusValueEl = +viewElement.text() - 1
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                remove_quantity: id,
            }
        }).done((data) => {
            viewElement.text(minusValueEl)
        })

    })

    $('.add_quantity').click(e => {
        const $this = $(e.target);
        const id = $this.attr('data-id')
        const viewElement = $(`.view_quantity[data-id=${id}]`)
        const sumValueEl = +viewElement.text() + 1
        $.ajax({
            url: "index.php",
            type: "POST",
            data: {
                add_quantity: id,
            }
        }).done((data) => {
            viewElement.text(sumValueEl)
            // if(data.success){}
        })

    })
})
</script>