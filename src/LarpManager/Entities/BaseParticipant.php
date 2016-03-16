<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-03-16 09:31:51.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use Doctrine\Common\Collections\ArrayCollection;

/**
 * LarpManager\Entities\Participant
 *
 * @Entity()
 * @Table(name="participant", indexes={@Index(name="fk_joueur_gn_gn1_idx", columns={"gn_id"}), @Index(name="fk_joueur_gn_user1_idx", columns={"user_id"}), @Index(name="fk_participant_groupe1_idx", columns={"groupe_id"}), @Index(name="fk_participant_personnage_secondaire1_idx", columns={"personnage_secondaire_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseParticipant", "extended":"Participant"})
 */
class BaseParticipant
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(type="datetime")
     */
    protected $subscription_date;

    /**
     * @OneToOne(targetEntity="Personnage", mappedBy="participant")
     */
    protected $personnage;

    /**
     * @ManyToOne(targetEntity="Gn", inversedBy="participants", cascade={"persist"})
     * @JoinColumn(name="gn_id", referencedColumnName="id", nullable=false)
     */
    protected $gn;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="participants")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;

    /**
     * @ManyToOne(targetEntity="Groupe", inversedBy="participants")
     * @JoinColumn(name="groupe_id", referencedColumnName="id")
     */
    protected $groupe;

    /**
     * @ManyToOne(targetEntity="PersonnageSecondaire", inversedBy="participants")
     * @JoinColumn(name="personnage_secondaire_id", referencedColumnName="id")
     */
    protected $personnageSecondaire;

    public function __construct()
    {
        $this->personnages = new ArrayCollection();
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Participant
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
     * Set the value of subscription_date.
     *
     * @param \DateTime $subscription_date
     * @return \LarpManager\Entities\Participant
     */
    public function setSubscriptionDate($subscription_date)
    {
        $this->subscription_date = $subscription_date;

        return $this;
    }

    /**
     * Get the value of subscription_date.
     *
     * @return \DateTime
     */
    public function getSubscriptionDate()
    {
        return $this->subscription_date;
    }

    /**
     * Set Personnage entity (one to one).
     *
     * @param \LarpManager\Entities\Personnage $personnage
     * @return \LarpManager\Entities\Participant
     */
    public function setPersonnage(Personnage $personnage = null)
    {
        $personnage->setParticipant($this);
        $this->personnage = $personnage;

        return $this;
    }

    /**
     * Get Personnage entity (one to one).
     *
     * @return \LarpManager\Entities\Personnage
     */
    public function getPersonnage()
    {
        return $this->personnage;
    }

    /**
     * Set Gn entity (many to one).
     *
     * @param \LarpManager\Entities\Gn $gn
     * @return \LarpManager\Entities\Participant
     */
    public function setGn(Gn $gn = null)
    {
        $this->gn = $gn;

        return $this;
    }

    /**
     * Get Gn entity (many to one).
     *
     * @return \LarpManager\Entities\Gn
     */
    public function getGn()
    {
        return $this->gn;
    }

    /**
     * Set User entity (many to one).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Participant
     */
    public function setUser(User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get User entity (many to one).
     *
     * @return \LarpManager\Entities\User
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set Groupe entity (many to one).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Participant
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
     * Set PersonnageSecondaire entity (many to one).
     *
     * @param \LarpManager\Entities\PersonnageSecondaire $personnageSecondaire
     * @return \LarpManager\Entities\Participant
     */
    public function setPersonnageSecondaire(PersonnageSecondaire $personnageSecondaire = null)
    {
        $this->personnageSecondaire = $personnageSecondaire;

        return $this;
    }

    /**
     * Get PersonnageSecondaire entity (many to one).
     *
     * @return \LarpManager\Entities\PersonnageSecondaire
     */
    public function getPersonnageSecondaire()
    {
        return $this->personnageSecondaire;
    }

    public function __sleep()
    {
        return array('id', 'gn_id', 'subscription_date', 'user_id', 'groupe_id', 'personnage_secondaire_id');
    }
}