<?php
/**
 * @name        ImageCrop
 * @package		BiberLtd\Core\ImageManagementBundle
 *
 * @author		Murat Ünal
 * @version     1.0.2
 * @date        10.10.2013
 *
 * @copyright   Biber Ltd. (http://www.biberltd.com)
 * @license     GPL v3.0
 *
 * @description Model / Entity class.
 *
 */
namespace BiberLtd\Bundle\ImageManagementBundle\Entity;
use Doctrine\ORM\Mapping AS ORM;
use BiberLtd\Core\CoreLocalizableEntity;

/** 
 * @ORM\Entity
 * @ORM\Table(
 *     name="image_crop",
 *     options={"charset":"utf8","collate":"utf8_turkish_ci","engine":"innodb"},
 *     indexes={
 *         @ORM\Index(name="idx_u_image_croıp_id", columns={"id"}),
 *         @ORM\Index(name="idx_n_crop_dimensions", columns={"height","width"})
 *     }
 * )
 */
class ImageCrop extends CoreLocalizableEntity
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer", length=10)
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /** 
     * @ORM\Column(type="string", length=1, nullable=false)
     */
    private $respect_ratio;

    /** 
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $prefix;

    /** 
     * @ORM\Column(type="string", length=55, nullable=true)
     */
    private $postfix;

    /** 
     * @ORM\Column(type="integer", length=5, nullable=false)
     */
    private $height;

    /** 
     * @ORM\Column(type="integer", length=5, nullable=false)
     */
    private $width;

    /** 
     * @ORM\Column(type="integer", length=3, nullable=false)
     */
    private $quality;

    /** 
     * @ORM\OneToMany(
     *     targetEntity="BiberLtd\Bundle\ImageManagementBundle\Entity\ImageCropLocalization",
     *     mappedBy="image_crop"
     * )
     */
    protected $localizations;

    /** 
     * @ORM\ManyToOne(targetEntity="BiberLtd\Bundle\SiteManagementBundle\Entity\Site")
     * @ORM\JoinColumn(name="site", referencedColumnName="id", onDelete="CASCADE")
     */
    private $site;
    /******************************************************************
     * PUBLIC SET AND GET FUNCTIONS                                   *
     ******************************************************************/

    /**
     * @name            getId()
     *                  Gets $id property.
     * .
     * @author          Murat Ünal
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          string          $this->id
     */
    public function getId(){
        return $this->id;
    }

    /**
     * @name                  setHeight ()
     *                                  Sets the height property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $height
     *
     * @return          object                $this
     */
    public function setHeight($height) {
        if(!$this->setModified('height', $height)->isModified()) {
            return $this;
        }
		$this->height = $height;
		return $this;
    }

    /**
     * @name            getHeight ()
     *                            Returns the value of height property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->height
     */
    public function getHeight() {
        return $this->height;
    }

    /**
     * @name                  setPostfix ()
     *                                   Sets the postfix property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $postfix
     *
     * @return          object                $this
     */
    public function setPostfix($postfix) {
        if(!$this->setModified('postfix', $postfix)->isModified()) {
            return $this;
        }
		$this->postfix = $postfix;
		return $this;
    }

    /**
     * @name            getPostfix ()
     *                             Returns the value of postfix property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->postfix
     */
    public function getPostfix() {
        return $this->postfix;
    }

    /**
     * @name                  setPrefix ()
     *                                  Sets the prefix property.
     *                                  Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $prefix
     *
     * @return          object                $this
     */
    public function setPrefix($prefix) {
        if(!$this->setModified('prefix', $prefix)->isModified()) {
            return $this;
        }
		$this->prefix = $prefix;
		return $this;
    }

    /**
     * @name            getPrefix ()
     *                            Returns the value of prefix property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->prefix
     */
    public function getPrefix() {
        return $this->prefix;
    }

    /**
     * @name                  setQuality ()
     *                                   Sets the quality property.
     *                                   Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $quality
     *
     * @return          object                $this
     */
    public function setQuality($quality) {
        if(!$this->setModified('quality', $quality)->isModified()) {
            return $this;
        }
		$this->quality = $quality;
		return $this;
    }

    /**
     * @name            getQuality ()
     *                             Returns the value of quality property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->quality
     */
    public function getQuality() {
        return $this->quality;
    }

    /**
     * @name                  setRespectRatio ()
     *                                        Sets the respect_ratio property.
     *                                        Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $respect_ratio
     *
     * @return          object                $this
     */
    public function setRespectRatio($respect_ratio) {
        if(!$this->setModified('respect_ratio', $respect_ratio)->isModified()) {
            return $this;
        }
		$this->respect_ratio = $respect_ratio;
		return $this;
    }

    /**
     * @name            getRespectRatio ()
     *                                  Returns the value of respect_ratio property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->respect_ratio
     */
    public function getRespectRatio() {
        return $this->respect_ratio;
    }

    /**
     * @name                  setSite ()
     *                                Sets the site property.
     *                                Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $site
     *
     * @return          object                $this
     */
    public function setSite($site) {
        if(!$this->setModified('site', $site)->isModified()) {
            return $this;
        }
		$this->site = $site;
		return $this;
    }

    /**
     * @name            getSite ()
     *                          Returns the value of site property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->site
     */
    public function getSite() {
        return $this->site;
    }

    /**
     * @name                  setWidth ()
     *                                 Sets the width property.
     *                                 Updates the data only if stored value and value to be set are different.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @use             $this->setModified()
     *
     * @param           mixed $width
     *
     * @return          object                $this
     */
    public function setWidth($width) {
        if(!$this->setModified('width', $width)->isModified()) {
            return $this;
        }
		$this->width = $width;
		return $this;
    }

    /**
     * @name            getWidth ()
     *                           Returns the value of width property.
     *
     * @author          Can Berkol
     *
     * @since           1.0.0
     * @version         1.0.0
     *
     * @return          mixed           $this->width
     */
    public function getWidth() {
        return $this->width;
    }
}
/**
 * Change Log:
 * **************************************
 * v1.0.2                      Murat Ünal
 * 10.10.2013
 * **************************************
 * A getCountView()
 * A getDateAdded()
 * A getFile()
 * A getGallery()
 * A getLocalizations()
 * A getSortOrder()
 * A getType()
 *
 * A setCountView()
 * A setDateAdded()
 * A setFile()
 * A setGallery()
 * A setLocalizations()
 * A setSortOrder()
 * A setType()
 *
 */
