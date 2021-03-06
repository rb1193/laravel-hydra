<?php

namespace Arbee\LaravelHydra\Hydra;

class SupportedProperty
{
    /**
     * @var string
     */
    protected $title;

    /**
     * @var boolean
     */
    protected $deprecated = false;

    /**
     * @var boolean
     */
    protected $readable = true;

    /**
     * @var boolean
     */
    protected $writable = true;

    /**
     * @var boolean
     */
    protected $required = false;

    /**
     * @var \Arbee\LaravelHydra\Hydra\Property
     */
    protected $property;

    /**
     * @var string
     */
    protected $type = Vocabulary::CLASS_SUPPORTED_PROPERTY;

    /**
     * @param \Arbee\LaravelHydra\Hydra\Property $property
     * @param string $title
     */
    public function __construct(Property $property, string $title)
    {
        $this->property = $property;
        $this->title = $title;
    }

    /**
     * Get the title of the supported property
     *
     * @return string
     */
    public function title(): string
    {
        return $this->title;
    }

    /**
     * Get the IRI of the underlying property
     *
     * @return string
     */
    public function propertyIri(): string
    {
        return $this->property->iri();
    }

    /**
     * Mark the supported property as read only
     */
    public function readOnly()
    {
        $this->writable = false;
        return $this;
    }

    /**
     * Mark the supported property as required
     */
    public function required()
    {
        $this->required = true;
        return $this;
    }

    /**
     * Mark the supported property write only
     */
    public function writeOnly()
    {
        $this->readable = false;
        return $this;
    }

    /**
     * Represent the supported property as an array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            '@type' => $this->type,
            Vocabulary::TITLE => $this->title,
            Vocabulary::PROPERTY => $this->property->toArray(),
            Vocabulary::REQUIRED => $this->required,
            Vocabulary::READABLE => $this->readable,
            Vocabulary::WRITABLE => $this->writable,
        ];
    }
}
