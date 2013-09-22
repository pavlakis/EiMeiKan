<?php

namespace EiMeiKan\Entities;

use EiMeiKan\Entities\Entity;

/**
 * Description of Event
 *
 * @author antonis
 */
class Event extends Entity
{
    protected $name;
    /**
     *
     * @var array
     */
    protected $instructors;
    
    protected $dojo = '';
    
    /**
     * Address in an array to include multiple lines
     * 
     * @var array
     */
    protected $address;
    
    /**
     *
     * @var DateTime
     */
    protected $fromDateTime;
    /**
     *
     * @var DateTime
     */
    protected $toDateTime;

    protected $url = null;
    
    /**
     * Cost, insurance info, etc...
     * 
     * @var string
     */
    protected $description = '';
    
    
    public function __construct(array $entity)
    {
        $this->arrayToEntity($entity);
    }
    
    protected function arrayToEntity(array $entity)
    {
        if (empty($entity)) {
            return;
        }
        
        $this->empty = false;
        
        foreach ($entity as $key => $value) {
            $methodName = 'set' . ucfirst($key);
            if (method_exists($this, $methodName)) {
                call_user_func_array(array($this, $methodName), array($value));
            }
        }
    }
    
    public function setName($name)
    {
        $this->name = $name;
    }
    
    public function setInstructors($instructors)
    {
        if (!is_array($instructors)) {
            $instructors = array($instructors);
        }
        
        $this->instructors = $instructors;
    }
    
    public function setAddress($address)
    {
        if (!is_array($address)) {
            $address = explode(',', $address);
        }
        
        $this->address = $address;
    }
    
    public function setFromDateTime($date)
    {
        $this->fromDateTime = date_create_from_format('YmdHi', $date);
    }
    
    public function setToDateTime($date)
    {
        $this->toDateTime = date_create_from_format('YmdHi', $date);
    }
    
    public function setUrl($url)
    {
        $this->url = $url;
    }
    
    public function setDescription($description)
    {
        $this->description = $description;
    }
    
    public function getName()
    {
        return $this->name;
    }
    
    public function getFromDateObj()
    {
        return $this->fromDateTime;
    }
    
    public function getFromDate()
    {
        // return date object
        return $this->fromDateTime->format('l jS F Y');
    }
    
    public function getToDate()
    {
        return $this->toDateTime->format('l jS F Y');
    }
    
    public function getStartTime()
    {
        return $this->fromDateTime->format('H:i');
    }

    public function getEndTime()
    {
        return $this->toDateTime->format('H:i');
    }
    
    public function getUrl()
    {
        return $this->url;
    }
    
    public function getAddress()
    {
        return $this->address;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function getInstructors()
    {
        return $this->instructors;
    }
    
    public function getDojo()
    {
        return $this->dojo;
    }
}

