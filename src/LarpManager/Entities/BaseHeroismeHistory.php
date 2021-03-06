<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-05-02 11:53:35.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\HeroismeHistory
 *
 * @Entity()
 * @Table(name="heroisme_history", indexes={@Index(name="fk_heroisme_history_personnage1_idx", columns={"personnage_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseHeroismeHistory", "extended":"HeroismeHistory"})
 */
class BaseHeroismeHistory
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="`date`", type="date")
     */
    protected $date;

    /**
     * @Column(type="integer")
     */
    protected $heroisme;

    /**
     * @Column(type="text")
     */
    protected $explication;

    /**
     * @ManyToOne(targetEntity="Personnage", inversedBy="heroismeHistories")
     * @JoinColumn(name="personnage_id", referencedColumnName="id", nullable=false)
     */
    protected $personnage;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\HeroismeHistory
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
     * Set the value of date.
     *
     * @param \DateTime $date
     * @return \LarpManager\Entities\HeroismeHistory
     */
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of date.
     *
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of heroisme.
     *
     * @param integer $heroisme
     * @return \LarpManager\Entities\HeroismeHistory
     */
    public function setHeroisme($heroisme)
    {
        $this->heroisme = $heroisme;

        return $this;
    }

    /**
     * Get the value of heroisme.
     *
     * @return integer
     */
    public function getHeroisme()
    {
        return $this->heroisme;
    }

    /**
     * Set the value of explication.
     *
     * @param string $explication
     * @return \LarpManager\Entities\HeroismeHistory
     */
    public function setExplication($explication)
    {
        $this->explication = $explication;

        return $this;
    }

    /**
     * Get the value of explication.
     *
     * @return string
     */
    public function getExplication()
    {
        return $this->explication;
    }

    /**
     * Set Personnage entity (many to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\HeroismeHistory
     */
    public function setPersonnage(Personnage $personnage = null)
    {
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get Personnage entity (many to one).
     *
     * @return \LarpManager\Entities\Personnage
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    public function __sleep()
    {
        return array('id', 'date', 'heroisme', 'explication', 'personnage_id');
    }
}