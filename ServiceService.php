<?php
include_once ("ServiceDAO.php");
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

 class ServiceService{

    private $dao;

    function __construct()
    {
        $this->dao = new ServiceDAO();
    }

    function  selectAll(){
        return $this->dao->selectAll();
    }

 }