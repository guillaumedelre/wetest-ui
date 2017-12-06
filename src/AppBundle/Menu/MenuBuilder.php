<?php
/**
 * Created by PhpStorm.
 * User: gdelre
 * Date: 29/10/17
 * Time: 15:33
 */

namespace AppBundle\Menu;

use Knp\Menu\FactoryInterface;

class MenuBuilder
{
    /**
     * @var FactoryInterface
     */
    private $factory;

    /**
     * @var array
     */
    private $menus;

    /**
     * MenuBuilder constructor.
     *
     * @param FactoryInterface $factory
     * @param array            $menus
     */
    public function __construct(FactoryInterface $factory, array $menus = [])
    {
        $this->factory = $factory;
        foreach ($menus as $menu) {
            $this->menus[] = $this->createMenu($menu);
        }
    }

    public function createMenu(array $data)
    {
        $menu = $this->factory->createItem('root');
        foreach ($data as $child) {
            $menu->addChild($child['label'], $child['options']);
        }

        // access services from the container!
        $em = $this->container->get('doctrine')->getManager();
        // findMostRecent and Blog are just imaginary examples
        $blog = $em->getRepository('AppBundle:Blog')->findMostRecent();

        $menu->addChild('Latest Blog Post', array(
            'route' => 'blog_show',
            'routeParameters' => array('id' => $blog->getId())
        ));

        // create another menu item
        $menu->addChild('About Me', array('route' => 'about'));
        // you can also add sub level's to your menu's as follows
        $menu['About Me']->addChild('Edit profile', array('route' => 'edit_profile'));

        // ... add more children

        return $menu;
    }
}