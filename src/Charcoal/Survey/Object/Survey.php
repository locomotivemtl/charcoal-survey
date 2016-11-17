<?php

namespace Charcoal\Survey\Object;

// Module `charcoal-base` dependencies
use \Charcoal\Object\Content;

// Charcoal-base dependencie
use \Charcoal\Object\RoutableInterface;
use \Charcoal\Object\RoutableTrait;

use \Charcoal\Translation\TranslationString;

/**
 * Survey
 * Survey is routable so you can access a specific survey.
 */
class Survey extends Content implements
    RoutableInterface
{
    use RoutableTrait;


    /**
     * Name of the survey displayed as title
     * L10N
     * @var string $name
     */
    protected $name;

    /**
     * [$questions description]
     * @var [type]
     */
    protected $questions;

    /**
     * Feedback content after the survey has been
     * answered.
     * L10N
     * @var string $feedbackTitle
     * @var html $feedbackMessage
     */
    protected $feedbackTitle;
    protected $feedbackMessage;




    public function setName($name)
    {
        $this->name = new TranslationString($name);
        return $this;
    }

    public function setFeedbackTitle($title)
    {
        $this->feedbackTitle = new TranslationString($title);
        return $this;
    }
    public function setFeedbackMessage($msg)
    {
        $this->feedbackMessage = new TranslationString($msg);
        return $this;
    }

    public function name()
    {
        return $this->name;
    }
    public function feedbackTitle()
    {
        return $this->feedbackTitle;
    }
    public function feedbackMessage()
    {
        return $this->feedbackMessage;
    }



    public function postSave()
    {
        // RoutableTrait
        $this->generateObjectRoute();
        return parent::postSave();
    }

    /**
     * Check whatever before the update.
     * @param  array|null $properties Properties.
     * @return void No return set.
     */
    public function preUpdate(array $properties = null)
    {
        $this->generateObjectRoute();
        parent::preUpdate($properties);
    }

}
