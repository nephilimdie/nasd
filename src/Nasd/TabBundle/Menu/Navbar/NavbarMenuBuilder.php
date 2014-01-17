<?php

namespace Nasd2\TabBundle\Menu\Navbar;

use Knp\Menu\FactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Security\Core\SecurityContextInterface;
use Mopa\Bundle\BootstrapBundle\Navbar\AbstractNavbarMenuBuilder;

class NavbarMenuBuilder extends AbstractNavbarMenuBuilder
{
    protected $securityContext;
    protected $isLoggedIn;
    protected $usr = null;
    
    private $factory;

    public function __construct(FactoryInterface $factory, SecurityContextInterface $securityContext)
    {
        $this->factory = $factory;
        
        $this->securityContext = $securityContext;
        $this->isLoggedIn = $this->securityContext->isGranted('IS_AUTHENTICATED_FULLY');
        if($this->isLoggedIn) {
            $this->usr = $securityContext->getToken()->getUser();
        }
    }

    public function createMainMenu(Request $request)
    {
        $menu = $this->factory->createItem('root', array(
            'navbar' => true,
            'pull-right' => true,
        ));
        
        //$menu->setChildrenAttribute('class', 'nav');

        $home = $menu->addChild('Home', array(
            'icon' => 'home',
            'route' => 'index',
        ));
        $biblio = $menu->addChild('Bibliography', array(
            'icon' => 'book',
            'route' => 'bibliography',
        ));
        $media = $menu->addChild('Media', array(
            'icon' => 'picture',
            'route' => 'default_index',
        ));
        $about = $menu->addChild('About', array(
            'icon' => 'exclamation-sign',
            'route' => 'about',
        ));

        return $menu;
    }

    public function createRightSideDropdownMenu(Request $request)
    {
        
        $menu = $this->factory->createItem('root');
        $menu->setChildrenAttribute('class', 'nav pull-right');

        $dropdown = $menu->addChild('User', array(
            'dropdown' => true,
            'caret' => true,
        ));
        
        if ($this->isLoggedIn) {
            $dropdown->setLabel($this->usr->getUsername());
            $dropdown->addChild('Logout', array('route' => 'fos_user_security_logout'));
        } else {
            $dropdown->addChild('login', array('route' => 'fos_user_security_login'));
        }
        return $menu;
    }
}