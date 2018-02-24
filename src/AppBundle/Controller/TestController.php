<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.22
 * Time: 16.28
 */

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;;


class TestController extends Controller
{

    /**
     * @return mixed
     * @Route("/test", name="test")
     */
 public function testAction(){
     return $this->render('Test/test.html.twig', [
        'something'=> 'Nothing special',
     ]);
 }
}