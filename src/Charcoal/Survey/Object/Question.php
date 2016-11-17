<?php

namespace Charcoal\Survey\Object;

// Module `charcoal-base` dependencies
use \Charcoal\Object\Content;
use \Charcoal\Translation\TranslationString;

/**
 * Survey Question
 */
class Question extends Content
{
    /**
     * The actual question.
     * L10N
     * @var string $question
     */
    protected $question;

    /**
     * Question Type.
     * Choice
     * - boolean
     * - choice
     * - free
     *
     * @var string $questionType
     */
    protected $questionType;

    /**
     * Survey object
     * @var Object $survey charcoal/survey/survey
     */
    protected $survey;

    public function name()
    {
        return $this->question();
    }

/**
 * SETTERS
 */
    public function setQuestion($question)
    {
        $this->question = new TranslationString($question);
        return $this;
    }

    public function setQuestionType($type)
    {
        $this->questionType = $type;
        return $this;
    }

    public function setSurvey($survey)
    {
        $this->survey = $survey;
        return $this;
    }

/**
 * GETTERS
 */
    public function question()
    {
        return $this->question;
    }

    public function questionType()
    {
        return $this->questionType;
    }

    public function survey()
    {
        return $this->survey;
    }
}
