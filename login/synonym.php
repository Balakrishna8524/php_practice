<?php
class Thesaurus
{
    private $thesaurus;

    public function __construct(array $thesaurus)
    {
        $this->thesaurus = $thesaurus;
    }

    public function getSynonyms(string $word): string
    {
        $a=array(
            "word"=> $word,
            "synonym" => (isset($this->thesaurus[$word]))?$this->thesaurus[$word]:[]
        );

        return json_encode($a);   
    }
}

$thesaurus = new Thesaurus(
    [
        "buy" => array("purchase"),
        "big" => array("great", "large")
    ]
);

echo $thesaurus->getSynonyms("big");
echo "\n";
echo $thesaurus->getSynonyms("agelast"); 
echo "\n";