<?php
class Person {
    private $name;

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }
}

$p = new Person();
$p->setName("John");
echo $p->getName(); // Output: John
?>
