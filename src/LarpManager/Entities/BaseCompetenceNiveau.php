<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-24 20:49:51.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\CompetenceNiveau
 *
 * @Entity()
 * @Table(name="competence_niveau", indexes={@Index(name="fk_competence_niveau_competence1_idx", columns={"competence_id"}), @Index(name="fk_competence_niveau_niveau1_idx", columns={"niveau_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseCompetenceNiveau", "extended":"CompetenceNiveau"})
 */
class BaseCompetenceNiveau
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="string", length=450, nullable=true)
     */
    protected $description;

    /**
     * @ManyToOne(targetEntity="Competence", inversedBy="competenceNiveaus")
     * @JoinColumn(name="competence_id", referencedColumnName="id")
     */
    protected $competence;

    /**
     * @ManyToOne(targetEntity="Niveau", inversedBy="competenceNiveaus")
     * @JoinColumn(name="niveau_id", referencedColumnName="id")
     */
    protected $niveau;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\CompetenceNiveau
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
     * @return \LarpManager\Entities\CompetenceNiveau
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
     * Set Competence entity (many to one).
     *
     * @param \LarpManager\Entities\Competence $competence
     * @return \LarpManager\Entities\CompetenceNiveau
     */
    public function setCompetence(Competence $competence = null)
    {
        $this->competence = $competence;

        return $this;
    }

    /**
     * Get Competence entity (many to one).
     *
     * @return \LarpManager\Entities\Competence
     */
    public function getCompetence()
    {
        return $this->competence;
    }

    /**
     * Set Niveau entity (many to one).
     *
     * @param \LarpManager\Entities\Niveau $niveau
     * @return \LarpManager\Entities\CompetenceNiveau
     */
    public function setNiveau(Niveau $niveau = null)
    {
        $this->niveau = $niveau;

        return $this;
    }

    /**
     * Get Niveau entity (many to one).
     *
     * @return \LarpManager\Entities\Niveau
     */
    public function getNiveau()
    {
        return $this->niveau;
    }

    public function __sleep()
    {
        return array('id', 'description', 'competence_id', 'niveau_id');
    }
}