<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-03 10:39:18.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\GroupeHasRessource
 *
 * @Entity()
 * @Table(name="groupe_has_ressource", indexes={@Index(name="fk_groupe_has_ressource_groupe1_idx", columns={"groupe_id"}), @Index(name="fk_groupe_has_ressource_ressource1_idx", columns={"ressource_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseGroupeHasRessource", "extended":"GroupeHasRessource"})
 */
class BaseGroupeHasRessource
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="integer")
     */
    protected $quantite;

    /**
     * @ManyToOne(targetEntity="Groupe", inversedBy="groupeHasRessources", cascade={"persist", "remove"})
     * @JoinColumn(name="groupe_id", referencedColumnName="id", nullable=false)
     */
    protected $groupe;

    /**
     * @ManyToOne(targetEntity="Ressource", inversedBy="groupeHasRessources")
     * @JoinColumn(name="ressource_id", referencedColumnName="id", nullable=false)
     */
    protected $ressource;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\GroupeHasRessource
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
     * Set the value of quantite.
     *
     * @param integer $quantite
     * @return \LarpManager\Entities\GroupeHasRessource
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get the value of quantite.
     *
     * @return integer
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set Groupe entity (many to one).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\GroupeHasRessource
     */
    public function setGroupe(Groupe $groupe = null)
    {
        $this->groupe = $groupe;

        return $this;
    }

    /**
     * Get Groupe entity (many to one).
     *
     * @return \LarpManager\Entities\Groupe
     */
    public function getGroupe()
    {
        return $this->groupe;
    }

    /**
     * Set Ressource entity (many to one).
     *
     * @param \LarpManager\Entities\Ressource $ressource
     * @return \LarpManager\Entities\GroupeHasRessource
     */
    public function setRessource(Ressource $ressource = null)
    {
        $this->ressource = $ressource;

        return $this;
    }

    /**
     * Get Ressource entity (many to one).
     *
     * @return \LarpManager\Entities\Ressource
     */
    public function getRessource()
    {
        return $this->ressource;
    }

    public function __sleep()
    {
        return array('id', 'quantite', 'groupe_id', 'ressource_id');
    }
}