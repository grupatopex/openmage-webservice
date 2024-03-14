<?php

use Symfony\Component\HttpClient\CurlHttpClient;

class Gtx_Webservice_Model_File
{
    /**
     * @var CurlHttpClient
     */
    private CurlHttpClient $httpClient;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->httpClient = new CurlHttpClient();
    }

    /**
     * Download file from URL and save it to the specified path.
     *
     * @param string $url The URL to download the file from.
     * @param string $filePath The path to save the downloaded file.
     * @throws \RuntimeException If the file cannot be downloaded or saved.
     */
    public function download($url, $filePath)
    {
        $options = [
            'auth_ntlm' => [
                'username' => Mage::helper('gtx_webservice')->getUsername(),
                'password' => Mage::helper('gtx_webservice')->getPassword(),
            ]
        ];

        try {
            $response = $this->httpClient->request('GET', $this->encodeURI($url), $options);
            file_put_contents($filePath, $response->getContent());
        } catch (\Throwable $e) {
            throw new \RuntimeException('Failed to download the file: ' . $e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * Encode URI to ensure it is properly formatted.
     *
     * @param string $uri The URI to encode.
     * @return string The encoded URI.
     */
    private function encodeURI($uri)
    {
        return preg_replace_callback("{[^0-9a-z_.!~*'();,/?:@&=+$#-]}i", function ($m) {
            return sprintf('%%%02X', ord($m[0]));
        }, $uri);
    }
}
