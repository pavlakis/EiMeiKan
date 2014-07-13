<?php
/**
 * @copyright All Contents (c) 2014 Jadu Ltd.
 * @author Jadu Ltd.
 */ 

namespace EiMeiKan\Announcement;


class Announcement
{
    protected $startDate;

    protected $endDate;

    protected $announcement;

    protected $defaultAnnouncement;

    public function __construct(\DateTime $startDate, \DateTime $endDate, $announcement, $defaultAnnouncement = "")
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->announcement = $announcement;
        $this->defaultAnnouncement = $defaultAnnouncement;
    }

    public function show()
    {
        $now = new DateTime("now");
        if ($now >= $this->startDate && $now < $this->endDate) {
            return $this->announcement;
        }

        return $this->defaultAnnouncement;
    }

    public function __toString()
    {
        return $this->show();
    }
}
