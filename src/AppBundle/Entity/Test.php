<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Test
 *
 * @ORM\Table(name="test_test")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TestRepository")
 */
class Test
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
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=true)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="source", type="string", length=255, nullable=true)
     */
    private $source;

    /**
     * @ORM\OneToMany(targetEntity="Question", mappedBy="test", cascade={"persist", "remove"},orphanRemoval=true)
     */
    private $questions;

    /**
     * @ORM\OneToMany(targetEntity="Kind", mappedBy="test", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $kinds;

    /**
     * @ORM\OneToMany(targetEntity="Option", mappedBy="test", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $options;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
        $this->kinds = new ArrayCollection();
        $this->options = new ArrayCollection();
    }

    public function __toString()
    {
        return (string) $this->getName();
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
     * Set name
     *
     * @param string $name
     *
     * @return Test
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set description
     *
     * @param string $description
     *
     * @return Test
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set source
     *
     * @param string $source
     *
     * @return Test
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * Set questions
     *
     * @param array $questions
     *
     * @return Test
     */
    public function setQuestions($questions)
    {
        $this->questions = $questions;

        return $this;
    }

    /**
     * Get questions
     *
     * @return array
     */
    public function getQuestions()
    {
        return $this->questions;
    }

    /**
     * Add question
     *
     * @param \AppBundle\Entity\Question $question
     * @return Test
     */
    public function addQuestion(\AppBundle\Entity\Question $question)
    {
        $question->setTest($this);

        $this->questions->add($question);

        return $this;
    }

    /**
     * Remove question
     *
     * @param \AppBundle\Entity\Question $question
     */
    public function removeQuestion(\AppBundle\Entity\Question $question)
    {
        $this->questions->removeElement($question);
    }

    /**
     * Set kinds
     *
     * @param array $kinds
     *
     * @return Test
     */
    public function setKinds($kinds)
    {
        $this->kinds = $kinds;

        return $this;
    }

    /**
     * Get kinds
     *
     * @return array
     */
    public function getKinds()
    {
        return $this->kinds;
    }


    /**
     * Add kind
     *
     * @param \AppBundle\Entity\Kind $kind
     * @return Test
     */
    public function addKind(\AppBundle\Entity\Kind $kind)
    {
        $kind->setTest($this);

        $this->kinds->add($kind);

        return $this;
    }

    /**
     * Remove kind
     *
     * @param \AppBundle\Entity\Kind $kind
     */
    public function removeKind(\AppBundle\Entity\Kind $kind)
    {
        $this->kinds->removeElement($kind);
    }


    /**
     * Set options
     *
     * @param array $options
     *
     * @return Test
     */
    public function setOptions($options)
    {
        $this->options = $options;

        return $this;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function getOptions()
    {
        return $this->options;
    }


    /**
     * Add option
     *
     * @param \AppBundle\Entity\Option $option
     * @return Test
     */
    public function addOption(\AppBundle\Entity\Option $option)
    {
        $option->setTest($this);

        $this->options->add($option);

        return $this;
    }

    /**
     * Remove option
     *
     * @param \AppBundle\Entity\Option $option
     */
    public function removeOption(\AppBundle\Entity\Option $option)
    {
        $this->options->removeElement($option);
    }


}

