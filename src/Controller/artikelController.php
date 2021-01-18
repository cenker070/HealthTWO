<?php


namespace App\Controller;


use http\Env\Response;
use

class artikelController
{
    /**
     * @route("/")
     */
    public function homePage()
    {
        return new Response("homepage!");
    }

    /**
     * @route("/homepage/{slug})
     */
    public function show($slug)
    {
        return $this->render('homepage/bezoeker.html.twig',    [

        'title' => ucwords(str_replace('-',''. $slug)),
        ]);
    }
}