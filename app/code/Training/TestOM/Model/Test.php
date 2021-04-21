<?php
namespace Training\TestOM\Model;

class Test
{
    private $arrayList;
    private $name;
    private $number;
    private $managerFactory;

    public function __construct(
        string $name,
        int $number,
        array $arrayList,
        ManagerInterfaceFactory $managerFactory
    ) {
        $this->name = $name;
        $this->number = $number;
        $this->arrayList = $arrayList;
        $this->managerFactory = $managerFactory;
    }

    public function log()
    {
        echo '<br>';
        print_r($this->name);
        echo '<br>';
        print_r($this->number);
        echo '<br>';
        print_r($this->arrayList);
        echo '<br>';
        $newManager = $this->managerFactory->create();
        print_r(get_class($newManager));
    }
}
