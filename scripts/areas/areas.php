<?php
    class areas extends connect{
        use getInstance;
        function __construct(private $id, public $name_area){
            parent::__construct();
        }
    }
?>