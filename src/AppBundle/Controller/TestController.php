<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.22
 * Time: 16.28
 */

namespace AppBundle\Controller;

use AppBundle\Entity\Product;
use AppBundle\Repository\ProductRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Con


class TestController extends Controller
{

    /**
     * @return mixed
     * @Route("/test/{slug}", name="test")
     */
    public function testAction($slug){
        $em=$this->getDoctrine()->getManager();
        $product = new Product();
        $product->setSkaicius($slug);
        $product->setText('auto from slug');
        $em->persist($product);
        $em->flush();


       $product1 = $this->getDoctrine()
           ->getRepository(Product::class)
           ->findBySkaicius($slug);
       if (!$product1) {

               $message ='No product found for id 1';

       }else {
           $message = "";
           foreach ($product1 as $prod) {
               $message .= $prod->getId().", ";
           }
       }

        return $this->render('Test/test.html.twig', [
            'something'=> 'Product skaicius is '.$message,
            'products' => $product1,
            'slugas'=>$slug,
        ]);
    }
}