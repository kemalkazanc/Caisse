<?php 

namespace App\Tests\Entity;

use App\Entity\User;
use Symfony\Bundle\FrameworkBundle\Test\KernelTestCase;


class UserEntity extends KernelTestCase {
    public function testUser() {

        //On creer un objet
        $test = new User; 

        //On fait appel à l'objet et on lui donne des paramètre
        $test->setemail('dupond@dupont.fr'); 

        //On récupère l'objet avec l'assert 
        $this->assertEquals('dupon@dupont.fr', $test->getEmail()); 
    }
}
