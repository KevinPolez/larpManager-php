<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-04-21 14:43:23.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Gn
 *
 * @Entity()
 * @Table(name="gn", indexes={@Index(name="fk_gn_topic1_idx", columns={"topic_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseGn", "extended":"Gn"})
 */
class BaseGn
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
     * @Column(type="integer", nullable=true)
     */
    protected $xp_creation;

    /**
     * @Column(type="text", nullable=true)
     */
    protected $description;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $date_debut;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $date_fin;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $date_installation_joueur;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $date_fin_orga;

    /**
     * @Column(type="string", length=45, nullable=true)
     */
    protected $adresse;

    /**
     * @Column(type="boolean")
     */
    protected $actif;

    /**
     * @OneToMany(targetEntity="Participant", mappedBy="gn", cascade={"persist"})
     * @JoinColumn(name="id", referencedColumnName="gn_id", nullable=false)
     */
    protected $participants;

    /**
     * @ManyToOne(targetEntity="Topic", inversedBy="gns", cascade={"persist"})
     * @JoinColumn(name="topic_id", referencedColumnName="id", nullable=false)
     */
    protected $topic;

    /**
     * @ManyToMany(targetEntity="Groupe", inversedBy="gns", cascade={"persist"})
     * @JoinTable(name="groupe_gn",
     *     joinColumns={@JoinColumn(name="gn_id", referencedColumnName="id", nullable=false)},
     *     inverseJoinColumns={@JoinColumn(name="groupe_id", referencedColumnName="id", nullable=false)}
     * )
     */
    protected $groupes;

    public function __construct()
    {
        $this->participants = new ArrayCollection();
        $this->groupes = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Gn
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
     * @return \LarpManager\Entities\Gn
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
     * Set the value of xp_creation.
     *
     * @param integer $xp_creation
     * @return \LarpManager\Entities\Gn
     */
    public function setXpCreation($xp_creation)
    {
        $this->xp_creation = $xp_creation;

        return $this;
    }

    /**
     * Get the value of xp_creation.
     *
     * @return integer
     */
    public function getXpCreation()
    {
        return $this->xp_creation;
    }

    /**
     * Set the value of description.
     *
     * @param string $description
     * @return \LarpManager\Entities\Gn
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
     * Set the value of date_debut.
     *
     * @param \DateTime $date_debut
     * @return \LarpManager\Entities\Gn
     */
    public function setDateDebut($date_debut)
    {
        $this->date_debut = $date_debut;

        return $this;
    }

    /**
     * Get the value of date_debut.
     *
     * @return \DateTime
     */
    public function getDateDebut()
    {
        return $this->date_debut;
    }

    /**
     * Set the value of date_fin.
     *
     * @param \DateTime $date_fin
     * @return \LarpManager\Entities\Gn
     */
    public function setDateFin($date_fin)
    {
        $this->date_fin = $date_fin;

        return $this;
    }

    /**
     * Get the value of date_fin.
     *
     * @return \DateTime
     */
    public function getDateFin()
    {
        return $this->date_fin;
    }

    /**
     * Set the value of date_installation_joueur.
     *
     * @param \DateTime $date_installation_joueur
     * @return \LarpManager\Entities\Gn
     */
    public function setDateInstallationJoueur($date_installation_joueur)
    {
        $this->date_installation_joueur = $date_installation_joueur;

        return $this;
    }

    /**
     * Get the value of date_installation_joueur.
     *
     * @return \DateTime
     */
    public function getDateInstallationJoueur()
    {
        return $this->date_installation_joueur;
    }

    /**
     * Set the value of date_fin_orga.
     *
     * @param \DateTime $date_fin_orga
     * @return \LarpManager\Entities\Gn
     */
    public function setDateFinOrga($date_fin_orga)
    {
        $this->date_fin_orga = $date_fin_orga;

        return $this;
    }

    /**
     * Get the value of date_fin_orga.
     *
     * @return \DateTime
     */
    public function getDateFinOrga()
    {
        return $this->date_fin_orga;
    }

    /**
     * Set the value of adresse.
     *
     * @param string $adresse
     * @return \LarpManager\Entities\Gn
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of adresse.
     *
     * @return string
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of actif.
     *
     * @param boolean $actif
     * @return \LarpManager\Entities\Gn
     */
    public function setActif($actif)
    {
        $this->actif = $actif;

        return $this;
    }

    /**
     * Get the value of actif.
     *
     * @return boolean
     */
    public function getActif()
    {
        return $this->actif;
    }

    /**
     * Add Participant entity to collection (one to many).
     *
     * @param \LarpManager\Entities\Participant $participant
     * @return \LarpManager\Entities\Gn
     */
    public function addParticipant(Participant $participant)
    {
        $this->participants[] = $participant;

        return $this;
    }

    /**
     * Remove Participant entity from collection (one to many).
     *
     * @param \LarpManager\Entities\Participant $participant
     * @return \LarpManager\Entities\Gn
     */
    public function removeParticipant(Participant $participant)
    {
        $this->participants->removeElement($participant);

        return $this;
    }

    /**
     * Get Participant entity collection (one to many).
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getParticipants()
    {
        return $this->participants;
    }

    /**
     * Set Topic entity (many to one).
     *
     * @param \LarpManager\Entities\Topic $topic
     * @return \LarpManager\Entities\Gn
     */
    public function setTopic(Topic $topic = null)
    {
        $this->topic = $topic;

        return $this;
    }

    /**
     * Get Topic entity (many to one).
     *
     * @return \LarpManager\Entities\Topic
     */
    public function getTopic()
    {
        return $this->topic;
    }

    /**
     * Add Groupe entity to collection.
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Gn
     */
    public function addGroupe(Groupe $groupe)
    {
        $groupe->addGn($this);
        $this->groupes[] = $groupe;

        return $this;
    }

    /**
     * Remove Groupe entity from collection.
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Gn
     */
    public function removeGroupe(Groupe $groupe)
    {
        $groupe->removeGn($this);
        $this->groupes->removeElement($groupe);

        return $this;
    }

    /**
     * Get Groupe entity collection.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroupes()
    {
        return $this->groupes;
    }

    public function __sleep()
    {
        return array('id', 'label', 'xp_creation', 'description', 'date_debut', 'date_fin', 'date_installation_joueur', 'date_fin_orga', 'adresse', 'topic_id', 'actif');
    }
}