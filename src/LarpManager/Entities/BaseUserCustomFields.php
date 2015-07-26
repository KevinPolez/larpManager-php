<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-25 21:20:53.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

/**
 * LarpManager\Entities\UserCustomFields
 *
 * @Entity()
 * @Table(name="user_custom_fields", indexes={@Index(name="fk_user_custom_fields_users1_idx", columns={"user_id"})})
 * @InheritanceType("SINGLE_TABLE")
 * @DiscriminatorColumn(name="discr", type="string")
 * @DiscriminatorMap({"base":"BaseUserCustomFields", "extended":"UserCustomFields"})
 */
class BaseUserCustomFields
{
    /**
     * @Id
     * @Column(type="integer", options={"unsigned":true})
     */
    protected $user_id;

    /**
     * @Id
     * @Column(name="`attribute`", type="string", length=50)
     */
    protected $attribute;

    /**
     * @Column(name="`value`", type="string", length=255, nullable=true)
     */
    protected $value;

    /**
     * @ManyToOne(targetEntity="Users", inversedBy="userCustomFields")
     * @JoinColumn(name="user_id", referencedColumnName="id")
     */
    protected $users;

    public function __construct()
    {
    }

    /**
     * Set the value of user_id.
     *
     * @param integer $user_id
     * @return \LarpManager\Entities\UserCustomFields
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Get the value of user_id.
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Set the value of attribute.
     *
     * @param string $attribute
     * @return \LarpManager\Entities\UserCustomFields
     */
    public function setAttribute($attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }

    /**
     * Get the value of attribute.
     *
     * @return string
     */
    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * Set the value of value.
     *
     * @param string $value
     * @return \LarpManager\Entities\UserCustomFields
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Get the value of value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set Users entity (many to one).
     *
     * @param \LarpManager\Entities\Users $users
     * @return \LarpManager\Entities\UserCustomFields
     */
    public function setUsers(Users $users = null)
    {
        $this->users = $users;

        return $this;
    }

    /**
     * Get Users entity (many to one).
     *
     * @return \LarpManager\Entities\Users
     */
    public function getUsers()
    {
        return $this->users;
    }

    public function __sleep()
    {
        return array('user_id', 'attribute', 'value');
    }
}