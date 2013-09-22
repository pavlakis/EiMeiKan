<?php
 
namespace EiMeiKan\Entities;

/**
 * Description of Entity
 *
 * @author antonis
 */
abstract class Entity
{   
    protected $empty = true;
    
    public function isEmpty()
    {
        return $this->empty;
    }
    abstract protected function arrayToEntity(array $entity);        
}
