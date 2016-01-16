<?php
namespace Application\Entity;
use Doctrine\ORM\Mapping as ORM;

/** @ORM\Entity */
class User
{
    /**
    * @ORM\Id
    * @ORM\GeneratedValue(strategy="AUTO")
    * @ORM\Column(type="integer")
    */
    protected $id;

    /** @ORM\Column(type="string") */
    protected $Name;

	public function getId() { 
		return $this->id; 
	} 
	public function setId($id) { 
		$this->id = $id; 
	} 

	public function getName() { 
		return $this->Name; 
	} 
	public function setNome($Name) { 
		$this->Name = $Name; 
	}

}