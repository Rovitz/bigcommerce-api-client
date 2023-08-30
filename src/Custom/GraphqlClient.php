<?php

namespace Hirooks\BigCommerce\Api\Custom;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Middleware;

/**
 * Custom GraphQL API client.
 */
class GraphqlClient
{
    public const API_URI = 'https://api.bigcommerce.com/stores/%s/graphql';

    public const DEFAULT_HANDLER      = 'handler';
    public const DEFAULT_BASE_URI     = 'base_uri';
    public const DEFAULT_HEADERS      = 'headers';
    public const DEFAULT_TIMEOUT      = 'timeout';

    private const HEADERS__AUTH_CLIENT  = 'X-Auth-Client';
    private const HEADERS__AUTH_TOKEN   = 'X-Auth-Token';
    private const HEADERS__CONTENT_TYPE = 'Content-Type';
    private const HEADERS__ACCEPT       = 'Accept';
    private const APPLICATION_JSON      = 'application/json';

    private string $storeHash;
    private string $clientId;
    private string $accessToken;

    private Client $client;

    private array $debugContainer = [];

    private array $defaultClientOptions = [
        self::DEFAULT_TIMEOUT => 45,
        self::DEFAULT_HEADERS => [
            self::HEADERS__CONTENT_TYPE => self::APPLICATION_JSON,
            self::HEADERS__ACCEPT       => self::APPLICATION_JSON,
        ]
    ];

    public function __construct(
        string  $storeHash,
        string  $clientId,
        string  $accessToken,
        ?Client $client = null,
        ?array  $clientOptions = []
    ) {
        $this->storeHash    = $storeHash;
        $this->clientId     = $clientId;
        $this->accessToken  = $accessToken;
        $this->setBaseUri(sprintf($this->defaultBaseUrl(), $this->storeHash));

        $this->client = $client ?? $this->buildDefaultHttpClient($clientOptions);
    }

    private function buildDefaultHttpClient(array $clientOptions): Client
    {
        $history = Middleware::history($this->debugContainer);
        $stack   = HandlerStack::create();
        $stack->push($history);

        $options = array_merge($this->defaultClientOptions, $clientOptions);
        $options[self::DEFAULT_HANDLER] = $stack;
        $options[self::DEFAULT_BASE_URI] = $this->getBaseUri();
        $options[self::DEFAULT_HEADERS] = array_merge([
            self::HEADERS__AUTH_CLIENT  => $this->clientId,
            self::HEADERS__AUTH_TOKEN   => $this->accessToken,
        ], $options[self::DEFAULT_HEADERS]);

        return new Client($options);
    }

    public function getBaseUri(): string
    {
        return $this->baseUri;
    }

    public function setBaseUri(string $baseUri)
    {
        $this->baseUri = $baseUri;
    }

    protected function defaultBaseUrl(): string
    {
        return self::API_URI;
    }

    public function query(string $query)
    {
        try {
            $response = $this->client->post('', [
                'json' => [
                    'query' => $query,
                ]
            ])->getBody();

            return json_decode($response, true);
        } catch (GuzzleException $e) {
            return [
                'errors' => [
                    [
                        'message' => $e->getMessage()
                    ]
                ]
            ];
        }
    }

    public function getSystemTime()
    {
        return $this->query('query system { system { time } }');
    }

    // TODO: methods...
    public function example()
    {
        // ...
        return true;
    }
}
