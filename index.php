<?php 
declare(strict_types=1);

spl_autoload_register(function ($class) {
    include __DIR__ . '/class/'.$class.'.php';
});

include(__DIR__.'/config.php');
$dbh = DB::getInstance()->connect();

##########################################################################

$product_id=7949; 

if((new DeleteProduct($dbh))->delete($product_id))
{echo "Продукт $product_id успешно удален!";}else{echo "Ошибка удаления товара $product_id";}
?>