<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-03-16 09:31:51.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\Chronologie
 *
 * @Entity()
 * @Table(name="chronologie", indexes={@Index(name="fk_chronologie_zone_politique1_idx", columns={"zone_politique_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseChronologie", "extended":"Chronologie"})
 */
class BaseChronologie
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="text")
     */
    protected $description;

    /**
     * @Column(name="`year`", type="integer")
     */
    protected $year;

    /**
     * @Column(name="`month`", type="integer", nullable=true)
     */
    protected $month;

    /**
     * @Column(name="`day`", type="integer", nullable=true)
     */
    protected $day;

    /**
     * @Column(type="string", length=45)
     */
    protected $visibilite;

    /**
     * @ManyToOne(targetEntity="Territoire", inversedBy="chronologies")
     * @JoinColumn(name="zone_politique_id", referencedColumnName="id", nullable=false)
     */
    protected $territoire;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Chronologie
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
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Chronologie
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get the value of description.
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of year.
     *
     * @param integer $year
     * @return \LarpManager\Entities\Chronologie
     */
    public function setYear($year)
    {
        $this->year = $year;

        return $this;
    }

    /**
     * Get the value of year.
     *
     * @return integer
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * Set the value of month.
     *
     * @param integer $month
     * @return \LarpManager\Entities\Chronologie
     */
    public function setMonth($month)
    {
        $this->month = $month;

        return $this;
    }

    /**
     * Get the value of month.
     *
     * @return integer
     */
    public function getMonth()
    {
        return $this->month;
    }

    /**
     * Set the value of day.
     *
     * @param integer $day
     * @return \LarpManager\Entities\Chronologie
     */
    public function setDay($day)
    {
        $this->day = $day;

        return $this;
    }

    /**
     * Get the value of day.
     *
     * @return integer
     */
    public function getDay()
    {
        return $this->day;
    }

    /**
     * Set the value of visibilite.
     *
     * @param string $visibilite
     * @return \LarpManager\Entities\Chronologie
     */
    public function setVisibilite($visibilite)
    {
        $this->visibilite = $visibilite;

        return $this;
    }

    /**
     * Get the value of visibilite.
     *
     * @return string
     */
    public function getVisibilite()
    {
        return $this->visibilite;
    }

    /**
     * Set Territoire entity (many to one).
     *
     * @param \LarpManager\Entities\Territoire $territoire
     * @return \LarpManager\Entities\Chronologie
     */
    public function setTerritoire(Territoire $territoire = null)
    {
        $this->territoire = $territoire;

        return $this;
    }

    /**
     * Get Territoire entity (many to one).
     *
     * @return \LarpManager\Entities\Territoire
     */
    public function getTerritoire()
    {
        return $this->territoire;
    }

    public function __sleep()
    {
        return array('id', 'description', 'zone_politique_id', 'year', 'month', 'day', 'visibilite');
    }
}