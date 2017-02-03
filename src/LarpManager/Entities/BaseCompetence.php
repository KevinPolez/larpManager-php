<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2017-02-03 10:39:16.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Competence
 *
 * @Entity()
 * @Table(name="competence", indexes={@Index(name="fk_competence_niveau_competence1_idx", columns={"competence_family_id"}), @Index(name="fk_competence_niveau_niveau1_idx", columns={"level_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseCompetence", "extended":"Competence"})
 */
class BaseCompetence
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @Column(type="string", length=45, nullable=true)
     */
    protected $documentUrl;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $materiel;

    /**
     * @OneToMany(targetEntity="ExperienceUsage", mappedBy="competence")
     * @JoinColumn(name="id", referencedColumnName="competence_id", nullable=false)
     */
    protected $experienceUsages;

    /**
     * @OneToMany(targetEntity="PersonnageSecondaireCompetence", mappedBy="competence", cascade={"persist"})
     * @JoinColumn(name="id", referencedColumnName="competence_id", nullable=false)
     */
    protected $personnageSecondaireCompetences;

    /**
     * @ManyToOne(targetEntity="CompetenceFamily", inversedBy="competences", cascade={"persist"})
     * @JoinColumn(name="competence_family_id", referencedColumnName="id", nullable=false)
     */
    protected $competenceFamily;

    /**
     * @ManyToOne(targetEntity="Level", inversedBy="competences", cascade={"persist"})
     * @JoinColumn(name="level_id", referencedColumnName="id")
     */
    protected $level;

    /**
     * @ManyToMany(targetEntity="Personnage", inversedBy="competences")
     * @JoinTable(name="personnages_competences",
     *     joinColumns={@JoinColumn(name="competence_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@JoinColumn(name="personnage_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $personnages;

    public function __construct()
    {
        $this->experienceUsages = new ArrayCollection();
        $this->personnageSecondaireCompetences = new ArrayCollection();
        $this->personnages = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Competence
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
     * @return \LarpManager\Entities\Competence
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
     * Set the value of documentUrl.
     *
     * @param string $documentUrl
     * @return \LarpManager\Entities\Competence
     */
    public function setDocumentUrl($documentUrl)
    {
        $this->documentUrl = $documentUrl;

        return $this;
    }

    /**
     * Get the value of documentUrl.
     *
     * @return string
     */
    public function getDocumentUrl()
    {
        return $this->documentUrl;
    }

    /**
     * Set the value of materiel.
     *
     * @param string $materiel
     * @return \LarpManager\Entities\Competence
     */
    public function setMateriel($materiel)
    {
        $this->materiel = $materiel;

        return $this;
    }

    /**
     * Get the value of materiel.
     *
     * @return string
     */
    public function getMateriel()
    {
        return $this->materiel;
    }

    /**
     * Add ExperienceUsage entity to collection (one to many).
     *
     * @param \LarpManager\Entities\ExperienceUsage $experienceUsage
     * @return \LarpManager\Entities\Competence
     */
    public function addExperienceUsage(ExperienceUsage $experienceUsage)
    {
        $this->experienceUsages[] = $experienceUsage;

        return $this;
    }

    /**
     * Remove ExperienceUsage entity from collection (one to many).
     *
     * @param \LarpManager\Entities\ExperienceUsage $experienceUsage
     * @return \LarpManager\Entities\Competence
     */
    public function removeExperienceUsage(ExperienceUsage $experienceUsage)
    {
        $this->experienceUsages->removeElement($experienceUsage);

        return $this;
    }

    /**
     * Get ExperienceUsage entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getExperienceUsages()
    {
        return $this->experienceUsages;
    }

    /**
     * Add PersonnageSecondaireCompetence entity to collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageSecondaireCompetence $personnageSecondaireCompetence
     * @return \LarpManager\Entities\Competence
     */
    public function addPersonnageSecondaireCompetence(PersonnageSecondaireCompetence $personnageSecondaireCompetence)
    {
        $this->personnageSecondaireCompetences[] = $personnageSecondaireCompetence;

        return $this;
    }

    /**
     * Remove PersonnageSecondaireCompetence entity from collection (one to many).
     *
     * @param \LarpManager\Entities\PersonnageSecondaireCompetence $personnageSecondaireCompetence
     * @return \LarpManager\Entities\Competence
     */
    public function removePersonnageSecondaireCompetence(PersonnageSecondaireCompetence $personnageSecondaireCompetence)
    {
        $this->personnageSecondaireCompetences->removeElement($personnageSecondaireCompetence);

        return $this;
    }

    /**
     * Get PersonnageSecondaireCompetence entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnageSecondaireCompetences()
    {
        return $this->personnageSecondaireCompetences;
    }

    /**
     * Set CompetenceFamily entity (many to one).
     *
     * @param \LarpManager\Entities\CompetenceFamily $competenceFamily
     * @return \LarpManager\Entities\Competence
     */
    public function setCompetenceFamily(CompetenceFamily $competenceFamily = null)
    {
        $this->competenceFamily = $competenceFamily;

        return $this;
    }

    /**
     * Get CompetenceFamily entity (many to one).
     *
     * @return \LarpManager\Entities\CompetenceFamily
     */
    public function getCompetenceFamily()
    {
        return $this->competenceFamily;
    }

    /**
     * Set Level entity (many to one).
     *
     * @param \LarpManager\Entities\Level $level
     * @return \LarpManager\Entities\Competence
     */
    public function setLevel(Level $level = null)
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get Level entity (many to one).
     *
     * @return \LarpManager\Entities\Level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Add Personnage entity to collection.
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Competence
     */
    public function addPersonnage(Personnage $personnage)
    {
        $personnage->addCompetence($this);
        $this->personnages[] = $personnage;

        return $this;
    }

    /**
     * Remove Personnage entity from collection.
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Competence
     */
    public function removePersonnage(Personnage $personnage)
    {
        $personnage->removeCompetence($this);
        $this->personnages->removeElement($personnage);

        return $this;
    }

    /**
     * Get Personnage entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPersonnages()
    {
        return $this->personnages;
    }

    public function __sleep()
    {
        return array('id', 'description', 'competence_family_id', 'level_id', 'documentUrl', 'materiel');
    }
}