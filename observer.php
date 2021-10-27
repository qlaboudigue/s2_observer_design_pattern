<?php

// interface SplSubject
// {
//     // Attach an observer to the subject.
//     public function attach(SplObserver $observer);
 
//     // Detach an observer from the subject.
//     public function detach(SplObserver $observer);
 
//     // Notify all observers about an event.
//     public function notify();
// }


class Topic implements \SplSubject
{

    // PPROPERTIEs
    public $state;
    private $observers;

    // CONSTRUCTOR
    public function __construct()
    {
        $this->observers = new \SplObjectStorage();
    }

    // 
    public function attach(\SplObserver $observer) : void
    {
        echo "Topic: Attached an observer.\n";
        $this->observers->attach($observer);
    }

    public function detach(\SplObserver $observer) : void
    {
        $this->observers->detach($observer);
        echo "Subject: Detached an observer.\n";
    }

    public function notify() : void
    {
        echo "Subject: Notifying observers...\n";
        foreach ($this->observers as $observer) {
            $observer->update($this);
        }
    }

    public function doSomething(): void
    {
        echo "\Topic: I'm doing something important.\n";
        $this->state = rand(0, 10);

        echo "Topic: My state has just changed to: {$this->state}\n";
        $this->notify();
    }


}

// interface SplObserver
// {
//     public function update(\SplSubject $splSubject);
// }


class ObserverOne implements \SplObserver {

    public function update(\SplSubject $splSubject) : void
    {
        if ($splSubject->state == 0 || $splSubject->state >= 2) {
            echo "ObserverOne: Reacted to the event.\n";
        }
    }
}

class ObserverTwo implements \SplObserver {

    public function update(SplSubject $splSubject) : void
    {
        if ($splSubject->state < 3) {
            echo "ObserverTwo: Reacted to the event.\n";
        }
    }
}
