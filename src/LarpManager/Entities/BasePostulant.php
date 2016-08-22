<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-22 10:01:22.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\Postulant
 *
 * @Entity()
 * @Table(name="postulant", indexes={@Index(name="fk_postulant_secondary_group1_idx", columns={"secondary_group_id"}), @Index(name="fk_postulant_personnage1_idx", columns={"personnage_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePostulant", "extended":"Postulant"})
 */
class BasePostulant
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="`date`", type="datetime", nullable=true)
     */
    protected $date;

    /**
     * @Column(type="text")
     */
    protected $explanation;

    /**
     * @Column(type="boolean", nullable=true)
     */
    protected $waiting;

    /**
     * @ManyToOne(targetEntity="SecondaryGroup", inversedBy="postulants")
     * @JoinColumn(name="secondary_group_id", referencedColumnName="id", nullable=false)
     */
    protected $secondaryGroup;

    /**
     * @ManyToOne(targetEntity="Personnage", inversedBy="postulants")
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
     * @return \LarpManager\Entities\Postulant
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
     * @return \LarpManager\Entities\Postulant
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
     * Set the value of explanation.
     *
     * @param string $explanation
     * @return \LarpManager\Entities\Postulant
     */
    public function setExplanation($explanation)
    {
        $this->explanation = $explanation;

        return $this;
    }

    /**
     * Get the value of explanation.
     *
     * @return string
     */
    public function getExplanation()
    {
        return $this->explanation;
    }

    /**
     * Set the value of waiting.
     *
     * @param boolean $waiting
     * @return \LarpManager\Entities\Postulant
     */
    public function setWaiting($waiting)
    {
        $this->waiting = $waiting;

        return $this;
    }

    /**
     * Get the value of waiting.
     *
     * @return boolean
     */
    public function getWaiting()
    {
        return $this->waiting;
    }

    /**
     * Set SecondaryGroup entity (many to one).
     *
     * @param \LarpManager\Entities\SecondaryGroup $secondaryGroup
     * @return \LarpManager\Entities\Postulant
     */
    public function setSecondaryGroup(SecondaryGroup $secondaryGroup = null)
    {
        $this->secondaryGroup = $secondaryGroup;

        return $this;
    }

    /**
     * Get SecondaryGroup entity (many to one).
     *
     * @return \LarpManager\Entities\SecondaryGroup
     */
    public function getSecondaryGroup()
    {
        return $this->secondaryGroup;
    }

    /**
     * Set Personnage entity (many to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Postulant
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
        return array('id', 'date', 'secondary_group_id', 'personnage_id', 'explanation', 'waiting');
    }
}