<?php
/**
 * Created by PhpStorm.
 * User: nathanaelmrejen
 * Date: 31/01/2018
 * Time: 11:26
 */

namespace DI\PlatformBundle\Controller;

use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;


class AdvertController extends Controller
{
    public function indexAction()
    {
        //return new Response("Notre propre Hello World !");
        //$content = $this->get('templating')->render('DIPlatformBundle:Advert:index.html.twig');
        //$variable = 'REBIBO';
        //$content = $this->get('templating')->render('DIPlatformBundle:Advert:index.html.twig', array('nom' => 'Adrien', 'prenom' => $variable));
        $annonces = array(
            array(
                'title' => 'Recherche dev Symfony',
                'id' => 1,
                'author' => 'Nath26',
                'content' => 'Nous recherchons un super dev Symfony<br>test test',
                'date' => new \DateTime()
            ),
            array(
                'title' => 'Recherche dev Symfony',
                'id' => 2,
                'author' => 'Nath',
                'content' => 'Nous recherchons un super dev Symfony<br>test test',
                'date' => new \DateTime()
            ),
            array(
                'title' => 'Recherche dev Symfony',
                'id' => 3,
                'author' => 'Nathanael',
                'content' => 'Nous recherchons un super dev Symfony<br>test test',
                'date' => new \DateTime()
            )
        );

        $content = $this->get('templating')->render('DIPlatformBundle:Advert:index.html.twig', array('listeAnnonces' => $annonces));

        return new Response($content);
    }

    public function viewAction($id /*, Request $request*/)
    {
        //$category = $request->query->get('cat');
        //$category = $request->get('cat');
        //return new Response('Affichage de l\'annonce d\'id : '.$id.', avec le tag : '.$category);

        $annonce = array(
                'title' => 'Recherche dev Symfony',
                'id' => $id,
                'author' => 'Nath26',
                'content' => 'Nous recherchons un super dev Symfony',
                'date' => new \DateTime()
            );

        $content = $this->get('templating')->render('DIPlatformBundle:Advert:view.html.twig', array('annonce' => $annonce));
        return new Response($content);

    }

    public function addAction() {
        $content = $this->get('templating')->render('DIPlatformBundle:Advert:add.html.twig');
        return new Response($content);
    }


    public function editAction($id) {
        $content = $this->get('templating')->render('DIPlatformBundle:Advert:edit.html.twig', array('id' => $id));
        return new Response($content);
    }


    public function menuAction() {
        $listAdverts = array(
            array('id' => 1, 'title' => 'Recherche dev Symfony'),
            array('id' => 2, 'title' => 'Recherche dev Symfony 2'),
            array('id' => 3, 'title' => 'Recherche dev Symfony 3')
        );

        $content = $this->get('templating')->render('DIPlatformBundle:Advert:menu.html.twig', array('last_adverts' => $listAdverts));
        return new Response($content);

    }








    public function viewSlugAction($year, $slug, $_format)
    {
        return new Response(
            "On pourrait afficher l'annonce correspondant au slug '".$slug."', créée en ".$year." et au format ".$_format."."
        );
    }


    public function detailCustomerAction($id_client, Request $request) {
        /*affichage direct sans passer par une vue*/
        //return new Response("l'id de mon client est : ".$id_client);

        /*affichage en passant par une vue*/

        /*recuperation de la valeur du paramètre get "bonclient" (après le ?) */
        $bon = $request->query->get('bonclient');

        $url_relative1 = $this->get('router')->generate('di_platform_detail_client', array('id_client' => $id_client));
        $url_relative2 = $this->generateUrl('di_platform_detail_client', array('id_client' => $id_client));

        $url_absolue = $this->get('router')->generate('di_platform_detail_client', array('id_client' => $id_client), UrlGeneratorInterface::ABSOLUTE_URL);

        $content = $this->get('templating')->render('DIPlatformBundle:Advert:detailclient.html.twig',
            array('mon_id_client' => $id_client,
                'bonoupas' => $bon,
                'mon_url1' => $url_relative1,
                'mon_url2' => $url_relative2,
                'mon_url3' => $url_absolue
            )
        );
        return new Response($content);
    }




}