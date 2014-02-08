<?php

namespace stae\PushGatewayBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Response;
use RMS\PushNotificationsBundle\Message\AndroidMessage;

class DefaultController extends Controller
{

  /**
   * @Route("/message/offline")
   * @Method({"POST"})
   */
  public function indexAction($to, $from, $body)
  {
    $message = new AndroidMessage();
    $message->setGCM(true);
    $message->setMessage($body);
    
    // TODO: get device token from $from var
    $message->setDeviceIdentifier($identifier);
            
    $this->container->get('rms_push_notifications')->send($message);

    return new Response();
  }

}
