<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\ProductRepository")
 */
class Product
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
     * @var int
     *
     * @ORM\Column(name="text", type="string")
     */
    private $text;

    /**
     * @var int|null
     *
     * @ORM\Column(name="skaicius", type="integer", nullable=true)
     */
    private $skaicius;


    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set text.
     *
     * @param string $text
     *
     * @return Product
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set skaicius.
     *
     * @param int|null $skaicius
     *
     * @return Product
     */
    public function setSkaicius($skaicius = null)
    {
        $this->skaicius = $skaicius;

        return $this;
    }

    /**
     * Get skaicius.
     *
     * @return int|null
     */
    public function getSkaicius()
    {
        return $this->skaicius;
    }
}
