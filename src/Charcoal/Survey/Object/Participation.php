<?php

namespace Charcoal\Survey\Object;

use \InvalidArgumentException;
use \DateTime;
use \DateTimeInterface;

// Dependency from 'charcoal-core'
use \Charcoal\Model\AbstractModel;

use \Charcoal\Translation\TranslationString;

/**
 * Survey question answer
 */
class Participation extends AbstractModel
{
    // $id
    /**
     * Answer from the user
     * ID
     * @var Object Charcoal/Survey/Object/Answer
     */
    protected $answer;

    /**
     * Question answered by the user
     * ID
     * @var Object Charcoal/Survey/Object/Question
     */
    protected $question;

    /**
     * Survey where the question was.
     * ID
     * @var Object Charcoal/Survey/Object/Survey
     */
    protected $survey;

    /**
     * IP of the user that responded.
     * @var IP $ip
     */
    protected $ip;

    /**
     * Timestamp of the moment the user answered
     * @var [type]
     */
    protected $ts;


/**
 * SETTERS
 */
    public function setAnswer($answer)
    {
        $this->answer = $answer;
        return $this;
    }
    public function setQuestion($question)
    {
        $this->question = $question;
        return $this;
    }
    public function setSurvey($survey)
    {
        $this->survey = $survey;
        return $this;
    }
    /**
     * Set the client IP address.
     *
     * @param  integer|null $ip The remote IP at object creation.
     * @return UserDataInterface Chainable
     */
    public function setIp($ip)
    {
        if ($ip === null) {
            $this->ip = null;
            return $this;
        }

        if (is_string($ip)) {
            $ip = ip2long($ip);
        } elseif (is_numeric($ip)) {
            $ip = (int)$ip;
        } else {
            $ip = 0;
        }

        $this->ip = $ip;

        return $this;
    }

    /**
     * Set when the object was created.
     *
     * @param  DateTime|string|null $timestamp The timestamp at object's creation. NULL is accepted and instances
     *     of DateTimeInterface are recommended; any other value will be converted (if possible) into one.
     * @throws InvalidArgumentException If the timestamp is invalid.
     * @return UserDataInterface Chainable
     */
    public function setTs($timestamp)
    {
        if ($timestamp === null) {
            $this->ts = null;
            return $this;
        }

        if (is_string($timestamp)) {
            try {
                $timestamp = new DateTime($timestamp);
            } catch (Exception $e) {
                throw new InvalidArgumentException(
                    sprintf('Invalid timestamp: %s', $e->getMessage())
                );
            }
        }

        if (!($timestamp instanceof DateTimeInterface)) {
            throw new InvalidArgumentException(
                'Invalid timestamp value. Must be a date/time string or a DateTime object.'
            );
        }

        $this->ts = $timestamp;

        return $this;
    }

/**
 * GETTERS
 */
    public function answer()
    {
        return $this->answer;
    }
    public function question()
    {
        return $this->question;
    }
    public function survey()
    {
        return $this->survey;
    }

    /**
     * Retrieve the client IP address.
     *
     * @return integer|null
     */
    public function ip()
    {
        return $this->ip;
    }

    /**
     * Retrieve the creation timestamp.
     *
     * @return DateTime|null
     */
    public function ts()
    {
        return $this->ts;
    }

}
