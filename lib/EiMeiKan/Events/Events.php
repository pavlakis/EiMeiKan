<?php

namespace EiMeiKan\Events;

use EiMeiKan\Entities\Event;

/**
 * Description of Event
 *
 * @author antonis
 */
class Events
{
    /**
     *
     * @var array Event[]
     */
    protected $events = array();
    
    protected $eventStartDates = array();
    
    public function __construct(array $events)
    {
        $this->init($events);
    }
    
    protected function init($events)
    {
        $this->populateEvents($events);
        $this->orderEventsByDate();
    }
    
    protected function populateEvents($events)
    {
        foreach ($events as $event) {
            //$eventObj = new Event($event);
            $this->events[] = new Event($event);
        }
    }
    
    protected function orderEventsByDate()
    {
        usort($this->events, function($a, $b){
            return ($a >= $b) ? -1 : 1;
        });        
    }
    
    public function getNextAvailableEvent()
    {
        // get event where startDate >= today
        // return the first event in that array
        foreach ($this->events as $event) {
            $today = date_create_from_format('Ymd', date('Ymd'));
            if ($event->getFromDateObj() >= $today) {
                return $event;
            }
        }
        
        return new Event(array());

    }    
}

