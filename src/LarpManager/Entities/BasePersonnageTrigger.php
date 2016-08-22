<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-08-22 10:01:21.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\PersonnageTrigger
 *
 * @Entity()
 * @Table(name="personnage_trigger", indexes={@Index(name="fk_trigger_personnage1_idx", columns={"personnage_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BasePersonnageTrigger", "extended":"PersonnageTrigger"})
 */
class BasePersonnageTrigger
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
    protected $tag;

    /**
     * @Column(type="boolean")
     */
    protected $done;

    /**
     * @ManyToOne(targetEntity="Personnage", inversedBy="personnageTriggers")
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
     * @return \LarpManager\Entities\PersonnageTrigger
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
     * Set the value of tag.
     *
     * @param string $tag
     * @return \LarpManager\Entities\PersonnageTrigger
     */
    public function setTag($tag)
    {
        $this->tag = $tag;

        return $this;
    }

    /**
     * Get the value of tag.
     *
     * @return string
     */
    public function getTag()
    {
        return $this->tag;
    }

    /**
     * Set the value of done.
     *
     * @param boolean $done
     * @return \LarpManager\Entities\PersonnageTrigger
     */
    public function setDone($done)
    {
        $this->done = $done;

        return $this;
    }

    /**
     * Get the value of done.
     *
     * @return boolean
     */
    public function getDone()
    {
        return $this->done;
    }

    /**
     * Set Personnage entity (many to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\PersonnageTrigger
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
        return array('id', 'personnage_id', 'tag', 'done');
    }
}