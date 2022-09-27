<?php 
class DeleteProduct
{
    public function __construct($dbh)
    {
      $this->dbh=$dbh; 
    }    
    
    public function delete(int $product_id)
    {
      $error=false;

      $sql = 'DELETE FROM `'. DB_PREFIX.'_product` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;} 
      
      $sql = 'DELETE FROM `'. DB_PREFIX.'_product_attribute` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;} 

      $sql = 'DELETE FROM `'. DB_PREFIX.'_product_description` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;}

      $sql = 'DELETE FROM `'. DB_PREFIX.'_product_filter` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;}

      $sql = 'DELETE FROM `'. DB_PREFIX.'_product_image` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;}

      $sql = 'DELETE FROM `'. DB_PREFIX.'_product_to_category` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;}

      $sql = 'DELETE FROM `'. DB_PREFIX.'_product_to_layout` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;}

      $sql = 'DELETE FROM `'. DB_PREFIX.'_product_to_store` WHERE `product_id`='.$product_id;
      $sth = $this->dbh->prepare($sql);
      $sth->execute();
		  if($sth->errorInfo()[2]){$error=true;}

      return $error?false:true;     
    }   
}