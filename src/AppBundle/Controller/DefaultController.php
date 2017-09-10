<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need

        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AdminBundle:Post')->findBy([], ['datepublish' => 'desc'], 3, 0);

        return $this->render('default/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    
    /**
     * @Route("/blog", name="blog")
     */
    public function blog() {

        $em = $this->getDoctrine()->getManager();
        $posts = $em->getRepository('AdminBundle:Post')->findAll();

        return $this->render('default/blog.html.twig', [
            'posts' => $posts,
        ]);

 
    }



        /**
     * @Route("/blog/{id}", name="blog-show")
     */
    public function show($id) {

        $em = $this->getDoctrine()->getManager();
        $post = $em->getRepository('AdminBundle:Post')->find($id);

        return $this->render('default/show.html.twig', [
            'post' => $post,
        ]);

 
    }


}
