<?php
/**
 * Created by PhpStorm.
 * User: dalius
 * Date: 18.2.12
 * Time: 13.39
 */

namespace AppBundle\Controller;

use AppBundle\Form\Type\CustomerFormType;
use AppBundle\Form\Type\OrderFormType;
use AppBundle\Form\Type\UserType;
use Symfony\Component\Form\Extension\Core\Type\DateTimeType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Validator\Constraints\Email;

class ShopController extends Controller
{

    /**
     * @Route("/", name="home")
     * @return \Symfony\Component\HttpFoundation\Response
     *
     */
    public function homeAction(Request $request)
    {
        return $this->render('Shop/index.html.twig', []);
    }

    private function sendMail($body)
    {
        $mail = \Swift_Message::newInstance()
            ->setSubject('test mail')
            ->setFrom('someone@somewhere.com')
            ->setTo('daliusbu@gmail.com')
            ->setBody('message body goes here ' . $body);

        $this->get('mailer')->send($mail);
    }

    /**
     * @Route("/confOrder", name="confOrder")
     */
    public function confOrderAction(Request $request)
    {
        $orderQnt = $request->get('orderQnt');
        $user = $this->getUser();
        $formOrder = $this->createForm(OrderFormType::class);
        $formOrder->handleRequest($request);

        if ($formOrder->isSubmitted() && $formOrder->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $order = $formOrder->getData();
            $order -> setUser($user);
            $em->persist($order);
            $em->flush();
            return $this->redirectToRoute('home');
        }

        return $this->render('Shop/Order/orderConf.html.twig', [
            'orderQnt'=>$orderQnt,
            'formOrder' => $formOrder->createView(),
        ]);

    }



}
