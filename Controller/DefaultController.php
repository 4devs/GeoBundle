<?php

namespace FDevs\GeoBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    public function indexAction(Request $request, $lat, $lng)
    {
        return $this->render(
            'FDevsGeoBundle:Default:index.html.twig',
            ['lang' => $request->getLocale(), 'lat' => $lat, 'lng' => $lng]
        );
    }
}
