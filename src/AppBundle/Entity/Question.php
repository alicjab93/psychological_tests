<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Question
 *
 * @ORM\Table(name="test_question")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\QuestionRepository")
 */
class Question
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="Test", inversedBy="questions", cascade={"persist"})
     */
    private $test;

    /**
     * @var string
     *
     * @ORM\Column(name="text", type="string", length=255)
     */
    private $text;

    /**
     * @ORM\ManyToOne(targetEntity="Kind", inversedBy="questions", cascade={"persist"})
     */
    private $kind;

    /**
     * @var array
     *
     * @ORM\Column(name="answers", type="array")
     */
    private $answers;

    /**
     * @var int
     *
     * @ORM\Column(name="position", type="integer")
     */
    private $position;

    /**
     * @var bool
     *
     * @ORM\Column(name="is_reverse", type="boolean")
     */
    private $isReverse;


    public function __toString()
    {
        return (string) $this->getText();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set test
     *
     * @param integer $test
     *
     * @return Question
     */
    public function setTest($test)
    {
        $this->test = $test;

        return $this;
    }

    /**
     * Get test
     *
     * @return int
     */
    public function getTest()
    {
        return $this->test;
    }

    /**
     * Set text
     *
     * @param string $text
     *
     * @return Question
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set kind
     *
     * @param integer $kind
     *
     * @return Question
     */
    public function setKind($kind)
    {
        $this->kind = $kind;

        return $this;
    }

    /**
     * Get kind
     *
     * @return Kind
     */
    public function getKind()
    {
        return $this->kind;
    }

    /**
     * Set answers
     *
     * @param array $answers
     *
     * @return Question
     */
    public function setAnswers($answers)
    {
        $this->answers = $answers;

        return $this;
    }

    /**
     * Get answers
     *
     * @return array
     */
    public function getAnswers()
    {
        return $this->answers;
    }

    /**
     * Set position
     *
     * @param integer $position
     *
     * @return Question
     */
    public function setPosition($position)
    {
        $this->position = $position;

        return $this;
    }

    /**
     * Get position
     *
     * @return int
     */
    public function getPosition()
    {
        return $this->position;
    }

    public function getTestKinds()
    {
//        var_Dump($this->getTest()->getKinds());
        return $this->getTest()->getKinds();
    }

    /**
     * Set isReverse
     *
     * @param boolean $isReverse
     *
     * @return Question
     */
    public function setIsReverse($isReverse)
    {
        $this->isReverse = $isReverse;

        return $this;
    }

    /**
     * Get isReverse
     *
     * @return boolean
     */
    public function getIsReverse()
    {
        return $this->isReverse;
    }
}
