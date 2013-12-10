<?php

/**
 * Description of Tabellagenerale
 *
 * @ author Stefano Bassetto <stefano.bassetto@gmail.com>
 */

namespace Nasd\TabBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity
 * @ORM\Table(name="tabellagenerale")
 * @ Gedmo\loggable
 * @GRID\Source(columns="id,InventaryNumber,Slab,SubjectIconography,King,Site,Palace,RoomCourt,Wall,Images,Bibliography,pathfile,created")
 * @GRID\Column(id="tabellagenerale", size="-1", type="text")
 */
class Tabellagenerale {
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
    /**
     * @ORM\Column(type="string", length="32", name="InventaryNumber", nullable=true)
     * @var integer $InventaryNumber
     */
    private $InventaryNumber;
    
    /**
     * @var integer $Slab
     *
     * @ORM\Column(type="string", length="35", nullable=true)
     */
    private $Slab;
            
    /**
     * @var integer $SubjectIconography
     *
     * @ORM\Column(type="string", length="60", nullable=true)
     */
    private $SubjectIconography;
            
    /**
     * @var integer $King
     *
     * @ORM\Column(type="string", length="22", nullable=true)
     */
    private $King;
            
    /**
     * @var integer $Site
     *
     * @ORM\Column(type="string", length="13", nullable=true)
     */
    private $Site;
            
    /**
     * @var integer $Palace
     *
     * @ORM\Column(type="string", length="17", nullable=true)
     */
    private $Palace;
            
    /**
     * @var integer $RoomCourt
     *
     * @ORM\Column(type="string", length="36", nullable=true)
     */
    private $RoomCourt;
            
    /**
     * @var integer $Wall
     *
     * @ORM\Column(type="string", length="25", nullable=true)
     */
    private $Wall;
            
    /**
     * @var integer $Inscription
     *
     * @ORM\Column(type="string", length="12", nullable=true)
     */
    private $Inscription;
            
    /**
     * @var integer $MuseumCollection
     *
     * @ORM\Column(type="string", length="56", nullable=true)
     */
    private $MuseumCollection;
            
    /**
     * @var integer $City
     *
     * @ORM\Column(type="string", length="25", nullable=true)
     */
    private $City;
            
    /**
     * @var integer $Images
     *
     * @ORM\Column(type="string", length="56", nullable=true)
     */
    private $Images;
            
    /**
     * @var integer $Bibliography
     *
     * @ORM\Column(type="string", length="68", nullable=true)
     */
    private $Bibliography;

    /**
     * @var integer $pathfile
     *
     * @ORM\Column(type="string", length="128", nullable=true)
     */
    private $pathfile;

    /**
     * @var datetime $created
     * 
     * @ Gedmo\Timestampable(on="create")
     * @ ORM\Column(type="date")
     * @ GRID\Column(title="Created at",size="-1",type="date",visible=true,sortable=true,filterable=true,format="d/m/Y")
     *
    private $created;
     
    
     * @ var datetime $updated
     *
     * @ ORM\Column(type="datetime")
     * @ Gedmo\Timestampable(on="update")
     *
    private $updated;
*/

}