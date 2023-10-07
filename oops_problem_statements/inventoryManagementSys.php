<?php
/*

Inventory Management System:
Design a simple inventory management system for a store using PHP classes. 
The system should include classes for products, categories, and orders. 
Implement methods to add new products, categorize them, process orders, and generate reports.
*/

class Product {
    private $name;
    private $category;
    private $price;
    
    public function __construct($name, $category, $price) {
        $this->name = $name;
        $this->category = $category;
        $this->price = $price;
    }
    
    public function getName() {
        return $this->name;
    }
    
    public function getCategory() {
        return $this->category;
    }
    
    public function getPrice() {
        return $this->price;
    }
}

class Inventory {
    private $products = [];

    public function addProduct($product) {
        $this->products[] = $product;
    }

    public function getProducts() {
        return $this->products;
    }

    public function getProductByCategory($category) {
        $filteredProducts = [];
        foreach ($this->products as $product) {
            if ($product->getCategory() == $category) {
                $filteredProducts[] = $product;
            }
        }
        return $filteredProducts;
    }
}

$product1 = new Product("Laptop", "Electronics", 1000);
$product2 = new Product("Chair", "Furniture", 100);
$product3 = new Product("Shirt", "Clothing", 50);
$product4 = new Product("Mouse", "Electronics", 300);

$inventory = new Inventory();
$inventory->addProduct($product1);
$inventory->addProduct($product2);
$inventory->addProduct($product3);
$inventory->addProduct($product4);

echo "All Products:\n";
foreach ($inventory->getProducts() as $product) {
    echo $product->getName() . " - $" . $product->getPrice() . "\n";
}

echo "\nElectronics:\n";
$electronics = $inventory->getProductByCategory("Electronics");
foreach ($electronics as $product) {
    echo $product->getName() . " - $" . $product->getPrice() . "\n";
}
