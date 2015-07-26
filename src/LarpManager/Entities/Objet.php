<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-07-07 22:08:08.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseObjet;
use JsonSerializable;

/**
 * LarpManager\Entities\Objet
 *
 * @Entity()
 */
class Objet extends BaseObjet implements JsonSerializable
{

	public function jsonSerialize() {
		return array(
			'nom' => ( $this->getNom() ) ? $this->getNom() : '',
			'code' => ( $this->getcode() ) ? $this->getCode() : '',
			'description' => ($this->getDescription() ) ? $this->getDescription(): '',
			'photo' => ($this->getPhoto() ) ? $this->getPhoto()->getRealName(): '',
			'localisation' => ( $this->getLocalisation() ) ? $this->getLocalisation()->getLabel() : '', 
			'etat' => ( $this->getEtat() ) ? $this->getEtat()->getLabel() : '',
			'proprietaire' => ( $this->getProprietaire() ) ? $this->getProprietaire()->getNom() : '',
			'responsable' => ( $this->getResponsable() ) ? $this->getResponsable()->getUserName() : '',
			'nombre' => $this->getNombre(),
			'creation_date' => ( $this->getCreationDate() ) ? $this->getCreationDate()->format('Y-m-d H:i:s') : '',
		);
	}
	
	/**
	 * Get Users entity related by `responsable_id` (many to one).
	 *
	 * @return \LarpManager\Entities\Users
	 */
	public function getResponsable() {
		return $this->getUsersRelatedByResponsableId();
	}
	
	/**
	 * Set Users entity related by `responsable_id` (many to one).
	 *
	 * @param \LarpManager\Entities\Users $users
	 * @return \LarpManager\Entities\Objet
	 */
	function setResponsable(Users $users = null) {
		return $this->setUsersRelatedByResponsableId($users);
	}
	
	/**
	 * Get Users entity related by `createur_id` (many to one).
	 *
	 * @return \LarpManager\Entities\Users
	 */
	function getCreateur() {
		return $this->getUsersRelatedByResponsableId();
	}

	/**
	 * Set Users entity related by `createur_id` (many to one).
	 *
	 * @param \LarpManager\Entities\Users $users
	 * @return \LarpManager\Entities\Objet
	 */
	function setCreateur(Users $users = null) {
		return $this->setUsersRelatedByCreateurId($users);
	}
}
