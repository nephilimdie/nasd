<?php

namespace Nasd\TabBundle\Controller;

use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Symfony\Component\Finder\Finder;

use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;

use JMS\SecurityExtraBundle\Annotation\Secure;

class AddfileController extends Controller
{
    /**
     *
     * @Secure(roles="ROLE_ADMIN")
     * @return \Symfony\Component\Finder\Finder 
     */
    protected function findfile()
    {
        $finder = new Finder();
        $dir = __DIR__.'/../../../../web/uploads/';
        $finder->files()->in($dir)->ignoreDotFiles(true)->ignoreVCS(true);
        return $finder;
    }
    /**
     * @Secure(roles="ROLE_ADMIN")
     *
     * @param type $dir 
     */
    protected function createdirectory($dir)
    {
        if (!file_exists($dir)) {
            mkdir($dir, 0777);
        }
    }
    /**
     * Finds and displays a Tabellagenerale entity.
     *
     * @Secure(roles="ROLE_ADMIN")
     *
     * @ param type $id
     * @return type 
     * @Template()
     * @ Route("/file/{id}", name="findfile")
     */
    public function indexAction()
    {
        
        return array('entities' => $this->findfile());
    }
}
