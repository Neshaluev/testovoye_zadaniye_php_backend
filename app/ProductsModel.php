<?php

namespace app;

use app\Model;
class ProductsModel extends Model {

    public int $ID = 0;
    public string $PRODUCT_ID = '';
    public string $PRODUCT_NAME = '';
    public int $PRODUCT_PRICE = 0;
    public string $PRODUCT_ARTICLE = '';
    public int $PRODUCT_QUANTITY = 0;
    public string $DATE_CREATE = '';
    public int $STATUS = 0;
    public function primaryKey(): string
    {
        return $this->ID;
    }

    public  static function tableName(): string
    {
        return 'products';
    } 

    public static function fields(): array
    {
        return ['PRODUCT_ID','PRODUCT_NAME','PRODUCT_PRICE','PRODUCT_ARTICLE','PRODUCT_QUANTITY','DATE_CREATE','STATUS'];
    }

    public function hideProduct(){
        $this->STATUS = 0;
    }
}

// return new ProductsModel();