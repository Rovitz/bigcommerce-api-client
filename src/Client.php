<?php

namespace Hirooks\BigCommerce\Api;

use BigCommerce\ApiV2\V2ApiClient as ClientV2;
use BigCommerce\ApiV3\Client as ClientV3;
use Hirooks\BigCommerce\Api\Custom\RestClientV3;
use Hirooks\BigCommerce\Api\Custom\RestClientV2;
use Hirooks\BigCommerce\Api\Custom\GraphqlClient;

class Client
{
    /**
     * Configure the API client with the required OAuth credentials.
     *
     * @param string $store_hash
     * @param string $client_id
     * @param string $auth_token
     *
     * @return void
     */
    public function __construct(private string $store_hash, private string $client_id, private string $auth_token)
    {
    }

    /**
     * Get an instance of REST v3 API client.
     *
     * @return ClientV3
     */
    public function v3()
    {
        return new ClientV3($this->store_hash, $this->client_id, $this->auth_token);
    }

    /**
     * Get an instance of REST v2 API client.
     *
     * @return ClientV2
     */
    public function v2()
    {
        return new ClientV2($this->store_hash, $this->client_id, $this->auth_token);
    }

    /**
     * Get an instance of custom REST API client.
     *
     * @return RestClientV3
     */
    public function customV3()
    {
        return new RestClientV3($this->store_hash, $this->client_id, $this->auth_token);
    }

    /**
     * Get an instance of custom REST API client.
     *
     * @return RestClientV2
     */
    public function customV2()
    {
        return new RestClientV2($this->store_hash, $this->client_id, $this->auth_token);
    }

    /**
     * Get an instance of GraphQL API client.
     *
     * @return GraphqlClient
     */
    public function graphql()
    {
        return new GraphqlClient($this->store_hash, $this->client_id, $this->auth_token);
    }
}
