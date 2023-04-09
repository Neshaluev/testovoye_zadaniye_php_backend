<?php
namespace app;

use app\ProductsModel;
class CProducts{
    static public CProducts $instance;
    public function __construct(){
        self::$instance = $this;
    }
    public static function getAll(int $limit){
        $products = ProductsModel::getAll($limit);
        
        return $products;
    }

     public static function addQuantityItem(string $id){
        $product = ProductsModel::findOne($id);
        $product->PRODUCT_QUANTITY++; 

        return $product->update();
    }
     public static function removeQuantityItem(string $id){
        $product = ProductsModel::findOne($id);
        $product->PRODUCT_QUANTITY--; 
        
        return $product->update();
    }

     public static function hideItem(string $id){
        $product = ProductsModel::findOne($id);
        $product->STATUS = 0; 
        
        return $product->update();

    }
}

return new CProducts();