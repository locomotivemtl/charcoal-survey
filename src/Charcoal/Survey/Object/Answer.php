<?php

namespace Charcoal\Survey\Object;

// Module `charcoal-base` dependencies
use \Charcoal\Object\Content;

use \Charcoal\Translation\TranslationString;

/**
 * Survey question answer
 */
class Answer extends Content
{
    /**
     * Value of the answer
     * L10N
     * @var string $label
     */
    protected $label;

    /**
     * [$question description]
     * @var [type]
     */
    protected $question;


    public function setLabel($label)
    {
        $this->label = new TranslationString($label);
        return $this;
    }

    public function label()
    {
        return $this->label;
    }

    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }

    public function question()
    {
        return $this->question;
    }
}
