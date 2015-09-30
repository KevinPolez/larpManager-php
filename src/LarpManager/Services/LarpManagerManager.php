<?php

namespace LarpManager\Services;

use Silex\Application;
use Doctrine\Common\Collections\ArrayCollection;

class LarpManagerManager
{
	
	/** @var \Silex\Application */
	protected $app;

	/**
	 * Constructeur
	 * 
	 * @param \Silex\Application $app
	 */
	public function __construct(Application $app)
	{
		$this->app = $app;
	}

	/**
	 * Fourni le gn actif
	 */
	public function getGnActif()
	{
		$repo = $this->app['orm.em']->getRepository('\LarpManager\Entities\Gn');
		return $repo->findGnActif();
	}
	
	/**
	 * Fourni la liste des ROLES utilisé dans LarpManager
	 * @return Array $availablesRoles
	 */
	public function getAvailableRoles()
	{
		$availableRoles = array(
				array('label' => 'ROLE_USER', 'descr' => 'Utilisateur de larpManager'),
				array('label' => 'ROLE_ORGA', 'descr' => 'Organisateur'),
				array('label' => 'ROLE_ADMIN', 'descr' => 'Droit de modification sur tout'),
				array('label' => 'ROLE_STOCK', 'descr' => 'Droit de modification sur le stock'),
				array('label' => 'ROLE_REGLE', 'descr' => 'Droit de modification sur les règles'),
				array('label' => 'ROLE_SCENARISTE', 'descr' => 'Droit de modification sur le scénario, les groupes et le background'),
				array('label' => 'ROLE_MODERATOR', 'descr' => 'Modération du forum'),
		);
		return $availableRoles;
	}
	
	/**
	 * Fourni la 
	 * @return string[]
	 */
	public function getAvailableTopicRight()
	{
		$availableTopicRight = array(
			'GN_PARTICIPANT' => 'L\'utilisateur doit participer au GN',
			'GROUPE_MEMBER' => 'L\'utilisateur doit être membre du groupe',
			'GROUPE_SECONDAIRE_MEMBER' => 'Le personnage de l\'utilisateur doit être membre du groupe secondaire',
			'CULTE' => 'Le personnage de l\'utilisateur doit suivre cette religion',
			'ORGA' => 'L\'utilisateur doit disposer du role ORGA',
		);
		return $availableTopicRight;
	}
	
	/**
	 * Fourni la liste des compétences de premier niveau
	 * @return Collection $competences
	 */
	public function getRootCompetences()
	{
		$rootCompetences = new ArrayCollection();
	
		$repo = $this->app['orm.em']->getRepository('\LarpManager\Entities\CompetenceFamily');
		$competenceFamilies = $repo->findAll();
	
		foreach ( $competenceFamilies as $competenceFamily)
		{
			$competence = $competenceFamily->getFirstCompetence();
			if ( $competence )
			{
				$rootCompetences->add($competence);
			}
		}
	
		return $rootCompetences;
	}
	
	/**
	 * Trouve un topic en fonction de sa clé
	 * 
	 * @param unknown $topicKey
	 */
	public function findTopic($topicKey)
	{
		$repoTopic = $this->app['orm.em']->getRepository('\LarpManager\Entities\Topic');
		return $repoTopic->findOneByKey($topicKey);
	}

	/**
	 * Il faut classer les territoires par groupe de territoire
	 *
	 * @param Array $territoires
	 * @return Array $territoires
	 */
	public function sortTerritoire( Array $territoires)
	{
		$root = array();
		$result = array();
	
		// recherche des racines ( territoires n'ayant pas de parent
		// dans la liste des territoires fournis)
		foreach ( $territoires as $territoire)
		{
			if ( ! in_array($territoire->getTerritoire(),$territoires) )
			{
				$root[] = $territoire;
			}
		}
	
		foreach ( $root as $territoire)
		{
			if ( count($territoire->getTerritoires()) > 0 )
			{
				$childs = array_merge(
						array($territoire),
						$this->sortTerritoire($territoire->getTerritoires()->toArray())
						);
	
				$result = array_merge($result, $childs);
			}
			else
			{
				$result[] = $territoire;
			}
		}
	
		return $result;
	}
	
	/**
	 * Classement des appelations par groupe
	 *
	 * @param Array $appelations
	 * @return Array $appelations
	 */
	public function sortAppelation( Array $appelations)
	{
		$root = array();
		$result = array();
	
		// recherche des racines ( appelations n'ayant pas de parent
		// dans la liste des appelations fournis)
		foreach ( $appelations as $appelation)
		{
			if ( ! in_array($appelation->getAppelation(),$appelations) )
			{
				$root[] = $appelation;
			}
		}
	
		foreach ( $root as $appelation)
		{
			if ( count($appelation->getAppelations()) > 0 )
			{
				$childs = array_merge(
						array($appelation),
						$this->sortAppelation($appelation->getAppelations()->toArray())
						);
	
				$result = array_merge($result, $childs);
			}
			else
			{
				$result[] = $appelation;
			}
		}
	
		return $result;
	}
}