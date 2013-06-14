<?php
// this implements http://spaceapi.net/ v0.12
class Data
{
    protected $data = array();

    protected $mandatory = array(
        'api' ,
        'space',
        'logo',
        'url',
        'open',
        'icon',
    );

    public function __construct()
    {
        foreach ($this->mandatory as $key) {
            $this->data[$key] = null;
        }
    }

    public function setApi($api)
    {
        if (preg_match('(\d+(\.\d)*)', $api)) {
            $this->data['api'] = $api;
        } else {
            throw new InvalidArgumentException("Failed setting property 'api'.");
        }

        return $this;
    }

    public function setSpace($arg)
    {
        if (strlen($arg) > 0) {
            $this->data['space'] = $arg;
        } else {
            throw new InvalidArgumentException("Failed setting property 'space'.");
        }

        return $this;
    }

    public function setLogo($arg)
    {
        if (strlen($arg) > 0) {
            $this->data['logo'] = $arg;
        } else {
            throw new InvalidArgumentException("Failed setting property 'logo'.");
        }

        return $this;
    }

    public function setUrl($arg)
    {
        if (strlen($arg) > 0) {
            $this->data['url'] = $arg;
        } else {
            throw new InvalidArgumentException("Failed setting property 'url'.");
        }

        return $this;
    }

    public function setOpen($arg = true)
    {
        if ($arg === true) {
            $this->data['open'] = true;
        } elseif ($arg === false) {
            $this->data['open'] = false;
        } else {
            throw new InvalidArgumentException("Failed setting property 'open'.");
        }

        return $this;
    }

    public function setClosed($arg = true)
    {
        if ($arg === true) {
            $this->data['open'] = false;
        } elseif ($arg === false) {
            $this->data['open'] = true;
        } else {
            throw new InvalidArgumentException("Failed setting property 'open'.");
        }

        return $this;
    }

    public function setIcon(array $arg)
    {
        if (isset($arg['open']) && strlen($arg['open']) > 0 && isset($arg['closed']) && strlen($arg['closed']) > 0) {
            $this->data['icon'] = $arg;
        } else {
            throw new InvalidArgumentException("Failed setting property 'icon'.");
        }

        return $this;
    }

    public function setProp($key, $arg)
    {
        if (!in_array($key, $this->mandatory)) {
            $this->data[$key] = $arg;
        }

        return $this;
    }

    public function __toString()
    {
        foreach ($this->data as $k => $v) {
            if (is_null($v)) {
                throw new Exception("{$k} must be set!");
            }
        }

        return json_encode($this->data);
    }
}
