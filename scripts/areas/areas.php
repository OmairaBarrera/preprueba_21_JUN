<?php
    class areas extends connect{
        use getInstance;
        function __construct(private $id=1, public $name_area=1){
            parent::__construct();
            print_r("areas");
        }
    }
?>