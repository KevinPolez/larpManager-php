<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-03 10:39:18.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\GroupeHasIngredient
 *
 * @Entity()
 * @Table(name="groupe_has_ingredient", indexes={@Index(name="fk_groupe_has_ingredient_groupe1_idx", columns={"groupe_id"}), @Index(name="fk_groupe_has_ingredient_ingredient1_idx", columns={"ingredient_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseGroupeHasIngredient", "extended":"GroupeHasIngredient"})
 */
class BaseGroupeHasIngredient
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
     * @ManyToOne(targetEntity="Groupe", inversedBy="groupeHasIngredients", cascade={"persist", "remove"})
     * @JoinColumn(name="groupe_id", referencedColumnName="id", nullable=false)
     */
    protected $groupe;

    /**
     * @ManyToOne(targetEntity="Ingredient", inversedBy="groupeHasIngredients")
     * @JoinColumn(name="ingredient_id", referencedColumnName="id", nullable=false)
     */
    protected $ingredient;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\GroupeHasIngredient
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
     * @return \LarpManager\Entities\GroupeHasIngredient
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
     * @return \LarpManager\Entities\GroupeHasIngredient
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
     * Set Ingredient entity (many to one).
     *
     * @param \LarpManager\Entities\Ingredient $ingredient
     * @return \LarpManager\Entities\GroupeHasIngredient
     */
    public function setIngredient(Ingredient $ingredient = null)
    {
        $this->ingredient = $ingredient;

        return $this;
    }

    /**
     * Get Ingredient entity (many to one).
     *
     * @return \LarpManager\Entities\Ingredient
     */
    public function getIngredient()
    {
        return $this->ingredient;
    }

    public function __sleep()
    {
        return array('id', 'quantite', 'groupe_id', 'ingredient_id');
    }
}