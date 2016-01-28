<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2015 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
		$em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager"); 
		$lista = $em->getRepository("Application\Entity\User")->findAll(); 
		return new ViewModel(array('lista' => $lista));
    }

    public function addAction(){
    	$request = $this->getRequest();
    	$result = array();
    	if($request->isPost())
    	{
    		try {
                $nome = $request->getPost("nome"); 		
                $user = new \Application\Model\User();
                $user->setName($nome);
                $em = $this->getServiceLocator()->get("Doctrine\ORM\EntityManager");
	            $em->persist($user);
	            $em->flush();
    		} catch (Exception $e) {
    			
    		}
    	}
    }
}
