<?php

class Telegram
{
    /**
     * @var
     */
    protected $curl;

    /**
     * Url prefix
     * @var string
     */
    protected $urlPrefix;

    /**
     * Check whether return associative array
     * @var bool
     */
    protected $returnArray = true;

    /**
     * Constructor
     * @param $token
     */
    public function __construct($token)
    {
        $this->curl = curl_init();
        $this->$urlPrefix = "https://api.telegram.org/bot{$token}/";
    }

    /**
     * Set return array
     * @param bool $mode
     * @return $this
     */
    public function setModeObject($mode = true)
    {
        $this->returnArray = !$mode;
        return $this;
    }

    /**
     * Call method
     * @param string $method
     * @param array $data
     * @return mixed
     */
    public function call($method, array $data = null)
    {
        $options = [
            CURLOPT_URL => $this->curl . $method,
            CURLOPT_RETURNTRANSFER => true
        ];

        if ($data) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = http_build_query($data);
        }

        curl_setopt_array($this->curl, $options);

        $response = curl_exec($this->curl);
        return json_decode($response, $this->returnArray);
    }

    /**
     * Or use that
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return $this->call($name, $arguments);
    }


    /**
     * Close curl
     */
    public function __destruct()
    {
        $this->curl and curl_close($this->curl);
    }

} 