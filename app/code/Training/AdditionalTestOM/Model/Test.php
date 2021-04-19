<?php
namespace Training\AdditionalTestOM\Model;

use Training\TestOM\Model\ManagerInterface;

class Test
{
    private $managerCustom;
    private $arrayList;
    private $name;
    private $number;

    public function __construct(
        ManagerInterface $managerCustom,
        string $name,
        int $number,
        array $arrayList
    ) {
        $this->managerCustom = $managerCustom;
        $this->name = $name;
        $this->number = $number;
        $this->arrayList = $arrayList;
    }

    public function log()
    {
        print_r(get_class($this->managerCustom));
        echo '<br>';
        print_r($this->name);
        echo '<br>';
        print_r($this->number);
        echo '<br>';
        print_r($this->arrayList);
    }
}
