<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.22
 * Time: 16.28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;;


class TestController extends Controller
{

//    /**
//     * @return mixed
//     * @Route("/test", name="test")
//     */
// public function testAction(){
//     $em=$this->getDoctrine()->getManager();
//     $product = new Product();
//     $product->setSkaicius(20);
//     $product->setText('dvidesimt');
//     $em->persist($product);
//     $em->flush();
//
//     $id = $product->getId();
//     return $this->render('Test/test.html.twig', [
//        'something'=> 'Product id is '.$id ,
//     ]);
// }

    /**
     * @return mixed
     * @Route("/test", name="test")
     */
    public function testAction(){
        $em=$this->getDoctrine()->getManager();
        $product = new Product();
        $product->setSkaicius(11);
        $product->setText('simtas');
        $em->persist($product);
        $em->flush();

       $product1 = $this->getDoctrine()
           ->getRepository(Product::class)
           ->find(7);
       if (!$product1) {
           throw $this->createNotFoundException(
               'No product found for id 1'
           );
       }else{
           $message = $product1->getSkaicius();
       }



        return $this->render('Test/test.html.twig', [
            'something'=> 'Product skaicius is '.$message,
        ]);
    }
}