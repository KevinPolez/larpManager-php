<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-03-16 09:31:51.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\Background
 *
 * @Entity()
 * @Table(name="background", indexes={@Index(name="fk_background_groupe1_idx", columns={"groupe_id"}), @Index(name="fk_background_user1_idx", columns={"user_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseBackground", "extended":"Background"})
 */
class BaseBackground
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @Column(name="`text`", type="text", nullable=true)
     */
    protected $text;

    /**
     * @Column(type="string", length=45, nullable=true)
     */
    protected $visibility;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $creation_date;

    /**
     * @Column(type="datetime", nullable=true)
     */
    protected $update_date;

    /**
     * @ManyToOne(targetEntity="Groupe", inversedBy="backgrounds")
     * @JoinColumn(name="groupe_id", referencedColumnName="id", nullable=false)
     */
    protected $groupe;

    /**
     * @ManyToOne(targetEntity="User", inversedBy="backgrounds")
     * @JoinColumn(name="user_id", referencedColumnName="id", nullable=false)
     */
    protected $user;

    public function __construct()
    {
    }

    /**
     * Set the value of id.
     *
     * @param integer $id
     * @return \LarpManager\Entities\Background
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
     * Set the value of text.
     *
     * @param string $text
     * @return \LarpManager\Entities\Background
     */
    public function setText($text)
    {
        $this->text = $text;

        return $this;
    }

    /**
     * Get the value of text.
     *
     * @return string
     */
    public function getText()
    {
        return $this->text;
    }

    /**
     * Set the value of visibility.
     *
     * @param string $visibility
     * @return \LarpManager\Entities\Background
     */
    public function setVisibility($visibility)
    {
        $this->visibility = $visibility;

        return $this;
    }

    /**
     * Get the value of visibility.
     *
     * @return string
     */
    public function getVisibility()
    {
        return $this->visibility;
    }

    /**
     * Set the value of creation_date.
     *
     * @param \DateTime $creation_date
     * @return \LarpManager\Entities\Background
     */
    public function setCreationDate($creation_date)
    {
        $this->creation_date = $creation_date;

        return $this;
    }

    /**
     * Get the value of creation_date.
     *
     * @return \DateTime
     */
    public function getCreationDate()
    {
        return $this->creation_date;
    }

    /**
     * Set the value of update_date.
     *
     * @param \DateTime $update_date
     * @return \LarpManager\Entities\Background
     */
    public function setUpdateDate($update_date)
    {
        $this->update_date = $update_date;

        return $this;
    }

    /**
     * Get the value of update_date.
     *
     * @return \DateTime
     */
    public function getUpdateDate()
    {
        return $this->update_date;
    }

    /**
     * Set Groupe entity (many to one).
     *
     * @param \LarpManager\Entities\Groupe $groupe
     * @return \LarpManager\Entities\Background
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
     * Set User entity (many to one).
     *
     * @param \LarpManager\Entities\User $user
     * @return \LarpManager\Entities\Background
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

    public function __sleep()
    {
        return array('id', 'text', 'visibility', 'creation_date', 'update_date', 'groupe_id', 'user_id');
    }
}