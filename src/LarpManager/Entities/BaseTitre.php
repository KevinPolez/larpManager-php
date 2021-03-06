<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-09 11:20:22.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Titre
 *
 * @Entity()
 * @Table(name="titre")
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseTitre", "extended":"Titre"})
 */
class BaseTitre
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=45)
     */
    protected $label;

    /**
     * @Column(type="integer")
     */
    protected $renomme;

    /**
     * @OneToMany(targetEntity="TitreTerritoire", mappedBy="titre")
     * @JoinColumn(name="id", referencedColumnName="titre_id", nullable=false)
     */
    protected $titreTerritoires;

    public function __construct()
    {
        $this->titreTerritoires = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Titre
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of id.
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of label.
     *
     * @param string $label
     * @return \LarpManager\Entities\Titre
     */
    public function setLabel($label)
    {
        $this->label = $label;

        return $this;
    }

    /**
     * Get the value of label.
     *
     * @return string
     */
    public function getLabel()
    {
        return $this->label;
    }

    /**
     * Set the value of renomme.
     *
     * @param integer $renomme
     * @return \LarpManager\Entities\Titre
     */
    public function setRenomme($renomme)
    {
        $this->renomme = $renomme;

        return $this;
    }

    /**
     * Get the value of renomme.
     *
     * @return integer
     */
    public function getRenomme()
    {
        return $this->renomme;
    }

    /**
     * Add TitreTerritoire entity to collection (one to many).
     *
     * @param \LarpManager\Entities\TitreTerritoire $titreTerritoire
     * @return \LarpManager\Entities\Titre
     */
    public function addTitreTerritoire(TitreTerritoire $titreTerritoire)
    {
        $this->titreTerritoires[] = $titreTerritoire;

        return $this;
    }

    /**
     * Remove TitreTerritoire entity from collection (one to many).
     *
     * @param \LarpManager\Entities\TitreTerritoire $titreTerritoire
     * @return \LarpManager\Entities\Titre
     */
    public function removeTitreTerritoire(TitreTerritoire $titreTerritoire)
    {
        $this->titreTerritoires->removeElement($titreTerritoire);

        return $this;
    }

    /**
     * Get TitreTerritoire entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTitreTerritoires()
    {
        return $this->titreTerritoires;
    }

    public function __sleep()
    {
        return array('id', 'label', 'renomme');
    }
}