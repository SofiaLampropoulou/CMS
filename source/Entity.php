<?php
abstract class Entity{
    protected $tableName;
    protected $dbc;
    protected $fields;

    //Force extending class to define this method
        abstract protected function initFields();
        public function __construct($dbc, $tableName)
        {
            $this->dbc = $dbc;
            $this->tableName = $tableName;
            $this->initFields();
        }
    public function findBy($fieldName, $fieldValue){
   

        $sql = "SELECT * FROM "  .$this->tableName ."  WHERE " . $fieldName . " = value";
        $stmt = $this->dbc->prepare($sql);
        $stmt->execute(['pretty_url' => $fieldValue]);
        $databaseData = $stmt->fetch();
       // $stmt->debugDumpParams();
        $this->setValues($databaseData);
    }

    public function setValues($values){

        foreach ($this->fields as $fieldName){
            $this->$fieldName = $values[$fieldName];
        }

    
        
    }
}
