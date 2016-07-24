<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2016-02-17 11:46:03.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseGroupeAllie;

/**
 * LarpManager\Entities\GroupeAllie
 *
 * @Entity(repositoryClass="LarpManager\Repository\GroupeAllieRepository")
 */
class GroupeAllie extends BaseGroupeAllie
{
	public function setGroupe($groupe)
	{
		return $this->setGroupeRelatedByGroupeId($groupe);
	}
	
	public function getGroupe()
	{
		return $this->getGroupeRelatedByGroupeId();
	}
	
	public function setRequestedGroupe($groupe)
	{
		return $this->setGroupeRelatedByGroupeAllieId($groupe);
	}
	
	public function getRequestedGroupe()
	{
		return $this->getGroupeRelatedByGroupeAllieId();
	}
}