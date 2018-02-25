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
        $product->setSkaicius(23);
        $product->setText('keli simtai');
        $em->persist($product);
        $em->flush();

       $product1 = $this->getDoctrine()
           ->getRepository(Product::class)
           ->findBySkaicius(112);
       if (!$product1) {

               $message ='No product found for id 1';

       }else {
           foreach ($product1 as $prod) {
               $message = $prod->getText();
           }
       }



        return $this->render('Test/test.html.twig', [
            'something'=> 'Product skaicius is '.$message,
            'products' => $product1,
        ]);
    }
}