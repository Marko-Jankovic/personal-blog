<?php
/**
 * User: markojankovic
 * Date: 5/11/14
 * Time: 11:37 PM
 */

namespace Blog\FrontBundle\Controller;

use Blog\ModelBundle\Services\AuthorManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class AuthorController extends Controller{


    /**
     * Show a posts by Author
     *
     * @param $slug
     *
     * @return array
     * @Template()
     */
    public function showAction($slug)
    {
        $author = $this->getAuthorManager()->findBySlug($slug);
        $posts  = $this->getAuthorManager()->findPosts($author);

        return array(
            'actionName' => 'showPosts',
            'author'     => $author,
            'posts'      => $posts
        );
    }

    /**
     * Get Author manager
     *
     * @return AuthorManager
     */
    private function getAuthorManager()
    {
        return $this->get('authorManager');
    }
} 