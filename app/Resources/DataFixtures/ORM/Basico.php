<?php
use Doctrine\Common\DataFixtures\FixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Epublica\AlertaBundle\Entity\Alerta;
use Epublica\ListaBundle\Entity\Lista;
use Epublica\ObligacionBundle\Entity\Obligacion;
use Epublica\UsuarioBundle\Entity\Usuario;



class Basico implements FixtureInterface, ContainerAwareInterface
{
    private $container;

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
    
    public function load(ObjectManager $manager)
    {
        
        
    }
}