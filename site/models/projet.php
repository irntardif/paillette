<?php

class ProjetPage extends Page
{
    public function firstEvent() {

        $events = $this->dates()->toStructure();
        if($events->isNotEmpty()){
            $sortedEvents = $events->sortBy(function ($page) {
              return $page->date()->toDate('%s');
            }, 'asc');
            return $sortedEvents->first()->date()->toDate('%s');
        }else{
            return 0;
        }

    }
}
