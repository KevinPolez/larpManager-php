<?php

/**
 * Auto generated by MySQL Workbench Schema Exporter.
 * Version 2.1.6-dev (doctrine2-annotation) on 2015-08-19 12:25:00.
 * Goto https://github.com/johmue/mysql-workbench-schema-exporter for more
 * information.
 */

namespace LarpManager\Entities;

use LarpManager\Entities\BaseAppelation;

/**
 * LarpManager\Entities\Appelation
 *
 * @Entity()
 */
class Appelation extends BaseAppelation
{
	public function __toString()
	{
		return $this->getLabelTree();
	}
	

	/**
	 * Calcule le nombre d'étape necessaire pour revenir au parent le plus ancien
	 */
	public function stepCount($count = 0)
	{
		if ( $this->getAppelation() )
		{
			return $this->getAppelation()->stepCount($count+1);
		}
		return $count;
	}
	
	public function getLabelTree()
	{
		$string = $this->getLabel();

		if ( $this->getAppelations()->count() != 0 )
		{
			$string .= ' > ';
			$string .= implode(', ', $this->getAppelations()->toArray());
		}
		
		return $string;
	}
}