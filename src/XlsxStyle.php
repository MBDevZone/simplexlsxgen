<?php

namespace Shuchkin;

/**
 * Class XlsxStyle
 */
class XlsxStyle
{
    /**
     * @var string
     */
    private $value = '';

    /**
     * @var string
     */
    private $backgroundColor = '';

    /**
     * @var string
     */
    private $fontColor = '';

    /**
     * @var string
     */
    private $align = 'left';

    /**
     * @var string
     */
    private $verticalAlign = 'middle';

    /**
     * @var int
     */
    private $height = null;

    /**
     * @var string
     */
    private $border = null;

    /**
     * @var bool
     */
    private $italic = false;

    /**
     * @var bool
     */
    private $bold = false;

    /**
     * @var bool
     */
    private $underline = false;

    /**
     * @var bool
     */
    private $strike = false;

    /**
     * @var bool
     */
    private $wrapText = false;

    /**
     * Create a new style instance.
     *
     * @param string $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * setValue
     * 
     * @param string $value
     * @return XlsxStyle
     */
    public function setValue($value)
    {
        $this->value = $value;

        return $this;
    }

    /**
     * setBackground
     * 
     * @param string $color
     * @return XlsxStyle
     */
    public function setBackground($color)
    {
        $this->backgroundColor = $color;

        return $this;
    }

    /**
     * setColor
     * 
     * @param string $color
     * @return XlsxStyle
     */
    public function setColor($color)
    {
        $this->fontColor = $color;
        
        return $this;
    }

    /**
     * setAlignment
     * 
     * @param string $horizontal
     * @param string $vertical = 'middle'
     * @return XlsxStyle
     */
    public function setAlignment($horizontal, $vertical = 'middle')
    {
        $this->align = $horizontal;
        $this->verticalAlign = $vertical;
        
        return $this;
    }

    /**
     * setHeight
     * 
     * @param int $height
     * @return XlsxStyle
     */
    public function setHeight($height)
    {
        $this->height = $height;
        
        return $this;
    }

    /**
     * setBorder
     * 
     * @param string $border
     * @return XlsxStyle
     */
    public function setBorder($border)
    {
        $this->border = $border;
        
        return $this;
    }

    /**
     * setItalic
     * 
     * @param bool $italic = true
     * @return XlsxStyle
     */
    public function setItalic($italic = true)
    {
        $this->italic = $italic;
        
        return $this;
    }

    /**
     * setBold
     * 
     * @param bool $bold = true
     * @return XlsxStyle
     */
    public function setBold($bold = true)
    {
        $this->bold = $bold;
        
        return $this;
    }

    /**
     * setUnderline
     * 
     * @param bool $underline = true
     * @return XlsxStyle
     */
    public function setUnderline($underline = true)
    {
        $this->underline = $underline;
        
        return $this;
    }

    /**
     * setStrike
     * 
     * @param bool $strike = true
     * @return XlsxStyle
     */
    public function setStrike($strike = true)
    {
        $this->strike = $strike;
        
        return $this;
    }

    /**
     * setWrapText
     * 
     * @param bool $wrapText = true
     * @return XlsxStyle
     */
    public function setWrapText($wrapText = true)
    {
        $this->wrapText = $wrapText;
        
        return $this;
    }

    /**
     * get
     * 
     * @return string
     */
    public function get()
    {
        $res = $this->value;
        $styles = '';

        if ($this->height != null)
            $styles .= " height=\"$this->height\"";
        
        if ($this->border != null)
            $styles .= " border=\"$this->border\"";

        if ($this->italic)
            $res = "<i>$res</i>";

        if ($this->bold)
            $res = "<b>$res</b>";
        
        if ($this->underline)
            $res = "<u>$res</u>";
        
        if ($this->strike)
            $res = "<s>$res</s>";
        
        if ($this->wrapText)
            $res = "<wraptext>$res</wraptext>";
        
        $res = "<$this->align>$res</$this->align>";
        $res = "<$this->verticalAlign>$res</$this->verticalAlign>";

        return "<style bgcolor=\"$this->backgroundColor\" color=\"$this->fontColor\"$styles>$res</style>";
    }

    /**
     * Create a new style instance.
     *
     * @param string $value = ''
     * @return XlsxStyle
     */
    public static function new($value = '')
    {
        return new self($value);
    }
}
