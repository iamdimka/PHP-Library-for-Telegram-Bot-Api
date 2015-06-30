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
     * Possible attachment fields
     * @var array
     */
    protected static $attachments = ['photo', 'sticker', 'audio', 'document', 'video'];

    /**
     * Constructor
     * @param $token
     */
    public function __construct($token)
    {
        $this->curl = curl_init();
        $this->urlPrefix = "https://api.telegram.org/bot{$token}/";
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
     * @throws Exception
     * @return mixed
     */
    public function call($method, array $data = null)
    {
        $options = [
            CURLOPT_URL => $this->urlPrefix . $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => null,
            CURLOPT_POSTFIELDS => null
        ];

        if ($data) {

            foreach (static::$attachments as $field) {
                if (isset($data[$field])) {
                    $data[$field] = $this->curlFile($data[$field]);
                    break;
                }
            }

            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
        }

        curl_setopt_array($this->curl, $options);

        $response = json_decode(curl_exec($this->curl), $this->returnArray);

        if ($this->returnArray) {
            if (!$response['ok']) {
                throw new Exception($response['description'], $response['error_code']);
            }

            return $response['result'];
        }

        if (!$response->ok) {
            throw new Exception($response->description, $response->error_code);
        }

        return $response->result;
    }

    /**
     * Or use that
     * @param string $name
     * @param array $arguments
     * @return mixed
     */
    function __call($name, $arguments)
    {
        return $this->call($name, $arguments ? $arguments[0] : null);
    }


    /**
     * Close curl
     */
    public function __destruct()
    {
        $this->curl and curl_close($this->curl);
    }

    /**
     * Create curl file
     * @param string $path
     * @throws Exception
     * @return CURLFile|string
     */
    private function curlFile($path)
    {
        if (is_array($path)) {
            if (!isset($path['file_id'])) {
                throw new Exception('Input file id');
            }

            return $path['file_id'];
        }

        $realPath = realpath($path);

        if (!$realPath) {
            throw new Exception('File not found');
        }

        if (class_exists('CURLFile')) {
            return new CURLFile($realPath);
        }

        return '@' . $realPath;
    }

} 